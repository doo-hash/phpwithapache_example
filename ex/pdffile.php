<html>
<head>
<title>  FORM </title>
</head>
<body align="left">
<h1> FILE UPLOAD </h1>

<form action = "" method = "POST" enctype="multipart/form-data"/>

    <input type = "file" name = "fileup" id = "fileupload"/></br>  
    <input type = "submit" name = "opt" value = "upload"/></br> </br>  

</form>
</body>
</html>







<?php
   $target_dir="files/";
   $filename=$_FILES["fileup"]["name"];

   $tmpname=$_FILES["fileup"]["tmp_name"];
   $filetype=$_FILES["fileup"]["type"];
   $errors=[];
   $fileextensions=["pdf"];
	$arr=explode(".",$filename);
   $ext=strtolower(end($arr));

   $uploadpath=$target_dir.basename($filename);
if(! in_array($ext,$fileextensions))
   {
     $errors[]="Invalid filename";
   }
   if(empty($errors))
   {
     if(move_uploaded_file($tmpname,$uploadpath))
     {
       echo "file uploaded successfully";
     }
     else
     {
       echo "not successfull";
     }
   }
   else
   {
      foreach($errors as $value)
      {
         echo "$value";
      }
   }
?>
