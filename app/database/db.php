<?php
session_start();

require('connect.php');
//Читаемый вывод
function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
function getLatestMessagesWithUsers($userId)
{
    global $pdo;

    $sql = "SELECT 
                u.id_users AS id,
                u.username AS username,
                m.text AS last_message,
                m.time AS last_message_time
            FROM users u
            INNER JOIN (
                SELECT 
                    CASE 
                        WHEN idFrom = :userId THEN idIn
                        ELSE idFrom
                    END AS id,
                    MAX(time) AS max_time
                FROM message
                WHERE idFrom = :userId OR idIn = :userId
                GROUP BY id
            ) AS latest_messages ON u.id_users = latest_messages.id
            INNER JOIN message m ON 
                (m.idFrom = u.id_users AND m.idIn = :userId) OR 
                (m.idFrom = :userId AND m.idIn = u.id_users)
            WHERE m.time = latest_messages.max_time
            ORDER BY last_message_time DESC";

    $query = $pdo->prepare($sql);

    $query->execute(['userId' => $userId]);
    dbCheckError($query);

    return $query->fetchAll();
}
function getDialogueMessages($userId1, $userId2) {
    global $pdo;

    $sql = "SELECT 
                CASE 
                    WHEN idFrom = :userId1 THEN :userId1
                    ELSE :userId2
                END AS sender_id,
                text,
                time
            FROM message
            WHERE (idFrom = :userId1 AND idIn = :userId2) OR (idFrom = :userId2 AND idIn = :userId1)
            ORDER BY time DESC";

    $query = $pdo->prepare($sql);
    $query->execute(['userId1' => $userId1, 'userId2' => $userId2]);
    dbCheckError($query);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
//Проверка выполнения запроса к БД
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        $errorMessage = "Ошибка базы данных: " . $errInfo[2] . " в запросе: " . $query->queryString;
        if (headers_sent()) {
            error_log($errorMessage); // Лог -> /opt/lampp/logs/php_error_log
        } else {
            echo $errorMessage;  //Отображение в веб
        }
        exit();
    }
    return true;
}
function getLikesCount($postId)
{
    global $pdo;
    $sql = "SELECT COUNT(*) AS likes_count FROM likePost WHERE id_post = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$postId]);
    return $stmt->fetchColumn();
}
function getCommentsCount($postId)
{
    global $pdo;
    $sql = "SELECT COUNT(*) AS comments_count FROM comment WHERE id_post = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$postId]);
    return $stmt->fetchColumn();
}
// Все посты и id создателя
function selectTablePost()
{
    global $pdo;

    $sql = "SELECT p.*, u.username
    FROM post p
    JOIN users u ON p.user_id_post = u.id_users";


    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
function selectTablePostUser($userId)
{
    global $pdo;
    $userId = $_SESSION['id'];
    $sql = "SELECT p.*, u.username
    FROM post p
    JOIN users u ON p.user_id_post = u.id_users
    WHERE p.user_id_post = :user_id";
    


    $query = $pdo->prepare($sql);
    $query->execute(['user_id' => $userId]);
    dbCheckError($query);
    return $query->fetchAll();
}
//Все записи, без параметров
function selectAll($table)
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
function selectUserAndStatusSub($table, $currentUserId)
{
    global $pdo;

    $sql = "
        SELECT u.*, 
               EXISTS(SELECT 1 FROM subscriber WHERE idSub = :currentUserId AND id = u.id_users) as is_subscribed
        FROM $table u";

    $query = $pdo->prepare($sql);
    $query->execute(['currentUserId' => $currentUserId]);
    dbCheckError($query);
    return $query->fetchAll();
}
function selectSubscribedUsers($table, $currentUserId)
{
    global $pdo;

    $sql = "
        SELECT u.*
        FROM $table u
        WHERE EXISTS (
            SELECT 1 
            FROM subscriber 
            WHERE idSub = :currentUserId AND id = u.id_users
        )";

    $query = $pdo->prepare($sql);
    $query->execute(['currentUserId' => $currentUserId]);
    dbCheckError($query);
    return $query->fetchAll();
}
// Запрос на получение данных одной таблицы $volume = All или любое нужное число
function selectTable($table, $params = [], $volume)
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

    if ($volume != "All") {
        $sql = $sql . " LIMIT $volume";
    }

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);


    return $query->fetchAll();
}
//Запись в таблицу БД
function insert($table, $params)
{
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";


    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
    return $pdo->lastInsertId();
}
//обновление строки в таблице, name - название id в таблице, change - номер id
function update($table, $change, $name, $params)
{
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE $name = $change";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}
//удаление строки в таблице name - название id в таблице, beingDelete - удаляемое
function delete($table, $beingDelete, $name)
{
    global $pdo;
    $sql = "DELETE FROM $table WHERE $name = $beingDelete";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}
function deleteSub($id, $idSub)
{
    global $pdo;
    $sql = "DELETE FROM subscriber WHERE id = $id AND idSub = $idSub";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}
function deleteLike($user, $post)
{
    global $pdo;
    $sql = "DELETE FROM likePost WHERE id_user = $user AND id_post = $post";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}
//какскадное удаление users ручками
function deleteUser($userId)
{
    global $pdo;

    try {
        $pdo->beginTransaction();

        $sql = "DELETE FROM `subscriber` WHERE `id` = :userId OR `idSub` = :userId";
        $query = $pdo->prepare($sql);
        $query->execute(['userId' => $userId]);

        $sql = "DELETE FROM `likePost` WHERE `id_user` = :userId";
        $query = $pdo->prepare($sql);
        $query->execute(['userId' => $userId]);

        $sql = "DELETE FROM `comment` WHERE `id_user` = :userId";
        $query = $pdo->prepare($sql);
        $query->execute(['userId' => $userId]);

        $sql = "DELETE FROM `post` WHERE `user_id_post` = :userId";
        $query = $pdo->prepare($sql);
        $query->execute(['userId' => $userId]);

        $sql = "DELETE FROM `message` WHERE `idFrom` = :userId OR `idIn` = :userId";
        $query = $pdo->prepare($sql);
        $query->execute(['userId' => $userId]);

        $sql = "DELETE FROM `users` WHERE `id_users` = :userId";
        $query = $pdo->prepare($sql);
        $query->execute(['userId' => $userId]);

        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Ошибка при удалении пользователя: " . $e->getMessage();
    }
}