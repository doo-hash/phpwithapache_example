<html>
<body>
<form action="welcome.php" method="POST" target="">
<div>
<label>FULLNAME:
<input type="text" name="sname" value="<?php echo $_POST['sname']; ?>" readonly>

</label>
</div>
<div>
<label>USERNAME:
<input type="text" name="uname" value="<?php echo $_POST['uname'];?>" readonly>
</label>
</div>
<div>
<label>EMAIL:
<input type="email" name="email" value="<?php echo $_POST['email'];?>" readonly>
</label>
</div>
<div>
<label>MOBILE NO.:
<input type="tel" name="tl_no" value="<?php echo $_POST['tl_no'];?>" readonly>
</label>
</div>
<div>
<label>DATE OF BIRTH:
<input type="date" name="dob" value="<?php echo $_POST['dob'];?>" readonly>
</label>
</div>    
<div>
<label>GENDER:
<input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked"; ?> value="male">Male
<input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked"; ?> value="female">Female
</label>
</div>
<div>
<label>PASSWORD:
<input type="password" name="psd" value="<?php echo $_POST['psd'];?>" readonly>
</label>
</div>
<div>
<label>CONFIRM PASSWORD:
<input type="password" name="cnfrm_psd" value="<?php echo $_POST['cnfrm_psd'];?>" readonly>
</label>
</div>
<div>
<fieldset>
<legend>EDUCATION DETAILS:</legend>
<div>
<label>SSC
<input type="text" name="scl_name" value="<?php echo $_POST['scl_name'];?>" readonly>
<input type="number" name="ssc_mrks" value="<?php echo $_POST['ssc_mrks'];?>" readonly>
</label>
</div>
<div>
<label>INTERMEDIATE
<input type="text" name="intr_name" value="<?php echo $_POST['intr_name'];?>" readonly>
<input type="number" name="intr_mrks" value="<?php echo $_POST['intr_mrks'];?>" readonly>
</label>
</div>
<div>
<label>BTECH
<input type="text" name="crse_name" value="<?php echo $_POST['crse_name'];?>" readonly>
<input type="number" name="crse_mrks" value="<?php echo $_POST['crse_mrks'];?>" readonly>
</label>
</div>
<div>
<label>OTHER STUDIES
<input type="text" rows="3" cols="50" name="othered" value="<?php echo $_POST['othered'];?>" readonly>
</label>
</div>

</fieldset>
</div>
<div>
<label>UPLOAD PHOTO:
<input type="image" >
</label>
</div>
<div>
<label>UPLOAD RESUME:
<input type="file">
</label>
</div>
<div>
<input type="submit" onclick="alert('do you want to continue?')">
</div>
<div>
<input type="reset"></div>
</form>
</body>
</html>