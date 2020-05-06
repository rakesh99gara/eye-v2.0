<?php
    // print_r($_POST);

    
session_start();
if($_SESSION["un"]==true && $_SESSION["user_type"]==true){
    $_SESSION["un"]=$_SESSION["un"];
    $_SESSION["user_type"] = $_SESSION["user_type"];
}
else{
    echo "<script>window.location='index.html'</script>";
}
    session_start();
    extract($_POST);
    $scode = $_SESSION['s_scode'];
    $sdate = $_SESSION['s_date'];
    $idno = $_POST['idno'];
    $adno = $_POST['adno'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['Gender'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $cno = $_POST['cno'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $medium = $_POST['medium'];
    if($_POST['complaintsright']=="others"){
        $complaintsright = $_POST['textcomplaintright'];
    }
    else{
        $complaintsright = $_POST['complaintsright'];
    }
    if($_POST['complaintsleft']=="others"){
        $complaintsleft = $_POST['textcomplaintleft'];
    }
    else{
        $complaintsleft = $_POST['complaintsleft'];
    }
    $unaidedrightdv = $_POST['unaidedrighteyedv'];
    $unaidedrightnv = $_POST['unaidedrighteyenv'];
    $unaidedleftdv = $_POST['unaidedlefteyedv'];
    $unaidedleftnv = $_POST['unaidedlefteyenv'];
    $pgrightsph = $_POST['oldpgrightsph'];
    $pgrightcyl = $_POST['oldpgrightcyl'];
    $pgrightaxis = $_POST['oldpgrightaxis'];
    $pgrightdv = $_POST['oldpgrightdv'];
    $pgrightnv = $_POST['oldpgrightnv'];
    $pgleftsph = $_POST['oldpgleftsph'];
    $pgleftcyl = $_POST['oldpgleftcyl'];
    $pgleftaxis = $_POST['oldpgleftaxis'];
    $pgleftdv = $_POST['oldpgleftdv'];
    $pgleftnv = $_POST['oldpgleftnv'];

    $arrightsph = $_POST['arrightsph'];
    $arrightcyl = $_POST['arrightcyl'];
    $arrightaxis = $_POST['arrightaxis'];
    $arleftsph = $_POST['arleftsph'];
    $arleftcyl = $_POST['arleftcyl'];
    $arleftaxis = $_POST['arleftaxis'];

    $dvrightsph = $_POST['dvrightsph'];
    $dvrightcyl = $_POST['dvrightcyl'];
    $dvrightaxis = $_POST['dvrightaxis'];
    $dvrightdv = $_POST['dvrightdv'];
    $dvrightnv = $_POST['dvrightnv'];
    $dvleftsph = $_POST['dvleftsph'];
    $dvleftcyl = $_POST['dvleftcyl'];
    $dvleftaxis = $_POST['dvleftaxis'];
    $dvleftdv = $_POST['dvleftdv'];
    $dvleftnv = $_POST['dvleftnv'];
    $colorright = $_POST['colorright'];
    $colorleft = $_POST['colorleft'];
    $eomright = $_POST['eomright'];
    $eomleft = $_POST['eomleft'];
    $anteriorright = $_POST['anteriorright'];
    $anteriorleft = $_POST['anteriorleft'];
    if(isset($_POST['rth']))
    {
        $rth = 'yes';
    }
    else{
        $rth = 'no';
    }
    if(isset($_POST['gp']))
    {
        $gp = 'yes';
    }
    else{
        $gp = 'no';
    }
    if(isset($_POST['oth'])){
        $advice = $_POST['advice'];
    }
    else{
        $advice = 'no';
    }
    $_SESSION['s_adno'] = $adno;

    include 'db.php';
    $query = "INSERT INTO student (scode,date_of_visit,sid,aadhar,stu_name,date_of_birth,age,gender,father_name,mother_name,contact_no,class,section,_medium,complaint_right,complaint_left,unaided_right_dv,unaided_right_nv,unaided_left_dv,unaided_left_nv,pg_right_sph,pg_right_cyl,pg_right_axis,pg_right_dv,pg_right_nv,pg_left_sph,pg_left_cyl,pg_left_axis,pg_left_dv,pg_left_nv,ar_right_sph,ar_right_cyl,ar_right_axis,ar_left_sph,ar_left_cyl,ar_left_axis,dv_right_sph,dv_right_cyl,dv_right_axis,dv_right_dv,dv_right_nv,dv_left_sph,dv_left_cyl,dv_left_axis,dv_left_dv,dv_left_nv,color_vision_right,color_vision_left,eom_right,eom_left,anterior_segment_right,anterior_segment_left,hospital_referal,glasses_presented,advices) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stm = mysqli_prepare($link,$query);
    mysqli_stmt_bind_param($stm, "sssssssssssssssssssssssssssssssssssssssssssssssssssssss",$scode,$sdate,$idno,$adno,$name,$dob,$age,$gender,$fname,$mname,$cno,$class,$section,$medium,$complaintsright,$complaintsleft,$unaidedrightdv,$unaidedrightnv,$unaidedleftdv,$unaidedleftnv,$pgrightsph,$pgrightcyl,$pgrightaxis,$pgrightdv,$pgrightnv,$pgleftsph,$pgleftcyl,$pgleftaxis,$pgleftdv,$pgleftnv,$arrightsph,$arrightcyl,$arrightaxis,$arleftsph,$arleftcyl,$arleftaxis,$dvrightsph,$dvrightcyl,$dvrightaxis,$dvrightdv,$dvrightnv,$dvleftsph,$dvleftcyl,$dvleftaxis,$dvleftdv,$dvleftnv,$colorright,$colorleft,$eomright,$eomleft,$anteriorright,$anteriorleft,$rth,$gp,$advice);
    // print_r($query);
    $result = mysqli_stmt_execute($stm);
    if($result){
        print_r(1);
    }
    else{
        print_r(0);
    }

?>