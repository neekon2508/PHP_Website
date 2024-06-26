<?php 
require_once('../connectMySQL.php');
if(!empty($_SERVER['PHP_AUTH_USER']) && !empty($_SERVER['PHP_AUTH_PW']))
{
    $un_temp = $_SERVER['PHP_AUTH_USER'];
    $pw_temp = $_SERVER['PHP_AUTH_PW'];
  

    $query = "SELECT * FROM users WHERE username='$un_temp'";
    $result = $pdo->query($query);
    if(!$result->rowCount())
    {
      $_SERVER = array();
      die("User not found");
    } 
    $row = $result->fetch();
    $fn = $row['forename'];
    $sn = $row['surname'];
    $un = $row['username'];
    $pw = $row['password'];
    if(password_verify(str_replace("'","",$pw_temp),$pw))
    {
      session_start();
      $_SESSION['forename'] = $fn;
      $_SESSION['surname'] = $sn;

      echo "$fn $sn: Hi $fn, you are now logged in as $un";
     die ("<p><a href='continue.php'>Click here to continue</a></p>");
    }
    else die ("Invalid user name/password combination");
     
} 
else
{
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.1 401 Unauthorized');
    die("Please enter your username and password");
}
?>