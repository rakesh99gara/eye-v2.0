<?php
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
            }
          }
        });
      });
      $(".delete").click(function(){
        var uname = $(this).attr('id');
        mydata = 'uname=' + uname ; 
        $.ajax({
          type: "POST",
          url: "del_user.php",
          data: mydata,
          success: function(){
            setTimeout(() => { document.location.reload(true); }, 100);
          }
        });
        
      });
    });
  </script>
  <header>
    <nav>
      <div class="nav-name">
        <h4>MSHE</h4>
      </div>
      <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">View Details</a></li>
        <li><a href="#">Enter details</a></li>
        <li><a href="#">Change Password</a></li>
        <li><a href="#">Log out</a></li>
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
          <button class="download">Download</button>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <div class="foot">
      <h4>Designed and Developed By MGLUG</h4>
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
                echo '
                  <tr>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['password'].'</td>
                    <td>'.$row['user_type'].'</td>
                    <td class="delete" id="'.$row['username'].'">'.'<img src="photos/delete.png" alt="delete" srcset="">'.'</td>
                  </tr>
                ';
                $flag = $flag+1;
              }
              ?>
              </tbody>
            </table>
          </div>

        </div>
    </div>
  <script src="js/app.js"></script>
  <script src="js/add_user_modal.js"></script>
  <script src="js/view_user_modal.js"></script>

</body>

</html>

