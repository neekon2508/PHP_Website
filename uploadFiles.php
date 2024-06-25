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
        $name = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], "ImageUploadFolder/".$name);
    ?>
    <h3>Upload image <?php echo $name ?></h3>
    <img src="<?php echo "ImageUploadFolder/".$name ?>" alt="">
    <?php } ?>

</body>
</html>
