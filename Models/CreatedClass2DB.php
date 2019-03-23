<?php include '../Controllers/Connect.php'; ?>
<?php
        $stmt = $pdo->prepare("INSERT INTO `classroom`(`cId`, `subjectCode`, `subjectName`, `detail`, `memberId`, `section`, `lecturer`, `year`, `term`) VALUES (null,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $_GET["subjectCode"]);
		$stmt->bindParam(2, $_GET["subjectName"]);
		$stmt->bindParam(3, $_GET["detail"]);
		$stmt->bindParam(4, $_GET["memberId"]);
		$stmt->bindParam(5, $_GET["section"]);
		$stmt->bindParam(6, $_GET["lecturer"]);
		$stmt->bindParam(7, $_GET["year"]);
		$stmt->bindParam(8, $_GET["term"]);
        $stmt->execute(); 
		$cid = $pdo->lastInsertId(); 
		
	
?>