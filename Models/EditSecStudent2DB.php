<?php
include '../Controllers/Connect.php';

$stmt = $pdo->prepare("UPDATE `students` SET `sId`=?,`sName`=?,`status`=? WHERE `sId`=? AND `cId`=?");
        $stmt->bindParam(1, $_GET["sId"]);
        $stmt->bindParam(2, $_GET["sName"]);
        $stmt->bindParam(3, $_GET["status"]);
        $stmt->bindParam(4, $_GET["oldSid"]);
        $stmt->bindParam(5, $_GET["cId"]);
	
        $stmt->execute(); 
        $cId=$_GET["cId"];
$stmt1 = $pdo->prepare("INSERT INTO `students`(`sId`, `sName`, `status`, `cId`) VALUES (?,?,?,?)");
        $stmt1->bindParam(1, $_GET["sId"]);
        $stmt1->bindParam(2, $_GET["sName"]);
        $stmt1->bindParam(3, 'normal');
        $stmt1->bindParam(4, $_GET["newSec"]);
	
        $stmt1->execute(); 
        
        header("location:../Views/ClassDetail.php?cId=$cId");

?>