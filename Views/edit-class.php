
<?php include '../Components/Header.php';
include '../Controllers/Connect.php';
?>

<?php
$memberId=$_SESSION['ses_memberId'];
$classId = $_GET['cId'];
$strSQL = "SELECT * FROM classrooms WHERE cId  = $classId "  ;
                        $result=$connect->query($strSQL);

                                    while($obj=$result->fetch_assoc() ){
                                  ?>
     
      
<div style="position:relative; padding-top:5%;padding-left:10%;padding-right:10%">
<div class="jumbotron">
<h2>แก้ไขชั้นเรียน</h2><br>
<hr class="my-4">
<form action="edited-class.php" >
  <div class="form-group">
    <label for="exampleFormControlInput1">ชื่อวิชา</label>
     <input type="text" class="form-control" name="subjectName" id="subjectName" value="<?php echo $obj["subjectName"];?>"required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">รหัสวิชา</label>
     <input type="text" class="form-control" name="subjectCode" id="subjectCode" value="<?php echo $obj["subjectCode"];?>" required pattern="([a-z]{2}[0-9]{6}|[0-9]{6})" title="ตัวอย่าง sc322411 หรือ 322411">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">รายละเอียดรายวิชา</label>
    <textarea class="form-control" name="detail" id="detail" rows="3"  required><?php echo $obj["detail"];?></textarea>
  </div>
  <input type="hidden" name="memberId" id="memberId" value="<?=$memberId?>">
  <input type="hidden" name="cId" id="cId" value="<?=$classId?>">
  <div class="form-group">
    <label for="exampleFormControlSelect1">อาจารย์ผู้สอน</label>
  <select class="form-control" name="lecturer" id="lecturer" value="<?php echo $obj["lecturer"];?>">
  <option value="<?php echo $obj["lecturer"];?>"><?php echo $obj["lecturer"];?></option>
  <?php

$strSQL = 'SELECT * FROM member WHERE type ="lecturer" '  ;
                        $result=$connect->query($strSQL);

                                    while($objResult=$result->fetch_assoc() ){
                                   
                                  ?>
      <option value="<?php echo $objResult["name"];?>"><?php echo $objResult["name"];?></option>
      <?php
                      
                    }
					  ?>
    </select>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1">Section</label>
     <input type="text" class="form-control" name="section" id="section" value="<?php echo $obj["section"];?>" required pattern="[0-9]{1,}">
  </div>
  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1">ปีการศึกษา</label>
    <input type="text" class="form-control" name="year" id="year" value="<?php echo $obj["year"];?>" required pattern="[0-9]{4}" title="ตัวอย่าง 2562">
      </div>
      <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1">ภาคเรียน</label>
  <select class="form-control" name="term" id="term" >
  <option value="<?php echo $obj["term"];?>"><?php echo $obj["term"];?></option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
  </div>
  </div>
  <?php
                      
                    }
					  ?>
  <button type="submit" class="btn btn-primary mb-2">ยืนยัน</button> 

</form></div></div>
<?php include '../Components/Footer.php';?>