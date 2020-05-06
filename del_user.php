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
$uname = $_POST['uname'];
$qur1 = "DELETE FROM login where username = '$uname'";
$res1 = mysqli_query($link,$qur1);

if($res1){
    print_r("1");
}
else{
    print_r("0");
}


?>