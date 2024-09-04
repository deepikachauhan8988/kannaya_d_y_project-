<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap 5 Website Example</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  
</head>

<body>
   <!-- Scripts -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#candidateTable').DataTable({
                "scrollX": true
            });
        })
           </script> 
  <?php
  include './config.php';

  // Check if connection was successful
  if (!$con) {
      die("Error: Could not connect to the database. " . mysqli_connect_error());
  }
  // Sanitize and retrieve condition ID from GET request
  $condi_id = isset($_GET['condi_id']) ? mysqli_real_escape_string($con, $_GET['condi_id']) : '';

  if (!empty($condi_id)) 
  {
      // Correct SQL query to select data for a specific condi_id
      $sql = "SELECT condidate_table.condi_id,condidate_table.district,condidate_table.block,condidate_table.sector,condidate_table.village,condidate_table.guardion_addahr,condidate_table.condidate_name,condidate_table.relation_with_F,condidate_table.child_d_o_b,condidate_table.child_add_n,condidate_table.mother_c_number,condidate_table.father_name,
      condidate_table.mother_name,condidate_table.gender,condidate_table.caste_category,condidate_table.bank_type,condidate_table.Account_no,condidate_table.IFSC_code,condidate_table.qualification,condidate_table.relation_with_F,condidate_table.father_name,condidate_table.mother_name,condidate_table.address,condidate_table.contact_no,condidate_table.statuse,
                     add_pay.start_pay, add_pay.start_date, 
                     add_pay.part_pay, add_pay.end_date
              FROM condidate_table
              INNER JOIN add_pay ON condidate_table.condi_id = add_pay.condi_id
              WHERE condidate_table.condi_id = '$condi_id'";

      $result = mysqli_query($con, $sql);

      if (!$result) {
          die("Error: Database query failed. " . mysqli_error($con));
      }
  } else {
      echo "<p>No condition ID provided.</p>";
      $result = false;
  }
  ?>

  <div class="container p-3 bg-primary">
    <h2 class="text-center text-white">Display Data</h2>
  </div>

  <div class="container mt-3">
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
    ?>
    <table id="candidateTable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Candi id</th>
          <th>district</th>
          <th>Block</th>
          <th>sector</th>
          <th>village</th>
          <th>guardion_addahr</th>
          <th>Name</th>
          <th>child_d_o_b</th>
          <th>child_add_n</th>
          <th>mother_c_number</th>
          <th>relation_with_F</th>
          <th>father_name</th>
          <th>mother_name</th>
          <th>gender</th>
          <th>caste_category</th>
          <th>bank_type</th>
          <th>Account_no</th>
          <th>IFSC_code</th>
          <th>Qualification</th>
          <th>address</th>
          <th>contact_no</th>
          <th>statuse</th>
          
          <th>Start Pay</th>
          <th>Start Date</th>
          <th>Part Pay</th>
          <th>End Date</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) 
        { ?>
        <tr>
          
        <td><a href="Display_sector_list.php?condi_id=<?php echo urlencode($row['condi_id']); ?>"><?php echo htmlspecialchars($row['condi_id']); ?></a></td>
        <td><?php echo htmlspecialchars($row['district']); ?></td>
        <td><?php echo htmlspecialchars($row['block']); ?></td>
        <td><?php echo htmlspecialchars($row['sector']); ?></td>
        <td><?php echo htmlspecialchars($row['village']); ?></td>
        <td><?php echo htmlspecialchars($row['guardion_addahr']); ?></td>
        <td><?php echo htmlspecialchars($row['condidate_name']); ?></td>
        <td><?php echo htmlspecialchars($row['child_d_o_b']); ?></td>
        <td><?php echo htmlspecialchars($row['child_add_n']); ?></td>
        <td><?php echo htmlspecialchars($row['mother_c_number']); ?></td>
        <td><?php echo htmlspecialchars($row['relation_with_F']); ?></td>
        <td><?php echo htmlspecialchars($row['father_name']); ?></td>
        <td><?php echo htmlspecialchars($row['mother_name']); ?></td>
        <td><?php echo htmlspecialchars($row['gender']); ?></td>
        <td><?php echo htmlspecialchars($row['caste_category']); ?></td>
        <td><?php echo htmlspecialchars($row['bank_type']); ?></td>
        <td><?php echo htmlspecialchars($row['Account_no']); ?></td>
        <td><?php echo htmlspecialchars($row['IFSC_code']); ?></td>
        <td><?php echo htmlspecialchars($row['qualification']); ?></td>
        <td><?php echo htmlspecialchars($row['address']); ?></td>
        <td><?php echo htmlspecialchars($row['contact_no']); ?></td>
        <td><?php echo htmlspecialchars($row['statuse']); ?></td>
          
          <td><?php echo htmlspecialchars($row['start_pay']); ?></td>
          <td><?php echo htmlspecialchars($row['start_date']); ?></td>
          <td><?php echo htmlspecialchars($row['part_pay']); ?></td>
          <td><?php echo htmlspecialchars($row['end_date']); ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php
    } elseif ($result && mysqli_num_rows($result) == 0) {
        echo "<p>No records found for the provided ID.</p>";
    }
    
    mysqli_close($con);
    ?>
  </div>
  
</body>
</html>
