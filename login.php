<?php
session_start();

$flag=0;
$username = $_POST['uname'];
$username = strtolower($username);
$password = $_POST['pass'];
$utype = $_POST['utype'];
$utype = strtolower($utype);
$_SESSION["un"]=$username;
include 'db.php';

    
if($utype=='admin')
{
    $quer = mysqli_query($link,"SELECT * FROM login");
    while ($row = mysqli_fetch_array($quer))
    {
        if($row['username'] == $username && $row['password'] == $password && $row['user_type'] == $utype)
        {
            $flag=1; 
            $_SESSION["un"] = $username;
            $_SESSION["user_type"] = $utype;
            print_r("1");
        }
    }
}
else
{
    $quer = mysqli_query($link,"SELECT * FROM login");
    while ($row = mysqli_fetch_array($quer))
    {
        if($row['username'] == $username && $row['password'] == $password && $row['user_type'] == $utype)
        {
            $flag=1; 
            $_SESSION["un"] = $username;
            $_SESSION["user_type"] = $utype;
            print_r("2");
        }
    }

}

if($flag==0)
{
    print_r("3");   
}
    
  
?>