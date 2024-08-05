<!doctype html>
<html lang="en">

<head>
    <?php
$localhost="localhost";
$root="root";
$password="";
$db="k_d_y";
$con=mysqli_connect($localhost,$root,$password,$db);
?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../CSS/state_login.css"> -->
    <title>Block Login</title>

</head>

<body>
    <div class="auth-maintenance d-flex align-items-center min-vh-100" style="margin-right:200px">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100 py-0 py-xl-3">
                                <div class="text-center mb-3">

                                    <h2 class="mt-2 pt-2 pb-2"
                                        style="color:black; background-color:light-blue; border:2px solid black; border-radius:5px;">
                                        <!-- महिला सशक्तिकरण एवं बाल विकास विभाग </h2> -->
                                         admin login
                                </div>

                                <div class="card my-auto overflow-hidden"
                                    style="background-color:light-blue; border:2px solid black;">
                                    <div class="row g-0">
                                        <div class="col-lg-6">
                                            <div class="bg-overlay bg-primary"></div>
                                            <div class="h-100 bg-auth align-items-end">
                                            </div>
                                        </div>

                                        <div class="col-lg-6" style="margin-right:200px">
                                            <div class="p-lg-5 p-4">
                                                <div>
                                                    <!-- <div class="text-center mt-1">
                                                        <a href="" class="">
                                                            <img src="assets/images/icds.jpeg" alt="" height="55" class="auth-logo logo-dark mx-auto">
                                                            <img src="assets/images/logo-light.png" alt="" height="22" class="auth-logo logo-light mx-auto">
                                                        </a>
                                                        <h4 class="font-size-18">Welcome Back !</h4>
                                                        <p class="text-muted">Choose Login type to login.</p>
                                                    </div> -->
                                                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-success">Click me</button> -->
                                                    <form class="form-login" action="" method="POST">
                                                        <!-- <h2 class="form-login-heading" style="background-color: #b82929;">Admin Login <i class="fa fa-lock"></i></h2> -->
                                                        <div class="login-wrap">
                                                            <div class="form-group row">
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <label>state</label>
                                                                    <input type="radio" name="login_type"
                                                                        value="Directorate" checked id="Directorate">
                                                                </div>
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <label>District</label>
                                                                    <input type="radio" name="login_type" value="tech"
                                                                        id="">
                                                                </div>
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <label>block </label>
                                                                    <input type="radio" name="login_type" value="DPO"
                                                                        id="DPO">
                                                                </div>
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <label>sector</label>
                                                                    <input type="radio" name="login_type" value="CDPO"
                                                                        id="CDPO">
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </form>
                                                    <form method="POST" action="">
                                                        <div id="Directer">
                                                            <h4 style="text-align:center;">state Login</h4>
                                                            <div class="form-group">
                                                                <label for="text">Login Type:</label>
                                                                <input type="text" name="type" class="form-control"
                                                                    value="state" readonly="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="text">Login Password:</label>
                                                                <input type="password" name="password"
                                                                    class="form-control" value="" required=""
                                                                    pattern="[^'\x22]+" title="Invalid input">
                                                            </div>

                                                            <div class="form-group">
                                                                <center><button type="submit" name="dir_login"
                                                                        class="btn btn-danger mt-2">Login</button>
                                                                </center>
                                                            </div>
                                                        </div>

                                                    </form>
                                                    <form method="POST" action="">
                                                        <div id="techer" style="display:none;">
                                                            <h4 style="text-align:center;">district </h4>

                                                            <div class="form-group">
                                                                <label for="text">Login Type:</label>
                                                                <input type="text" name="type" class="form-control"
                                                                    value="District" readonly="">
                                                            </div>
                                                            <div class="form-group">
                                                            <optgroup label="district">Choose District for samiti
                                                                    Login:</optgroup>
                                                                   <select name="district" class="form-control">
                                                                    <option selected="" disabled="">Choose District Name
                                                                    </option>

                                                                 
                                                                    
                                                                    <?php
                                                                    
                                                                   $sql = mysqli_query($con, "select * from all_table");
                                                                   while ($row = mysqli_fetch_array($sql)) {
                                                                   ?>
                                                                    <option value="<?php echo $row['sdname']; ?>">
                                                                        <?php echo $row['district']; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="text">Login Password:</label>
                                                                <input type="password" name="password"
                                                                    class="form-control" value="" required=""
                                                                    pattern="[^'\x22]+" title="Invalid input">
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" name="tech_login"
                                                                    class="btn btn-info">Login</button>
                                                            </div>

                                                            <?php 
                                          if(isset($_POST['tech_login']))
                                           {
                                            $loginType=$_POST['Type'];
                        
                                            $district=$_POST['district'];
                                            $master_pass=$_POST['password'];
                                          
                                            $sql="SELECT * FROM all_table WHERE district='$district' AND password='$password'";
                                            $result=mysqli_query($con, $sql)or die("Error");
                                            if($result)
                                            {
                                                echo "<script>alert('Login successfully')</script>";
                                                echo "<script>window.open('update_profile.php')</script>";
                                            }
                                        
                                        }
                                            ?>
                                                        </div>
                                                    </form>
                                                    <form method="POST" action="">
                                                        <div id="dser" style="display:none;">
                                                            <h4 style="text-align:center;">block Login</h4>

                                                            <div class="form-group">
                                                                <label for="text">Login Type:</label>
                                                                <input type="text" name="type" class="form-control"
                                                                    value="Block" readonly="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="text">Choose District for samiti
                                                                    Login:</label>
                                                                <select name="district" class="form-control">
                                                                    <option selected="" disabled="">Choose District Name
                                                                    </option>
                                                                    <?php
                                                                    
                                                                   $sql = mysqli_query($con, "select * from all_table");
                                                                  
                                                                   while ($row = mysqli_fetch_array($sql)) {
                                                                   ?>
                                                                    <option value="<?php echo $row['sdname']; ?>">
                                                                        <?php echo $row['district']; ?>
                                                                    </option>
                                                               
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="text">Login Password:</label>
                                                                <input type="password" name="password"
                                                                    class="form-control" value="" required=""
                                                                    pattern="[^'\x22]+" title="Invalid input">
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" name="dpo_login"
                                                                    class="btn btn-info">Login</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                    <form method="POST" action="">
                                                        <div id="cdper" style="display:none;">
                                                            <h4 style="text-align:center;">Block Login</h4>

                                                            <div class="form-group">
                                                                <label for="text">Login Type:</label>
                                                                <input type="text" name="type" class="form-control"
                                                                    value="sector" readonly="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="text">Project Name:</label>
                                                                <select name="project_name" class="form-control">
                                                                    <option selected="" disabled="">Choose project Name
                                                                    </option>
                                                                    <?php
                                                                    $sql = mysqli_query($con, "select * from all_table");
                                                                    while ($row = mysqli_fetch_array($sql)) {
                                                                        $distc = $row['district'];
                                                                        $dists = $row['sdname'];
                                                                    ?>
                                                                    <optgroup label="<?php echo $distc; ?>">
                                                                        <?php
                                                                            $sqla = mysqli_query($con, "select * from all_table where sdname='$dists'");
                                                                            while ($rowa = mysqli_fetch_array($sqla)) {
                                                                            ?>
                                                                        <option
                                                                            value="<?php echo $rowa['project_name']; ?>">
                                                                            <?php echo $rowa['project_name']; ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                    </optgroup>
                                                                    <?php } ?>
                                                                </select>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="text">Login Password:</label>
                                                                <input type="password" name="password"
                                                                    class="form-control" value="" required=""
                                                                    pattern="[^'\x22]+" title="Invalid input">
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" name="cdpo_login"
                                                                    class="btn btn-info">Login</button>
                                                            </div>
                                                            <?php
                                                   
                                                
                                                   if(isset($_POST['sector_log']))
                                                   {
                                                       $loginType=$_POST['type'];
                                                       $sector=$_POST['sector_name'];
                                                       $districtName=$_POST['district_name'];
                                                       $Password=$_POST['LoginPassword'];
                                                       $sql="SELECT * FROM sector_district WHERE sector='$sectorName' AND district='$districtName' AND def_password='$Password'";
                                                       $result=mysqli_query($con, $sql)or die("Error");
                                                       if($result)
                                                       {
                                                           echo "<script>alert('Login successfully')</script>";
                                                           echo "<script>window.open('welcome.php')</script>";
                                                       }
                                                   
                                                   }
                                                       ?>


                                                        </div>
                                                    </form>

                                                    <form method="POST" action="">
                                                        <div id="secer" style="display:none;">
                                                            <h4 style="text-align:center;">Sector Login</h4>

                                                            <div class="form-group">
                                                                <label for="text">Login Type:</label>
                                                                <input type="text" name="type" class="form-control"
                                                                    value="Sector" readonly="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="text">District Name:</label>
                                                                <select name="district" class="form-control"
                                                                    onChange="getSector(this.value);">
                                                                    <option selected="" disabled="">Choose District Name
                                                                    </option>

                                                                </select>
                                                            </div>
                                                            <!-- not und -->
                                                            <script>
                                                                function getSector(val) {
                                                                    $.ajax({
                                                                        type: 'post',
                                                                        url: 'sect_choose.php',
                                                                        data: 'district=' + val,
                                                                        success: function (data) {
                                                                            console.log(data);
                                                                            $("#sect-list").html(data);
                                                                        }
                                                                    });
                                                                }
                                                            </script>

                                                            <div class="form-group">
                                                                <label style="color:#000000;"><b>Choose
                                                                        Sector</b></label>
                                                                <select name="sector" required="" id="sect-list"
                                                                    class="form-control">
                                                                    <option>Choose district to show Sector List</option>

                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="text">Login Password:</label>
                                                                <input type="password" name="password"
                                                                    class="form-control" value="" required=""
                                                                    pattern="[^'\x22]+" title="Invalid input">
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" name="sect_login"
                                                                    class="btn btn-info">Login</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                    <div id="awwer" style="display:none;">
                                                        <h4 style="text-align:center;">Anganwadi Worker/helper Login
                                                        </h4>
                                                        <center> <small
                                                                style="color:red; text-decoration:underline;">Note: If
                                                                you are not able to Login contact your CDPO or Technical
                                                                Helpline(76681 51041)</small></center>

                                                        <div class="row">

                                                            <form id="otpForm" method="POST" action="">
                                                                <div class="form-group">
                                                                    <label for="text">Center Code:</label>
                                                                    <input type="text" name="mob_num"
                                                                        class="form-control" value="" required
                                                                        pattern="[0-9]{10}"
                                                                        title="Enter 10 Digit Center code"
                                                                        placeholder="Enter 10 Digit Center code">
                                                                </div>

                                                                <div class="form-group">
                                                                    <center>
                                                                        <button type="button" id="proceedButton"
                                                                            class="btn btn-info mt-2">Proceed <i
                                                                                class="fa fa-arrow-right"></i></button>
                                                                    </center>
                                                                    <center>
                                                                        <small
                                                                            style="color:red; text-decoration:underline;">After
                                                                            Proceeding you will receive OTP on your
                                                                            Number, Be ready to Submit OTP for
                                                                            Authentication</small>
                                                                    </center>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- <div class="mt-4 text-center">
                                                    <p class="mb-0">Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Register </a> </p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <!-- <div class="mt-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> State Portal WECD Uttarakhand. Developed by <a href="https://www.brainrock.in">BRAINROCK</a></p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
    <?php


    // ?>
    <script>
        document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
            e.addEventListener('change', function () {
                if (this.value == "Directorate") {
                    Directer.style.display = "block";
                } else {
                    Directer.style.display = "none";
                }
            })
        })
    </script>

    <script>
        document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
            e.addEventListener('change', function () {
                if (this.value == "tech") {
                    techer.style.display = "block";
                } else {
                    techer.style.display = "none";
                }
            })
        })
    </script>
    <script>
        document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
            e.addEventListener('change', function () {
                if (this.value == "DPO") {
                    dper.style.display = "block";
                } else {
                    dper.style.display = "none";
                }
            })
        })
    </script>
    <script>
        document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
            e.addEventListener('change', function () {
                if (this.value == "DPO") {
                    dser.style.display = "block";
                } else {
                    dser.style.display = "none";
                }
            })
        })
    </script>
    <script>
        document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
            e.addEventListener('change', function () {
                if (this.value == "aww") {
                    awwer.style.display = "block";
                } else {
                    awwer.style.display = "none";
                }
            })
        })
    </script>

    <script>
        document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
            e.addEventListener('change', function () {
                if (this.value == "CDPO") {
                    cdper.style.display = "block";
                } else {
                    cdper.style.display = "none";
                }
            })
        })
    </script>

    <script>
        document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
            e.addEventListener('change', function () {
                if (this.value == "Sector") {
                    secer.style.display = "block";
                } else {
                    secer.style.display = "none";
                }
            })
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- <script>
        $(document).ready(function() {
            // Handle click event for the proceed button
            $('#proceedButton').click(function() {
                // Show SweetAlert2 input modal
                Swal.fire({
                    title: 'Enter OTP',
                    input: 'text',
                    inputPlaceholder: 'Enter OTP',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: (otp) => {
                        // Here you can perform validation or submit the OTP to the server
                        // For now, we just display an alert with the entered OTP
                        Swal.fire('Entered OTP: ' + otp);
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });
            });
        });
    </script> -->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- Icon -->
    <script src="../../../../unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>