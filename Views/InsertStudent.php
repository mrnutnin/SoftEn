
<?php include '../Components/Header.php';?>

<div style="position:relative; padding-top:10%;padding-left:10%;padding-right:10%"><form action="">
  <div class="form-group">
    <label for="exampleFormControlInput1">รายวิชา.....รหัสวิชา .....section ....</label>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">อาจารย์ผู้สอน ....</label>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">ชื่อนักศึกษา</label>
     <input type="text" class="form-control" id="sName" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">รหัสนักศึกษา</label>
     <input type="text" class="form-control" id="sId" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">รายชื่อนักศึกษา</label>
  </div>
  <table class="table">
  <thead class="thead-blue">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อ-สกุล</th>
      <th scope="col">รหัสนักศึกษา</th>

    </tr>
  </thead>
  
</form></div>

<?php include '../Components/Footer.php';?>