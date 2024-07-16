<!DOCTYPE HTML>
<HTML>
    <head>
        <title>
            Registration Form
        </title>
    </head>
<body>
    <section>
<h2>LOGIN</h2>
<form action="logincheck.php" method="POST"> 
<div>
<label>USERNAME:<input type="text" name="uname" value="" required>
<span id="err"></span></label>
</div>
<br>
<div>
<label>PASSWORD:<input type="password" name="psd" value="" required>
<span id="err"></span></label>
</div>
<div>
<button type="submit" name="login">Login</button>
</div>
</form>
</section>
</body>
</HTML>