<?php 
    include 'db.php';


    session_start();
    if($_SESSION["un"]==true && $_SESSION["user_type"]==true){
        $_SESSION["un"]=$_SESSION["un"];
        $_SESSION["user_type"] = $_SESSION["user_type"];
    }
    else{
        echo "<script>window.location='index.html'</script>";
    }


    $scode=$_POST['scode'];
    $date_of_visit=$_POST['date'];
    $sname=$_POST['sname'];
    $stype=$_POST['stype'];
    $headname=$_POST['headname'];
    $phno=$_POST['phno'];
    $address=$_POST['address'];




    $query = "UPDATE school SET sname='$sname',stype='$stype',headname='$headname',phno=$phno,address='$address' WHERE scode=$scode AND date_of_visit='$date_of_visit'";

    $result = mysqli_query($link,$query);
    if(!$result){
        print_r("0"); 
    }
    else{
        print_r("1");
    }
    

?>