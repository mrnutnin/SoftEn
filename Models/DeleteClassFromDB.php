
<?php
include '../Controllers/Connect.php';

$stmt = $pdo->prepare("DELETE FROM `students` WHERE `cId`=?");
        
	    $stmt->bindParam(1, $_GET["cId"]);
        $stmt->execute();
$stmt = $pdo->prepare("DELETE FROM `classrooms` WHERE `cId`=?");
        
	    $stmt->bindParam(1, $_GET["cId"]);
        $stmt->execute(); 
        $cId=$_GET["cId"];
        header("location:../Views/ClassList.php");

?>