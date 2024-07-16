<!DOCTYPE HTML>
<HTML>
    <head>
        <title>
            Registration Form
        </title>
    </head>
    <body>
    <?php
    $servername="localhost";
    $username="root";
    $password="Souji@1216";
    $dbname="souji";
    $count=0;
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die ("connection failed". $conn->connect_error);
    }else{
        
    }
    echo "connected successfully";
    //$sql="CREATE TABLE Mytab(eid INT(6) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    //sname VARCHAR(30) NOT NULL,
    //uname VARCHAR(30) NOT NULL,
    //gender VARCHAR(15) NOT NULL,
    //psd VARCHAR(30) NOT NULL);";        
    $sql.="INSERT INTO MYTAB(SNAME,UNAME,GENDER,PASSWORD1) VALUES($sname,$uname,$gender,$psd)";
    if($conn->query($sql)==TRUE){
        echo "records inserted successfully";
    }else{
        echo "error".mysqli_error($conn);
    }
   ?>
    <table>
            <tr>
                <th>SNAME</th>
                <th>UNAME</th>
                <th>GENDER</th>
                <th>PASSWORD</th>
            </tr>
            <tr>
                <td><?php echo $sname;?></td>
                <td><?php echo $uname;?></td>
                <td><?php echo $gender;?></td>
                <td><?php echo $psd;?></td>
            </tr>
        </table>
    </body>
</HTML>