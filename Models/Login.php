<?php 
session_start(); 
function setSessionTime($_timeSecond){
    if(!isset($_SESSION['ses_time_life'])){
        $_SESSION['ses_time_life']=time();
    }
    if(isset($_SESSION['ses_time_life']) && time()-$_SESSION['ses_time_life']>$_timeSecond){
        if(count($_SESSION)>0){
            foreach($_SESSION as $key=>$value){
                unset($$key);
                unset($_SESSION[$key]);
            }}}}
            setSessionTime(20*60);

        include '../Controllers/Connect.php';
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
        $stmt->bindParam(1, $_POST["username"]);
        $stmt->bindParam(2, $_POST["password"]);
        $stmt->execute();
        $row = $stmt->fetch();

if (!empty($row)) { 
           //สร้าง session สำหรับเก็บค่า ID
    $_SESSION['ses_name'] = $row ['name'];      //สร้าง session สำหรับเก็บค่า Username
    $_SESSION['ses_type'] = $row ['type'];
    $_SESSION['ses_memberId'] = $row ['memberId'];

    // แสดง link เพื่อไปยังหน้าต่อไปหลังจากตรวจสอบสำเร็จแล้ว
    // เข้าสู่ระบบสำเร็จ

            echo '<h1 style="text-align: center; margin-top:20%; color: #009900" class="page-content page-content--centered">Login successful!</h1>';
            echo '<p style="text-align: center;  class="page-content page-content--centered">Please wait...</p>'; 

            echo '<Meta http-equiv="refresh" content="1;URL=../Views/studentinclasslist.php">';
      
    // กรณี username และ password ไม่ตรงกัน
        } else {
    // ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
            echo '<h1 style="text-align: center; margin-top:20%; color: #CC0000" class="page-content page-content--centered">Login fail!</h1>';
            echo '<p style="text-align: center; class="page-content page-content--centered">Please waiting for login again... </p>'; 
            echo '<Meta http-equiv="refresh" content="2;URL=../">';

    }

?>