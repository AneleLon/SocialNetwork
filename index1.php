<?php
require_once 'setting.php';
$connection = new mysqli($host,$user,$password,$data);
if ($connection->connect_error){
    //echo "<script>console.log('Ошибка подключения');</script>";
    die("Ошибка");
    }
echo "<script>console.log('Подключение успешно выполнено');</script>";

$query = "SELECT * FROM users";
$resultQuery = $connection ->query($query);
if (!$resultQuery) echo "<script>console.log('Не выполнен select код' );</script>";

$rows = $resultQuery->num_rows;
for($i=0; $i < $rows; ++$i){
    $resultQuery->data_seek($i);
    echo 'Name: '. $resultQuery->fetch_assoc()['name'] . '<br>';
}

//echo '<pre>';
//print_r($resultQuery);
//echo '</pre>';

$resultQuery->close();
$connection->close();
?>
