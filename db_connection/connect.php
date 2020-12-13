<?php

$userName = 'root';
$hostName = '127.0.0.1';
$dataBase = 'makeuprequester';
$password = '';

$connect = mysqli_connect($hostName, $userName, $password, $dataBase);

if(!$connect){
    echo 'Sorry, you ran into an error while trying to connect to the database, please try back after some time -:) '.mysqli_connect_error();
}



?>