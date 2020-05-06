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


if (!$link) {
    echo "Not connected";
} else {
    
    $name = $_POST['temp'];
    if (isset($name)) {
        $stm = "SELECT * from student where aadhar = $name ORDER BY date_of_visit DESC";
        $results = mysqli_query($link, $stm);
        if (mysqli_num_rows($results) > 0) {
            $arr = mysqli_fetch_assoc($results);
            $output = json_encode($arr);
            echo $output;
        }
    }
}
?>