<?php
$currency = ' ден. '; //Currency Character or code

$db_username = 'root';
$db_password = '';
$db_name = 'foodify_database';
$db_host = 'localhost';

$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'ДДВ' => 12,
                            'Достава' => 18
                            );						
//connect to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
mysqli_set_charset($mysqli,"utf8");

if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>