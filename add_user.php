<?php
    include 'db.php';
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $utype=$_POST['utype'];
    if($uname=='')
    {
        print_r(1);
        goto end_code;
    }
    if (!preg_match("/^[a-zA-Z ]*$/",test_input($uname))) 
    {
        print_r("2");
        goto end_code;
    }
    $sql = "SELECT count(*) AS count FROM login WHERE username='$uname'";
    $res1 = mysqli_query($link,$sql);
    $row1 = mysqli_fetch_array($res1);
    if($row1['count']!=0)
    {
        print_r("3");
        goto end_code;
    }
    if($pass=='')
    {
        print_r('4');
        goto end_code;
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $sql = "INSERT INTO login VALUES('$uname','$pass','$utype');";
    $res1 = mysqli_query($link,$sql);
    print_r('5');
    end_code:
?>