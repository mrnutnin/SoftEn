<html>
<head>
<link rel="Stylesheet" type="text/css" href="Components/bootstrapIndex.css">
<title>Sign In</title>
</head>

<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Login Form -->
    <h1>Sign In</h1>
    <form method="POST" action="Models/Login.php">
      <input  placeholder="username" name="username" type="text"  autofocus autocomplete="off" required>
      <input  placeholder="password" name="password" type="password" value="" required>
      <input type="submit"value="Sign In" name="signin">
    </form>
   
  </div>
</div>

<?php include 'Components/footer.php';?>
