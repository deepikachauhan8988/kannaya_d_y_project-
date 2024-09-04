<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables JS -->
   
    <!-- Bootstrap JS (Optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
session_start();
       $sql="SELECT * FROM condidate_table";
//  echo   $sql = "SELECT * FROM condidate_table WHERE  district = '" . htmlspecialchars($_SESSION['district']) . "' AND block = '" . htmlspecialchars($_SESSION['project_name']) . "'";
$result = mysqli_query($con, $sql) or die("Error: Database query failed");
?>
    <div class="table-responsive">
        <h2 class="text-center">Candidate Data</h2>
      
        <table id="candidateTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <!-- Table Headers -->
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
                </tr>
            </thead>
            <tbody>
                <?php
                // session_start(); // Start the session

                include "./config.php"; // Include your database connection

                // Debugging: Check if session variables are set
                // if (!isset($_SESSION['district']) || !isset($_SESSION['block'])) {
                //     echo "<tr><td colspan='22'>Session variables 'district' or 'block' are not set. Please log in again.</td></tr>";
                // } else {
                //     // Sanitize session variables
                //     $district = mysqli_real_escape_string($con, $_SESSION['district']);
                //     $block = mysqli_real_escape_string($con, $_SESSION['block']);

                    // Query to fetch data from the database
                   
                    
                if (mysqli_num_rows($result) > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                       
                        $bgColor = ($row['statuse'] == 'verified') ? 'background-color: lightgreen;' : (($row['statuse'] == 'unverifide') ? 'background-color: lightcoral;' : '');
                    
                        echo "<tr style='$bgColor'>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
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
                            echo "<td>
                                <form method='post' action='update_statuse.php' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                    <input type='hidden' name='statuse' value='verified'>
                                    <button type='submit' class='btn btn-success btn-sm'>Verified</button>
                                </form>
                                <form method='post' action='update_statuse.php' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                    <input type='hidden' name='statuse' value='unverifide'>
                                    <button type='submit' class='btn btn-danger btn-sm'>Unverified</button>
                                </form>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='22'>No records found.</td></tr>";
                    }
                    
                ?>
            </tbody>
            <ol>
                <li><a href="./Login_type_page.php">login type</a> </li>
                <li><a href="./condidate_regi.php">condidate registration</a</li>
                <li><a href="./district_regis.php">district registration</a></li>
                <li><a href="./project_regi.php">project registration</a></li>
                <li><a href="./update_dis_pass.php">Update_district password</a></li>
                <li><a href="./district_regis.php">district registration</a></li>
                <li><a href="./district_regis.php">district registration</a></li>
                </ol>
        </table>
    </div>

    
   
</body>
</html>
