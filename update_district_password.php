<?php
include "./config.php";

if (isset($_POST['updatePassword'])) {
    // Securely retrieve and escape inputs
    $emp_name = mysqli_real_escape_string($con, $_POST['name']);
    $newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);
    
    // Hash the new password before storing it
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Construct the SQL query
    $query = "UPDATE new_district SET password='$hashedPassword', status='active' WHERE emp_name='$emp_name'";

    // Execute the query and check for success
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Password updated successfully');</script>";
        echo "<script>window.location.href='district_login_page.php';</script>"; // Redirect to login page
    } else {
        echo "<script>alert('Error updating password');</script>";
    }
}

// Retrieve the name parameter securely
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Update Password</h2>
        <form id="updatePasswordForm" method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" required>
            </div>

            <div class="form-group">
                <input type="submit" name="updatePassword" value="Update Password">
            </div>
        </form>
    </div>
</body>
</html>
