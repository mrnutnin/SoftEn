<?php
 session_start();//ไว้บนสุดของหน้าเพจ
 	
	           include "Controllers/Connect.php";
				
				$username = $_POST["username"]; // รับค่าจาก textbox
				$password = $_POST["password"]; // รับค่าจาก textbox
				
				$result = mysql_query("SELECT * FROM member WHERE username = '$username' and password='$password'");
				
				if(mysql_num_rows($result)==0){
				 echo "<script language='javascript'>alert('username หรือ password ผิดพลาด');history.back();</script> "; 
				 exit();
				}
				else{
				    $_SESSION['ses_name'] = $row ['name'];      //สร้าง session สำหรับเก็บค่า Username
                    $_SESSION['ses_type'] = $row ['type'];
                    $_SESSION['ses_memberId'] = $row ['memberId'];
    // เข้าสู่ระบบสำเร็จ 
                      header( "location: ../Views/studentinclasslist.php" );
                      exit(0);   
			
				}
				mysql_close($link);
			
?>