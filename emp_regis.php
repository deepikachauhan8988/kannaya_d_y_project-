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

    // Handle form submission
   
    ?>
    <div class="container-fluid">
        <form class="mx-auto" name="myform" id="blockLoginForm" onsubmit="return validate()">
            <h3 class="form-text">employ registration</h3>
            <div class="mb-3 mt-5">
                <label for="phone1" class="form-label">employ Name</label>
                <input type="text" placeholder="Enter name" id="phone1" name="name" class="form-control">
            </div>
            <div class="modal-body">
            <div class="mb-3 mt-5">
                <label for="deg" class="form-label">desg</label>
                <input type="text" placeholder="Enter desgg" id="deg" name="desg" class="form-control">
            </div>
           
            <div class="mb-3">
                <label for="mobile" class="form-label">mobile</label>
                <input type="text" placeholder="Enter mobile no" id="mobile" name="mobile" class="form-control"value="6398239823">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" placeholder="Enter email" id="email" name="password" class="form-control">
            </div>
            <div class="form-group">
                <optgroup label="district">Choose District for samiti
                        Login:</optgroup>
                       <select name="district" class="form-control">
                        <option selected="" disabled="">Choose District Name
                       <?php
                        $sql = mysqli_query($con, "select DISTINCT * from district_t");
                                                                  
                                                                   while ($row = mysqli_fetch_array($sql)) {
                                                                    $district=$row['district'];
                                                                   ?>
                                                                    <option value="<?php echo $row['district']; ?>">
                                                                        <?php echo $row['district']; ?>
                                                                    </option>
                                                               
                                                                    <?php } ?>
                                                                    
                                                                </select>
                                                              
                </div>
                <div class="form-group">
                    <optgroup label="Block">Choose Block for samiti
                            Login:</optgroup>
                           <select name="Block" class="form-control">
                            <option selected="" disabled="">Choose Block Name
                          
                            <?php
                        $sql = "select * from project_t";
                       $result=mysqli_query($con, $sql);
                                                                  
                                                                   while ($row = mysqli_fetch_array($result)) {
                                                                    $district=$row['project'];
                                                                   ?>
                                                                    <option value="<?php echo $row['project']; ?>">
                                                                        <?php echo $row['project']; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                    
                                                                </select>
                        
                    </div>
                    <div class="form-group">
    <optgroup label="sector">Choose sector for samiti Login:</optgroup>
    <select name="district" class="form-control">
        <option selected="" disabled="">Choose sector Name</option>
        <?php
        $sql = "SELECT * FROM sector_t";
        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $district = $row['sector'];
                ?>
                <option value="<?php echo $district; ?>">
                    <?php echo $district; ?>
                </option>
                <?php
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
        ?>
    </select>
</div>

               <div class="mb-3">
                <label for="email" class="form-label">statue</label>
                <input type="radio" name="logintp" value="verifide" class="mx-2" id="s_l">verifide
                <input type="radio" name="logintp" value="unverifide" class="mx-2" id="s_l">unverifide
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">password</label>
                <input type="password" placeholder="Enter password" id="pass" name="password" class="form-control">
                <?php
    if (isset($_POST['update-submit'])) {
        $emp_name = $_POST['name'];
        $password = $_POST['password'];

        $sql = "UPDATE district_t SET password='$password',status='unverifide' WHERE emp_name = '$emp_name'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Password Updated successfully')</script>";
            // echo "<script>window.location.href='Login.php';</script>";
        } else {
            echo "<script>alert('Error')</script>";
        }
    }


    ?>

            </div>
           
            <div class="mb-3">
                <button type="submit" name="update_submit" class="btn btn-primary mt-4" value="submit">Login</button>
            </div>
        </form>
        </div>
    </div>

   
    </script>
</body>

</html>