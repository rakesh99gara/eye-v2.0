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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MSHE|VIEW SCHOOL</title>
  <link rel="stylesheet" href="css/view_school.css">
  <script src="js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>

<body>
  <script>
    $(document).ready( function () {
      $('#school-table').DataTable({
        "pagingType": "simple_numbers",
        responsive: true
      });

      $('.view-student').click(function(){
        window.location = "view_student.php";
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

    $(document).on("click",".scl-delete-btn",function(event){
      var scode = $(this).data('scode');
      var date = $(this).data('date');
      if(confirm("Are you sure ? ")){
        $.ajax({
            type: "POST",
            url: "delete_school.php",
            data: {
              scode:scode,
              date:date
              },
            success: function(x) {
              if (x == "1") {
                alert("Deleted Successfully");
                setTimeout(() => { document.location.reload(true); }, 100);
              } else {
                alert("Error in Deleting.\nSchool is having Children.");
              }
              
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
          <button class="view-school" disabled>View Schools</button>
          <button class="view-student">View Students</button>
        </div>
        <div class="view-school-table">

        
        <table id="school-table" class="cell-border compact stripe school-table">
          <caption>School Details</caption>
          <thead>
            <tr>
              <th>Scode </th>
              <th>Sname</th>
              <th>Stype</th>
              <th>Date</th>
              <th>Head Master</th>
              <th>Phone Number</th>
              <th>Strength</th>
              <th>Address</th>
              <?php if($_SESSION['user_type']==='admin'){ ?>
              <th>Update</th>
              <th>Delete</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
          <?php
                        include 'db.php';
                        $quer1 = mysqli_query($link,"SELECT * FROM school");
                        if(mysqli_num_rows($quer1)>0){
                            while($row = mysqli_fetch_array($quer1)){
                                $_SESSION['scode']=$row['scode'];
                                $scode = $row['scode'];
                                $date_of_visi = $row['date_of_visit'];
                                $date_of_visit =(string)$date_of_visi; 
                                $qur = "SELECT COUNT(sid) FROM student as st WHERE st.scode=".$scode." AND st.date_of_visit="."'$date_of_visit'";
                                $strength1 = mysqli_query($link,$qur);
                                $strength = mysqli_fetch_array($strength1);
                                echo "<tr>";
                                echo "<td>".$row['scode']."</td>";
                                echo "<td>".$row['sname']."</td>";
                                echo "<td>".$row['stype']."</td>";
                                echo "<td>".$row['date_of_visit']."</td>";
                                echo "<td>".$row['headname']."</td>";
                                echo "<td>".$row['phno']."</td>";
                                echo "<td>".$strength[0]."</td>";
                                echo "<td>".$row['address']."</td>";
                                if($_SESSION['user_type'] === 'admin'){
                                  echo "<td><span class='scl-update-btn'><a href='update_school.php?gs_l=psy-ab.3..33i160.5257.15070..15431...0.2..1.748.4868.0j3j3j3j3j1j1......0....1..gws-wiz.......0i71j0i22i30j33i22i29i30j33i21.hEsaSku_vrk&ved=0ahUKEwi1_peanZ_oAhVVyDgGHcULC2oQ4dUDCAs&uact=5&sch_code=$row[scode]&date=$row[date_of_visit]&gs_l=psy-ab.3..33i160.5257.15070..15431...0.2..1.748.4868.0j3j3j3j3j1j1......0....1..gws-wiz.......0i71j0i22i30j33i22i29i30j33i21.hEsaSku_vrk&ved=0ahUKEwi1_peanZ_oAhVVyDgGHcULC2oQ4dUDCAs&uact=5'><img src='photos/edit.png' alt='edit' srcset=''></a></span></td>";
                                  echo "<td><span class='scl-delete-btn' data-scode=$row[scode] data-date=$row[date_of_visit]><img src='photos/delete_view.png' alt='delete' srcset=''></span></td>";
                                }
                                echo "</tr>";
                            }
                        }
                        else{
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


