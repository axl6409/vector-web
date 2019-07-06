<?php 

// Connect to DataBase

$hostname = 'localhost';
$username = 'root';
$password = '';


try {

	$dbconnect = new PDO("mysql:host=$hostname;dbname=vector_web",$username,$password);

	$dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOexception $e) {

	print "Error ! : " .$e->getMessage(). "</br>";

}