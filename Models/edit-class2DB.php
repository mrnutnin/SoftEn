<?php include '../Controllers/Connect.php'; ?>
<?php
        $stmt = $pdo->prepare("UPDATE `classroom` SET `subjectCode`=?,`subjectName`=?,`detail`=?,`memberId`=?,`section`=?,`lecturer`=?,`year`=?,`term`=? WHERE `cId`=?");
        $stmt->bindParam(1, $_GET["subjectCode"]);
		$stmt->bindParam(2, $_GET["subjectName"]);
		$stmt->bindParam(3, $_GET["detail"]);
		$stmt->bindParam(4, $_GET["memberId"]);
		$stmt->bindParam(5, $_GET["section"]);
		$stmt->bindParam(6, $_GET["lecturer"]);
		$stmt->bindParam(7, $_GET["year"]);
        $stmt->bindParam(8, $_GET["term"]);
        $stmt->bindParam(9, $_GET["cId"]);
        $stmt->execute(); 
        $cId=$_GET["cId"];

        $cid = $pdo->lastInsertId(); 
         header('Location: insert-student.php?cId=$cId');
?>