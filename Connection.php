<?php
$hostName = 'localhost';
$username = 'root';
$passowrd = '';
$dataBase = 'online_books_store';

$connect = mysqli_connect($hostName, $username, $passowrd, $dataBase) or die($mysqli->connect_error);

if (!$connect) {
    die(mysqli_error($con));
}