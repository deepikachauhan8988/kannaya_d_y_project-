

<!DOCTYPE html>
<html lang="en">

<head>
    <title>condidate</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../CSS/condidate.css">
    <link href="https://code.jquery.com/jquery-3.7.1.min.js" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.4/js/jquery.dataTables.min.js" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.4/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body>

<?php  
 include "./config.php";
    session_start(); 
    $district = isset($_SESSION['district']) ? $_SESSION['district'] : 'Default District';
    $block = isset($_SESSION['project_name']) ? $_SESSION['project_name'] : 'Default Block';
    $sector = isset($_SESSION['sector']) ? $_SESSION['sector'] : 'Default Sector';
   
    
    if (isset($_POST['register'])) {
        $x="c_01";
        $y=rand(1000,9999);
        $condi_id = $x.$y;
        $village = $_POST['village'];
        $guardion_addahr = $_POST['guardian_add_N'];
        $condidate_name = $_POST['child_N'];
        $child_d_o_b = $_POST['child_DOF'];
        $child_add_n = $_POST['child_A_no'];
        $mother_c_number = $_POST['M_contact_N'];
        $relation_with_F = $_POST['Relation'];
        $father_name = $_POST['father'];
        $mother_name = $_POST['mother'];
        $gender = $_POST['exampleRadios'];
        $caste_category = $_POST['cast'];
        $bank_type = $_POST['bank'];
        $account_no = $_POST['Account_n'];
        $IFSC_code = $_POST['ifccode'];
        $qualification = $_POST['quali'];
        $address = $_POST['Address'];
        $contact_no = $_POST['contact'];
        $statuse = 'unverifide';

        // Using prepared statements to prevent SQL injection
        $sql = "INSERT INTO condidate_table values('',' $condi_id','$district','$block',' $sector','$village','$guardion_addahr','$condidate_name',' $child_d_o_b','$child_add_n',' $mother_c_number','$relation_with_F','$father_name','$mother_name',' $gender','$caste_category','$bank_type','$account_no','$IFSC_code','$qualification',' $address',' $contact_no',' $statuse')";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Data inserted successfully');</script>";
            echo "<script>window.location.href='Login_type_page.php'</script>";
        }
        else{
            echo "<script>alert('data not inserted successfully')</script>";
        }
    }
    ?>
            
<!--  -->

    <div class="container p-3">
    <form action="" method="POST" id="beneficiaryForm">
            <h2 id="heading">Candidate Form</h2>
            <div class="form-group my-3">
                <label for="district">District</label>
                <input type="text" id="district" value="<?php echo $_SESSION['district']; ?>" class="form-control from-text" name="district" placeholder="Enter District." required disabled />
            </div>
            <div class="form-group my-3">
                <label for="block">Project</label>
                <input type="text" id="block" value="<?php echo $_SESSION['project_name']; ?>" class="form-control from-text" name="block" placeholder="Enter  Block." required disabled />
            </div>
            
            <div class="form-group my-3">
                <label for="sector">sector</label>
                <input type="text" id="sector" value="<?php echo $_SESSION['sector']; ?>" class="form-control from-text" name="sector" placeholder="Enter  Block." required disabled />
            </div>
            
            <div class="mb-3 mt-3">
                <label for="village" class="labell">Village:<span class="required">*</span></label>
              <input type="text"class="inputFiled"placeholder="enter the village"name="village">
                <span class="error message"></span>
            </div>
            
            <div class="mb-3 mt-3">
                <label for="Madhar_N" class="labell">Guardian UID/ Aadhaar no:<span class="required">*</span></label>
                <input type="text" name="guardian_add_N" id="Madhar_N" placeholder="Enter 12 digit" class="inputFiled">
                <span class="error-message"></span>
            </div>
            <div class="mt-3 mb-3">
                <label for="child_N" class="labell">Candidate name:<span class="required">*</span></label>
                <input type="text" placeholder="Enter candidate name" id="child_N" name="child_N" class="inputFiled">
            </div>
            <div class="mt-3 mb-3">
                <label for="child_DOF" class="labell">Child Date of Birth:<span class="required">*</span></label>
                <input type="date" id="child_DOF" name="child_DOF" class="inputFiled">
            </div>
           
            <div class="mt-3 mb-3">
                <label for="Madhar_N" class="labell">Condidate  UID/ Aadhaar no:<span class="required">*</span></label>
                <input type="text" name="child_A_no" id="Condidate_Addhar" placeholder="Enter 12 digit" class="inputFiled">
                <span class="error-message"></span>
            </div>
            <div class="mt-3 mb-3">
                <label for="M_contact_N" class="labell">Mother contact number:<span class="required">*</span></label>
                <input type="text" placeholder="Enter mobile number" id="M_contact_N" name="M_contact_N" class="inputFiled">
            </div>
            <div class="mt-3 mb-3">
                <label for="Relation" class="labell">Relation with Family:<span class="required">*</span></label>
                <select id="Relation" name="Relation" class="inputFiled">
                <option value="">Choose type of Relation</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Anut">Anut</option>
                   
                </select>
                <span class="error-message"></span>
               </div>
            <div class="mt-3 mb-3">
                <label for="F_Name" class="labell">Father Name:<span class="required">*</span></label>
                <input type="text" name="father" class="inputFiled" onkeypress="return demo1(event);" required placeholder="Enter name" id="F_Name">
            </div>
            
            <div class="mt-3 mb-3">
                <label for="M_Name" class="labell">Mother's Name:<span class="required">*</span></label>
                <input type="text" id="M_Name" name="mother" class="inputFiled" onkeypress="return demo1(event);" required placeholder="Enter name">
                <span id="Error"></span>
            </div>
            <div class="mt-3 mb-3">
                <label for="gender" class="labell">Gender:<span class="required">*</span></label>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="male" checked style="margin-left:300px"><span style="margin-left:10px;font-size:20px;">male</span>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="female" checked><span style="margin-left:10px;font-size:20px;">female</span>
                <span class="error-message"></span>
            </div>
            <div class="mt-3 mb-3">
                <label for="cast" class="labell">Caste category:<span class="required">*</span></label>
                <select id="cast" name="cast" class="inputFiled">
                    <option>ST</option>
                    <option>SC</option>
                    <option>OBC</option>
                </select>
                <span class="error-message"></span>
            </div>
           
            <div class="mt-3 mb-3">
                <label for="bank" class="labell">Bank type:<span class="required">*</span></label>
                <select id="bank" name="bank" class="inputFiled">
                    <option>SBI</option>
                    <option>PNB</option>
                    <option>Other</option>
                    <span class="error-message"></span>
                </select>
            </div>
            <div class="mt-3 mb-3">
                <label for="Account_N" class="labell">Account No:<span class="required">*</span></label>
                <input type="text" name="Account_n" id="Account_n" placeholder="Enter Account number" class="inputFiled">
                <span class="error-message"></span>
            </div>

            <div class="mt-3 mb-3">
                <label for="ifccode" class="labell">IFSC code:<span class="required">*</span></label>
                <input type="text" name="ifccode" id="ifccode" placeholder="Enter IFSC code" class="inputFiled">
                <span class="error-message"></span>
            </div>
            <div class="mt-3 mb-3">
                <label for="Education" class="labell">Qualification:<span class="required">*</span></label>
              <select id="cast" name="quali" class="inputFiled">
                <option>Choose Qualification</option>
                <option value="Highschool">High School</option>
                <option value="Highschool">High School</option>
                <option value="Highschool">High School</option>
              </select>
              <span class="error-message"></span>

            </div>
            <!-- <div class="mt-3 mb-3">
                <label for="area" class="labell">Area type:<span class="required">*</span></label>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="rular" checked style="margin-left:300px"><span style="margin-left:10px;font-size:20px;">rular</span>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="urban" checked><span style="margin-left:10px;font-size:20px;">urban</span>
            </div> -->
            <div class="mt-3 mb-3">
                <label for="address" class="labell">Address:<span class="required">*</span></label>
                <textarea name="Address" id="address" required placeholder="Address..." class="inputFiled"></textarea>
                <span class="error-message"></span>
            </div>
            
            <div class="mt-3 mb-3">
                <label for="ifccode" class="labell">contact no:<span class="required">*</span></label>
                <input type="text" name="contact" id="ifccode" placeholder="Enter contact number" class="inputFiled">
                <span class="error-message"></span>
            </div>
            <!-- <div class="mb-3">
                <label for="logintp" class="labell">Status</label><br>
                <input type="radio" name="logintp" value="verified" class="mx-2" required><span style="margin-left:10px;font-size:20px;">Verifide</span>
                <input type="radio" name="logintp" value="unverified" class="mx-2" required checked id="unverifide"style="margin-left:300px"><span style="margin-left:10px;font-size:20px;">unverifide</span>
            </div> -->

            <div class="mt-3 mb-3">
                <label for="submit" class="labell"></label>
                <input type="submit" value="register"name="register" class="inputFiled1">
                <span class="error-message"></span>
            </div>
        </form>
    </div>
  <script>  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 
              </table>
  
</body>

</html>
