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

$pwd = $_POST['pwd'];
$uname = $_SESSION['un'];
$utype = $_SESSION['user_type'];


$query = "UPDATE login SET password='$pwd' WHERE username='$uname' AND user_type='$utype'";

$result = mysqli_query($link,$query);
if(!$result){
    print_r("0"); 
}
else{
    print_r("1");
}
// print_r($query);

?>