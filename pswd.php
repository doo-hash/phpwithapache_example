<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
$pswd=$pswdErr=$cnfrm_psdErr="";
$lowcase=$uppcase=$num=$spclchar="";
$hsh="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST["pswd"])){
        $pswdErr="password is required";
    }else{
    $pswd=test_input($_POST["pswd"]);
    $lowcase=preg_match("@[a-z]@",$pswd);
    $uppcase=preg_match("@[A-Z]@",$pswd);
    $num=preg_match("@[0-9]@",$pswd);
    $spclchar=preg_match("@[\W]@",$pswd);
    if(!($lowcase && $uppcase && $num && $spclchar && strlen($pswd)>=8)){
            $pswdErr="min 8 chars and must contain letters, digits and special chars!!!";
    }
    $hsh=password_hash($pswd,PASSWORD_DEFAULT);
}
    if(empty($_POST["cnfrm_psd"])){
        $cnfrm_psdErr="password is required";
    }else{
    $cnfrm_psd=test_input($_POST["cnfrm_psd"]);
    if($cnfrm_psd!==$pswd){
        $cnfrm_psdErr="passwords must match";
    }}
}
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>
<form action="" method="POST">
password:<input type="password" name="pswd"><br>
<span>*<?php echo $pswdErr?></span>
<br>
confirm password:<input type="password" name="cnfrm_psd"><br>
<span>*<?php echo $cnfrm_psdErr?></span>
<br>
<input type="submit"><br><br>
<span>password: <?php echo $hsh; ?></span>
</form>
</body>
</html>