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
        // print_r($query);
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
        // print_r($query);
    }
    
    fclose($handle);


// print_r("how are you");

// 0 scode
// 1 date_of_visit
// 2 sid
// 3 aadhar
// 4 stu_name
// 5 date_of_birth
// 6 age
// 7 gender
// 8 father_name
// 9 mother_name
// 10 contact_no
// 11 class
// 12 section
// 13 _medium
// 14 complaint_right
// 15 complaint_left
// 16 unaided_right_dv
// 17 unaided_right_nv
// 18 unaided_left_dv
// 19 unaided_left_nv
// 20 pg_right_sph
// 21 pg_right_cyl
// 22 pg_right_axis
// 23 pg_right_dv
// 24 pg_right_nv
// 25 pg_left_sph
// 26 pg_left_cyl
// 27 pg_left_axis
// 28 pg_left_dv
// 29 pg_left_nv
// 30 ar_right_sph
// 31 ar_right_cyl
// 32 ar_right_axis
// 33 ar_left_sph
// 34 ar_left_cyl
// 35 ar_left_axis
// 36 dv_right_sph
// 37 dv_right_cyl
// 38 dv_right_axis
// 39 dv_right_dv
// 40 dv_right_nv
// 41 dv_left_sph
// 42 dv_left_cyl
// 43 dv_left_axis
// 44 dv_left_dv
// 45 dv_left_nv
// 46 color_vision_right
// 47 color_vision_left
// 48 eom_right
// 49 eom_left
// 50 anterior_segment_right
// 51 anterior_segment_left
// 52 hospital_referal
// 53 glasses_presented
// 54 advices




?>