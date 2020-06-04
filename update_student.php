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


  $aadhar = $_GET['aadhar'];
  $date_of_visit = $_GET['date'];
  $_SESSION['aadhar'] = $aadhar;
  $_SESSION['date_of_visit'] = $date_of_visit;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>MSHE|School Details</title>
    <link rel="stylesheet" href="css/enter_student.css" />
    <script src="js/jquery.js"></script>
    <!-- <script src="js/student_validation.js"></script> -->
  </head>

  <body>
    <script>
      $(document).ready(function() {
          var aadhar = "<?php echo $aadhar; ?>";
          var date = "<?php echo $date_of_visit; ?>";
          mydata ='aadhar=' + aadhar +"&date_of_visit=" + date;
          $.ajax({
        type:"POST",
        url:"set_update_student_values.php",
        data:mydata,
        dataType:"json",
        success:function(x){
          function insert(s){
              var jjsn = new String();
              jjsn = s.toString().replace(/"/g, "");
              return jjsn;
          }
          var jan = insert(JSON.stringify(x.sid));
          $("#idno").val(jan);
          var jsn = insert(JSON.stringify(x.stu_name));
          $("#name").val(jsn);
          var jdob = insert(JSON.stringify(x.date_of_birth));
          $("#dob").val(jdob);
          var jage = insert(JSON.stringify(x.age));
          $("#age").val(jage);
          var jg = insert(JSON.stringify(x.gender)); 
          if(jg=="male"){ 
            $("#mr").attr("checked",true); 
          } 
          else if(jg=="female"){ 
            $("#ms").attr("checked",true); 
          } 
          else{ 
            $("#msr").attr("checked",true); 
          }
          var jfn = insert(JSON.stringify(x.father_name));
          $("#fname").val(jfn);
          var jmn = insert(JSON.stringify(x.mother_name));
          $("#mname").val(jmn);
          var jcn = insert(JSON.stringify(x.contact_no));
          $("#cno").val(jcn);
          var jc = insert(JSON.stringify(x.class));
          $("#class").val(jc);
          var js = insert(JSON.stringify(x.section));
          $("#section").val(js);
          var jm = insert(JSON.stringify(x._medium));
          $("#medium").val(jm);
          var jcr = insert(JSON.stringify(x.complaint_right));
          $("#complaintsright").val(jcr);
          var jcl = insert(JSON.stringify(x.complaint_left));
          $("#complaintsleft").val(jcl);
          var jurd = insert(JSON.stringify(x.unaided_right_dv));
          $("#unaidedrighteyedv").val(jurd);
          var jurn = insert(JSON.stringify(x.unaided_right_nv));
          $("#unaidedrighteyenv").val(jurn);
          var juld = insert(JSON.stringify(x.unaided_left_dv));
          $("#unaidedlefteyedv").val(juld);
          var juln = insert(JSON.stringify(x.unaided_left_nv));
          $("#unaidedlefteyenv").val(juln);
          var jprs = insert(JSON.stringify(x.pg_right_sph));
          $("#oldpgrightsph").val(jprs);
          var jprc = insert(JSON.stringify(x.pg_right_cyl));
          $("#oldpgrightcyl").val(jprc);
          var jpra = insert(JSON.stringify(x.pg_right_axis));
          $("#oldpgrightaxis").val(jpra);
          var jprd = insert(JSON.stringify(x.pg_right_dv));
          $("#oldpgrightdv").val(jprd);
          var jprn = insert(JSON.stringify(x.pg_right_nv));
          $("#oldpgrightnv").val(jprn);
          var jpls = insert(JSON.stringify(x.pg_left_sph));
          $("#oldpgleftsph").val(jpls);
          var jplc = insert(JSON.stringify(x.pg_left_cyl));
          $("#oldpgleftcyl").val(jplc);
          var jpla = insert(JSON.stringify(x.pg_left_axis));
          $("#oldpgleftaxis").val(jpla);
          var jpld = insert(JSON.stringify(x.pg_left_dv));
          $("#oldpgleftdv").val(jpld);
          var jpln = insert(JSON.stringify(x.pg_left_nv));
          $("#oldpgleftnv").val(jpln);
          var jars = insert(JSON.stringify(x.ar_right_sph));
          $("#arrightsph").val(jars);
          var jarc = insert(JSON.stringify(x.ar_right_cyl));
          $("#arrightcyl").val(jarc);
          var jara = insert(JSON.stringify(x.ar_right_axis));
          $("#arrightaxis").val(jara);
          var jals = insert(JSON.stringify(x.ar_left_sph));
          $("#arleftsph").val(jals);
          var jalc = insert(JSON.stringify(x.ar_left_cyl));
          $("#arleftcyl").val(jalc);
          var jala = insert(JSON.stringify(x.ar_left_axis));
          $("#arleftaxis").val(jala);
          var jdrs = insert(JSON.stringify(x.dv_right_sph));
          $("#dvrightsph").val(jdrs);
          var jdrc = insert(JSON.stringify(x.dv_right_cyl));
          $("#dvrightcyl").val(jdrc);
          var jdra = insert(JSON.stringify(x.dv_right_axis));
          $("#dvrightaxis").val(jdra);
          var jdrd = insert(JSON.stringify(x.dv_right_dv));
          $("#dvrightdv").val(jdrd);
          var jdrn = insert(JSON.stringify(x.dv_right_nv));
          $("#dvrightnv").val(jdrn);
          var jdls = insert(JSON.stringify(x.dv_left_sph));
          $("#dvleftsph").val(jdls);
          var jdlc = insert(JSON.stringify(x.dv_left_cyl));
          $("#dvleftcyl").val(jdlc);
          var jdla = insert(JSON.stringify(x.dv_left_axis));
          $("#dvleftaxis").val(jdla);
          var jdld = insert(JSON.stringify(x.dv_left_dv));
          $("#dvleftdv").val(jdld);
          var jdln = insert(JSON.stringify(x.dv_left_nv));
          $("#dvleftnv").val(jdln);
          var jcvr = insert(JSON.stringify(x.color_vision_right));
          $("#colorright").val(jcvr);
          var jcvl = insert(JSON.stringify(x.color_vision_left));
          $("#colorleft").val(jcvl);
          var jer = insert(JSON.stringify(x.eom_right));
          $("#eomright").val(jer);
          var jel = insert(JSON.stringify(x.eom_left));
          $("#eomleft").val(jel);
          var jasr = insert(JSON.stringify(x.anterior_segment_right));
          $("#anteriorright").val(jasr);
          var jasl = insert(JSON.stringify(x.anterior_segment_left));
          $("#anteriorleft").val(jasl);
          var jhr = insert(JSON.stringify(x.hospital_referal));
          if(jhr=="yes"){
            $("#rth").attr('checked',true);
          }
          var jgp = insert(JSON.stringify(x.glasses_presented));
          if(jgp=="yes"){
            $("#gp").attr('checked',true);
          }
          var jao = insert(JSON.stringify(x.advices));
          if(jao!="no"){
              $("#oth").attr('checked',true);
          }
          var ja = insert(JSON.stringify(x.advices));
          $("#advice").val(ja);
          $("#advice").show();
        },
        fail:function(){
          alert("areyy suppu u failed!!");
        }
      });

      $("#textcomplaintright").hide();
        $("#textcomplaintleft").hide();
        var a = $("#complaintsright").val();
        var b = $("#complaintsleft").val();
        if (a == "Others") {
          $("#textcomplaintright").show();
        }
        if (b == "Others") {
          $("#textcomplaintleft").show();
        }
        if ($("#oth").prop("checked")) {
          $("#advice").show();
        } else {
          $("#advice").hide();
          $("#advice").val("");
        }
        $("#complaintsright").change(function() {
          var c = $("#complaintsright").val();
          if (c == "Others") {
            $("#textcomplaintright").show();
          } else {
            $("#textcomplaintright").hide();
            $("#textcomplaintright").val("");
            $("#textcomplaintright").css("background", "rgb(232, 232, 231)");
            $("#spntextcomplaintright").hide();
          }
        });
        $("#complaintsleft").change(function() {
          var d = $("#complaintsleft").val();
          if (d == "Others") {
            $("#textcomplaintleft").show();
          } else {
            $("#textcomplaintleft").hide();
            $("#textcomplaintleft").val("");
            $("#textcomplaintleft").css("background", "rgb(232, 232, 231)");
            $("#spntextcomplaintleft").hide();
          }
        });

        $("#oth").click(function() {
          if ($("#oth").prop("checked")) {
            $("#advice").show();
          } else {
            $("#advice").hide();
            $("#advice").val("");
            $("#advice").css("background", "rgb(232, 232, 231)");
            $("#spnadvice").hide();
          }
        });

        $("#update-student-form").on('submit',function(e){
          e.preventDefault();
            $.ajax({
              url: $("#update-student-form").attr("action"),
              type: "POST",
              data: $("#update-student-form").serialize(),
              success: function(data) {
                if(data == 1){
                  $("update-student-form").trigger("reset");
                  alert("Data Updated Successfully");
                  window.location = "view_student.php";
                }
                else{
                  alert("Error in updating data");
                }
              }
            });
        });


        $(".logout").click(function(){
        var name = "<?php print_r($_SESSION['un']) ?>";
        var a = confirm(name + " Are you sure to logout ?");
        if(a)
        {
          window.location = "logout.php";
        }
      });



      $('.cng-pwd-btn').click(function(){
        var pwd = $("#cng-pwd").val();
        var repwd = $("#re-cng-pwd").val();
        if(pwd===repwd && pwd.length>=3){
          $.ajax({
            type:"POST",
            url:"cng_pwd.php",
            data:{
              pwd:pwd,
              repwd:repwd,
            },
            success:function(x){
              if(x==1){
                alert("Password Changed Successfully");
                setTimeout(() => { document.location.reload(true); }, 100);
              }
              else{
                $('.cng-pwd-error').html("Error occured.");
              }
            }

          });
        }
        else{
          $('.cng-pwd-error').html("password didnot match.<br>Minimum 3 characters required.");
        }
        
      });
        




      
      });
    </script>
    <header>
      <nav>
        <div class="nav-name">
          <h4>MSHE</h4>
        </div>
        <ul class="nav-links">
          <li class="home"><a href="<?php $_SESSION['user_type']== 'admin'? print_r('admin_home.php'): print_r('home.php'); ?>">Home</a></li>
          <li class="view-details"><a href="view_school.php">View Details</a></li>
          <li class="enter-details"><a href="enter_school.php">Enter details</a></li>
          <li class="change-password"><a href="#">Change Password</a></li>
          <li class="logout"><a href="#">Log out</a></li>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
    </header>
    <main>
      <section>
        <div class="main-details">
          <div class="heading">
            <h4>Update Student Details</h4>
          </div>
          <div class="student-form">
            <form action="update_student_details.php" method="POST" id="update-student-form">
              <label for="idno">ID No.</label>
              <input type="text" name="idno" id="idno" placeholder="ID No." />
              <span class="error" id="spnidno"></span>
              <label for="adno">Aadhar No. / Unique Code</label>
              <input
                type="text"
                name="adno"
                id="adno"
                placeholder="Aadhar No"
                value="<?php echo $aadhar;?>" 
                readonly
              />
              <span class="error" id="spnadno"></span>
              <label for="name">Name</label>
              <input type="text" name="name" id="name" placeholder="Name" />
              <span class="error" id="spnname"></span>
              <label for="dob">Date of Birth</label>
              <input type="date" name="dob" id="dob" />
              <span class="error" id="spndob"></span>
              <label for="age">Age</label>
              <input type="text" name="age" id="age" placeholder="Age" />
              <span class="error" id="spnage"></span>
              <label for="gender">Gender</label>
              <div class="gender">
                <label
                  ><input
                    type="radio"
                    name="Gender"
                    id="mr"
                    value="male"
                    checked
                  />
                  Male</label
                >
                <label
                  ><input type="radio" name="Gender" id="ms" value="female" />
                  Female</label
                >
                <label
                  ><input type="radio" name="Gender" id="msr" value="other" />
                  Other</label
                >
              </div>
              <label for="fname">Father Name</label>
              <input
                type="text"
                name="fname"
                id="fname"
                placeholder="Father's Name"
              />
              <span class="error" id="spnfname"></span>
              <label for="mname">Mother Name</label>
              <input
                type="text"
                name="mname"
                id="mname"
                placeholder="Mother's Name"
              />
              <span class="error" id="spnmname"></span>
              <label for="cno">Contact No.</label>
              <input
                type="text"
                name="cno"
                id="cno"
                placeholder="Contact Number"
              /><br />
              <span class="error" id="spncno"></span>
              <label for="class">Class</label>
              <select name="class" id="class" required>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>Inter 1<sup>st</sup> year(MPC)</option>
                <option>Inter 2<sup>nd</sup> year(MPC)</option>
                <option>Inter 1<sup>st</sup> year(BiPC)</option>
                <option>Inter 2<sup>nd</sup> year(BiPC)</option>
              </select>
              <label for="section">Section</label>
              <select name="section" id="section">
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
                <option>E</option>
              </select>
              <label for="medium">Medium</label>
              <select name="medium" id="medium">
                <option>English</option>
                <option>Telugu</option>
                <option>Others</option>
              </select>
              <fieldset class="history">
                <legend align="center">History / Complaints</legend>
                <label for="complaintsright">Right Eye</label>
                <select name="complaintsright" id="complaintsright">
                  <option>No complaints</option>
                  <option>Blurring of vision</option>
                  <option>Blurring of vision with pg</option>
                  <option>Irritation</option>
                  <option>White spot in Eye</option>
                  <option>Squinting</option>
                  <option>Headache</option>
                  <option>Cornea opacity</option>
                  <option>Ptosis</option>
                  <option>Total catract</option>
                  <option>Amblyopia</option>
                  <option>Scar</option>
                  <option>Pterygium</option>
                  <option>NAG(not accepting glass)</option>
                  <option>RAPD</option>
                  <option>Micro cornea</option>
                  <option>Foreign body</option>
                  <option>Iris coloboma</option>
                  <option>Night blindness</option>
                  <option>Poor vision</option>
                  <option>White layer</option>
                  <option>Using glasses</option>
                  <option>Redness</option>
                  <option>Itching</option>
                  <option>Allergy</option>
                  <option>Complaints</option>
                  <option>Others</option>
                </select>
                <input
                  type="text"
                  id="textcomplaintright"
                  name="textcomplaintright"
                  placeholder="complaints"
                />
                <span class="error" id="spntextcomplaintright"></span>
                <label for="complaintsleft">Left Eye</label>
                <select name="complaintsleft" id="complaintsleft">
                  <option>No complaints</option>
                  <option>Blurring of vision</option>
                  <option>Blurring of vision with pg</option>
                  <option>Irritation</option>
                  <option>White spot in Eye</option>
                  <option>Squinting</option>
                  <option>Headache</option>
                  <option>Cornea opacity</option>
                  <option>Ptosis</option>
                  <option>Total catract</option>
                  <option>Amblyopia</option>
                  <option>Scar</option>
                  <option>Pterygium</option>
                  <option>NAG(not accepting glass)</option>
                  <option>RAPD</option>
                  <option>Micro cornea</option>
                  <option>Foreign body</option>
                  <option>Iris coloboma</option>
                  <option>Night blindness</option>
                  <option>Poor vision</option>
                  <option>White layer</option>
                  <option>Using glasses</option>
                  <option>Redness</option>
                  <option>Itching</option>
                  <option>Allergy</option>
                  <option>Complaints</option>
                  <option>Others</option>
                </select>
                <input
                  type="text"
                  id="textcomplaintleft"
                  name="textcomplaintleft"
                  placeholder="complaints"
                />
                <span class="error" id="spntextcomplaintleft"></span>
              </fieldset>
              <fieldset class="unaided">
                <legend align="center">Unaided</legend>
                <fieldset class="right">
                  <legend align="center">Right Eye</legend>
                  <label for="unaidedrighteyedv">dv</label>
                  <select name="unaidedrighteyedv" id="unaidedrighteyedv">
                    <option>6/6</option>
                    <option>6/9</option>
                    <option>6/12</option>
                    <option>6/18</option>
                    <option>6/24</option>
                    <option>6/36</option>
                    <option>6/60</option>
                    <option>3/60</option>
                    <option>2/60</option>
                    <option>1/60</option>
                    <option>cfcf</option>
                    <option>hm+</option>
                    <option>PL+,accurate PR</option>
                    <option>PL+,in-accurate PR</option>
                    <option>nopl</option>
                  </select>
                  <label for="unaidedrighteyenv">nv</label>
                  <select name="unaidedrighteyenv" id="unaidedrighteyenv">
                    <option>N6</option>
                    <option>N8</option>
                    <option>N10</option>
                    <option>N12</option>
                    <option>N18</option>
                    <option>N36</option>
                  </select>
                </fieldset>
                <fieldset class="left">
                  <legend align="center">Left Eye</legend>
                  <label for="unaidedlefteyedv">dv</label>
                  <select
                    name="unaidedlefteyedv"
                    id="unaidedlefteyedv"
                    required
                  >
                    <option>6/6</option>
                    <option>6/9</option>
                    <option>6/12</option>
                    <option>6/18</option>
                    <option>6/24</option>
                    <option>6/36</option>
                    <option>6/60</option>
                    <option>3/60</option>
                    <option>2/60</option>
                    <option>1/60</option>
                    <option>cfcf</option>
                    <option>hm+</option>
                    <option>PL+,accurate PR</option>
                    <option>PL+,in-accurate PR</option>
                    <option>nopl</option>
                  </select>
                  <label for="unaidedlefteyenv">nv</label>
                  <select name="unaidedlefteyenv" id="unaidedlefteyenv">
                    <option>N6</option>
                    <option>N8</option>
                    <option>N10</option>
                    <option>N12</option>
                    <option>N18</option>
                    <option>N36</option>
                  </select>
                </fieldset>
              </fieldset>
              <fieldset class="oldpg">
                <legend align="center">Vision with PG (old pg)</legend>
                <fieldset class="right">
                  <legend align="center">Right Eye</legend>
                  <label for="oldpgrightsph">sph</label>
                  <select name="oldpgrightsph" id="oldpgrightsph">
                    <option>0.00</option>
                    <option>-18.00</option>
                    <option>-17.75</option>
                    <option>-17.50</option>
                    <option>-17.25</option>
                    <option>-17.00</option>
                    <option>-16.75</option>
                    <option>-16.50</option>
                    <option>-16.25</option>
                    <option>-16.00</option>
                    <option>-15.75</option>
                    <option>-15.50</option>
                    <option>-15.25</option>
                    <option>-15.00</option>
                    <option>-14.75</option>
                    <option>-14.50</option>
                    <option>-14.25</option>
                    <option>-14.00</option>
                    <option>-13.75</option>
                    <option>-13.50</option>
                    <option>-13.25</option>
                    <option>-13.00</option>
                    <option>-12.75</option>
                    <option>-12.50</option>
                    <option>-12.25</option>
                    <option>-12.00</option>
                    <option>-11.75</option>
                    <option>-11.50</option>
                    <option>-11.25</option>
                    <option>-11.00</option>
                    <option>-10.75</option>
                    <option>-10.25</option>
                    <option>-10.00</option>
                    <option>-9.75</option>
                    <option>-9.50</option>
                    <option>-9.25</option>
                    <option>-9.00</option>
                    <option>-8.75</option>
                    <option>-8.50</option>
                    <option>-8.25</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>18.00</option>
                    <option>17.75</option>
                    <option>17.50</option>
                    <option>17.25</option>
                    <option>17.00</option>
                    <option>16.75</option>
                    <option>16.50</option>
                    <option>16.25</option>
                    <option>16.00</option>
                    <option>15.75</option>
                    <option>15.50</option>
                    <option>15.25</option>
                    <option>15.00</option>
                    <option>14.75</option>
                    <option>14.50</option>
                    <option>14.25</option>
                    <option>14.00</option>
                    <option>13.75</option>
                    <option>13.50</option>
                    <option>13.25</option>
                    <option>13.00</option>
                    <option>12.75</option>
                    <option>12.50</option>
                    <option>12.25</option>
                    <option>12.00</option>
                    <option>11.75</option>
                    <option>11.50</option>
                    <option>11.25</option>
                    <option>11.00</option>
                    <option>10.75</option>
                    <option>10.25</option>
                    <option>10.00</option>
                    <option>9.75</option>
                    <option>9.50</option>
                    <option>9.25</option>
                    <option>9.00</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="oldpgrightcyl">cyl</label>
                  <select name="oldpgrightcyl" id="oldpgrightcyl">
                    <option>0.00</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="oldpgrightaxis">axis</label>
                  <input
                    type="text"
                    name="oldpgrightaxis"
                    id="oldpgrightaxis"
                    value="0"
                  />
                  <span class="error" id="spnoldpgrightaxis"></span>
                  <label for="oldpgrightdv">dv</label>
                  <select name="oldpgrightdv" id="oldpgrightdv">
                    <option>---</option>
                    <option>6/6</option>
                    <option>6/9</option>
                    <option>6/12</option>
                    <option>6/18</option>
                    <option>6/24</option>
                    <option>6/36</option>
                    <option>6/60</option>
                    <option>3/60</option>
                    <option>2/60</option>
                    <option>1/60</option>
                  </select>
                  <label for="oldpgrightnv">nv</label>
                  <select name="oldpgrightnv" id="oldpgrightnv">
                    <option>---</option>
                    <option>N6</option>
                    <option>N8</option>
                    <option>N10</option>
                    <option>N12</option>
                    <option>N18</option>
                    <option>N36</option>
                  </select>
                </fieldset>
                <fieldset class="left">
                  <legend align="center">Left Eye</legend>
                  <label for="oldpgleftsph">sph</label>
                  <select name="oldpgleftsph" id="oldpgleftsph">
                    <option>0.00</option>
                    <option>-18.00</option>
                    <option>-17.75</option>
                    <option>-17.50</option>
                    <option>-17.25</option>
                    <option>-17.00</option>
                    <option>-16.75</option>
                    <option>-16.50</option>
                    <option>-16.25</option>
                    <option>-16.00</option>
                    <option>-15.75</option>
                    <option>-15.50</option>
                    <option>-15.25</option>
                    <option>-15.00</option>
                    <option>-14.75</option>
                    <option>-14.50</option>
                    <option>-14.25</option>
                    <option>-14.00</option>
                    <option>-13.75</option>
                    <option>-13.50</option>
                    <option>-13.25</option>
                    <option>-13.00</option>
                    <option>-12.75</option>
                    <option>-12.50</option>
                    <option>-12.25</option>
                    <option>-12.00</option>
                    <option>-11.75</option>
                    <option>-11.50</option>
                    <option>-11.25</option>
                    <option>-11.00</option>
                    <option>-10.75</option>
                    <option>-10.25</option>
                    <option>-10.00</option>
                    <option>-9.75</option>
                    <option>-9.50</option>
                    <option>-9.25</option>
                    <option>-9.00</option>
                    <option>-8.75</option>
                    <option>-8.50</option>
                    <option>-8.25</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>18.00</option>
                    <option>17.75</option>
                    <option>17.50</option>
                    <option>17.25</option>
                    <option>17.00</option>
                    <option>16.75</option>
                    <option>16.50</option>
                    <option>16.25</option>
                    <option>16.00</option>
                    <option>15.75</option>
                    <option>15.50</option>
                    <option>15.25</option>
                    <option>15.00</option>
                    <option>14.75</option>
                    <option>14.50</option>
                    <option>14.25</option>
                    <option>14.00</option>
                    <option>13.75</option>
                    <option>13.50</option>
                    <option>13.25</option>
                    <option>13.00</option>
                    <option>12.75</option>
                    <option>12.50</option>
                    <option>12.25</option>
                    <option>12.00</option>
                    <option>11.75</option>
                    <option>11.50</option>
                    <option>11.25</option>
                    <option>11.00</option>
                    <option>10.75</option>
                    <option>10.25</option>
                    <option>10.00</option>
                    <option>9.75</option>
                    <option>9.50</option>
                    <option>9.25</option>
                    <option>9.00</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="oldpgleftcyl">cyl</label>
                  <select name="oldpgleftcyl" id="oldpgleftcyl">
                    <option>0.00</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="oldpgleftaxis">axis</label>
                  <input
                    type="text"
                    name="oldpgleftaxis"
                    id="oldpgleftaxis"
                    value="0"
                  />
                  <span class="error" id="spnoldpgleftaxis"></span>
                  <label for="oldpgleftdv">dv</label>
                  <select name="oldpgleftdv" id="oldpgleftdv">
                    <option>---</option>
                    <option>6/6</option>
                    <option>6/9</option>
                    <option>6/12</option>
                    <option>6/18</option>
                    <option>6/24</option>
                    <option>6/36</option>
                    <option>6/60</option>
                    <option>3/60</option>
                    <option>2/60</option>
                    <option>1/60</option>
                  </select>
                  <label for="oldpgleftnv">nv</label>
                  <select name="oldpgleftnv" id="oldpgleftnv">
                    <option>---</option>
                    <option>N6</option>
                    <option>N8</option>
                    <option>N10</option>
                    <option>N12</option>
                    <option>N18</option>
                    <option>N36</option>
                  </select>
                </fieldset>
              </fieldset>
              <fieldset class="auto-refraction">
                <legend align="center">Auto Refraction</legend>
                <fieldset class="right">
                  <legend align="center">Right Eye</legend>
                  <label for="arrightsph">sph</label>
                  <select name="arrightsph" id="arrightsph">
                    <option>0.00</option>
                    <option>-18.00</option>
                    <option>-17.75</option>
                    <option>-17.50</option>
                    <option>-17.25</option>
                    <option>-17.00</option>
                    <option>-16.75</option>
                    <option>-16.50</option>
                    <option>-16.25</option>
                    <option>-16.00</option>
                    <option>-15.75</option>
                    <option>-15.50</option>
                    <option>-15.25</option>
                    <option>-15.00</option>
                    <option>-14.75</option>
                    <option>-14.50</option>
                    <option>-14.25</option>
                    <option>-14.00</option>
                    <option>-13.75</option>
                    <option>-13.50</option>
                    <option>-13.25</option>
                    <option>-13.00</option>
                    <option>-12.75</option>
                    <option>-12.50</option>
                    <option>-12.25</option>
                    <option>-12.00</option>
                    <option>-11.75</option>
                    <option>-11.50</option>
                    <option>-11.25</option>
                    <option>-11.00</option>
                    <option>-10.75</option>
                    <option>-10.25</option>
                    <option>-10.00</option>
                    <option>-9.75</option>
                    <option>-9.50</option>
                    <option>-9.25</option>
                    <option>-9.00</option>
                    <option>-8.75</option>
                    <option>-8.50</option>
                    <option>-8.25</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>18.00</option>
                    <option>17.75</option>
                    <option>17.50</option>
                    <option>17.25</option>
                    <option>17.00</option>
                    <option>16.75</option>
                    <option>16.50</option>
                    <option>16.25</option>
                    <option>16.00</option>
                    <option>15.75</option>
                    <option>15.50</option>
                    <option>15.25</option>
                    <option>15.00</option>
                    <option>14.75</option>
                    <option>14.50</option>
                    <option>14.25</option>
                    <option>14.00</option>
                    <option>13.75</option>
                    <option>13.50</option>
                    <option>13.25</option>
                    <option>13.00</option>
                    <option>12.75</option>
                    <option>12.50</option>
                    <option>12.25</option>
                    <option>12.00</option>
                    <option>11.75</option>
                    <option>11.50</option>
                    <option>11.25</option>
                    <option>11.00</option>
                    <option>10.75</option>
                    <option>10.25</option>
                    <option>10.00</option>
                    <option>9.75</option>
                    <option>9.50</option>
                    <option>9.25</option>
                    <option>9.00</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="arrightcyl">cyl</label>
                  <select name="arrightcyl" id="arrightcyl">
                    <option>0.00</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="arrightaxis">axis</label>
                  <input
                    type="text"
                    name="arrightaxis"
                    id="arrightaxis"
                    value="0"
                  />
                  <span class="error" id="spnarrightaxis"></span>
                </fieldset>
                <fieldset class="left">
                  <legend align="center">Left Eye</legend>
                  <label for="arleftsph">sph</label>
                  <select name="arleftsph" id="arleftsph">
                    <option>0.00</option>
                    <option>-18.00</option>
                    <option>-17.75</option>
                    <option>-17.50</option>
                    <option>-17.25</option>
                    <option>-17.00</option>
                    <option>-16.75</option>
                    <option>-16.50</option>
                    <option>-16.25</option>
                    <option>-16.00</option>
                    <option>-15.75</option>
                    <option>-15.50</option>
                    <option>-15.25</option>
                    <option>-15.00</option>
                    <option>-14.75</option>
                    <option>-14.50</option>
                    <option>-14.25</option>
                    <option>-14.00</option>
                    <option>-13.75</option>
                    <option>-13.50</option>
                    <option>-13.25</option>
                    <option>-13.00</option>
                    <option>-12.75</option>
                    <option>-12.50</option>
                    <option>-12.25</option>
                    <option>-12.00</option>
                    <option>-11.75</option>
                    <option>-11.50</option>
                    <option>-11.25</option>
                    <option>-11.00</option>
                    <option>-10.75</option>
                    <option>-10.25</option>
                    <option>-10.00</option>
                    <option>-9.75</option>
                    <option>-9.50</option>
                    <option>-9.25</option>
                    <option>-9.00</option>
                    <option>-8.75</option>
                    <option>-8.50</option>
                    <option>-8.25</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>18.00</option>
                    <option>17.75</option>
                    <option>17.50</option>
                    <option>17.25</option>
                    <option>17.00</option>
                    <option>16.75</option>
                    <option>16.50</option>
                    <option>16.25</option>
                    <option>16.00</option>
                    <option>15.75</option>
                    <option>15.50</option>
                    <option>15.25</option>
                    <option>15.00</option>
                    <option>14.75</option>
                    <option>14.50</option>
                    <option>14.25</option>
                    <option>14.00</option>
                    <option>13.75</option>
                    <option>13.50</option>
                    <option>13.25</option>
                    <option>13.00</option>
                    <option>12.75</option>
                    <option>12.50</option>
                    <option>12.25</option>
                    <option>12.00</option>
                    <option>11.75</option>
                    <option>11.50</option>
                    <option>11.25</option>
                    <option>11.00</option>
                    <option>10.75</option>
                    <option>10.25</option>
                    <option>10.00</option>
                    <option>9.75</option>
                    <option>9.50</option>
                    <option>9.25</option>
                    <option>9.00</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="arleftcyl">cyl</label>
                  <select name="arleftcyl" id="arleftcyl">
                    <option>0.00</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="arleftaxis">axis</label>
                  <input
                    type="text"
                    name="arleftaxis"
                    id="arleftaxis"
                    value="0"
                  />
                  <span class="error" id="spnarleftaxis"></span>
                </fieldset>
              </fieldset>
              <fieldset class="sub-acceptance">
                <legend align="center">Sub Acceptance</legend>
                <fieldset class="right">
                  <legend align="center">Right Eye</legend>
                  <label for="dvrightsph">sph</label>
                  <select name="dvrightsph" id="dvrightsph">
                    <option>0.00</option>
                    <option>-18.00</option>
                    <option>-17.75</option>
                    <option>-17.50</option>
                    <option>-17.25</option>
                    <option>-17.00</option>
                    <option>-16.75</option>
                    <option>-16.50</option>
                    <option>-16.25</option>
                    <option>-16.00</option>
                    <option>-15.75</option>
                    <option>-15.50</option>
                    <option>-15.25</option>
                    <option>-15.00</option>
                    <option>-14.75</option>
                    <option>-14.50</option>
                    <option>-14.25</option>
                    <option>-14.00</option>
                    <option>-13.75</option>
                    <option>-13.50</option>
                    <option>-13.25</option>
                    <option>-13.00</option>
                    <option>-12.75</option>
                    <option>-12.50</option>
                    <option>-12.25</option>
                    <option>-12.00</option>
                    <option>-11.75</option>
                    <option>-11.50</option>
                    <option>-11.25</option>
                    <option>-11.00</option>
                    <option>-10.75</option>
                    <option>-10.25</option>
                    <option>-10.00</option>
                    <option>-9.75</option>
                    <option>-9.50</option>
                    <option>-9.25</option>
                    <option>-9.00</option>
                    <option>-8.75</option>
                    <option>-8.50</option>
                    <option>-8.25</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>18.00</option>
                    <option>17.75</option>
                    <option>17.50</option>
                    <option>17.25</option>
                    <option>17.00</option>
                    <option>16.75</option>
                    <option>16.50</option>
                    <option>16.25</option>
                    <option>16.00</option>
                    <option>15.75</option>
                    <option>15.50</option>
                    <option>15.25</option>
                    <option>15.00</option>
                    <option>14.75</option>
                    <option>14.50</option>
                    <option>14.25</option>
                    <option>14.00</option>
                    <option>13.75</option>
                    <option>13.50</option>
                    <option>13.25</option>
                    <option>13.00</option>
                    <option>12.75</option>
                    <option>12.50</option>
                    <option>12.25</option>
                    <option>12.00</option>
                    <option>11.75</option>
                    <option>11.50</option>
                    <option>11.25</option>
                    <option>11.00</option>
                    <option>10.75</option>
                    <option>10.25</option>
                    <option>10.00</option>
                    <option>9.75</option>
                    <option>9.50</option>
                    <option>9.25</option>
                    <option>9.00</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="dvrightcyl">cyl</label>
                  <select name="dvrightcyl" id="dvrightcyl">
                    <option>0.00</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="dvrightaxis">axis</label>
                  <input
                    type="text"
                    name="dvrightaxis"
                    id="dvrightaxis"
                    value="0"
                  />
                  <span class="error" id="spndvrightaxis"></span>
                  <label for="dvrightdv">dv</label>
                  <select name="dvrightdv" id="dvrightdv">
                    <option>---</option>
                    <option>6/6</option>
                    <option>6/9</option>
                    <option>6/12</option>
                    <option>6/18</option>
                    <option>6/24</option>
                    <option>6/36</option>
                    <option>6/60</option>
                    <option>3/60</option>
                    <option>2/60</option>
                    <option>1/60</option>
                  </select>
                  <label for="dvrightnv">nv</label>
                  <select name="dvrightnv" id="dvrightnv">
                    <option>---</option>
                    <option>N6</option>
                    <option>N8</option>
                    <option>N10</option>
                    <option>N12</option>
                    <option>N18</option>
                    <option>N36</option>
                  </select>
                </fieldset>
                <fieldset class="left">
                  <legend align="center">Left Eye</legend>
                  <label for="dvleftsph">sph</label>
                  <select name="dvleftsph" id="dvleftsph">
                    <option>0.00</option>
                    <option>-18.00</option>
                    <option>-17.75</option>
                    <option>-17.50</option>
                    <option>-17.25</option>
                    <option>-17.00</option>
                    <option>-16.75</option>
                    <option>-16.50</option>
                    <option>-16.25</option>
                    <option>-16.00</option>
                    <option>-15.75</option>
                    <option>-15.50</option>
                    <option>-15.25</option>
                    <option>-15.00</option>
                    <option>-14.75</option>
                    <option>-14.50</option>
                    <option>-14.25</option>
                    <option>-14.00</option>
                    <option>-13.75</option>
                    <option>-13.50</option>
                    <option>-13.25</option>
                    <option>-13.00</option>
                    <option>-12.75</option>
                    <option>-12.50</option>
                    <option>-12.25</option>
                    <option>-12.00</option>
                    <option>-11.75</option>
                    <option>-11.50</option>
                    <option>-11.25</option>
                    <option>-11.00</option>
                    <option>-10.75</option>
                    <option>-10.25</option>
                    <option>-10.00</option>
                    <option>-9.75</option>
                    <option>-9.50</option>
                    <option>-9.25</option>
                    <option>-9.00</option>
                    <option>-8.75</option>
                    <option>-8.50</option>
                    <option>-8.25</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>18.00</option>
                    <option>17.75</option>
                    <option>17.50</option>
                    <option>17.25</option>
                    <option>17.00</option>
                    <option>16.75</option>
                    <option>16.50</option>
                    <option>16.25</option>
                    <option>16.00</option>
                    <option>15.75</option>
                    <option>15.50</option>
                    <option>15.25</option>
                    <option>15.00</option>
                    <option>14.75</option>
                    <option>14.50</option>
                    <option>14.25</option>
                    <option>14.00</option>
                    <option>13.75</option>
                    <option>13.50</option>
                    <option>13.25</option>
                    <option>13.00</option>
                    <option>12.75</option>
                    <option>12.50</option>
                    <option>12.25</option>
                    <option>12.00</option>
                    <option>11.75</option>
                    <option>11.50</option>
                    <option>11.25</option>
                    <option>11.00</option>
                    <option>10.75</option>
                    <option>10.25</option>
                    <option>10.00</option>
                    <option>9.75</option>
                    <option>9.50</option>
                    <option>9.25</option>
                    <option>9.00</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="dvleftcyl">cyl</label>
                  <select name="dvleftcyl" id="dvleftcyl">
                    <option>0.00</option>
                    <option>-8.00</option>
                    <option>-7.75</option>
                    <option>-7.50</option>
                    <option>-7.25</option>
                    <option>-7.00</option>
                    <option>-6.75</option>
                    <option>-6.50</option>
                    <option>-6.25</option>
                    <option>-6.00</option>
                    <option>-5.75</option>
                    <option>-5.50</option>
                    <option>-5.25</option>
                    <option>-5.00</option>
                    <option>-4.75</option>
                    <option>-4.50</option>
                    <option>-4.25</option>
                    <option>-4.00</option>
                    <option>-3.75</option>
                    <option>-3.50</option>
                    <option>-3.25</option>
                    <option>-3.00</option>
                    <option>-2.75</option>
                    <option>-2.50</option>
                    <option>-2.25</option>
                    <option>-2.00</option>
                    <option>-1.75</option>
                    <option>-1.50</option>
                    <option>-1.25</option>
                    <option>-1.00</option>
                    <option>-0.75</option>
                    <option>-0.50</option>
                    <option>-0.25</option>
                    <option>8.75</option>
                    <option>8.50</option>
                    <option>8.25</option>
                    <option>8.00</option>
                    <option>7.75</option>
                    <option>7.50</option>
                    <option>7.25</option>
                    <option>7.00</option>
                    <option>6.75</option>
                    <option>6.50</option>
                    <option>6.25</option>
                    <option>6.00</option>
                    <option>5.75</option>
                    <option>5.50</option>
                    <option>5.25</option>
                    <option>5.00</option>
                    <option>4.75</option>
                    <option>4.50</option>
                    <option>4.25</option>
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>1.75</option>
                    <option>1.50</option>
                    <option>1.25</option>
                    <option>1.00</option>
                    <option>0.75</option>
                    <option>0.50</option>
                    <option>0.25</option>
                  </select>
                  <label for="dvleftaxis">axis</label>
                  <input
                    type="text"
                    name="dvleftaxis"
                    id="dvleftaxis"
                    value="0"
                  />
                  <span class="error" id="spndvleftaxis"></span>
                  <label for="dvleftdv">dv</label>
                  <select name="dvleftdv" id="dvleftdv">
                    <option>---</option>
                    <option>6/6</option>
                    <option>6/9</option>
                    <option>6/12</option>
                    <option>6/18</option>
                    <option>6/24</option>
                    <option>6/36</option>
                    <option>6/60</option>
                    <option>3/60</option>
                    <option>2/60</option>
                    <option>1/60</option>
                  </select>
                  <label for="dvleftnv">nv</label>
                  <select name="dvleftnv" id="dvleftnv" required>
                    <option>---</option>
                    <option>N6</option>
                    <option>N8</option>
                    <option>N10</option>
                    <option>N12</option>
                    <option>N18</option>
                    <option>N36</option>
                  </select>
                </fieldset>
              </fieldset>
              <fieldset class="color-vision">
                <legend align="center">Color Vision</legend>
                <label for="colorright">Right Eye</label>
                <select name="colorright" id="colorright">
                  <option>Normal</option>
                  <option>Abnormal</option>
                </select>
                <label for="colorleft">Left Eye</label>
                <select name="colorleft" id="colorleft">
                  <option>Normal</option>
                  <option>Abnormal</option>
                </select>
              </fieldset>
              <fieldset class="eom">
                <legend align="center">EOM</legend>
                <label for="eomright">Right Eye</label>
                <select name="eomright" id="eomright">
                  <option>Normal</option>
                  <option>Lxt</option>
                  <option>Axt</option>
                  <option>Restriceted Movement</option>
                  <option>Restriceted Abduction- Lr</option>
                  <option>Nystagmus</option>
                  <option>Rxt</option>
                  <option>Hypertropia</option>
                  <option>Full</option>
                  <option>Aet</option>
                  <option>Restriceted Movement Adduction-Mr</option>
                  <option>Elevation-Sr</option>
                  <option>Depression-lr</option>
                  <option>Intorsion-So</option>
                  <option>Extorsion-lo</option>
                  <option>Let</option>
                  <option>Ret</option>
                  <option>Acd</option>
                  <option>Intermittend exo</option>
                  <option>PSEUDO STRABISMOUS </option>
                </select>
                <label for="eomleft">Right Eye</label>
                <select name="eomleft" id="eomleft">
                  <option>Normal</option>
                  <option>Lxt</option>
                  <option>Axt</option>
                  <option>Restriceted Movement</option>
                  <option>Restriceted Abduction- Lr</option>
                  <option>Nystagmus</option>
                  <option>Rxt</option>
                  <option>Hypertropia</option>
                  <option>Full</option>
                  <option>Aet</option>
                  <option>Restriceted Movement Adduction-Mr</option>
                  <option>Elevation-Sr</option>
                  <option>Depression-lr</option>
                  <option>Intorsion-So</option>
                  <option>Extorsion-lo</option>
                  <option>Let</option>
                  <option>Ret</option>
                  <option>Acd</option>
                  <option>Intermittend exo</option>
                  <option>PSEUDO STRABISMOUS </option>
                </select>
              </fieldset>
              <fieldset class="anterior-segment">
                <legend align="center">Anterior Segment</legend>
                <label for="anteriorright">Right Eye</label>
                <select name="anteriorright" id="anteriorright">
                  <option>Normal</option>
                  <option>Abnormal</option>
                </select>
                <label for="anteriorleft">Right Eye</label>
                <select name="anteriorleft" id="anteriorleft">
                  <option>Normal</option>
                  <option>Abnormal</option>
                </select>
              </fieldset>
              <fieldset class="advice-and-remarks">
                <legend align="center">Advices and Remarks</legend>
                <label>
                  <input
                    type="checkbox"
                    name="rth"
                    id="rth"
                    value="rth"
                  />Refer to Base Hospital</label>
                  <label>
                    <input type="checkbox" name="gp" id="gp" value="gp" />Glasses Presented</label>
                  <label>
                    <input
                      type="checkbox"
                      name="oth"
                      id="oth"
                      value="oth"
                    />Others
                  </label>  
                <input
                  type="text"
                  name="advice"
                  id="advice"
                  placeholder="Advice"
                />
                <span class="error" id="spnadvice"></span>
              </fieldset>
              <input
                class="btn btn-primary"
                type="submit"
                value="Submit"
                id="subbtn"
              />
            </form>
          </div>
        </div>
        <div class="popup-cng-pwd">
          <div class="popup-content-cng-pwd">
            <h4 class="cng-pwd-close">+</h4>
            <h4>Change Password</h4>
            <p>Hello <?php print_r($_SESSION['un']); ?>!!</p>
            <input type="password" name="cng-pwd" class="cng-pwd" id="cng-pwd" placeholder="Password" />
            <input type="password" name="re-cng-pwd" class="re-cng-pwd" id="re-cng-pwd" placeholder="Re-type Password" />
            <span class="cng-pwd-error" id="cng-pwd-error"></span>
            <button class="cng-pwd-btn">Change</button>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <div class="foot">
        <h4>Designed and Developed By MVGRCE</h4>
      </div>
    </footer>
    <script src="js/app.js"></script>
    <script src="js/cng_pwd.js"></script>
  </body>
</html>
