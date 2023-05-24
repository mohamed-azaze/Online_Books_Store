<?php
include 'Connection.php';
$sql = "SELECT * FROM `books` WHERE `id` = " . $_GET["id"];

$qurey = mysqli_query($connect, $sql);

if (mysqli_num_rows($qurey) == 0) {
    die('File Dose not exists');
}

$row = mysqli_fetch_object($qurey);

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');

echo $row->Book_PDF;