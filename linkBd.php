<?php
session_start();
$uname = "root";
$host = "localhost";
$password = "";
$bd = "remont";

$link = mysqli_connect($host ,$uname ,$password ,$bd);
?>