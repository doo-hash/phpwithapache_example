<?php
echo "hello!!";
$servername="localhost";
$username="root";
$password="Souji@1216";
$conn=new mysqli($servername,$username,$password);
if($conn->connect_error){
    die ("connection failed". $conn->connect_error);
}
echo "connected successfully";
$sql="CREATE DATABASE souji";
if($conn->query($sql)===true){
    echo "db created";
}else{
    echo "error: ". $conn->error;
}$conn->close();
?>