<?php
$servername="localhost";
$username="root";
$password="Souji@1216";
$dbname="souji";
$conn=new mysqli($servername,$username,$password,$dbname);
$psdhash="";
$uname=$_POST['uname'];
$psd=$_POST['psd'];
$psdd="";
if(isset($_POST['login'])){
    if(empty($uname) ||empty($psd)){ 
    header("location:reg_form.php");
    exit;
    }
    else{
        if($conn===false){
        die ("connection failed". $conn->connect_error);
        }
        else{
            $sqlpsd="SELECT password1 FROM mytab WHERE uname='$uname'";
            if($result=mysqli_query($conn,$sqlpsd)){
                if($row=mysqli_fetch_array($result)){
                $psdd=$row['password1'];       
                }
                else{echo "not found";}
            }else{echo $conn->error;}
            
            if(password_verify($psd,$psdd)){
            $sqllgn="SELECT * FROM mytab WHERE uname=?";
                if($cmpr=$conn->prepare($sqllgn)){
                $cmpr->bind_param("s",$uname);
                $cmpr->execute(); 
                $cmpr->store_result();       
                    if($cmpr){
                    header("location:tabledata.php");
                    exit;
                    }
                    else{
                    exit("username or password is wrong");
                    }
                }else{echo $conn->error;}
            }
            else{

                exit("password is wrong");
            }
        }
    }
}
?>