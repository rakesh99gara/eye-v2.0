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

    $file = $_FILES['file_name']['tmp_name'];
    $handle = fopen($file,"r");
    $output = '';
    $head = '';
    $table_head = '';
    $count = 0;
    $arr = array();
    while(($data = fgetcsv($handle,80000,",")) != false)
    {
        // print_r($data[0]."<br>");
        $query = "INSERT INTO student (scode,date_of_visit,sid,aadhar,stu_name,date_of_birth,age,gender,father_name,mother_name,contact_no,class,section,_medium,complaint_right,complaint_left,unaided_right_dv,unaided_right_nv,unaided_left_dv,unaided_left_nv,pg_right_sph,pg_right_cyl,pg_right_axis,pg_right_dv,pg_right_nv,pg_left_sph,pg_left_cyl,pg_left_axis,pg_left_dv,pg_left_nv,ar_right_sph,ar_right_cyl,ar_right_axis,ar_left_sph,ar_left_cyl,ar_left_axis,dv_right_sph,dv_right_cyl,dv_right_axis,dv_right_dv,dv_right_nv,dv_left_sph,dv_left_cyl,dv_left_axis,dv_left_dv,dv_left_nv,color_vision_right,color_vision_left,eom_right,eom_left,anterior_segment_right,anterior_segment_left,hospital_referal,glasses_presented,advices) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stm, "sssssssssssssssssssssssssssssssssssssssssssssssssssssss",$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],$data[14],$data[15],$data[16],$data[17],$data[18],$data[19],$data[20],$data[21],$data[22],$data[23],$data[24],$data[25],$data[26],$data[27],$data[28],$data[29],$data[30],$data[31],$data[32],$data[33],$data[34],$data[35],$data[36],$data[37],$data[38],$data[39],$data[40],$data[41],$data[42],$data[43],$data[44],$data[45],$data[46],$data[47],$data[48],$data[49],$data[50],$data[51],$data[52],$data[53],$data[54]);
        // $query = "INSERT INTO student (scode,date_of_visit,sid,aadhar,stu_name,date_of_birth,age,gender,father_name,mother_name,contact_no,class,section,_medium,complaint_right,complaint_left,unaided_right_dv,unaided_right_nv,unaided_left_dv,unaided_left_nv,pg_right_sph,pg_right_cyl,pg_right_axis,pg_right_dv,pg_right_nv,pg_left_sph,pg_left_cyl,pg_left_axis,pg_left_dv,pg_left_nv,ar_right_sph,ar_right_cyl,ar_right_axis,ar_left_sph,ar_left_cyl,ar_left_axis,dv_right_sph,dv_right_cyl,dv_right_axis,dv_right_dv,dv_right_nv,dv_left_sph,dv_left_cyl,dv_left_axis,dv_left_dv,dv_left_nv,color_vision_right,color_vision_left,eom_right,eom_left,anterior_segment_right,anterior_segment_left,hospital_referal,glasses_presented,advices) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]','$data[23]','$data[24]','$data[25]','$data[26]','$data[27]','$data[28]','$data[29]','$data[30]','$data[31]','$data[32]','$data[33]','$data[34]','$data[35]','$data[36]','$data[37]','$data[38]','$data[39]','$data[40]','$data[41]','$data[42]','$data[43]','$data[44]','$data[45]','$data[46]','$data[47]','$data[48]','$data[49]','$data[50]','$data[51]','$data[52]','$data[53]','$data[54]')";      
        $result = mysqli_stmt_execute($stm);
        if(!$result){
            $count += 1;
            $output .= "
                <tr>
                    <td>".$count."</td>
                    <td>".$data[0]."</td>
                    <td>".$data[1]."</td>
                    <td>".$data[3]."</td>
                </tr>                    
            ";
        }
    }

    if($output == ''){
        // print_r("Upload Successfull");
        $head .= "<p class='details-success'>Upload Successful</p>";
        $arr[0] = $head;
        $arr[1] = "";
        $arr[2] = "";
        $arr[3] = $count;

        print_r(json_encode($arr));
    }
    else{
        // print_r("Errors present with following records");
        $head .= "<p class='details-error'>Errors present with following records</p>";
        $table_head .=
        "
                <tr>
                    <th>SNo.</th>
                    <th>School Code</th>
                    <th>Date of Visit</th>
                    <th>Aadhar No</th>
                <tr>
        "
        ;
        $arr[0] = $head;
        $arr[1] = $table_head;
        $arr[2] = $output;
        $arr[3] = $count;

        print_r(json_encode($arr));
    }
    
    fclose($handle);


// print_r("how are you");

?>