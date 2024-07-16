<?php
$sname=$uname=$email=$dob=$telno=$pswd=$cnfrm_psd=$gender="";


$snameErr=$unameErr=$emailErr=$telnoErr=$dobErr=$pswdErr=$cnfrm_psdErr=$genderErr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if(empty($sname)){
        $snameErr="name  is required!";
    }
    else{
    $sname=test_input($_POST["sname"]);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$sname)){
        $snameErr="only letters and spaces are allowed";
    }}
    
    if(empty($uname)){
        $unameErr="name is required";
    }else{
    $uname=test_input($_POST["uname"]);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$uname)){
        $unameErr="only letters and spaces are allowed";
    }}

    if(empty($email)){
        $emailErr="email is required";
    }else{
    $email=test_input($_POST["email"]);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailErr="invalid email format";
    }}
    if(empty($telno)){
        $telnoErr="mobile number is required";
    }else{
    $telno=test_input($_POST["tl_no"]);
    if(!preg_match("/^[0-9-/]*$/",$telno)){
        $telnoErr="only numbers are allowed";
    }}

    if(isset($dob)){
        if($dob>"01-01-1990" && $dob<"01-01-2025"){
            $dob=test_input($_POST["dob"]);         
        }else{
            $dobErr="invalid dob";
        }
    }
    if(empty($pswd)){
        $pswdErr="password is required";
    }else{
    $pswd=test_input($_POST["psd"]);
    if(!preg_match("/^[a-zA-Z0-9!@#$%\^\&\*]*$/",$pswd)){
        $pswdErr="only letters and spaces are allowed";
    }}
    if(empty($cnfrm_psd)){
        $cnfrm_psdErr="password is required";
    }else{
    $cnfrm_psd=test_input($_POST["cnfrm_psd"]);
    if($cnfrm_psd!==$pswd){
        $cnfrm_psdErr="passwords must match";
    }}
    if(empty($gender)){
        $genderErr="gender is required";
    }else{
    $gender=test_input($_POST["gender"]);
    }}



function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>