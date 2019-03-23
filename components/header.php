
<html>
<head>
<link rel="stylesheet" type="text/css" href="../Components/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Components/slim.min.js">
<link rel="stylesheet" type="text/css" href="../Components/popper.min.js">
<link rel="stylesheet" type="text/css" href="../Components/bootstrap.min.js">
<title>Checkin-Manager</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="../Views/studentinclasslist.php">รายชื่อห้องเรียน</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../Views/CreateClass.php">สร้างห้องเรียน </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul> -->
    <form class="form-inline my-2 my-lg-0" action = "../Models/Logout.php" style = "position:fixed;right:10px;">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ออกจากระบบ</button>
    </form>
  </div>
</nav>