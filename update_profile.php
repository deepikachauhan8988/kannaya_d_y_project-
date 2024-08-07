<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome Page</title>
</head>

<body>

    <?php
    $localhost = "localhost";
    $root = "root";
    $password = "";
    $db = "k_d_y";
    $con = mysqli_connect($localhost, $root, $password, $db);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update User Details</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="user-name" class="col-form-label">Name:<span style="color: red;">*</span></label>
                            <input type="text" name="user-name" class="form-control" id="user-name" placeholder="Enter Your Name" required>
                        </div>

                        <div class="mb-3">
                            <label for="pass-text" class="col-form-label">Password:<span style="color: red;">*</span></label>
                            <input class="form-control" name="user-password" type="text" id="pass-text" placeholder="Password" required></input>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" name="update-form" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['update-form'])) {
        $emp_name = $_POST['user-name'];
        $password = $_POST['user-password'];

        $sql = "UPDATE district_t SET password='$password',status='unverified' WHERE emp_name = '$emp_name'";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Password Updated successfully');</script>";
            // echo "<script>window.location.href='Login.php';</script>";
        } else {
            echo "<script>alert('Error updating password');</script>";
        }
    }

    $con->close();
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            myModal.show();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
