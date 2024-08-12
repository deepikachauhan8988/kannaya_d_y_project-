<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/block_login.css">
    <title>Emp_registration</title>
</head>

<body>
    <?php
    // Database connection
    $localhost = "localhost";
    $root = "root";
    $password = "";
    $db = "k_d_y";
    $con = mysqli_connect($localhost, $root, $password, $db);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['signup'])) {
        $emp_name = mysqli_real_escape_string($con, $_POST['emp_name']);
        $desg = mysqli_real_escape_string($con, $_POST['desg']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $project = mysqli_real_escape_string($con, $_POST['project']);
        $sector = mysqli_real_escape_string($con, $_POST['sector']);
        $district = mysqli_real_escape_string($con, $_POST['district']);
        $status = mysqli_real_escape_string($con, $_POST['logintp']);
        $password = '12345'; // Default password

        $sql = "INSERT INTO new_district (emp_name, desg, mobile, email, project, sector, district, password, status)
                VALUES ('$emp_name', '$desg', '$mobile', '$email', '$project', '$sector', '$district', '$password', '$status')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Signup successful. Please update your password.');</script>";
            echo "<script>window.location.href='update_district_password.php';</script>";
        } else {
            echo "<script>alert('Error during signup: " . mysqli_error($con) . "');</script>";
        }
    }
    ?>

    <div class="container-fluid">
        <form class="mx-auto" name="myform" id="blockLoginForm" method="POST" action="">
            <h3 class="form-text">Employee Registration</h3>
            <div class="mb-3 mt-5">
                <label for="emp_name" class="form-label">Employee Name</label>
                <input type="text" placeholder="Enter name" id="emp_name" name="emp_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="desg" class="form-label">Designation</label>
                <select name="desg" id="desg" class="form-control" required>
                    <option selected="" disabled="">Choose desg Name</option>
                    <option>DPO</option>
                    <option>CDPO</option>
                    <option>supervisor</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" placeholder="Enter mobile number" id="mobile" name="mobile" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" placeholder="Enter email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="sector"value="sector"readonly>Sector Name:</label>
                <select name="sector" id="sector" class="form-control" required>
                    <option selected="" disabled="">Choose Sector Name</option>
                    <?php
                    $sql = "SELECT DISTINCT sector FROM sector_t";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['sector'] . "'>" . $row['sector'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No sectors found</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="district">District Name:</label>
                <select name="district" id="district" class="form-control" required>
                    <option selected="" disabled="">Choose District Name</option>
                    <?php
                    $sql = "SELECT DISTINCT district FROM district_t";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No districts found</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="project">Project Name:</label>
                <select name="project" id="project" class="form-control" required>
                    <option selected="" disabled="">Choose Project Name</option>
                    <?php
                    $sql = "SELECT DISTINCT project FROM project_t";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['project'] . "'>" . $row['project'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No projects found</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="logintp" class="form-label">Status</label><br>
                <input type="radio" name="logintp" value="verified" class="mx-2" required> Verified
                <input type="radio" name="logintp" value="unverified" class="mx-2" required checked id="unverifide"> Unverified
            </div>

            <div class="mb-3">
                <button type="submit" name="signup" class="btn btn-primary mt-4">Register</button>
            </div>
        </form>
    </div>
</body>

</html>
