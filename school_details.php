<?php 
include 'db.php';
extract($_POST);
session_start();

$scode=$_POST['scode'];
$sname=$_POST['sname'];
$stype=$_POST['stype'];
$date1=$_POST['date'];
$headname=$_POST['headname'];
$phno=$_POST['phno'];
$address=$_POST['address'];

$_SESSION['s_scode'] = $scode;
$_SESSION['s_date'] = $date1;


$query = "INSERT INTO school(scode,sname,stype,date_of_visit,headname,phno,address) VALUES($scode,'$sname','$stype','$date1','$headname','$phno','$address')";
// echo $query;
$result = mysqli_query($link,$query);
if($result){
    // header('location:enter_student.php');
    print_r('1');
}
else{
    print_r('0');
    // header('location:enter_school.html');
}



?>



