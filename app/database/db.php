<?php
require('connect.php');

//тестовая часть____________________________________________________________________________________________________________________
//Читаемый вывод----------------------------------------------------------------------------
function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
//парамерты для вывода
$params = [
    'admin' => 1,
    //'username' => 'rodion'
];
//выводим таблицу
tt(selectTable('users', $params, 1));
//добавление записи в таблицу----------------------------------------------------------------
$arrData = [
    'admin' => '1',
    'username' => '223354633',
    'email' => 'gad36456333sg@mail.ru',
    'password' => '123124'
];

insert('users', $arrData);
// конец тестовой части_____________________________________________________________________________________________________________
//Проверка выполнения запроса к БД
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        $errorMessage = "Ошибка базы данных: " . $errInfo[2] . " в запросе: " . $query->queryString;
        if (headers_sent()) {
            error_log($errorMessage); // Лог -> /opt/lampp/logs/php_error_log
        } else {
            trigger_error($errorMessage, E_USER_ERROR); //Отображение в веб
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
}
