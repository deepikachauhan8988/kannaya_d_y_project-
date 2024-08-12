<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../CSS/condidate.css">
</head>
<body>
    <div class="container p-3">
        <form action="" method="POST">
            <h2 id="heading">Condidate Form</h2>
            <div class="mb-3 mt-3">
                <label for="distict" class="labell">District:<span class="required">*</span></label>
                <select id="district" name="district" class="inputFiled">
                    <option>Select district</option>
                    <option>Dehradun</option>
                    <option>Haridwar</option>
                    <option>Tehri Garhwal</option>
                </select>
                <span class="error message"></span>
            </div>
            <div class="mb-3 mt-3">
                <label for="block" class="labell">Block:<span class="required">*</span></label>
                <select id="block" name="block" class="inputFiled">
                    <!-- option will be loaded dynamically -->
                    <option>Select block</option>
                    <option>Block 1</option>
                    <option>Block 2</option>
                    <option>Block 3</option>
                </select>
                <span class="error message"></span>
            </div>
            
            <div class="mb-3 mt-3">
                <label for="gram" class="labell">Gram:<span class="required">*</span></label>
                <select id="gram" name="gram" class="inputFiled">
                    <option>Select gram</option>
                    <option>Gram 1</option>
                    <option>Gram 2</option>
                    <option>Gram 3</option>
                </select>
                <span class="error message"></span>
            </div>
            
            <div class="mb-3 mt-3">
                <label for="village" class="labell">Village:<span class="required">*</span></label>
                <select id="village" name="village" class="inputFiled">
                    <option>Select village</option>
                    <option>Village 1</option>
                    <option>Village 2</option>
                    <option>Village 3</option>
                </select>
                <span class="error message"></span>
            </div>
            
            <div class="mb-3 mt-3">
                <label for="Madhar_N" class="labell">Guardian UID/ Aadhaar no:<span class="required">*</span></label>
                <input type="text" name="Madhar_N" id="Madhar_N" placeholder="Enter 12 digit" class="inputFiled">
                <span class="error-message"></span>
            </div>
            <div class="mb-3 mt-3">
                <label for="Madhar_N" class="labell">Condidate  UID/ Aadhaar no:<span class="required">*</span></label>
                <input type="text" name="Condidate_Addhar" id="Condidate_Addhar" placeholder="Enter 12 digit" class="inputFiled">
                <span class="error-message"></span>
            </div>
            
            <div class="mt-3 mb-3">
                <label for="area" class="labell">Area type:<span class="required">*</span></label>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="rular" checked style="margin-left:300px"><span style="margin-left:10px;font-size:20px;">rular</span>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="urban" checked><span style="margin-left:10px;font-size:20px;">urban</span>
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
                <label for="child_A_no" class="labell">Child Aadhaar number:<span class="required">*</span></label>
                <input type="text" placeholder="Enter 12 digit" id="child_A_no" name="child_A_no" class="inputFiled">
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
            
            <div class="mb-3 mt-3">
                <label for="F_Name" class="labell">Father Name:<span class="required">*</span></label>
                <input type="text" name="Father" class="inputFiled" onkeypress="return demo1(event);" required placeholder="Enter name" id="F_Name">
            </div>
            
            <div class="mb-3 mt-3">
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
            <div class="mb-3 mt-3">
                <label for="Education" class="labell">Qualification:<span class="required">*</span></label>
              <select id="cast" name="cast" class="inputFiled">
                <option>Choose Qualification</option>
                <option value="Highschool">High School</option>
                <option value="Highschool">High School</option>
                <option value="Highschool">High School</option>
              </select>
              <span class="error-message"></span>

            </div>
            
            <div class="mb-3 mt-3">
                <label for="address" class="labell">Address:<span class="required">*</span></label>
                <textarea name="Address" id="address" required placeholder="Address..." class="inputFiled"></textarea>
                <span class="error-message"></span>
            </div>
            
            <div class="mt-3 mb-3">
                <label for="ifccode" class="labell">contact no:<span class="required">*</span></label>
                <input type="text" name="contact" id="ifccode" placeholder="Enter contact number" class="inputFiled">
                <span class="error-message"></span>
            </div>
            <div class="mb-3 mt-3">
                <label for="submit" class="labell"></label>
                <input type="submit" value="register" class="inputFiled1">
                <span class="error-message"></span>
            </div>
        </form>
    </div>
    
</body>

</html>
