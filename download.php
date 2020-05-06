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
    $year = (string) $_POST['dwn_name'];
    $year = strtolower($year);
    $flag = 0;
    $query = '';
    if(ctype_digit($year)){
        $query = "SELECT * FROM school JOIN student ON school.scode = student.scode AND school.date_of_visit = student.date_of_visit WHERE year(school.date_of_visit)='$year'";  
    }
    if($year == 'all'){
        $query = "SELECT * FROM school LEFT JOIN student ON school.scode = student.scode AND school.date_of_visit = student.date_of_visit";
    }
    $result = mysqli_query($link,$query);
    if($result){
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=data.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output,array('scode','sname','stype','date_of_visit','headname','phno','address','scode','date_of_visit','sid ','aadhar','stu_name','date_of_birth','age','gender','father_name','mother_name','contact_no ','class','section','_medium','complaint_right','complaint_left','unaided_right_dv','unaided_right_nv','unaided_left_dv','unaided_left_nv','pg_right_sph','pg_right_cyl','pg_right_axis','pg_right_dv','pg_right_nv','pg_left_sph','pg_left_cyl','pg_left_axis','pg_left_dv','pg_left_nv','dv_right_sph','ar_right_sph','ar_right_cyl','ar_right_axis','ar_left_sph','ar_left_cyl','ar_left_axis','dv_right_cyl','dv_right_axis','dv_right_dv','dv_right_nv','dv_left_sph','dv_left_cyl','dv_left_axis','dv_left_dv','dv_left_nv','color_vision_right','color_vision_left','eom_right','eom_left','anterior_segment_right','anterior_segment_left','hospital_referal','glasses_presented','advices'));
        while($row = mysqli_fetch_row($result))  
        {  
            fputcsv($output,array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18], $row[19], $row[20], $row[21], $row[22], $row[23], $row[24], $row[25], $row[26], $row[27], $row[28], $row[29], $row[30], $row[31], $row[32], $row[33], $row[34], $row[35], $row[36], $row[37], $row[38], $row[39], $row[40], $row[41], $row[42], $row[43],$row[44], $row[45], $row[46], $row[47], $row[48], $row[49], $row[50], $row[51], $row[52], $row[53], $row[54], $row[55], $row[56], $row[57], $row[58], $row[59], $row[60], $row[61]));            
        }
    }
?>




    