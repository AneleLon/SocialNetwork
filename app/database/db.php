<?php
require('connect.php');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//тестовая часть
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Читаемый вывод
function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
//парамерты для вывода
/* $params = [
    'admin' => 1,
    //'username' => 'rodion'
]; */
//выводим таблицу
//tt(selectTable('users', $params, 1));
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//добавление записи в таблицу
/* $arrData = [
    'admin' => '1',
    'username' => '223354633',
    'email' => 'gad36456333sg@mail.ru',
    'password' => '123124'
]; */

//insert('users', $arrData);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//обновление строки
/* $id_name = "id_users";
$upparam = [
    'admin' => 0
]; */
//update('users', 7, $id_name, $upparam);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//удаление
// delete('users',7,'id_users');

//конец тестовой части
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

//обновление строки в таблице name - название id в таблице, change - номер id
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