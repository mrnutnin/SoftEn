<?php


$connect = new mysqli("10.199.66.227","19S2_g1","xPr2nsT5","19s2_g1");

if($connect->connect_errno){
	printf("Connect failed: %s\n",$connect->connect_error);
	exit();
}
$connect->query("SET NAMES utf8");

try{
	$pdo = new PDO("mysql:host=10.199.66.227;dbname=19s2_g1;charset=utf8","19S2_g1","xPr2nsT5");
	} catch(PDOException $e){
		echo"error : ".$e->getMessage();
	}
	
?>


