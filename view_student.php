<?php


session_start();
if($_SESSION["un"]==true && $_SESSION["user_type"]==true){
    $_SESSION["un"]=$_SESSION["un"];
    $_SESSION["user_type"] = $_SESSION["user_type"];
}
else{
    echo "<script>window.location='index.html'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>MSHE|VIEW SCHOOL</title>
    <link rel="stylesheet" href="css/view_student.css" />
    <script src="js/jquery.js"></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="DataTables/datatables.min.css"
    />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
  </head>

  <body>
    <script>
      $(document).ready(function() {
        $("#student-table").DataTable({
          pagingType: "simple_numbers",
          responsive: true
        });

        $('.view-school').click(function(){
          window.location = "view_school.php";
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


      $(document).on('click','.stu-delete-btn',function(e){
        var aadhar = $(this).data('aadhar');
        var date = $(this).data('date');
        if(confirm("Are you sure ? ")){
        $.ajax({
            type: "POST",
            url: "delete_student.php",
            data: {
              aadhar:aadhar,
              date:date
              },
            success: function(x) {
              if (x == "1") {
                alert("Deleted Successfully");
                setTimeout(() => { document.location.reload(true); }, 100);
              } else {
                alert("Error in Deleting.");
              }
              // alert(x);
              
            }
          });
      }

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
          <div class="view_school_btns">
            <button class="view-school">View Schools</button>
            <button class="view-student"  disabled>View Students</button>
          </div>
          <div class="view-student-table">
          <table
            id="student-table"
            class="cell-border compact stripe student-table"
          >
            <caption>Student Details</caption>
            <thead>
              <tr>
                <th rowspan="3">School Code</th>
                <th rowspan="3">Date</th>
                <th rowspan="3">School Type</th>
                <th rowspan="3">Student Id</th>
                <th rowspan="3">Aadhar No</th>
                <th rowspan="3">Name</th>
                <th rowspan="3">Age</th>
                <th rowspan="3">Gender</th>
                <th rowspan="3">Father name</th>
                <th rowspan="3">Mother name</th>
                <th rowspan="3">Contact</th>
                <th rowspan="3">Class</th>
                <th rowspan="3">Section</th>
                <th rowspan="3">Medium</th>
                <th colspan="2">History</th>
                <th colspan="4">Unaided</th>
                <th colspan="10">Vision with PG(old pg)</th>
                <th colspan="6">Auto Reflection</th>
                <th colspan="10">Sub Acceptance</th>
                <th colspan="2">Color Vision</th>
                <th colspan="2">EOM</th>
                <th colspan="2">Anterior Segment</th>
                <th rowspan="3">Refer to Base Hospital</th>
                <th rowspan="3">Glasses Presented</th>
                <th rowspan="3">Advice & Remarks</th>
                <?php if($_SESSION['user_type']==='admin'){ ?>
                  <th rowspan="3">Print</th>
                  <th rowspan="3">Update</th>
                  <th rowspan="3">Delete</th>
                <?php } ?>
              </tr>
              <tr>
                <th rowspan="2">Right Eye</th>
                <th rowspan="2">Left Eye</th>
                <th colspan="2">Right Eye</th>
                <th colspan="2">Left Eye</th>
                <th colspan="5">Right Eye</th>
                <th colspan="5">Left Eye</th>
                <th colspan="3">Right Eye</th>
                <th colspan="3">Left Eye</th>
                <th colspan="5">Right Eye</th>
                <th colspan="5">Left Eye</th>
                <th rowspan="2">Right Eye</th>
                <th rowspan="2">Left Eye</th>
                <th rowspan="2">Right Eye</th>
                <th rowspan="2">Left Eye</th>
                <th rowspan="2">Right Eye</th>
                <th rowspan="2">Left Eye</th>
              </tr>
              <tr>
                <th>Distance Vision(DV)</th>
                <th>Near Vision(NV)</th>
                <th>Distance Vision(DV)</th>
                <th>Near Vision(NV)</th>
                <th>sph</th>
                <th>cyl</th>
                <th>axis</th>
                <th>dv</th>
                <th>nv</th>
                <th>sph</th>
                <th>cyl</th>
                <th>axis</th>
                <th>dv</th>
                <th>nv</th>
                <th>sph</th>
                <th>cyl</th>
                <th>axis</th>
                <th>sph</th>
                <th>cyl</th>
                <th>axis</th>
                <th>sph</th>
                <th>cyl</th>
                <th>axis</th>
                <th>dv</th>
                <th>nv</th>
                <th>sph</th>
                <th>cyl</th>
                <th>axis</th>
                <th>dv</th>
                <th>nv</th>
              </tr>
            </thead>
            <tbody>
                <?php
                        include 'db.php';
                        $quer1 = mysqli_query($link,"SELECT * FROM student");
					    if(mysqli_num_rows($quer1)>0){
						    while($row = mysqli_fetch_array($quer1)){
                                $temp = $row['scode'];
                                $date = $row['date_of_visit'];
                                $querysp = mysqli_query($link,"SELECT stype FROM school where school.scode = '$temp' AND school.date_of_visit = '$date'");
                                $srow = mysqli_fetch_array($querysp);
                                echo "<tr>";
                                    echo "<td>".$row['scode']."</td>";
                                    echo "<td>".$row['date_of_visit']."</td>";
                                    echo "<td>".$srow['stype']."</td>";
                                    echo "<td>".$row['sid']."</td>";
                                    echo "<td>".$row['aadhar']."</td>";
                                    echo "<td>".$row['stu_name']."</td>";
                                    echo "<td>".$row['age']."</td>";
                                    echo "<td>".$row['gender']."</td>";
                                    echo "<td>".$row['father_name']."</td>";
                                    echo "<td>".$row['mother_name']."</td>";
                                    echo "<td>".$row['contact_no']."</td>";
                                    echo "<td>".$row['class']."</td>";
                                    echo "<td>".$row['section']."</td>";
                                    echo "<td>".$row['_medium']."</td>";
                                    echo "<td>".$row['complaint_right']."</td>";
                                    echo "<td>".$row['complaint_left']."</td>";
                                    echo "<td>".$row['unaided_right_dv']."</td>";
                                    echo "<td>".$row['unaided_right_nv']."</td>";
                                    echo "<td>".$row['unaided_left_dv']."</td>";
                                    echo "<td>".$row['unaided_left_nv']."</td>";
                                    echo "<td>".$row['pg_right_sph']."</td>";
                                    echo "<td>".$row['pg_right_cyl']."</td>";
                                    echo "<td>".$row['pg_right_axis']."</td>";
                                    echo "<td>".$row['pg_right_dv']."</td>";
                                    echo "<td>".$row['pg_right_nv']."</td>";
                                    echo "<td>".$row['pg_left_sph']."</td>";
                                    echo "<td>".$row['pg_left_cyl']."</td>";
                                    echo "<td>".$row['pg_left_axis']."</td>";
                                    echo "<td>".$row['pg_left_dv']."</td>";
                                    echo "<td>".$row['pg_left_nv']."</td>";
                                    echo "<td>".$row['ar_right_sph']."</td>";
                                    echo "<td>".$row['ar_right_cyl']."</td>";
                                    echo "<td>".$row['ar_right_axis']."</td>";
                                    echo "<td>".$row['ar_left_sph']."</td>";
                                    echo "<td>".$row['ar_left_cyl']."</td>";
                                    echo "<td>".$row['ar_left_axis']."</td>";
                                    echo "<td>".$row['dv_right_sph']."</td>";
                                    echo "<td>".$row['dv_right_cyl']."</td>";
                                    echo "<td>".$row['dv_right_axis']."</td>";
                                    echo "<td>".$row['dv_right_dv']."</td>";
                                    echo "<td>".$row['dv_right_nv']."</td>";
                                    echo "<td>".$row['dv_left_sph']."</td>";
                                    echo "<td>".$row['dv_left_cyl']."</td>";
                                    echo "<td>".$row['dv_left_axis']."</td>";
                                    echo "<td>".$row['dv_left_dv']."</td>";
                                    echo "<td>".$row['dv_left_nv']."</td>";
                                    echo "<td>".$row['color_vision_right']."</td>";
                                    echo "<td>".$row['color_vision_left']."</td>";
                                    echo "<td>".$row['eom_right']."</td>";
                                    echo "<td>".$row['eom_left']."</td>";
                                    echo "<td>".$row['anterior_segment_right']."</td>";
                                    echo "<td>".$row['anterior_segment_left']."</td>";
                                    echo "<td>".$row['hospital_referal']."</td>";
                                    echo "<td>".$row['glasses_presented']."</td>";
                                    echo "<td>".$row['advices']."</td>";
                                  if($_SESSION['user_type']=== 'admin'){
                                    echo "<td><span class='print-btn'><a href='stu_receipt.php?gs_l=psy-ab.3..33i160.5257.15070..15431...0.2..1.748.4868.0j3j3j3j3j1j1......0....1..gws-wiz.......0i71j0i22i30j33i22i29i30j33i21.hEsaSku_vrk&ved=0ahUKEwi1_peanZ_oAhVVyDgGHcULC2oQ4dUDCAs&uact=5&aadhar=$row[aadhar]&date=$row[date_of_visit]&scode=$row[scode]&gs_l=psy-ab.3..33i160.5257.15070..15431...0.2..1.748.4868.0j3j3j3j3j1j1......0....1..gws-wiz.......0i71j0i22i30j33i22i29i30j33i21.hEsaSku_vrk&ved=0ahUKEwi1_peanZ_oAhVVyDgGHcULC2oQ4dUDCAs&uact=5'><img src='photos/print.png' alt='edit' srcset=''></a></span></td>";
                                    echo "<td><span class='stu-update-btn'><a href='update_student.php?gs_l=psy-ab.3..33i160.5257.15070..15431...0.2..1.748.4868.0j3j3j3j3j1j1......0....1..gws-wiz.......0i71j0i22i30j33i22i29i30j33i21.hEsaSku_vrk&ved=0ahUKEwi1_peanZ_oAhVVyDgGHcULC2oQ4dUDCAs&uact=5&aadhar=$row[aadhar]&date=$row[date_of_visit]&gs_l=psy-ab.3..33i160.5257.15070..15431...0.2..1.748.4868.0j3j3j3j3j1j1......0....1..gws-wiz.......0i71j0i22i30j33i22i29i30j33i21.hEsaSku_vrk&ved=0ahUKEwi1_peanZ_oAhVVyDgGHcULC2oQ4dUDCAs&uact=5'><img src='photos/edit.png' alt='edit' srcset=''></a></span></td>";
                                    echo "<td><span class='stu-delete-btn' data-aadhar=$row[aadhar] data-date=$row[date_of_visit] ><img src='photos/delete_view.png' alt='delete' srcset=''></span></td>";
                                  }                                   
                                echo "</tr>";
				            }
			            }else{
				            echo "0 results";
                        }
                ?>
            </tbody>
          </table>
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
