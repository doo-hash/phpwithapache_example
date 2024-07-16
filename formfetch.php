<?php
session_start();
$sname=$uname=$gender=$psd="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!empty($_POST["sname"]) && preg_match("/^[a-zA-Z-' ]*$/",$_POST['sname'])){
        $sname=test_input($_POST["sname"]);
        }else{
            $sname="";
        }
        if(!empty($_POST["uname"]) && preg_match("/^[a-zA-Z0-9-' ]*$/",$_POST["uname"])){
        $uname=test_input($_POST["uname"]);
        }else{
            $uname="";
        }
        if(!empty($_POST["gender"])){
        $gender=test_input($_POST["gender"]);
        }else{
            $gendr="";
        }
        if(!empty($_POST["psd"]) && preg_match("/^[a-zA-Z0-9-' ]*$/",$_POST["psd"])){
        $psd=test_input($_POST["psd"]);
        }else{
            $psd="";
        }
    }

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

$servername="localhost";
$username="root";
$password="Souji@1216";
$dbname="souji";
$conn=new mysqli($servername,$username,$password,$dbname);

if(isset($_POST['submit'])){
    if(empty($sname) || empty($uname) || empty($gender) || empty($psd)){ 
    header("location:reg_form.php");
    exit;
    }
    else{
        if($conn===false){
        die ("connection failed". $conn->connect_error);
        }
        else{
// $sql="CREATE TABLE mytab(eid INT(6) PRIMARY KEY NOT NULL AUTO_INCREMENT,sname VARCHAR(30) NOT NULL,
//uname VARCHAR(30) NOT NULL,gender VARCHAR(30) NOT NULL,password1 VARCHAR(30) NOT NULL);";
//$sqld="DROP TABLE mytab";
//$sqlu="ALTER TABLE mytab MODIFY COLUMN gender VARCHAR(10)";
//if($conn->query($sqlu)===true){  echo "altered";}else{    echo $conn->error;} 
        $sqlc="SELECT eid FROM mytab WHERE uname=?";
        if($cmpr=$conn->prepare($sqlc)){
            $cmpr->bind_param("s",$uname);
            $cmpr->execute(); 
            $cmpr->store_result();       
            if($cmpr->num_rows()>0){
            exit("user already exists");                
            }else{
                $cmpr->close();
               $psdhsh=password_hash($psd,PASSWORD_DEFAULT);
                $sql1="INSERT INTO mytab (sname,uname,gender,password1) VALUES (?,?,?,?);";
                    if($stmt=$conn->prepare($sql1)){
                    $stmt->bind_param("ssss",$sname1,$uname1,$gender1,$psd1);
                    $sname1=filter_var($sname,FILTER_SANITIZE_STRING);
                    $uname1=filter_var($uname,FILTER_SANITIZE_STRING);
                    $gender1=filter_var($gender,FILTER_SANITIZE_STRING);
                    $psd1=$psdhsh;
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->close();
                    }
                    else{
                    die("error: ".$conn->error);
                    }
                }
            }}
        }
}
else{
    exit;
}
header("location:login.php");exit;
?>