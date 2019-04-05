
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
							
				<?php include "../Models/CallStudentInClassListFormDB.php"?>
						
			</center>
			</div>
		</div>
</div>



<?php include '../Components/Footer.php';?>