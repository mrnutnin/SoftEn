

<table id="example" class="table table-striped "style="width:100%"  >
				<thead>
					<tr style="background-color:#000000;color:#FFFAFA">
						<!--<td width="10%" style="text-align:center">หมายเลขห้อง</td>-->
						<td  style="text-align:center">รหัสวิชา</td>
						<td  style="text-align:center">รายวิชา</td>
						<td  style="text-align:center">อาจารย์ผู้สอน</td>
						<td  style="text-align:center">section</td>
						<td  style="text-align:center">ภาคเรียน</td>
						<td  style="text-align:center">ปีการศึกษา</td>
						<td  style="text-align:center">รายละเอียด</td>
					</tr>
				</thead>

<?php


						$ta = $_SESSION["ses_memberId"];
						$name = $_SESSION["ses_name"];
					
						// echo $_SESSION["ses_status"]; 
						// echo $name; 
					 if($_SESSION["ses_type"]=='TA'){
						$strSQL = "SELECT * FROM classrooms WHERE memberId = '$ta' ";
						$result=$connect->query($strSQL);
					 }
					 if($_SESSION["ses_type"]=='lecturer'){
						$strSQL = "SELECT * FROM classrooms WHERE lecturer = '$name' ";
						$result=$connect->query($strSQL);
					 }
					 if($_SESSION["ses_type"] =='student'){ 
						$strSQL = "SELECT * FROM classrooms INNER JOIN students ON classrooms.cId = students.cId AND students.sName = ' $name'"; 
						$result=$connect->query($strSQL); 
					}
					 while($objResult=$result->fetch_assoc() ){
                                   
           	    ?>
				   <script>
						function deleteClass() {
							if (confirm("Are you sure?!")) {
								window.location.href = "../Models/DeleteClassFromDB.php?cId=<?=$objResult['cId'];?>";

							} else{
								return false;
							}
						}
						</script>
					  <tr>
						<!--<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["cId"];?></b></td> -->
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><?=$objResult["subjectCode"];?></td>
        				<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["subjectName"];?></b></td>
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><?=$objResult["lecturer"];?></td>           
        				<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["section"];?></b></td>
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><?=$objResult["year"];?></td>
					 	<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["term"];?></b></td>
       					<td style="text-align:center;background-color:#F8F8FF;color:#000000" ><button type="button" class="btn btn-info" onclick="window.location.href = 'ClassDetail.php?cId=<?=$objResult['cId'];?>' ">ดูข้อมูล</button> <button type="button" class="btn btn-danger" onclick="deleteClass()">ลบ</button></td>
						 
						
					  </tr>

<?php } ?>


</table>	

<button type="button" class="btn btn-info" onclick="window.location.href = '../Views/CreateClass.php ' ">สร้างห้องเรียน</button> 
    
