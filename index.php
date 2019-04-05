<html>
<head>
<link rel="Stylesheet" type="text/css" href="Components/bootstrapIndex.css">
<title>Sign In</title>

<script type="text/javascript">
	function validation(){ 
		var username = document.myform.username.value;
		var password = document.myform.password.value;
    		if (username == "" && password == "") {
     	document.getElementById('errors').innerHTML="*Please enter your Username and Password!!";
     	return false;
 		} else if (username == "") {
 			document.getElementById('errors').innerHTML="*Please enter your Username!!";
     	return false;
		} else if (password == "") {
      document.getElementById('errors').innerHTML="*Please enter your Password!!";
     	return false;
    }
}		
</script> 

</head>

<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Login Form -->
    <h1>Sign In</h1>
    <form method="POST" action="Models/Login.php" name="myform" onsubmit="return validation();">
      <input  name="username" placeholder="username"  type="text" id="username">
      <input  name="password" placeholder="password"  type="password" id="password">
      <input type="submit"value="Sign In" name="signin">
      <p id="errors"></p>
    </form>
  </div>
</div>

<?php include 'Components/Footer.php';?>
