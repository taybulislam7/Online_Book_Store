<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/post.php");
}
if(isset($_POST['submit'])){
  include "config.php";

  $userid =mysqli_real_escape_string($conn,$_POST['user_id']);
  $fname =mysqli_real_escape_string($conn,$_POST['f_name']);
  $lname = mysqli_real_escape_string($conn,$_POST['l_name']);
  $user = mysqli_real_escape_string($conn,$_POST['username']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $role = mysqli_real_escape_string($conn,$_POST['role']);

  $sql = "UPDATE user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}',email = '{$email}', role = '{$role}' WHERE user_id = {$userid}";

    if(mysqli_query($conn,$sql)){
      header("Location: {$hostname}/admin/users.php");
    }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php
                include "config.php";
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM user WHERE user_id = {$user_id}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" onsubmit="return validation()" name="update_from">
                      <div class="form-group">
                          <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id'];  ?>">
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'];  ?>" id="fname">
                          <span id="Fname" style="color: darkred;
                          margin-top: 10px;
                          margin-left: 10px;
                          font-weight: bold;
                          display: block;
                          font-size: 12px;"></span>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'];  ?>" id="lname">
                          <span id="Lname" style="color: darkred;
                          margin-top: 10px;
                          margin-left: 10px;
                          font-weight: bold;
                          display: block;
                          font-size: 12px;"></span>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'];  ?>" placeholder="" id="user">
                          <span id="username" style="color: darkred;
                          margin-top: 10px;
                          margin-left: 10px;
                          font-weight: bold;
                          display: block;
                          font-size: 12px;"></span>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email'];  ?>" placeholder="a12@gamil.com">
                          <span id="emails" style="color: darkred;
                          margin-top: 10px;
                          margin-left: 10px;
                          font-weight: bold;
                          display: block;
                          font-size: 12px;"></span>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php
                              if($row['role'] == 1){
                                echo "<option value='0'>normal User</option>
                                      <option value='1' selected>Admin</option>";
                              }else{
                                echo "<option value='0' selected>normal User</option>
                                      <option value='1'>Admin</option>";
                              }
                            ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?php
                }
              }
                   ?>
              </div>
          </div>
      </div>
  </div>
  <script type="text/javascript">
function validation(){
 var fname = document.getElementById('fname').value;
 var lname = document.getElementById('lname').value;
 var Username = document.getElementById('user').value;
 var Email = document.getElementById('email').value;

 var usercheck = /^[a-z]{3,8}[0-9]{1,}$/;
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

 if(emailcheck.test(Email)){
   document.getElementById('emails').innerHTML = "";
 }else {
   document.getElementById('emails').innerHTML = "Invalid Email!";
   return false;
 }

}

</script>
<?php include "footer.php"; ?>
