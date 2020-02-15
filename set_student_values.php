<?php
include 'db.php';
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