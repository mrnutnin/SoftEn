<?php
include '../Controllers/Connect.php';
include '../Components/Header.php';
$classId = $_GET['cId'];
$studentId = $_GET['sId'];
$strSQL = "SELECT * FROM students WHERE cId = $classId AND sId = '$studentId' ";
$result=$connect->query($strSQL);

while($detail=$result->fetch_assoc() ){
 

?>
<div class="jumbotron">
  <form action="../Models/EditStudent2DB.php">
  <div class="form-group"><h3>แก้ไขนักศึกษา</h3><hr class="my-4"></div>
  <div class="form-group">
    <label for="exampleFormControlInput1">รหัสนักศึกษา</label>
     <input type="text" class="form-control" id="sId" name="sId" value="<?=$studentId?>" required pattern="[0-9]{9}-[0-9]{1}" title="Ex. 593020804-3">
     <input type="hidden" id="cId" name="cId" value = "<?=$classId?>">
     <input type="hidden" id="oldSid" name="oldSid" value = "<?=$studentId?>">
     
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">ชื่อนักศึกษา</label>
     <input type="text" class="form-control" name="sName" value="<?=$detail['sName']?>" required >
  </div>
<?php  
$strSQL2 = "SELECT * FROM classrooms WHERE cid = $classId";
$result2=$connect->query($strSQL2);
$detail2=$result2->fetch_assoc();
$sCode= $detail2['subjectCode'];
$t= $detail2['term'];
$y= $detail2['year'];
$strSQL1 = "SELECT * FROM classrooms WHERE subjectCode = $sCode  AND year=$y AND term = $t";
$result1=$connect->query($strSQL1);

?>
  กลุ่มการเรียน
  <input type="hidden" class="form-control" name="status" value="move" >
  <select name="newSec" class="form-control">
  <?php while($detail1=$result1->fetch_assoc() ){?>
  <option value="<?=$detail1['cId']?>" ><?=$detail1['section']?></option>
  <?php }
  ?>


  </select>
  <br><br>
 

  <button type="submit" class="btn btn-primary mb-2">ยืนยัน</button>
  </form>
</div>
<?php
}
  ?>

<?php include '../Components/Footer.php'; ?>