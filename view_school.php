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
        <table id="school-table" class="cell-border compact stripe school-table">
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
              <th>Update</th>
              <th>Delete</th>
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
								//echo "<td>".'<a href=""> Print</a>'."</td>";
								echo "<td style='text-align:center;'><a href='update_school.php?sch_code=$row[scode]&date=$row[date_of_visit]'><button class='btn btn-primary btn-sm'>Update</button></a></td>";
								//echo "<td style='text-align:center;'><a href='dummy.php?sch_code=$row[scode]&date=$row[date_of_visit]'><button class='btn btn-primary btn-sm'>Update</button></a></td>";
            					echo "<td style='text-align:center;'><a href='confirmation_delete_school.php?sch_code=$row[scode]&date=$row[date_of_visit]'><button class='btn btn-danger btn-sm'>Delete</button></a></td>";
                                echo "</tr>";
                            }
                        }
                        else{
                            echo"0 results";
                        }
                    ?>
          </tbody>
        </table>
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



