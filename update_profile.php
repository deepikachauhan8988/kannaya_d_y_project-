<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$localhost = "localhost";
$root = "root";
$password = "";
$db = "k_d_y";
$con = mysqli_connect($localhost, $root, $password, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    $name = $_POST['firstname'];
    $email = $_POST['email'];
    $mobile = $_POST['phoneN'];
    $passwrd = md5($_POST['password']);
    
    $sql = "INSERT INTO update_table (name, email, mobile, passwrd) VALUES ('$name', '$email', '$mobile', '$passwrd')";
    $result = mysqli_query($con, $sql);

    if($result) {
        echo "<script>alert('Data inserted successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
<div class="container">
  <h2>Welcome Page</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Profile</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Profile</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="fname">Name</label>
              <input type="text" class="form-control" id="fname" name="firstname" placeholder="Your name.." required>
            </div>
            <div class="form-group">
              <label for="lname">Email ID</label>
              <input type="email" class="form-control" id="lname" name="email" placeholder="Your email.." required>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phoneN" placeholder="Your phone number.." required>
            </div>
            <div class="form-group">
              <label for="password">Update Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Your password.." required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" name="close">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</body>
</html>
