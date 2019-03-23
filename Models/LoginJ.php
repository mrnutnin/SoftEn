<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include '../Controllers/Connect.php';

if(isset($_SESSION['ses_id'])){
    header('Location: home.php');
}
if(isset($_POST['user']) && $_POST['user'] != '' && $_POST['pass'] != '')
{
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    //$password = md5($pass);

    $sql = "select * from member where username ='$username' and password ='$password' ";
    $num = $pdo->query($sql);
    $data = $num->fetch();
    $num = $num->rowCount();
    if($num <=0) {

        echo '<h1 style="text-align: center; margin-top:20px; color: #CC0000" class="page-content page-content--centered">Login fail!</h1>';
        echo '<p style="text-align: center; class="page-content page-content--centered">Please waiting for login again... </p>'; 

        echo '<script type="text/javascript">';

        echo  'setTimeout( "Location: ../index.php", 5000)'; 

        echo '</script>';
    
    } else {
     
//      exit();
        $_SESSION['ses_id'] = session_id();            //สร้าง session สำหรับเก็บค่า ID
        $_SESSION['ses_name'] = $data['name'];      //สร้าง session สำหรับเก็บค่า Username
        $_SESSION['ses_status'] = $data['type'];
        $_SESSION['ses_userNo'] = $data['memberId'];
        header('Location: ../Views/Home.php');
    }
}
?>
