<?php
$connect = mysqli_connect("10.199.66.227", "19S2_g1", "xPr2nsT5", "19s2_g1");
$connect->query("SET NAMES utf8");
$output = '';
if(isset($_POST["import"]))
{
 $file_name = explode(".", $_FILES["excel"]["name"]) ;
 
 $extension = end($file_name); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  //$output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=3; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $sId = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $sName = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $cId = $classId;
    $query = "INSERT INTO students (sId, sName,cId) VALUES ('".$sId."', '".$sName."' , '".$cId."')";
    mysqli_query($connect, $query);
    
   }
  } 

    $output = '<label class="text-danger">Insert File Succes </label>'; //if non excel file then

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>

  <div class="container box">
   <h3>อัพโหลดรายชื่อนักศึกษา</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select Excel File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <br />
   <?php
   echo $output;
   ?>
  