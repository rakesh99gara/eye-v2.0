<?php
include 'db.php';
$uname = $_POST['uname'];
$qur1 = "DELETE FROM login where username = '$uname'";
$res1 = mysqli_query($link,$qur1);
?>