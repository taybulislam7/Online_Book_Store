<?php



if(isset($_POST['save'])){
  include "config.php";

  $fname = mysqli_real_escape_string($conn,$_POST['fname']);
  $lname = mysqli_real_escape_string($conn,$_POST['lname']);
  $user = mysqli_real_escape_string($conn,$_POST['user']);
  $password = mysqli_real_escape_string($conn,md5($_POST['password']));
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $role = mysqli_real_escape_string($conn,$_POST['role']);

  $sql = "SELECT username FROM user WHERE username = '{$user}'";
  $result = mysqli_query($conn, $sql) or die("Query Failed.");

  if(mysqli_num_rows($result) > 0){
    echo "<p style='color:red;text-align: center;margin: 10px 0;'>UserName already Exists.</p>";
  }else {
    $sql1 = "INSERT INTO user (first_name,last_name,username,password,email,role) VALUES ('{$fname}','{$lname}','{$user}','{$password}','{$email}','{$role}')";
    if(mysqli_query($conn,$sql1)){
      header("Location: {$hostname}/admin/users.php");
    }

  }
}


?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Book Store</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="http://localhost/bookstore/homePage.php"><p style=" background: #131419; padding-left: 35px;font-size: 28px; font-family: Harrington; font-weight: bold; color: #00f3ff;
                        text-shadow: 0 0 30px #00f3ff; border-radius:20px; ">BOOK STORE</p></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                              <a href="http://localhost/bookstore/homePage.php">Home</a>
                            </li>
                            <li>
                                <a href="http://localhost/bookstore/index.php">Battalion Of Candels</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
</html>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" onsubmit="return validation()" name="register_from" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" id="fname">
                          <span id="Fname" style="color: darkred;
                          margin-top: 10px;
                          margin-left: 10px;
                          font-weight: bold;
                          display: block;
                          font-size: 12px;"></span>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" id="lname">
                          <span id="Lname" style="color: darkred;
                          margin-top: 10px;
                          margin-left: 10px;
                          font-weight: bold;
                          display: block;
                          font-size: 12px;"></span>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" id="user" placeholder="name123">
                          <span id="username" style="color: darkred;
                          margin-top: 10px;
                          margin-left: 10px;
                          font-weight: bold;
                          display: block;
                          font-size: 12px;"></span>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="name@tn12">
                          <span id="passwords" style="color: darkred;
                          margin-top: 10px;
                          margin-left: 10px;
                          font-weight: bold;
                          display: block;
                          font-size: 12px;"></span>
                      </div>
                      <div class="form-group">
                          <label>Confrim Password</label>
                          <input type="password" name="re-password" id="re_password"class="form-control" placeholder="Re-type Password">
                          <span id="re_pass" style="color: darkred;
                            margin-top: 10px;
                            margin-left: 10px;
                            font-weight: bold;
                            display: block;
                            font-size: 12px;"></span>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" id="email" class="form-control" placeholder="a12@gamil.com">
                          <span id="emails" style="color: darkred;
                          margin-top: 10px;
                          margin-left: 10px;
                          font-weight: bold;
                          display: block;
                          font-size: 12px;"></span>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                      <p class="regestar" style=" color: #ff0047; ">Already have an account   <a href="index.php">  Click Here</a></p>
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
   <script type="text/javascript">
  function validation(){
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var Username = document.getElementById('user').value;
    var Password = document.getElementById('password').value;
    var Re_password = document.getElementById('re_password').value;
    var Email = document.getElementById('email').value;

    var usercheck = /^[a-z]{3,8}[0-9]{1,}$/;
    var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*_]{5,15}$/;
    var emailcheck = /^[a-z_]{3,}[0-9]{2,4}@[a-z]{3,}[.]{1}[a-z.]{2,6}$/;

    if (fname == "") {
      document.getElementById('Fname').innerHTML = "First Name can't be Empty!";
      return false;

    }
    if (lname == "") {
      document.getElementById('Lname').innerHTML = "Last Name can't be Empty!";
      return false;

    }

    if(usercheck.test(Username)){
      document.getElementById('username').innerHTML = "";
    }else {
      document.getElementById('username').innerHTML = "Username must be 4 to 8 small characters which contain at least one numeric digit!";
      return false;
    }

    if(passwordcheck.test(Password)){
      document.getElementById('passwords').innerHTML = "";
    }else {
      document.getElementById('passwords').innerHTML = "Password must be between 5 to 15 characters which contain at least one numeric digit and a special character!";
      return false;
    }
    if(Password != Re_password){
      document.getElementById('re_pass').innerHTML = "Confrim Password Must be same as Password !";
      return false;
    }


    if(emailcheck.test(Email)){
      document.getElementById('emails').innerHTML = "";
    }else {
      document.getElementById('emails').innerHTML = "Invalid Email!";
      return false;
    }

  }

</script>
<?php include "footer.php"; ?>
