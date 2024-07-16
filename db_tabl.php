<?php 
$conn=new mysqli("localhost","root","Souji@1216","souji");
if($conn->connect_error){
    die("connection failed".mysqli_connect_error($conn));
}else{
    echo "connection successfull";
}

$sqlq="CREATE TABLE Employees(eid int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
mobileno INT(10) NOT NULL,
dob DATE NOT NULL,gender VARCHAR(15) NOT NULL,
pswd VARCHAR(15) NOT NULL,
ssc VARCHAR(15) NOT NULL,
inter VARCHAR(30) NOT NULL,
btech VARCHAR(30) NOT NULL,
other VARCHAR(30) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

if($conn->query($sqlq)===true){
    echo "Employees table is created successfully.";
}else{
    echo "error creating table :". mysqli_connect_error($conn);
}
?> 