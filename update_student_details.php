
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
    $aadhar = $_SESSION['aadhar'];
    $date_of_visit = $_SESSION['date_of_visit'];
    $un = $_SESSION['un'];
    
    

    $idno = $_POST['idno'];
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
    if($_POST['complaintsright']=="Others"){
        $complaintsright = $_POST['textcomplaintright'];
    }
    else{
        $complaintsright = $_POST['complaintsright'];
    }
    if($_POST['complaintsleft']=="Others"){
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
    if(isset($_POST['rth'])){
        $rth = 'yes';
    }
    if(!isset($_POST['rth'])){
        $rth = 'no';
    }

    if(isset($_POST['gp'])){
        $gp = 'yes';
    }
    if(!isset($_POST['gp'])){
        $gp = 'no';
    }

    
    if(isset($_POST['oth'])){
        $advice = $_POST['advice'];
    }
    if(!isset($_POST['oth'])){
        $advice = 'no';
    }
    

    $smt = "UPDATE student SET sid='$idno',stu_name='$name',date_of_birth='$dob',age='$age',gender='$gender',father_name='$fname',mother_name='$mname',contact_no=$cno,class='$class',section='$section',_medium='$medium',complaint_right='$complaintsright',complaint_left='$complaintsleft',unaided_right_dv='$unaidedrightdv',unaided_right_nv='$unaidedrightnv',unaided_left_dv='$unaidedleftdv',unaided_left_nv='$unaidedleftnv',pg_right_sph='$pgrightsph',pg_right_cyl='$pgrightcyl',pg_right_axis='$pgrightaxis',pg_right_dv='$pgrightdv',pg_right_nv='$pgrightnv',pg_left_sph='$pgleftsph',pg_left_cyl='$pgleftcyl',pg_left_axis='$pgleftaxis',pg_left_dv='$pgleftdv',pg_left_nv='$pgleftnv',ar_right_sph='$arrightsph',ar_right_cyl='$arrightcyl',ar_right_axis='$arrightaxis',ar_left_sph='$arleftsph',ar_left_cyl='$arleftcyl',ar_left_axis='$arleftaxis',dv_right_sph='$dvrightsph',dv_right_cyl='$dvrightcyl',dv_right_axis='$dvrightaxis',dv_right_dv='$dvrightdv',dv_right_nv='$dvrightnv',dv_left_sph='$dvleftsph',dv_left_cyl='$dvleftcyl',dv_left_axis='$dvleftaxis',dv_left_dv='$dvleftdv',dv_left_nv='$dvleftnv',color_vision_right='$colorright',color_vision_left='$colorleft',eom_right='$eomright',eom_left='$eomleft',anterior_segment_right='$anteriorright',anterior_segment_left='$anteriorleft',hospital_referal='$rth',glasses_presented='$gp',advices='$advice' WHERE aadhar='$aadhar' AND date_of_visit='$date_of_visit'";
    //echo $smt;
    $results = mysqli_query($link, $smt);

    if(!$results)
    {
        print_r($smt); 
    }
    else
    {
        print_r("1");
    }
    
    

?> 