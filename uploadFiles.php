<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Upload</title>
</head>
<body>
    <form method='post' action='uploadFiles.php' enctype='multipart/form-data'>
    Select File: <input type="file" name='filename' size='10'>
    <input type="submit" value='Upload'>
    </form>
   
    <?php 
    if($_FILES)
    {
        $valid_type = array("image/jpeg","image/gif","image/png","image/tiff");
        $name = $_FILES['filename']['name'];
        if(in_array($_FILES['filename']['type'],$valid_type))
        {
            move_uploaded_file($_FILES['filename']['tmp_name'], "ImageUploadFolder/".$name);
    ?>
    <h3>Upload image <?php echo $name ?></h3>
    <img src="<?php echo "ImageUploadFolder/".$name ?>" alt="">
    <?php
      }
     else
      {
    echo "$name is not an accepted image file";
      }    
}
    else echo "No image has been uploaded";
    ?>

</body>
</html>
