<?php
/**
 * Created by PhpStorm.
 * User: ldimovska
 * Date: 10.06.2016
 * Time: 22:53
 */
header('Content-Type: text/html;charset=utf-8');
$hostname="localhost";
$username="root";
$password="";

$dbhandle=mysqli_connect($hostname, $username, $password) or die("Не е конектирана базата");
$selected=mysqli_select_db($dbhandle, "foodify_database") or die("Не е конектирана базата");


if(isset($_POST['email']) && isset($_POST['password'])) {
    $mail=$_POST['email'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $pass=$_POST['password'];
    $street=$_POST['Ulica'];
    $streetNo=$_POST['UlicaBroj'];
    $kat=$_POST['Kat'];
    $stan=$_POST['Stan'];
    $mob=$_POST['mob'];

    mysqli_query($dbhandle, "INSERT INTO klient (EMAIL, PASSWORD, IME, PREZIME, ULICA, ULICA_BROJ, KAT, SPRAT, TELEFONSKI_BROJ) VALUES ('$mail', '$pass', '$name', '$surname', '$street', '$streetNo', '$kat', '$stan', '$mob')");

//    echo "Корисникот е додаден.";
}else{
    header("location:../wrongLogin.html");

    exit();
}
?>
