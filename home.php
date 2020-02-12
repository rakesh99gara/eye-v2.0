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
  <title>MSHE|HOME</title>
</head>

<body>
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
      </div>
    </section>
  </main>
  <footer>
    <div class="foot">
      <h4>Designed and Developed By MGLUG</h4>
    </div>
  </footer>
  <script src="js/app.js"></script>
</body>

</html>

