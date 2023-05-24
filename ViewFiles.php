<?php
include 'Connection.php';
echo $_GET["id"];
$sql = "SELECT * FROM `books` WHERE `id` = " . $_GET["id"];

$qurey = mysqli_query($connect, $sql);

if (mysqli_num_rows($qurey) == 0) {
    die('File Dose not exists');
}

$row = mysqli_fetch_object($qurey);

header('Content-Type: application/pdf');

echo $row->Book_PDF;