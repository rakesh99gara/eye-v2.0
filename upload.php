<?php
if(isset($_POST["import"])){
    $file = $_FILES['file_name']['tmp_name'];
    $handle = fopen($file,"r");
    while(($data = fgetcsv($handle,50000,",")) != false)
    {
        print_r($data[0]."<br>");
    }
    fclose($handle);
}
?>