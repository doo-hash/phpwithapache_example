<html>    
<?php
if (!isset($_SESSION)) {
    session_start();
    }
    $plan=$firstname=$lastname=$email=$password=$confirmpassword=$strtadd1=$strtadd2=$city=$country = '';
    $success="";
    if (isset($_POST['submit'])) {
        $plan=$_POST['plan'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $strtadd1 = $_POST['strtadd1'];
        $strtadd2 = $_POST['strtadd2'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $success = '';


        // Upon Success.
        if ($firstname != '' && $lastname != '' && $email != '' && $password != '' && $confirmpassword != '' && $strtadd1 != '' && $strtadd2 != '' && $city != '' && $country != '') {
            // Change $success variable from an empty string.
            $success = 'success';

            // Insert whatever you want to do upon success.

        } else {
            // Upon Failure.
            echo '<p class="error">Fill in all fields.</p>';

            // Set $success variable to an empty string.
            $success = '';
        }
    }
    $conn=new mysqli("localhost","root","Souji@1216","souji");
    if($conn->connect_error){
        die("connection failed".mysqli_connect_error($conn));
    }else{
        echo "connection successfull";
    }
    $sqlq="CREATE TABLE dtab(eid int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    plan VARCHAR(15) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    pswd VARCHAR(15) NOT NULL,
    streetadrs1 VARCHAR(15) NOT NULL,
    streetadrs2 VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,
    country VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    
    $sql1="INSERT INTO dtab(plan,firstname,lastname,email,pswd,streetadrs1,streetadrs2,city,country) VALUES('$plan','$firstname','$lastname','$email','$password','$strtadd1','$strtadd2','$city','$country')";
    if($conn->query($sql1)===true){
        
        echo "records are inserted successfully.";
    }else{
        echo "error inserting records :". mysqli_connect_error();
    }
?>
<form method="POST" action="#">
    <label class="w">Plan :</label>
    <select autofocus="" name="plan" required="required">
        <option value="">Select One</option>
        <option value="FREE Account">FREE Account</option>
        <option value="Premium Account Monthly">Premium Account Monthly</option>
        <option value="Premium Account Yearly">Premium Account Yearly</option>
    </select>
    <br>
    <label class="w">First Name :</label><input name="firstname" type="text" placeholder="First Name" required="required" value="<?php if (isset($firstname) && $success == '') {echo $firstname;} ?>"><br>
    <label class="w">Last Name :</label><input name="lastname" type="text" placeholder="Last Name" required="required" value="<?php if (isset($lastname) && $success == '') {echo $lastname;} ?>"><br>
    <label class="w">E-mail ID :</label><input name="email" type="email"  placeholder="Enter Email" required="required" value="<?php if (isset($email) && $success == '') {echo $email;} ?>"><br>
    <label class="w">Password :</label><input name="password" type="password" placeholder="********" required="required" value="<?php if (isset($password) && $success == '') {echo $password;} ?>"><br>
    <label class="w">Re-Enter Password :</label><input name="confirmpassword" type="password" placeholder="********" required="required" value="<?php if (isset($confirmpassword) && $success == '') {echo $confirmpassword;} ?>"><br>
    <label class="w">Street Address 1 :</label><input name="strtadd1" type="text" placeholder="street address first" required="required" value="<?php if (isset($strtadd1) && $success == '') {echo $strtadd1;} ?>"><br>
    <label class="w">Street Address 2 :</label><input name="strtadd2" type="text" placeholder="street address second"  value="<?php if (isset($strtadd2) && $success == '') {echo $strtadd2;} ?>"><br>
    <label class="w">City :</label><input name="city" type="text" placeholder="City" required="required" value="<?php if (isset($city) && $success == '') {echo $city;} ?>"><br>
    <label class="w">Country :</label><select autofocus="" id="a1_txtBox1" name="country"  placeholder="select one" value="<?php if (isset($country) && $success == '') {echo $country;} ?>">option value="">Select One</option>
        <option value="FREE Account">FREE Account</option>
        <option value="Premium Account Monthly">Premium Account Monthly</option>
        <option value="Premium Account Yearly">Premium Account Yearly</option></select>
    <input type="submit" name="submit">
</form>

</html>