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

    // เข้าสู่ระบบสำเร็จ 
        header( "location: ../Views/studentinclasslist.php" );
            exit(0);   
    // กรณี username และ password ไม่ตรงกัน
        } else {
            echo "<script>";
                    echo "alert(\"Invalid Username or Password!\");"; 
                    echo "window.history.back()";
            echo "</script>";
    }
?>