<!DOCTYPE html>
<html>
<body>
<?php
$given_dob='';
$age='';
$dobErr='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST["s"])){
    if(isset($_POST["dob"])){
        $dob=$_POST["dob"];
        if($dob>="1990-01-01" && $dob<="2025-01-01"){
        $date1=date("y-m-d");
        $diff=date_diff(date_create($dob),date_create($date1));
        $given_dob=$dob;
        $age="age is ".$diff->format("%y"). "years ".$diff->format('%m')." months ".$diff->format('%d')." days old.";
        }else{
            $dobErr="invalid input!!";
        }
    }
}else{
if(isset($_POST["rst"])){
    echo "reset";
    $_POST="";
}}
}
?>
<form action="" method="POST">
DOB:<input type="date" name="dob">
<span>*<?php echo $dobErr ?></span>
<span><?php echo $given_dob. "<br>".$age ?></span>
<input type="submit" name="s" value="age">
<input type="reset" name="rst">
</form>

</body>
</html>