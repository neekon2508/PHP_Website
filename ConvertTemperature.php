<?php 
$f = $c = '';
if(isset($_POST['f'])) $f = sanitizeString($_POST['f']);
if(isset($_POST['c'])) $c = sanitizeString($_POST['c']);

if(is_numeric($f))
{
    $c = intval((5/9)*($f-32));
    $out = "$f &deg;f equals $c &deg;c";
}
elseif (is_numeric($c))
{
    $f = intval((9/5)*$c+32);
    $out = "$c &deg;c equals $f &deg;f";
}
else $out = '';
function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
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
    Enter either Fahrenheit or Celsius and click on Convert
    <b><?php echo $out; ?></b>
    <form action="" method = 'post' >
        Fahrenheit <input type="text" name='f' size='7'required='required'>
        Celsius <input type="text" name='c' size='7'>
        <input type="submit" value="Convert">
        <input type="time" name='time' value='12:34'>
    </form>
</body>
</html>

