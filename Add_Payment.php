<?php
session_start(); // Start the session

include './config.php';  // Ensure this file contains your database connection

// Set the candidate ID from the session if it's available
// $selected_condi_id = isset($_SESSION['condi_id']) ? $_SESSION['condi_id'] : '';

if (isset($_POST['Pay_submit'])) {
    // Sanitize and validate input data
    $condi_id = $_POST['condi_id'];
    $start_pay = $_POST['start_pay'];
    $start_date = $_POST['start_date'];
    $new_date = new DateTime($start_date);
    $new_date->modify('+14 years');
    $end_date = $new_date->format('Y-m-d');
    $part_pay = $_POST['part_pay'];

    // Store selected candidate ID in the session
    $_SESSION['condi_id'] = $condi_id;

    // Prepare SQL statement
    $stmt = $con->prepare("INSERT INTO add_pay (condi_id, start_pay, start_date, part_pay, end_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $condi_id, $start_pay, $start_date, $part_pay, $end_date);

    // Execute and check result
    if ($stmt->execute()) {
        echo "<script>alert('Payment updated successfully');</script>";
        echo "<script>window.location.href='Login_type_page.php'</script>";
    } else {
        echo "<script>alert('Data not inserted successfully: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Add Payment</h2>
  <form action="" method="post">
    <div class="mb-3">
      <label for="condi_id" class="form-label">Candidate ID:</label>
    
        <?php
         $condi_id = isset($_GET['condi_id']) ? mysqli_real_escape_string($con, $_GET['condi_id']) : '';
         ?>
         <input type='text' name="condi_id" class="form-control" value="<?php 
         if(isset($_GET['condi_id']))
         {
          $condi_id=$_GET['condi_id'];
          $sql = "SELECT * FROM condidate_table where condi_id='$condi_id'";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo  $condi_id = $row['condi_id'];
                    
              }
          } 
         }
        ?>" >
    </div>
    <div class="mb-3">
      <label for="start_pay" class="form-label">Start Payment:</label>
      <input type="text" class="form-control" id="start_pay" placeholder="Enter start payment" name="start_pay" required>
    </div>
    <div class="mb-3">
      <label for="start_date" class="form-label">Starting Payment Date:</label>
      <input type="date" name="start_date" class="form-control" id="start_date" required>
    </div>
    <div class="mb-3">
      <label for="part_pay" class="form-label">Part Payment:</label>
      <input type="text" name="part_pay" class="form-control" id="part_pay" placeholder="Enter part payment" required>
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" name="Pay_submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
