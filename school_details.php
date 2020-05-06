<?php 
include 'db.php';
extract($_POST);
session_start();

if($_SESSION["un"]==true && $_SESSION["user_type"]==true){
    $_SESSION["un"]=$_SESSION["un"];
    $_SESSION["user_type"] = $_SESSION["user_type"];
}
else{
    echo "<script>window.location='index.html'</script>";
}

$scode=$_POST['scode'];
$sname=$_POST['sname'];
$stype=$_POST['stype'];
$date1=$_POST['date'];
$headname=$_POST['headname'];
$phno=$_POST['phno'];
$address=$_POST['address'];

$_SESSION['s_scode'] = $scode;
$_SESSION['s_date'] = $date1;

$query = "INSERT INTO school(scode,sname,stype,date_of_visit,headname,phno,address) VALUES(?,?,?,?,?,?,?)";
$stm = mysqli_prepare($link,$query);
mysqli_stmt_bind_param($stm, "sssssss", $scode,$sname,$stype,$date1,$headname,$phno,$address);
$result = mysqli_stmt_execute($stm);
if($result){
    // header('location:enter_student.php');
    print_r('1');
}
else{
    print_r('0');
    // header('location:enter_school.html');
}



?>



