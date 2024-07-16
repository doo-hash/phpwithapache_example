<!DOCTYPE HTML>
<HTML>
    <head>
        <title>
            Registration Form
        </title>
    </head>
<body>
<h2>Registration Form</h2>
<form action="formfetch.php" method="POST"> 
<div>
<label>NAME:<input type="text" name="sname" value="" required>
<span>Must contain letters and white spaces.</span>
<span id="err"></span></label>
</div>
<div>
<label>USERNAME:<input type="text" name="uname" value="" required>
<span>Must contain letters, numbers</span>
<span id="err"></span></label>
</div>
<div>
<label>GENDER:<input type="radio" name="gender" value="male" required>Male
              <input type="radio" name="gender" value="female" required>Female<span id="err"></span></label>
</div>
<div>
<label>PASSWORD:<input type="password" name="psd" value="" required>
<span>Must contain letters, numbers only</span>
<span id="err"></span></label>
</div>
<div>
<button type="submit" name="submit">submit</button>
<button type="reset">Reset</button>
</div>
</form>
</body>
</HTML>