<?php
$connection = new PDO("mysql:host=localhost;dbname=mysite;charset=utf8","root","");

//$query = "INSERT users (name,age,login,password) VALUE ('Klim','25','klimlogin','klimpass')";
//$count = $connection->exec($query);

//echo $count;
//$count = null;
$name = 'TTTT';
$age = 45;
$login = 'ffXff';
$password = 'adfaXXXXsdf';

$param = [
    'n' => $name,
    'age'=>$age, 
    'l'=>$login, 
    'password'=>$password
];

$sql = "INSERT users (name,age,login,password) VALUE (:n, :age, :l, :password)";
$query = $connection->prepare($sql);

$query->execute($param);