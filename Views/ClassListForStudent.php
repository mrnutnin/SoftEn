
<?php include '../Controllers/Connect.php'; ?>
<?php include '../components/Header.php';?> 

<html>
<head>
<title>รายชื่อห้อง</title>
<!-- <meta http-equiv="content-type" content="text/html; charset=utf-8"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script> 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
        $(function(){
                $('#example').dataTable();
        });
</script>

</head>
<body>

<div style="position:relative; padding-top: 5%; padding-right: 15%;  padding-left: 15%; ">
		<div id="container" style="margin-left:5%; margin-right:5%">
			<center>
			<div id="demo">
			<h2>Class List</h2><br>
			<p>Hello " <?=$_SESSION["ses_name"] ?> " Welcome Back !  </p><br>
							
			

<table id="example" class="table table-striped "style="width:100%"  >
				<thead>
					<tr style="background-color:#000000;color:#FFFAFA">
						<!--<td width="10%" style="text-align:center">หมายเลขห้อง</td>-->
						<td  style="text-align:center">รหัสวิชา</td>
						<td  style="text-align:center">รายวิชา</td>
						<td  style="text-align:center">อาจารย์ผู้สอน</td>
						<td  style="text-align:center">section</td>
						<td  style="text-align:center">ภาคเรียน</td>
						<td  style="text-align:center">ปีการศึกษา</td>
						<td  style="text-align:center">รายละเอียด</td>
					</tr>
				</thead>

<?php


						$ta = $_SESSION["ses_memberId"];
						$name = $_SESSION["ses_name"];
						// echo $_SESSION["ses_status"]; 
						// echo $name; 
					 if($_SESSION["ses_type"]=='TA'){
						$strSQL = "SELECT * FROM classrooms WHERE memberId = '$ta' ";
						$result=$connect->query($strSQL);
					 }
					 if($_SESSION["ses_type"]=='lecturer'){
						$strSQL = "SELECT * FROM classrooms WHERE lecturer = '$name' OR '$ta' ";
						$result=$connect->query($strSQL);
					 }
					 if($_SESSION["ses_type"] =='student'){ 
						$strSQL = "SELECT * FROM classrooms INNER JOIN students ON classrooms.cId = students.cId AND students.sName = ' $name'"; 
						$result=$connect->query($strSQL); 
					}
					 while($objResult=$result->fetch_assoc() ){
                                   
           	    ?>
				  
					  <tr>
						<!--<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["cId"];?></b></td> -->
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><?=$objResult["subjectCode"];?></td>
        				<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["subjectName"];?></b></td>
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><?=$objResult["lecturer"];?></td>           
        				<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["section"];?></b></td>
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><?=$objResult["year"];?></td>
					 	<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["term"];?></b></td>
       					<td style="text-align:center;background-color:#F8F8FF;color:#000000" ><button type="button" class="btn btn-info" onclick="window.location.href = 'ClassDetailForStudent.php?cId=<?=$objResult['cId'];?>' ">ดูข้อมูล</button></td>
						 
					  </tr>

<?php } ?>


</table>	

						
			</center>
			</div>
		</div>
</div>



<?php include '../Components/Footer.php';?>