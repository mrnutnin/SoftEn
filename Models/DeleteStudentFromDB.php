
<?php
include '../Controllers/Connect.php';

$stmt = $pdo->prepare("DELETE FROM `students` WHERE `sId`=? AND `cId`=?");
        $stmt->bindParam(1, $_GET["sId"]);
	    $stmt->bindParam(2, $_GET["cId"]);
        $stmt->execute(); 
        $cId=$_GET["cId"];
        header("location:../Views/ClassDetail.php?cId=$cId");

?>