<?php

session_start();
if($_SESSION["un"]==true && $_SESSION["user_type"]){
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
  <title>MSHE|HOME</title>
</head>

<body>

  <script>
    $(document).ready(function(){
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
        <div class="details">
          <h4>No. of Schools :: <span><?php print_r($row1['count'])?></span></h4>
          <h4>No. of Students :: <span><?php print_r($row2['count'])?></span></h4>
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

