<html lang="en">
    <head>
        <title>forms</title>
        <link rel="stylesheet" href="styles/global.css">
    </head>
    <body>
        <section class="login_block">
            <div>
                <h2>WELCOME</h2>
            </div>
<?php   
$servername="localhost";
   $username="root";
   $password="Souji@1216";
   $dbname="souji";
   $conn=new mysqli($servername,$username,$password,$dbname);
    
    $sql="SELECT * FROM mytab";
    if($result=mysqli_query($conn,$sql)){
        if(mysqli_num_rows($result)>0){
            echo "<table><tr>
            <th>SNAME</th>
            <th>UNAME</th>
            <th>GENDER</th>
            <th>PASSWORD</th>
        </tr>";
        while($row=mysqli_fetch_array($result)){
        echo "<tr>".
            "<td>". $row['sname']."</td>".
           " <td>".$row['uname']."</td>".
            "<td>".$row['gender']."</td>".
            "<td>".$row['password1']."</td></tr>";
        }echo "</table>";
        mysqli_free_result($result);
    }else{
        echo "no records found";
    }
}else{
    echo "error: ".mysqli_error($conn);
}
mysqli_close($conn);
?>
        </section>
    </body>
</html>