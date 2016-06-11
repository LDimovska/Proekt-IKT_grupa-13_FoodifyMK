<?php
/**
 * Created by PhpStorm.
 * User: ldimovska
 * Date: 10.06.2016
 * Time: 22:06
 */
$secs=-10+time();
setcookie(loggedin, date("F jS - g:i a"), $secs);
header("location:../index-3.html");
?>