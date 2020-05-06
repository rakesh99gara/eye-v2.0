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


if(!$link){
echo "Not connected";
}
else{

    $sch_code = $_POST['sch_code'];
    $date_of_visit = $_POST['date_of_visit'];
    
    $stm = "SELECT * from school where scode = $sch_code AND date_of_visit='$date_of_visit'";
    $results = mysqli_query($link, $stm);
    if(mysqli_num_rows($results)>0){
        $arr = mysqli_fetch_assoc($results);
        $output = json_encode($arr);
        echo $output;

    }
}
?>
