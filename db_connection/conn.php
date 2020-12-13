<?php 
$hostName = '127.0.0.1';
$userName = 'root';
$password = '';
$dataBase = 'requester';

$conn = mysqli_connect($hostName, $userName, $password, $dataBase);

if(!$conn){
	echo 'connection failed' .error_connect($conn);
}

 ?>