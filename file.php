
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</head>
<body>
<div>
<form action="" method="POST" enctype="multipart/form-data">
    <label>UPLOAD PHOTO:
    <input type="file" name="file1" id="file1" >
    </label>
    </div>
    <div>
    <label>UPLOAD RESUME:
    <input type="file" name="file2">
    </label>
    </div>
    <div>
    <input type="submit" name="submit">
    </div>
    </form>
    <?php

    $target_dr="files/";
    $target_file=$target_dr.basename($_FILES["file1"]["name"]);
    $uploadOk=1;
    $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])){
        $check=getimagesize($_FILES['file1']["tmp_name"]);
        if($check!==false){
            echo "file is an image - ".$check['mime'].". ";
            $uploadOk=1;
        }else{
            echo "file is not an image";
            $uploadOk=0;
        }
    }
    if(file_exists($target_file)){
        echo "sry file already exists";
        $uploadOk=0;
    }

    if($_FILES["file1"]["size"]>500000){
        echo "sry file is too large";
        $uploadOk=0;
    }

    if($imageFileType!="jpg" && $imageFileType!="jpeg" && $imageFileType!="png" && $imageFileType!="gif"){
        echo "sry";
        $uploadOk=0;
    }
    if($uploadOk==0){
        echo "sry file is not uploaded";
    }else{
        if(move_uploaded_file($_FILES["file1"]["tmp_name"],$target_file)){
            echo "the file ". htmlspecialchars(basename($_FILES["file1"]["name"])). "has been uploaded.";
        }else{
            echo "sry error uploading";
        }
    }
    header("Refresh:10; url=index.html");
    exit;
    ?>
</body>
</html>