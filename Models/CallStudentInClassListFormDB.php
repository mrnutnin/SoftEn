

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
						$strSQL = "SELECT * FROM classroom WHERE memberId = '$ta' ";
						$result=$connect->query($strSQL);
					 }
					 if($_SESSION["ses_type"]=='lecturer'){
						$strSQL = "SELECT * FROM classroom WHERE lecturer = '$name' OR '$ta' ";
						$result=$connect->query($strSQL);
					 }
					 while($objResult=$result->fetch_assoc() ){
                                   
           	    ?>
					  <tr >
					 
						<!--<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["cId"];?></b></td> -->
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><?=$objResult["subjectCode"];?></td>
        				<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["subjectName"];?></b></td>
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><?=$objResult["lecturer"];?></td>           
        				<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["section"];?></b></td>
						<td style="text-align:center;background-color:#F8F8FF;color:#000000"><?=$objResult["year"];?></td>
					 	<td style="text-align:center;background-color:#F8F8FF;color:#000000"><b><?=$objResult["term"];?></b></td>
						
						<td style="text-align:center;background-color:#F8F8FF;color:#000000" ><a href="insert-student.php?cId=<?=$objResult["cId"];?>">ดูข้อมูล</a></td>
						
					  </tr>

<?php } ?>


</table>	