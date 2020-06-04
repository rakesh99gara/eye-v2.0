<?php

session_start();
if($_SESSION["un"]==true && $_SESSION["user_type"]){
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
    <title>MSHE|School Details</title>
    <link rel="stylesheet" href="css/enter_school.css" />
    <script src="js/jquery.js"></script>
    <script src="js/school_validation.js"></script>
  </head>

  <body>
    <script>
      $(document).ready(function() {
        // $("#date").datepicker({
        //   dateFormat: "yy-mm-dd"
        // }).datepicker('setDate', new Date());
        var date = new Date().toISOString().substring(0, 10),
        field = document.querySelector('#date');
        field.value = date;
        $("#form").on("submit", function(e) {
          e.preventDefault();
          var a = validate();
          // alert(a);
          if (a == 0) {
            $.ajax({
              url: $("#form").attr("action"),
              type: "POST",
              data: $("#form").serialize(),
              success: function(data) {
                if (data == 1) {
                  $("#form").trigger("reset");
                  window.location = "enter_student.php";
                } else {
                  var con = confirm(
                    "School details already entered. Do you want to continue to Student Details ?"
                  );
                  if (!con) {
                  } else {
                    $("form").trigger("reset");
                    window.location = "enter_student.php";
                  }
                }
              }
            });
          }
        });

        $("#scode").blur(function() {
          var temp = $("#scode").val();
          mydata = "temp=" + temp;
          $.ajax({
            type: "POST",
            url: "set_school_values.php",
            data: mydata,
            dataType: "json",
            success: function(x) {
              function insert(s) {
                var jjsn = new String();
                jjsn = s.toString().replace(/"/g, "");
                return jjsn;
              }
              var jsn = insert(JSON.stringify(x.sname));
              $("#sname").val(jsn);
              var jst = insert(JSON.stringify(x.stype));
              $("#stype").val(jst);
              var jhd = insert(JSON.stringify(x.headname));
              $("#headname").val(jhd);
              var jph = insert(JSON.stringify(x.phno));
              $("#phno").val(jph);
              var jad = insert(JSON.stringify(x.address));
              $("#address").val(jad);
            },
            fail: function() {
              alert("areyy suppu u failed!!");
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
            <h4>School Details</h4>
          </div>
          <div class="school-form">
            <form action="school_details.php" method="post" id="form">
              <label for="scode">School Code</label>
              <input
                type="text"
                name="scode"
                id="scode"
                placeholder="School Code"
              />
              <span class="error" id="spnscode"></span>
              <label for="sname">School Name</label>
              <input
                type="text"
                name="sname"
                id="sname"
                placeholder="School Name"
              />
              <span class="error" id="spnsname"></span>
              <label for="stype">School Type</label>
              <select name="stype" id="stype">
                <option>GVMC High School</option>
                <option>GVMC Primary School</option>
                <option>GVMC Upper Primary School</option>
                <option>Anganavadi</option>
                <option>Zilla Parishad</option>
                <option>Zilla Parishad High School</option>
                <option>Zilla Parishad Muncipal School</option>
                <option>KGB</option>
                <option>Girukulam</option>
                <option>Papa Home</option>
              </select>
              <label for="date">Date</label>
              <input type="date" name="date" id="date" placeholder="Date" />
              <label for="headname">Name of the Head Master</label>
              <input
                type="text"
                name="headname"
                id="headname"
                placeholder="Head Master's Name"
              />
              <span class="error" id="spnheadname"></span>
              <label for="phno">Contact Number</label>
              <input
                type="text"
                name="phno"
                id="phno"
                placeholder="Phone Number"
              />
              <span class="error" id="spnphno"></span>
              <label for="address">Address</label>
              <input
                type="text"
                name="address"
                id="address"
                placeholder="Address"
              />
              <span class="error" id="spnaddress"></span>
              <input type="submit" name="submit" id="submit" value="Submit" />
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
