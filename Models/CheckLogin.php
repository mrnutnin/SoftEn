<?php 
$LimitTime = 3; 
$BanTime = 5;
session_start(); 
include '../Controllers/Connect.php';
//$stmt = $pdo->prepare("SELECT * FROM member WHERE flagLock = 'Yes' ");
//$stmt->execute();
//$row = $stmt->fetch();
$stmt = $pdo->prepare("UPDATE member SET loginCount=0 , flagLock = 'No' WHERE banExpire <= NOW() AND loginCount = '$LimitTime' ");
$stmt->execute();

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

        
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1, $_POST["username"]);
        $stmt->execute();
        $row = $stmt->fetch();


if (!empty($row)) { 
    //Login Success 
    $username = $row["username"];
    if($row["flagLock"] == "Yes"){
       echo "<script>";
       echo "alert(\"*This account is Lock!, Please contact support.\");"; 
       echo "window.history.back()";
       echo "</script>";
       exit();   
    
    }

    if($row["password"] != $_POST["password"]){
    // Update Login Failed
    $stmt = $pdo->prepare("UPDATE member SET loginCount = loginCount+1 WHERE username = '$username' ");
    $stmt->execute();
        // If more than limit time auto lock account
        if($row["loginCount"] +1 >= $LimitTime){
            $stmt = $pdo->prepare("UPDATE member SET flagLock = 'Yes', banExpire = DATE_ADD(NOW(),INTERVAL $BanTime MINUTE) WHERE username = '$username' ");
            $stmt->execute();
        }
        echo "<script>";
        echo "alert(\"*Invalid Username or Password!\");"; 
        echo "window.history.back()";
        echo "</script>";
        exit();
    }else{

    //Reset loginCount
    $stmt = $pdo->prepare("UPDATE member SET loginCount=0 AND flagLock = 'No' WHERE username = '$username' ");
    $stmt->execute();
    //สร้าง session สำหรับเก็บค่า Username
    $_SESSION['ses_name'] = $row ['name'];      
    $_SESSION['ses_type'] = $row ['type'];
    $_SESSION['ses_memberId'] = $row ['memberId'];
    session_write_close();
    header( "location: ../Views/ClassList.php" );
    exit();   
    }
   
 
}else{
    //Login Fail
    echo "<script>";
    echo "alert(\"*Invalid Username or Password!\");"; 
    echo "window.history.back()";
    echo "</script>";
    exit();   
     
} 



?>