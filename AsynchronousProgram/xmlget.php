<?php 
if(isset($_GET['url']))
{
    header('Content-Type: text/xml');
    echo file_get_contents('http://'.$_GET['url']);
}
?>