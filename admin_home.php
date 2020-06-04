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
$qur1 = "SELECT COUNT(*) as count FROM school";
$qur2 = "SELECT COUNT(*) as count FROM student";
$res1 = mysqli_query($link,$qur1);
$res2 = mysqli_query($link,$qur2);
$row1 = mysqli_fetch_array($res1);
$row2 = mysqli_fetch_array($res2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/home.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery.form.js"></script>
  <title>MSHE|HOME</title>
</head>

<body>
<script type="text/javascript">
    $(document).ready(function () {
      $(".add-user").click(function () {
        var uname = $("#uname").val();
        var pass = $("#pass").val();
        var user = $("#type-user").val();
        mydata = 'uname=' + uname + '&pass=' + pass + '&utype=' + user; 
        $.ajax({
          type: "POST",
          url: "add_user.php",
          data: mydata,
          success: function (x) {
            if(x==1)
            {
              document.querySelector("#uname").style.background = "rgb(255, 154, 154)";
              $(".error").html("UserName is Empty");
              // alert(x);
            }
            else if(x==2)
            {
              $(".error").html("");
              document.querySelector("#uname").style.background = "rgb(255, 154, 154)";
              $(".error").html("Invalid UserName");
            }
            else if(x==3)
            {
              document.querySelector("#uname").style.background = "rgb(255, 154, 154)";
              $(".error").html("UserName already taken");
            }
            else if(x==4)
            {
              document.querySelector("#pass").style.background = "rgb(255, 154, 154)";
              $(".error").html("Password is Empty");
            }
            else
            {
              document.querySelector(".error").style.color = "green";
              $(".error").html("User Added");
              document.querySelector("#uname").value = "";
              document.querySelector("#pass").value = "";
              setTimeout(() => { document.location.reload(true); }, 100);
            }
          }
        });
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



      $(".delete").click(function(){
        var uname = $(this).attr('id');
        mydata = 'uname=' + uname ; 
        con = confirm("Are you sure to delete "+uname+" ??");
        if(con){
          $.ajax({
            type: "POST",
            url: "del_user.php",
            data: mydata,
            success: function(x){
              if(x==1){
                alert("User Deleted Successfully");
                setTimeout(() => { document.location.reload(true); }, 100);
              }
              else{
                alert("Error in deleting.");
              }
              
            }
          });
        }
      });


      $('#file_name').change(function() {
        var f_name = $(".file_name").val();
        // alert(f_name);
        var spl = f_name.split('.');
        if (spl[spl.length-1].toLowerCase() != 'csv') {
          $('.up-error').html("Only CSV is allowed");
        } 
      });


      $('#dwn_name').focusout(function(){
        var name = $("#dwn_name").val().toLowerCase();
        if(/^[0-9]+$/.test(name) == false || name != "all" || name==''){  
          $("#dwn-error").html("Invalid Input");
        }
      });


      $("#upload-form").on('submit',(function(e) {
        e.preventDefault();
        
        $.ajax({
          url: "upload.php",
          type: "POST",
          data:  new FormData(this),
          dataType: "json",
          contentType: false,
          cache: false,
          processData:false,
          beforeSend : function()
          {
            //$("#preview").fadeOut();
            $("#up-error").fadeOut();
          },
          success: function(data)
          {
            if(data[3] == 0)
            {
              $(".head-details").html(data[0]);
              $(".head-details").css("color","green");
              $(".tot-count").html();
              $(".popup-upload-div").css("display","none");
              $(".popup-upload-details").css("display","flex");
              $("#upload-details-table").css("display","none");
            }
            else
            {
              $(".head-details").html(data[0]);
              $(".head-details").css("color","red");
              $(".tot-count").html(data[3]+" records");
              $(".popup-upload").css("display","none");
              $(".popup-upload-details").css("display","flex");
              $("#upload-details-table").html(data[1]+data[2]);
            }
          },
          error: function(e) 
          {
            $("#up-error").html(e).fadeIn();
          }          
        });
      }));

      $(".logout").click(function(){
        var name = "<?php print_r($_SESSION['un']) ?>";
        var a = confirm(name + " Are you sure to logout ?");
        if(a)
        {
          window.location = "logout.php";
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
        <div class="details">
          <h4>No. of Schools :: <span><?php print_r($row1['count'])?></span></h4>
          <h4>No. of Students :: <span><?php print_r($row2['count'])?></span></h4>
        </div>
        <div class="buttons">
          <button class="add-users">Add Users</button>
          <button class="view-users">View Users</button>
          <button class="upload">Upload</button>
          <button class="download" onclick="down_val()">Download</button>
          
        </div>
      </div>
    </section>
  </main>
  <footer>
    <div class="foot">
      <h4>Designed and Developed By MVGRCE</h4>
    </div>
  </footer>
    <div class="popup">
        <div class="popup-content">
          <h4 class="close">+</h4>
          <h4>Add USERS</h4>
          <input type="text" name="uname" class="uname" id="uname" placeholder="UserName" />
          <input type="password" name="pass" class="pass" id="pass" placeholder="Password" />
          <div class="user-type">
              <label for="type-user">User Type</label>
              <select name="type-user" id="type-user">
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
              </select>
          </div>
          <span class="error" id="error"></span>
          <button class="add-user">Add</button>
        </div>
    </div>
    <div class="popup-view">
        <div class="popup-view-content">
          <h4 class="clo">+</h4>
          <!-- <img src="photos/user.png" alt="user" srcset=""> -->
          <div class="usr-table">
            <h4>USERS</h4>
            <table class="table-view-users">
              <thead>
                <tr>
                  <th>UserName</th>
                  <th>Password</th>
                  <th>Type</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $quer = mysqli_query($link,"SELECT * FROM login");
              $flag = 0;
              while ($row = mysqli_fetch_array($quer))
              {
                if($_SESSION['un']==$row['username'])
                {
                  echo '
                  <tr>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['password'].'</td>
                    <td>'.$row['user_type'].'</td>
                    <td> (you) </td>
                  </tr>
                ';
                }
                else{
                  echo '
                  <tr>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['password'].'</td>
                    <td>'.$row['user_type'].'</td>
                    <td class="delete" id="'.$row['username'].'">'.'<img src="photos/delete.png" alt="delete" srcset="">'.'</td>
                  </tr>
                ';
                }
                
                $flag = $flag+1;
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
    <div class="popup-upload">
      <div class="popup-upload-view">
        <h4 class="upload-clo">+</h4>
        <div class="upload-form-div">
          <form method="post" enctype="multipart/form-data" id="upload-form">
            <label for="file_name">Choose File</label>
            <input type="file" name="file_name" accept=".csv" id="file_name" class="file_name" title="Only .csv files"/>
            <span class="csv">Only .csv files</span>
            <input type="submit" name="import" value="import" id="up-submit"/>
          </form>
        </div>
        <div class="upload-error">
          <p id='up-error' class="up-error"></p>
        </div>
        <div class='progress' id="progress_div">
          <div class='bar' id='bar1'></div>
          <div class='percent' id='percent1'>0%</div>
        </div>
        <div class="data-format">
              <div><a>Show Data Format</a></div>
        </div>
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

    

    <!-- <div class="popup-format">
      <div class="popup-format-view">
        <h4 class="format-clo">+</h4>
        <div class="table-format">
          <table class="format">
              
              <tr>
                <td colspan="3">Student ID</td>
                <td>12</td>
              </tr>
              <tr>
                <td colspan="3">Aadhar No / Unique ID</td>
                <td>1234567890</td>
              </tr>
              <tr>
                <td colspan="3">Name</td>
                <td>XXXXX</td>
              </tr>
              <tr>
                <td colspan="3">Age</td>
                <td>12</td>
              </tr>
              <tr>
                <td colspan="3">Gender</td>
                <td>female</td>
              </tr>
              <tr>
                <td colspan="3">Father Name</td>
                <td>XXXXXX</td>
              </tr>
              <tr>
                <td colspan="3">Mother Name</td>
                <td>XXXXXX</td>
              </tr>
              <tr>
                <td colspan="3">Contact</td>
                <td>1111111111</td>
              </tr>
              <tr>
                <td colspan="3">Class</td>
                <td>6</td>
              </tr>
              <tr>
                <td colspan="3">Section</td>
                <td>A</td>
              </tr>
              <tr>
                <td colspan="3">Medium</td>
                <td>Telugu</td>
              </tr>
              <tr>
                <td rowspan="2">History</td>
                <td colspan="2">Right Eye</td>
                <td>No complaints</td>
              </tr>
              <tr>
                <td colspan="2">Left Eye</td>
                <td>No complaints</td>
              </tr>
              <tr>
                <td rowspan="4">Unaided</td>
                <td rowspan="2">Right Eye</td>
              </tr>

          
          </table>
        </div>
      </div>
    </div> -->













    
    <div class="popup-upload-details">
      <div class="popup-upload-view-details">
        <h4 class="upload-details-clo">+</h4>
        <div class="upload-details">
          <div class="head-details"></div>
          <h4 class="tot-count"></h4>
          <div class="update-details-div">
            <table id="upload-details-table">
            
            </table>
          </div>
          

        </div>
      </div>
    </div>




    <div class="popup-download">
      <div class="popup-download-view">
        <h4 class="download-clo">+</h4>
        <div class="download-form-div">
          <form method="post" action="download.php" enctype="multipart/form-data" id="download-form">
            <label for="dwn_name">Year or All </label>
            <input type="text" name="dwn_name" id="dwn_name" class="dwn_name" placeholder="2019 or all" />
            <input type="submit" name="export" value="export" id="dwn-submit"/>
          </form>
        </div>
        <div class="download-error">
          <p id='dwn-error' class="dwn-error"></p>
        </div>
      </div>
    </div>


  <script src="js/app.js"></script>
  <script src="js/add_user_modal.js"></script>
  <script src="js/view_user_modal.js"></script>
  <script src="js/upload_modal.js"></script>
  <script src="js/upload_details_modal.js"></script>
  <script src="js/download_modal.js"></script>
  <script src="js/cng_pwd.js"></script>

</body>

</html>

