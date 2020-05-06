<?php


session_start();
if($_SESSION["un"]==true && $_SESSION["user_type"]==true){
    $_SESSION["un"]=$_SESSION["un"];
    $_SESSION["user_type"] = $_SESSION["user_type"];
}
else{
    echo "<script>window.location='index.html'</script>";
}
require('fpdf17/fpdf.php');
    include 'db.php';

    $scode = $_SESSION['s_scode'];
    $date = $_SESSION['s_date'];
    $sadno = $_SESSION['s_adno'];
   
    
    $school_query = "SELECT * FROM school WHERE scode="."$scode"." AND date_of_visit="."'$date'";
    $row= mysqli_query($link,$school_query);
    $school_row = mysqli_fetch_array($row,MYSQLI_ASSOC);
    
    $student_query = "SELECT * FROM student WHERE scode="."$scode"." AND date_of_visit="."'$date'"." AND aadhar="."$sadno";
    $student = mysqli_query($link,$student_query);
    $student_row = mysqli_fetch_array($student,MYSQLI_ASSOC);

    $s_code = $school_row['scode'];
    $s_stype = $school_row['stype'];
    $s_phno = $school_row['phno'];
	$s_sname = $school_row['sname'];
    $s_headname = $school_row['headname'];
    $s_address = $school_row['address'];
	$s_date =  $school_row['date_of_visit'];
	$s_idno = $student_row['sid'];
    $s_adno = $student_row['aadhar'];
    $s_name = $student_row['stu_name'];
    $s_fname = $student_row['father_name'];
    $s_mname = $student_row['mother_name'];
    $s_cno = $student_row['contact_no'];
    $s_dob = $student_row['date_of_birth'];
    $s_age = $student_row['age'];
    $s_gender = $student_row['gender'];
    $s_class = $student_row['class'];
    $s_section = $student_row['section'];
    $s_medium = $student_row['_medium'];
    $s_complaint_right = $student_row['complaint_right'];
    $s_complaint_left = $student_row['complaint_left'];
    $s_unaidedrightdv = $student_row['unaided_right_dv'];
    $s_unaidedrightnv = $student_row['unaided_right_nv'];
    $s_unaidedleftdv = $student_row['unaided_left_dv'];
    $s_unaidedleftnv = $student_row['unaided_left_nv'];
    $s_pgrightsph = $student_row['pg_right_sph'];
    $s_pgrightcyl = $student_row['pg_right_cyl'];
    $s_pgrightaxis = $student_row['pg_right_axis'];
    $s_pgrightdv = $student_row['pg_right_dv'];
    $s_pgrightnv = $student_row['pg_right_nv'];
    $s_pgleftsph = $student_row['pg_left_sph'];
    $s_pgleftcyl = $student_row['pg_left_cyl'];
    $s_pgleftaxis =$student_row['pg_left_axis'];
    $s_pgleftdv =  $student_row['pg_left_dv'];
    $s_pgleftnv =  $student_row['pg_left_nv'];
    $s_arrightsph = $student_row['ar_right_sph'];
    $s_arrightcyl = $student_row['ar_right_cyl'];
    $s_arrightaxis = $student_row['ar_right_axis'];
    $s_arleftsph = $student_row['ar_left_sph'];
    $s_arleftcyl = $student_row['ar_left_cyl'];
    $s_arleftaxis = $student_row['ar_left_axis'];
    $s_dvrightsph = $student_row['dv_right_sph'];
    $s_dvrightcyl = $student_row['dv_right_cyl'];
    $s_dvrightaxis = $student_row['dv_right_axis'];
    $s_dvrightdv = $student_row['dv_right_dv'];
    $s_dvrightnv = $student_row['dv_right_nv'];
    $s_dvleftsph = $student_row['dv_left_sph'];
    $s_dvleftcyl = $student_row['dv_left_cyl'];
    $s_dvleftaxis = $student_row['dv_left_axis'];
    $s_dvleftdv = $student_row['dv_left_dv'];
    $s_dvleftnv = $student_row['dv_left_nv'];
    $s_color_vision_right = $student_row['color_vision_right'];
    $s_color_vision_left = $student_row['color_vision_left'];
    $s_eom_right = $student_row['eom_right'];
    $s_eom_left = $student_row['eom_left'];
    $s_anterior_segment_right = $student_row['anterior_segment_right'];
    $s_anterior_segment_left = $student_row['anterior_segment_left'];
    $s_hospital_referal = $student_row['hospital_referal'];
    $s_glasses_presented = $student_row['glasses_presented'];
    $s_advices = $student_row['advices'];

    class PDF extends FPDF
    {
        function Header()
        {
            $this->Image('photos/veh-logo.jpg',0,10,30);
            $this->Image('photos/vebrat-logo.jpg',185,10,20);
            $this->Image('photos/school_children.jpg',35,95,130);
            $this->SetFont('Times','BU',18);
            // Move to the right
            //$this->Cell(80);
            // Title
            $this->Cell(0,10,'MOHSIN SCHOOL HEALTH EYE CARE PROJECT',0,1,'C');
            $this->SetFont('Arial','BI',11);
            $this->Cell(0,10,'VEBART TRUST (VISAKHAPATNAM EYE BANK AND RESEARCH TRAINING TRUST)',0,1,'C');
            $this->Cell(0,10,'VEH TRUST(VISAKHA EYE HOSPITAL TRUST)',0,1,'C');
            $this->Cell(20);
            $this->SetFont('Arial','I',11);
            $this->Cell(75,10,'Ph. : 7799222269',0,0,'L');
            $this->Cell(95,10,'Email : mohsinschooleye@gmail.com',0,1,'C');
            $this->Cell(0,0.1,'',1,1);
            // Line break
            $this->Ln(5);

        }
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            $this->Cell(0,0.1,'',1,1);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',8);
    //$pdf->Cell(190,5,"",1,1);
    $pdf->Cell(48,5,"Student Name :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_name ,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"School Code :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_code,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Aadhar Number:",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_adno,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"School Name :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_sname,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"DOB :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_dob,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"School Type :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_stype,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Age :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_age,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Head Name :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_headname,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Gender :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_gender,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"School Contact No :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_phno,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Father Name :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_fname,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Date of Visit :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_date,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Mother Name:",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_mname,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Class :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_class,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Contact NO :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_cno,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Section :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_section,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Roll NO :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_idno,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Medium :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_medium,1,1,'L');
    $pdf->ln(5);

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Complaints right eye",1,0);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_complaint_right,1,0);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Complaints left eye",1,0);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_complaint_left,1,1);
    $pdf->ln(5);

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"",1,0);
    $pdf->Cell(72,5,"Right Eye",1,0,'C');
    $pdf->Cell(72,5,"Left Eye",1,1,'C');
    $pdf->Cell(48,5,'Unaided',1,0,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,5,"DV :",0,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(28,5,$s_unaidedrightdv,'R',0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,5,"NV :",0,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(28,5,$s_unaidedrightnv,'R',0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,5,"DV :",0,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(28,5,$s_unaidedleftdv,'R',0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,5,"NV :",0,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(28,5,$s_unaidedleftnv,'R',1,'L');
    $pdf->Cell(48,5,"",1,0);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(14.4,5,"sph",1,0,'C');
    $pdf->Cell(14.4,5,"cyl",1,0,'C');
    $pdf->Cell(14.4,5,"axis",1,0,'C');
    $pdf->Cell(14.4,5,"dv",1,0,'C');
    $pdf->Cell(14.4,5,"nv",1,0,'C');
    $pdf->Cell(14.4,5,"sph",1,0,'C');
    $pdf->Cell(14.4,5,"cyl",1,0,'C');
    $pdf->Cell(14.4,5,"axis",1,0,'C');
    $pdf->Cell(14.4,5,"dv",1,0,'C');
    $pdf->Cell(14.4,5,"nv",1,1,'C');
    $pdf->Cell(48,5,'Vision with pg(old)',1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(14.4,5,$s_pgrightsph,1,0,'C');
    $pdf->Cell(14.4,5,$s_pgrightcyl,1,0,'C');
    $pdf->Cell(14.4,5,$s_pgrightaxis,1,0,'C');
    $pdf->Cell(14.4,5,$s_pgrightdv,1,0,'C');
    $pdf->Cell(14.4,5,$s_pgrightnv,1,0,'C');
    $pdf->Cell(14.4,5,$s_pgleftsph,1,0,'C');
    $pdf->Cell(14.4,5,$s_pgleftcyl,1,0,'C');
    $pdf->Cell(14.4,5,$s_pgleftaxis,1,0,'C');
    $pdf->Cell(14.4,5,$s_pgleftdv,1,0,'C');
    $pdf->Cell(14.4,5,$s_pgleftnv,1,1,'C');

    // $pdf->SetFont('Arial','B',8);
    // $pdf->Cell(48,5,'Auto Refraction',1,0,'C');
    // $pdf->SetFont('Arial','',8);
    // $pdf->Cell(14.4,5,$s_arrightsph,1,0,'C');
    // $pdf->Cell(14.4,5,$s_arrightcyl,1,0,'C');
    // $pdf->Cell(14.4,5,$s_arrightaxis,1,0,'C');
    // $pdf->Cell(14.4,5,"nil",1,0,'C');
    // $pdf->Cell(14.4,5,"nil",1,0,'C');
    // $pdf->Cell(14.4,5,$s_arleftsph,1,0,'C');
    // $pdf->Cell(14.4,5,$s_arleftcyl,1,0,'C');
    // $pdf->Cell(14.4,5,$s_arleftaxis,1,0,'C');
    // $pdf->Cell(14.4,5,"nil",1,0,'C');
    // $pdf->Cell(14.4,5,"nil",1,1,'C');


    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,'Sub Acceptance',1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(14.4,5,$s_dvrightsph,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvrightcyl,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvrightaxis,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvrightdv,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvrightnv,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftsph,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftcyl,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftaxis,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftdv,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftdv,1,1,'C');
    $pdf->ln(5);

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"",1,0);
    $pdf->Cell(72,5,"Right Eye",1,0,'C');
    $pdf->Cell(72,5,"Left Eye",1,1,'C');
    $pdf->Cell(48,5,'Color Vision',1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(72,5,$s_color_vision_right,1,0,'C');
    $pdf->Cell(72,5,$s_color_vision_left,1,1,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,'EOM',1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(72,5,$s_eom_right,1,0,'C');
    $pdf->Cell(72,5,$s_eom_left,1,1,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,'Anterior Segment',1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(72,5,$s_anterior_segment_right,1,0,'C');
    $pdf->Cell(72,5,$s_anterior_segment_left,1,1,'C');
    $pdf->ln(5);
    
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,"",'LTR',0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(72,5,"Normal/Refractive error/",'LTR',0,'C');
    $pdf->Cell(72,5,"Normal/Refractive error/",'LTR',1,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"",'LR',0,'C');
    $pdf->Cell(72,5,"",'LR',0,'C');
    $pdf->Cell(72,5,"",'LR',1,'C');
    $pdf->Cell(48,5,"Diagnosis",'LR',0,'C');
    $pdf->Cell(72,5,"",'LR',0,'C');
    $pdf->Cell(72,5,"",'LR',1,'C');
    $pdf->Cell(48,5,"",'LR',0,'C');
    $pdf->Cell(72,5,"",'LR',0,'C');
    $pdf->Cell(72,5,"",'LR',1,'C');
    $pdf->Cell(48,5,"",'LBR',0,'C');
    $pdf->Cell(72,5,"",'LBR',0,'C');
    $pdf->Cell(72,5,"",'LBR',1,'C');

    $pdf->ln(5);
    
    $pdf->SetFont('Arial','BU',8);
    $pdf->Cell(15,5,"Advices:",0,1,'L');
    $pdf->ln(2);
    //$pdf->Cell(190,5,"",1,1);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Referal to Base Hospital",1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_hospital_referal ,1,0,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Glasses Presented",1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_glasses_presented,1,1,'C');
    $pdf->ln(2);
    if($s_advices!='no')
    {
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(175,5,$s_advices,0,1,'L');
    }
    $pdf->ln(50);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(96,5,"Signature of Doctor/Optometrist",0,0,'L');
        


    $pdf->AddPage();
    $pdf->SetFont('Arial','BU',16);
    $pdf->Cell(190,12,"VISUAL HYGIENE",0,1,'L');
    $pdf->ln(2);
    $pdf->SetFont('Arial','',14);
    $pdf->Cell(190,8,'1.   Keep book, Laptop, News Paper, Cell Phones etc. 14" distance from eyes.',0,1,'L');
    $pdf->Cell(190,8,'2.   Adequate lighting essential to read.',0,1,'L');
    $pdf->Cell(190,8,'3.   Give rest for eyes periodicall - Stydy, Computer work, TV watching, etc.',0,1,'L');
    $pdf->Cell(190,8,'4.   Wash eyes with cold drinking water 4 times per day.',0,1,'L');
    $pdf->Cell(190,8,'5.   Cold compress helps tried eyes.',0,1,'L');
    $pdf->Cell(190,8,'6.   While reading / writing or working with computer sufficient light should ',0,1,'L');
    $pdf->Cell(190,8,'      come from behind.',0,1,'L');
    $pdf->ln(2);
    $pdf->SetFont('Arial','BU',16);
    $pdf->Cell(190,12,"CARE OF EYES",0,1,'L');
    $pdf->ln(2);
    $pdf->SetFont('Arial','',14);
    $pdf->Cell(190,8,'7.   Periodic check of your eyes with eye doctor.',0,1,'L');
    $pdf->Cell(190,8,"8.   Don't buy medicines / drugs without prescription.",0,1,'L');
    $pdf->Cell(190,8,'9.   Use drugs prescribed by eye doctor. Follow timings, duration, reviews, strictly.',0,1,'L');
    $pdf->Cell(190,8,'10.  Sunglasses with UV Protector are advised.',0,1,'L');
    $pdf->Cell(190,8,'11.  Avoid injuries during Play, Diwali and Holi.',0,1,'L');
    $pdf->Cell(190,8,'12.  Experiencing Pain / Blur vision / Redness - Consult eye doctor.',0,1,'L');
    $pdf->Cell(190,8,"13.  Usage of Steroids should be under doctor's supervision.",0,1,'L');
    $pdf->ln(2);
    $pdf->SetFont('Arial','BU',16);
    $pdf->Cell(190,12,"GOOD FOOD FOR EYES",0,1,'L');
    $pdf->ln(2);
    $pdf->SetFont('Arial','U',14);
    $pdf->Cell(35,8,"VEGETABLES:",0,0,'L');
    $pdf->SetFont('Arial','',14);
    $pdf->Cell(160,8," Milk, Carrot, Papaya, Green leafy vegetables, All vegetables,",0,1,'L');
    $pdf->Cell(160,8,"All fruits, Dals, Nuts, Dry Fruits.",0,1,'L');
    $pdf->SetFont('Arial','U',14);
    $pdf->Cell(53,8,"NON - VEGETABLES:",0,0,'L');
    $pdf->SetFont('Arial','',14);
    $pdf->Cell(110,8,"Fish, Mutton, Chicken, Eggs.");


    $pdf->AddPage();
    $pdf->SetFont('Arial','BU',16);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Student Name :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_name ,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"School Code :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_code,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Aadhar Number:",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_adno,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"School Name :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_sname,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"DOB :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_dob,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"School Type :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_stype,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Age :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_age,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Head Name :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_headname,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Gender :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_gender,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"School Contact No :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_phno,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Father Name :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_fname,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Date of Visit :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_date,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Mother Name:",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_mname,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Class :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_class,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Contact NO :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_cno,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Section :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_section,1,1,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Roll NO :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_idno,1,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"Medium :",1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(48,5,$s_medium,1,1,'L');
    $pdf->ln(5);

    // $pdf->SetFont('Arial','B',8);
    // $pdf->Cell(48,5,"Complaints right eye",1,0);
    // $pdf->SetFont('Arial','',8);
    // $pdf->Cell(48,5,$s_complaint_right,1,0);
    // $pdf->SetFont('Arial','B',8);
    // $pdf->Cell(48,5,"Complaints left eye",1,0);
    // $pdf->SetFont('Arial','',8);
    // $pdf->Cell(48,5,$s_complaint_left,1,1);
    // $pdf->ln(5);

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(192,6,"SPECTACLE PRESCRIPTION",0,1,'C');
    $pdf->ln(2);


    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,"",1,0);
    $pdf->Cell(72,5,"Right Eye",1,0,'C');
    $pdf->Cell(72,5,"Left Eye",1,1,'C');
    $pdf->Cell(48,5,'Unaided',1,0,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,5,"DV :",0,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(28,5,$s_unaidedrightdv,'R',0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,5,"NV :",0,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(28,5,$s_unaidedrightnv,'R',0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,5,"DV :",0,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(28,5,$s_unaidedleftdv,'R',0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,5,"NV :",0,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(28,5,$s_unaidedleftnv,'R',1,'L');
    $pdf->Cell(48,5,"",1,0);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(14.4,5,"sph",1,0,'C');
    $pdf->Cell(14.4,5,"cyl",1,0,'C');
    $pdf->Cell(14.4,5,"axis",1,0,'C');
    $pdf->Cell(14.4,5,"dv",1,0,'C');
    $pdf->Cell(14.4,5,"nv",1,0,'C');
    $pdf->Cell(14.4,5,"sph",1,0,'C');
    $pdf->Cell(14.4,5,"cyl",1,0,'C');
    $pdf->Cell(14.4,5,"axis",1,0,'C');
    $pdf->Cell(14.4,5,"dv",1,0,'C');
    $pdf->Cell(14.4,5,"nv",1,1,'C');
    // $pdf->Cell(48,5,'Vision with pg(old)',1,0,'C');
    // $pdf->SetFont('Arial','',8);
    // $pdf->Cell(14.4,5,$s_pgrightsph,1,0,'C');
    // $pdf->Cell(14.4,5,$s_pgrightcyl,1,0,'C');
    // $pdf->Cell(14.4,5,$s_pgrightaxis,1,0,'C');
    // $pdf->Cell(14.4,5,$s_pgrightdv,1,0,'C');
    // $pdf->Cell(14.4,5,$s_pgrightnv,1,0,'C');
    // $pdf->Cell(14.4,5,$s_pgleftsph,1,0,'C');
    // $pdf->Cell(14.4,5,$s_pgleftcyl,1,0,'C');
    // $pdf->Cell(14.4,5,$s_pgleftaxis,1,0,'C');
    // $pdf->Cell(14.4,5,$s_pgleftdv,1,0,'C');
    // $pdf->Cell(14.4,5,$s_pgleftnv,1,1,'C');

    // $pdf->SetFont('Arial','B',8);
    // $pdf->Cell(48,5,'Auto Refraction',1,0,'C');
    // $pdf->SetFont('Arial','',8);
    // $pdf->Cell(14.4,5,$s_arrightsph,1,0,'C');
    // $pdf->Cell(14.4,5,$s_arrightcyl,1,0,'C');
    // $pdf->Cell(14.4,5,$s_arrightaxis,1,0,'C');
    // $pdf->Cell(14.4,5,"nil",1,0,'C');
    // $pdf->Cell(14.4,5,"nil",1,0,'C');
    // $pdf->Cell(14.4,5,$s_arleftsph,1,0,'C');
    // $pdf->Cell(14.4,5,$s_arleftcyl,1,0,'C');
    // $pdf->Cell(14.4,5,$s_arleftaxis,1,0,'C');
    // $pdf->Cell(14.4,5,"nil",1,0,'C');
    // $pdf->Cell(14.4,5,"nil",1,1,'C');


    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(48,5,'Sub Acceptance',1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(14.4,5,$s_dvrightsph,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvrightcyl,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvrightaxis,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvrightdv,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvrightnv,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftsph,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftcyl,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftaxis,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftdv,1,0,'C');
    $pdf->Cell(14.4,5,$s_dvleftdv,1,1,'C');
    $pdf->ln(5);
    $pdf->SetFont('Arial','B',8);
    $pdf->ln(10);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(96,5,"Signature of Doctor/Optometrist",0,1,'L');

    $pdf->Cell(0,0.1,'',1,1,'C');

    $pdf->Output();
    
    
?>