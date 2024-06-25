<?php 
require_once 'connectMySQL.php';
//find and send the name author
if(isset($_POST['author']))
{
    $author = $_POST['author'];
    $query = "SELECT author FROM classics WHERE author = $author";
}
?>