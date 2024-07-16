<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="emp.css">
</head>
<body>
<?php ?>
<?php
$sname=$uname=$email=$dob=$telno=$pswd=$cnfrm_psd=$gender="";
$snameErr=$unameErr=$emailErr=$telnoErr=$dobErr=$pswdErr=$cnfrm_psdErr=$genderErr="";
$lowcase=$num=$uppcase=$spclchar="";
$scl_name=$scl_mrks=$intr_name=$intr_mrks=$crse_mrks=$crse_name="";
$ssc=$sscErr=$intr=$intrErr=$btch=$btchErr=$othr="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if(empty($_POST["sname"])){
        $snameErr="name  is required!";
    }
    else{
    $sname=test_input($_POST["sname"]);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$sname)){
        $snameErr="only letters and spaces are allowed";
    }}
    
    if(empty($_POST["uname"])){
        $unameErr="name is required";
    }else{
    $uname=test_input($_POST["uname"]);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$uname)){
        $unameErr="only letters and spaces are allowed";
    }}

    if(empty($_POST["email"])){
        $emailErr="email is required";
    }else{
    $email=test_input($_POST["email"]);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailErr="invalid email format";
    }}
    if(empty($_POST["tl_no"])){
        $telnoErr="mobile number is required";
    }else{
    $telno=test_input($_POST["tl_no"]);
    if(!preg_match("/^[0-9]{10}+$/",$telno)){
        $telnoErr="only numbers are allowed";
    }
}

    if(empty($_POST["dob"])){
        $dobErr="dob is required";
    }else{
        $dob=$_POST["dob"];
        if($dob>="1990-01-01" && $dob<="2025-01-01"){
            $age=agecalc($dob);
        }else{
            $dobErr="invalid dob";
        }
    }
    if(empty($_POST["psd"])){
        $pswdErr="password is required";
    }else{
    $pswd=test_input($_POST["psd"]);
    $lowcase=preg_match("@[a-z]@",$pswd);
    $uppcase=preg_match("@[A-Z]@",$pswd);
    $num=preg_match("@[0-9]@",$pswd);
    $spclchar=preg_match("@[\W]@",$pswd);
    if(!($lowcase && $uppcase && $num && $spclchar && strlen($pswd)>=8)){
            $pswdErr="min 8 chars and must contain letters, digits and special chars!!!";
    }
}
    if(empty($_POST["cnfrm_psd"])){
        $cnfrm_psdErr="password is required";
    }else{
    $cnfrm_psd=test_input($_POST["cnfrm_psd"]);
    if($cnfrm_psd!==$pswd){
        $cnfrm_psdErr="passwords must match";
    }}
    
    if(empty($_POST["gender"])){
        $genderErr="gender is required";
    }else{
    $gender=test_input($_POST["gender"]);
    }

    if(empty($_POST['scl_name']) && empty($_POST['scl_mrks'])){
        $sscErr="";
    }else{
        $scl_name=test_input($_POST['scl_name']);
        $scl_mrks=test_input($_POST['ssc_mrks']);
        $ssc=$scl_name." ".$scl_mrks;
        echo $ssc;
    }

    if(empty($_POST['intr_name']) && empty($_POST['intr_mrks'])){
        $intrErr="";
    }else{
        $intr_name=test_input($_POST['intr_name']);
        $intr_mrks=test_input($_POST['intr_mrks']);
        $intr=$intr_name." ".$intr_mrks;
        echo $intr;
    }

    if(empty($_POST['crse_name']) && empty($_POST['crse_mrks'])){
        $btchErr="";
    }else{
        $crse_name=test_input($_POST['crse_name']);
        $crse_mrks=test_input($_POST['crse_mrks']);
        $btch=$crse_name." ".$crse_mrks;
        echo $btch;
    }
    if(isset($_POST['othered'])){
        $othr=test_input($_POST['othered']);
        echo $othr;
    }
}

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
function agecalc($date2){
    $tdy=date("y-m-d");
    $diff=date_diff(date_create($tdy),date_create(($date2)));
    return $diff->format('%y');
}
?>
<div class="flex-container">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div>
    <label>FULL NAME:
    <input type="text" name="sname" value="" >
    <span>* <?php echo $snameErr ?></span>
    </label>
    </div>
    <div>
    <label>USERNAME:
    <input type="text" name="uname" value="">
    <span>* <?php echo $unameErr ?></span>
    </label>
    </div>
    <div>
    <label>EMAIL:
    <input type="email" name="email" value="" >
    <span>* <?php echo $emailErr ?></span>
    </label>
    </div>
    <div>
    <label>MOBILE NO.:
    <span>+91</span>
    <input type="tel" name="tl_no" value="" >
    <span>* <?php echo $telnoErr ?></span>
    </label>
    </div>
    <div>
    <label>DATE OF BIRTH:
    <input type="date" name="dob" value="" >
    <span>* <?php echo $dobErr ?></span>
    <span><?php if(isset($dob) && ($dob<"2022-01-01" && $dob>"1995-01-01")) echo $age; ?></span>
    </label>
    </div>    
    <div>
    <label>GENDER:
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female
    <span>* <?php echo $genderErr ?></span>    
</label>
    </div>
    <div>
    <label>PASSWORD:
    <input type="password" name="psd" value="">
    <span>* <?php echo $pswdErr ?></span>
</label>
    </div>
    <div>
    <label>CONFIRM PASSWORD:
    <input type="password" name="cnfrm_psd" value="" >
    <span>* <?php echo $cnfrm_psdErr ?></span>
    </label>
    </div>
    <div>
    <fieldset>
    <legend>EDUCATION DETAILS:</legend>
    <div>
    <label>SSC
    <input type="text" name="scl_name" value="">
    <input type="number" name="ssc_mrks" value="">
    </label>
    </div>
    <div>
    <label>INTERMEDIATE/POLYTECHNIC
    <input type="text" name="intr_name" value="">
    <input type="number" name="intr_mrks" value="">
    </label>
    </div>
    <div>
    <label>BTECH/DEGREE
    <input type="text" name="crse_name" value="">
    <input type="number" name="crse_mrks" value="">
    </label>
    </div>
    <div>
    <label>OTHER STUDIES
    <input type="text" name="othered" value="">
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
    <input type="submit" onsubmit="alert('do you want to continue?')">
    </div>
    <div>
    <input type="reset"></div>
    </form>
</div>
<?php 
try{
    $conn=new mysqli("localhost","root","Souji@1216","souji");
if($conn->connect_error){
    die("connection failed".mysqli_connect_error($conn));
}else{
    echo "connection successfull";
}
$stmt=$conn->prepare("INSERT INTO Employees(fullname,username,email,mobileno,dob,gender,pswd,ssc,inter,btech,other)
 VALUES (?,?,?,?,?,?,?,?,?,?,?)");
 $stmt->bind_param("sssisssssss",$sname,$uname,$email,$telno,$dob,$gender,$pswd,$ssc,$intr,$btch,$othr);
$stmt->execute();

}catch(Exception $e){
    echo "error inserting records :". mysqli_connect_error(). " ".$e->getMessage();
}
?>
</body>
</html>