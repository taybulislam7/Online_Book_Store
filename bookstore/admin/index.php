<?php
include "config.php";
session_start();

if(isset($_SESSION["username"])){
  header("Location: {$hostname}/admin/post.php");
}
 ?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                          <div class="form">
                                  <h2>Login</h2>
                                  <div class="input">
                                    <div class="inputBox">
                                      <label>Username</label>
                                      <input type="text" class="" value="" placeholder="name723" id="username" name="username" autocomplete="off" required>
                                    </div>
                                    <div class="inputBox">
                                      <label>Password</label>
                                      <input type="password" class="" value="" placeholder="name@tnt12" id="password" name="password" autocomplete="off" required>
                                    </div>
                                    <div class="inputBox">
                                      <input type="submit" name="login" class="" value="Sign In">
                                    </div>
                                  </div>
                                  <p class="regestar">Create New Account <a href="add-user.php">Click Here</a></p>
                                </div>
                        </form>
                        <?php
                          if(isset($_POST['login'])){
                            include "config.php";
                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $password = md5($_POST['password']);

                            $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password = '{$password}'";
                            $result = mysqli_query($conn,$sql) or die("Query Failed");
                            if(mysqli_num_rows($result) > 0){
                              while ($row = mysqli_fetch_assoc($result)) {
                                session_start();
                                $_SESSION["username"] = $row['username'];
                                $_SESSION["user_id"] = $row['user_id'];
                                $_SESSION["user_role"] = $row['role'];

                                header("Location: {$hostname}/homePage.php");
                              }

                            }else{
                              echo '<div class="alert alert-danger">Username and password are not match</div>';
                            }
                          }

                         ?>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
