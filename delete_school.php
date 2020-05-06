<?php

session_start();
if($_SESSION["un"]==true && $_SESSION["user_type"]==true){
    $_SESSION["un"]=$_SESSION["un"];
    $_SESSION["user_type"] = $_SESSION["user_type"];
}
else{
    echo "<script>window.location='index.html'</script>";
}
include 'db.php';

$scode = $_POST['scode'];
$date = $_POST['date'];

$sql = "DELETE FROM school WHERE scode='$scode' and date_of_visit='$date'";

if(mysqli_query($link,$sql)){
    print_r("1");
}
else{
    print_r("0");
}



?>