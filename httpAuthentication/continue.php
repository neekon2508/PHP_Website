<?php 
ini_set('session.gc_maxlifetime',1);
echo ini_get('session.gc_maxlifetime');
 session_start();
 if(!empty($_SESSION['forename']))
 {
    $forename = $_SESSION['forename'];
    $surname = $_SESSION['surname'];

/*
    $_SESSION = array();
    setcookie(session_name(),'',time()-2592000,'/');
    session_destroy();
    */
    

    echo "Welcome back $forename. <br> Your full name is $forename $surname <br>";
 }
 else echo  "Please <a href='authenticate.php'>Click here</a> to log in.";
?>
