<?php
include '../Controllers/Connect.php';
include '../Components/Header.php';
$classId = $_GET['cId'];
$studentId = $_GET['sId'];
$strSQL = "SELECT * FROM students WHERE cId = $classId AND sId = $studentId";
$result=$connect->query($strSQL);

while($detail=$result->fetch_assoc() ){
 

?>
<div class="jumbotron">
  <form action="../Models/EditStudent2DB.php">
  <div class="form-group"><h3>แก้ไขนักศึกษา</h3><hr class="my-4"></div>
  <div class="form-group">
    <label for="exampleFormControlInput1">รหัสนักศึกษา</label>
     <input type="text" class="form-control" id="sId" name="sId" value="<?=$studentId?>" required pattern="[0-9]{10}" title="รหัสนักศึกษาไม่มีขีด ตัวอย่าง 5930204112 ">
     <input type="hidden" id="cId" name="cId" value = <?= $classId?>>
     <input type="hidden" id="oldSid" name="oldSid" value = <?= $studentId?>>
     
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">ชื่อนักศึกษา</label>
     <input type="text" class="form-control" name="sName" value="<?=$detail['sName']?>" required >
  </div>
  
  <button type="submit" class="btn btn-primary mb-2">ยืนยัน</button>
  </form>
</div>
<?php
}
  ?>

<?php include '../Components/Footer.php'; ?>