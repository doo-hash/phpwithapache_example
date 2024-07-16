<html>
<head>
</head>
<body>

<?php

$name=$nameErr="";
$lowcase="";
$uppcase=preg_match("/[A-Z]*/",$name);
$num=preg_match("/[0-9]*/",$name);
$spclchar=preg_match("/[\W]*/",$name);
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['sname'])){
        $nameErr="name is required";
    }else{
            $name=$_POST["sname"];
            $nameErr="";
            $lowcase=preg_match("@[a-z]@",$name);
            if(!$lowcase){
                $nameErr="only lowercase is allowed";
            }
        }
}

?>
<form action="" method="POST">
name:<input type="text" name="sname" value="">
<span>*<?php echo $nameErr; ?></span>
<span><?php if($lowcase)echo $name ?></span>
<input type="submit" name="s">
<br>
</form>

</body>
</html>