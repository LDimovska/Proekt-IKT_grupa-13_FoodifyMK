<?php
/**
 * Created by PhpStorm.
 * User: ldimovska
 * Date: 10.06.2016
 * Time: 21:17
 */
//header('Content-Type: text/html;charset=utf-8');
$hostname="localhost";
$username="root";
$password="";

$dbhandle=mysqli_connect($hostname, $username, $password) or die("Не е конектирана базата");
$selected=mysqli_select_db($dbhandle, "foodify_database") or die("Не е конектирана базата");

if(isset($_POST['email']) && isset($_POST['password'])){
    $myusername=$_POST['email'];
    $mypassword=$_POST['password'];

    $myusername=stripslashes($myusername);
    $mypassword=stripslashes($mypassword);

    $query="SELECT * FROM klient WHERE EMAIL='$myusername' and PASSWORD='$mypassword' LIMIT 1";
    $result=mysqli_query($dbhandle, $query);
    $count=mysqli_num_rows($result);

//    header("location:../index-6_logedin.html charset=utf-8");
    if($count==1) {
//        $secs=300+time();
//        setcookie(loggedin, date("F jS - g:i a"), $secs);
//    echo "Success";
//    header("location:../index-2_logedin.html");
        echo "Успешно се најавивте!";
        header("location:profile.php");
        exit();
    }else{
        header("location:../wrongLogin.html");

        exit();
    }
} else{

    header("location:../wrongLogin.html");

    exit();
}

?>

