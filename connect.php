<?php
$servername = "localhost";
$database = "db_kalilo";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

?>