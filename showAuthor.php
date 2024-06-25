<?php 
require_once 'connectMySQL.php';
//find and send the name author
if(isset($_POST['author']))
{
    $author = $pdo->quote($_POST['author']);
    $query = "SELECT title FROM classics WHERE author = $author";
    $result = $pdo->query($query);
    $title = array();
    while($row=$result->fetch())
    {
$title[] = $row['title'];

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>SHOW AUTHOR IN DATABSE</h2>
    <form action="showAuthor.php" method='post'>
      <input type="text" name='author' >
      <input type="submit" value='Find'>
    </form>
    <?php
    if(isset($title))
    {
        foreach($title as $item)
          echo $item."<br>";
    }
    ?>
    
</body>
</html>
<?php
?>