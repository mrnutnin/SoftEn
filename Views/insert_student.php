
<?php

// เชื่่อมต่อฐานข้อมูล
include '../Controllers/Connect.php';
//--->
// $sId = $_GET['sId'];
// $sName = $_GET['sName'];
// $cId = $_GET['cId'];

// // เพิ่มลงฐานข้อมูล
// $sql_add = "insert into student set 
// sId  = '$sId ' , sName = '$sName' ,  cId='$cId' ";
// $query=$connect->query($sql_add);
// header("location:insert-student.php");
$stmt = $pdo->prepare("INSERT INTO `students`(`sId`, `sName`, `cId`) VALUES (?,?,?)");
        $stmt->bindParam(1, $_GET["sId"]);
		$stmt->bindParam(2, $_GET["sName"]);
		$stmt->bindParam(3, $_GET["cId"]);
        $stmt->execute(); 
        $cId = $_GET["cId"];
        header("location:insert-student.php?cId=$cId");

?>