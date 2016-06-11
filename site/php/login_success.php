<?php
/**
 * Created by PhpStorm.
 * User: ldimovska
 * Date: 10.06.2016
 * Time: 22:42
 */

if(!isset($_COOKIE['loggedin'])){
    header("location:../index-3.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
<h1>Welcome</h1>
<a href="index-4%20-%20Copy.php">Go shopping</a>
<br>
<a href="logout.php">Logout</a>

</body>
</html>
