<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>District Portal</h2>

        <!-- Login Form -->
        <form id="loginForm" method="POST" action="">
            <h3>Login</h3>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="loginType">Login Type:</label>
                <input type="text" id="loginType" name="loginType" value="District" disabled>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <input type="submit" name="login" value="Login">
            </div>
        </form>
        <p>Not registered yet? <a href='./district_regis.php'>Register Here</a></p>
        </div>

        <?php
        include "./config.php";
        
        if (isset($_POST['login'])) {
            $emp_name = $_POST['name'];
            $password = $_POST['password'];
            $loginType = 'District'; // Change accordingly for sector and project
        
            echo  $sql = "SELECT * FROM new_district WHERE emp_name='$emp_name' AND password='$password'";
          $result = mysqli_query($con, $sql);
        echo "hollo";
            if (mysqli_num_rows($result)) {
                echo "hekko";
                $user = mysqli_fetch_assoc($result);
                if ($user['status'] == 'active') {
                    echo "<script>alert('Login successful');</script>";
                    echo "<script>alert()";
                    // Redirect to the dashboard or another page
                    // For example: echo "<script>window.location.href='dashboard.php';</script>";
                } else {
                    echo "<script>alert('Account not active. Please update your password.');</script>";
                    echo "<script>window.location.href='update_district_password.php?name=$name';</script>";
                }
            } else {
                echo "<script>alert('Invalid credentials');</script>";
            }
        }
        
     
    
        ?>
        
</body>
</html>