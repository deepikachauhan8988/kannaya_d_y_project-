<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Display Data Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  body{
    background-color: #e0f7fa;
  }
  .container{
    width: 500px; 
  min-height: 400px; 
  background-color: #ffffff; 
  border-radius: 20px; 
  padding: 20px; 
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
  margin: 0 auto; 
   
  }
  .form-label{
    float: left;
    font-weight: bold;
  }
  .form-control{
    border-radius:20px;
    width: 100%;
    padding: 10px; 
    box-sizing: border-box; 
  }

  
  </style>
<body>
  <?php
  include './config.php';

  // Check if connection was successful
  if (!$con) {
      die("Error: Could not connect to the database. " . mysqli_connect_error());
  }

  // Sanitize and retrieve condition ID from GET request
  $condi_id = isset($_GET['condi_id']) ? mysqli_real_escape_string($con, $_GET['condi_id']) : '';

  if (!empty($condi_id)) {
      // SQL query to select data for a specific condi_id
      $sql = "SELECT condidate_table.condi_id,condidate_table.district,condidate_table.block,condidate_table.sector,condidate_table.village,
      condidate_table.guardion_addahr,condidate_table.condidate_name,condidate_table.child_d_o_b,condidate_table.child_add_n,
      condidate_table.mother_c_number,condidate_table.father_name,
      condidate_table.mother_name,condidate_table.gender,condidate_table.caste_category,condidate_table.bank_type,condidate_table.Account_no,condidate_table.IFSC_code,
      condidate_table.qualification,condidate_table.relation_with_F,condidate_table.father_name,condidate_table.mother_name,condidate_table.address,condidate_table.contact_no,condidate_table.statuse,
                     add_pay.start_pay, add_pay.start_date, 
                     add_pay.part_pay, add_pay.end_date
              FROM condidate_table
              INNER JOIN add_pay ON condidate_table.condi_id = add_pay.condi_id
              WHERE condidate_table.condi_id = '$condi_id'";

      $result = mysqli_query($con, $sql);

      if (!$result) {
          die("Error: Database query failed. " . mysqli_error($con));
      }

      $data = mysqli_fetch_assoc($result);
  } else {
      echo "<p>No condition ID provided.</p>";
      $data = false;
  }

  mysqli_close($con);
  ?>

  <div class="container mt-4 ">
    <h2 class="text-center mb-4"style=" font-weight: bold;">Candidate Details</h2>

    <?php if ($data) { ?>
    <form>
      <div class="mb-3">
        <label for="condi_id" class="form-label">Candidate ID</label>
        <input type="text" class="form-control" id="condi_id" value="<?php echo htmlspecialchars($data['condi_id']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="district" class="form-label">District</label>
        <input type="text" class="form-control" id="district" value="<?php echo htmlspecialchars($data['district']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="block" class="form-label">Block</label>
        <input type="text" class="form-control" id="block" value="<?php echo htmlspecialchars($data['block']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="sector" class="form-label">Sector</label>
        <input type="text" class="form-control" id="sector" value="<?php echo htmlspecialchars($data['sector']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="village" class="form-label">Village</label>
        <input type="text" class="form-control" id="village" value="<?php echo htmlspecialchars($data['village']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="guardian_addahr" class="form-label">Guardian Aadhar</label>
        <input type="text" class="form-control" id="guardian_addahr" value="<?php echo htmlspecialchars($data['guardion_addahr']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="mother_c_number" class="form-label">Mother Contact Number</label>
        <input type="text" class="form-control" id="mother_c_number" value="<?php echo htmlspecialchars($data['mother_c_number']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="mother_name" class="form-label">Mother Name</label>
        <input type="text" class="form-control" id="mother_name" value="<?php echo htmlspecialchars($data['mother_name']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="condidate_name" class="form-label">Candidate Name</label>
        <input type="text" class="form-control" id="condidate_name" value="<?php echo htmlspecialchars($data['condidate_name']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="condidate_name" class="form-label">Candidate Name</label>
        <input type="text" class="form-control" id="condidate_name" value="<?php echo htmlspecialchars($data['qualification']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="relation_with_F" class="form-label">Relation with Father</label>
        <input type="text" class="form-control" id="relation_with_F" value="<?php echo htmlspecialchars($data['relation_with_F']); ?>" readonly>
      </div>
      
      <div class="mb-3">
        <label for="child_d_o_b" class="form-label">Child Date of Birth</label>
        <input type="text" class="form-control" id="child_d_o_b" value="<?php echo htmlspecialchars($data['child_d_o_b']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="child_add_n" class="form-label">Child Address</label>
        <input type="text" class="form-control" id="child_add_n" value="<?php echo htmlspecialchars($data['child_add_n']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="mother_name" class="form-label">Mother Name</label>
        <input type="text" class="form-control" id="mother_name" value="<?php echo htmlspecialchars($data['mother_c_number']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="father_name" class="form-label">Father Name</label>
        <input type="text" class="form-control" id="father_name" value="<?php echo htmlspecialchars($data['father_name']); ?>" readonly>
      </div>
      
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" value="<?php echo htmlspecialchars($data['address']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="contact_no" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="contact_no" value="<?php echo htmlspecialchars($data['contact_no']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="statuse" class="form-label">Status</label>
        <input type="text" class="form-control" id="statuse" value="<?php echo htmlspecialchars($data['statuse']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="start_pay" class="form-label">Start Pay</label>
        <input type="text" class="form-control" id="start_pay" value="<?php echo htmlspecialchars($data['start_pay']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="text" class="form-control" id="start_date" value="<?php echo htmlspecialchars($data['start_date']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="part_pay" class="form-label">Part Pay</label>
        <input type="text" class="form-control" id="part_pay" value="<?php echo htmlspecialchars($data['part_pay']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="text" class="form-control" id="end_date" value="<?php echo htmlspecialchars($data['end_date']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="end_date" class="form-label">Submit</label>
        <button type="button"name="submit"class="btn btn-primary"style="margin-left:130px">submit</button>
      </div>

    </form>
    <?php } elseif ($data === false) {
        echo "<p>No records found for the provided ID.</p>";
    } ?>
  </div>
</body>
</html>
