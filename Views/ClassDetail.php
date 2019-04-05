<?php
include '../Controllers/Connect.php';
include '../components/Header.php';

$classId = $_GET['cId'];

$strSQL = "SELECT * FROM classrooms WHERE cId = $classId";
$result=$connect->query($strSQL);

while($detailclass=$result->fetch_assoc() ){
 

?>
<title>เพิ่มนักศึกษา</title>
<div style="position:relative; padding-top:10%;padding-left:10%;padding-right:10%">
<div class="jumbotron">
  <div class="form-row">
    <div class="form-group col-md-10">
    <label for="exampleFormControlInput1" class="lead"><h3>ข้อมูลชั้นเรียน</h3> </label>
    </div>
     <div class="form-row col-md-1"><form action="EditClass.php"><input type="hidden" name="cId" value="<?=$classId?>"><button type="submit" class="btn btn-success mb-2">แก้ไข</button></form><div class="form-group ">
    </div>
    </div>
     <div class="form-row col-md-1"><form action="../Models/DeleteClassFromDB.php"><input type="hidden" name="cId" value="<?=$classId?>"><button type="submit" class="btn btn-danger mb-2">ลบ</button></form><div class="form-group ">
    </div>
  </div>
  
</div>

  <hr class="my-4">
  

<div class="form-row">
</div><div class="form-row">
  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1" class="lead">รายวิชา : <?=$detailclass['subjectName']?></label>
  </div>
  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1" class="lead">รหัสวิชา : <?=$detailclass['subjectCode']?></label>
  </div>
  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1" class="lead">section : <?=$detailclass['section']?></label>
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
  <label for="exampleFormControlInput1" class="lead">ปีการศึกษา : <?=$detailclass['year']?></label>
  </div>
  <div class="form-group col-md-4">
  <label for="exampleFormControlInput1" class="lead">ภาคเรียน : <?=$detailclass['term']?></label>
  </div>
  <div class="form-group col-md-4">
  <label for="exampleFormControlInput1" class="lead">อาจารย์ผู้สอน : <?=$detailclass['lecturer']?></label>
  </div>
  </div></div>
  <?php
  }
  ?>

<div class="jumbotron">
<form action="../Models/InsertStudent2DB.php">
  <div class="form-group"><h3>เพิ่มนักศึกษา</h3></div>
  <hr class="my-4">
  <div class="form-group">
    <label for="exampleFormControlInput1">รหัสนักศึกษา</label>
     <input type="text" class="form-control" name="sId" required pattern="[0-9]{10}">
     <input type="hidden" name="cId" value = <?= $classId?>>
     
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">ชื่อนักศึกษา</label>
     <input type="text" class="form-control" name="sName" required>
  </div>
  
  <button type="submit" class="btn btn-primary mb-2">ยืนยัน</button>
  </form>
</div>

 
<div class="jumbotron">
  <div class="form-group">
    <label for="exampleFormControlTextarea1"><h3>รายชื่อนักศึกษา</h3></label>
    <hr class="my-4">
  </div>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th style="text-align:center;" scope="col">ลำดับ</th>
      <th style="text-align:center;" scope="col">รหัสนักศึกษา</th>
      <th style="text-align:center;" scope="col">ชื่อ-สกุล</th>
      <th style="text-align:center;" scope="col">แก้ไข/ลบ</th>

    </tr>
  </thead>
  <tr >
		<?php
    $sql_student = "SELECT * FROM students WHERE cId = $classId";
    $result_list_student=$connect->query($sql_student);
    $count = 1;
    while($list_student=$result_list_student->fetch_assoc() ){
    

?>             
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$count++?></b></td>
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?= $list_student["sId"];?></b></td>
            <td style="text-align:center;background-color:#F8F8FF;color:#000000"><?= $list_student["sName"];?></td>
            <td style="background-color:#F8F8FF;color:#000000"><div class="form-row"><div class="form-group col-md-6" style="text-align:right;"><form action="EditStudent.php">
            <input type="hidden" name="cId" value="<?=$classId?>">
            <input type="hidden" name="sId" value="<?= $list_student["sId"];?>">
              <button type="submit" class="btn btn-success mb-2">แก้ไข</button></form></div>
              
              <div class="form-group col-md-6" style="text-align:left"><form action="../Models/DeleteStudentFromDB.php">
            <input type="hidden" name="cId" value="<?=$classId?>">
            <input type="hidden" name="sId" value="<?= $list_student["sId"];?>">
              <button type="submit" class="btn btn-danger mb-2" >ลบ</button></form></div></div></td>

				
					
					  </tr>
            <?php
  }
  ?>
</div></div>

<?php include '../Components/Footer.php';?>