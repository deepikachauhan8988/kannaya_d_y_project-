<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
  <link href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <title>Verified Accounts</title>
</head>
<script>

new DataTable('#example');
    </script>

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
    session_start();

    // // Query to get verified accounts
    // $condi_id = isset($_GET['condi_id']) ? mysqli_real_escape_string($con, $_GET['condi_id']) : '';
    $sql = "SELECT * FROM condidate_table WHERE statuse = 'verified'";
    $result = mysqli_query($con, $sql) or die("Error: " . mysqli_error($con));
    ?>
    
    <div class="container mt-2">
        <h3 class="text-center mb-3">Verified Account Details</h3>
        <table id="candidateTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Candidate ID</th>
                    <th>District</th>
                    <th>Block</th>
                    <th>Sector</th>
                    <th>Village</th>
                    <th>Guardian Aadhaar</th>
                    <th>Candidate Name</th>
                    <th>Child Date of Birth</th>
                    <th>Child Aadhaar Number</th>
                    <th>Mother Contact No</th>
                    <th>Relation with Family</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Gender</th>
                    <th>Caste Category</th>
                    <th>Bank Type</th>
                    <th>Account No</th>
                    <th>IFSC Code</th>
                    <th>Qualification</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>View Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($result) > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        echo "<tr>";
                        echo "<td>" . $count++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['condi_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['district']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['block']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['sector']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['village']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['guardion_addahr']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['condidate_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['child_d_o_b']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['child_add_n']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mother_c_number']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['relation_with_F']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['father_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mother_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['caste_category']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['bank_type']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Account_no']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['IFSC_code']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['qualification']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['contact_no']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['statuse']) . "</td>";
                        echo "<td><a href='Add_payment.php?condi_id=".htmlspecialchars($row['condi_id'])."'class='btn btn-warning'>Add Payment</a></td>";
                        echo "<td><a href='Display_pay.php?condi_id=".htmlspecialchars($row['condi_id'])."' class='btn btn-primary'>View Payment</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='22'>No records found.</td></tr>";
                }
                ?>
            </tbody>
        </style=>
    </div>

    <!-- JavaScript Libraries -->

    <script>

new DataTable('#example', {
    scrollX: true,
    scrollY: 500
});


    </script>
</body>
</html>
