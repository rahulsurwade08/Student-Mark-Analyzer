<?php
$connect = mysqli_connect("localhost", "root", "", "db");
$output = '';
if(isset($_POST["import"]))
{
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=1; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $rollno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $mp1 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $aamm1 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $tcs1 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $dbms1 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $cn1 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $mp2 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $aamm2 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
    $tcs2 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
    $dbms2 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
    $cn2 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
    $query = "INSERT INTO `tbl_excel`(`name`, `rollno`, `mp1`, `aamm1`, `tcs1`, `dbms1`, `cn1`, `mp2`, `aamm2`, `tcs2`, `dbms2`, `cn2`)
    VALUES ('$name','$rollno','$mp1','$aamm1','$tcs1','$dbms1','$cn1','$mp2','$aamm2','$tcs2','$dbms2','$cn2')";
    mysqli_query($connect, $query);
    $output .= '<td>'.$name.'</td>';
    $output .= '<td>'.$rollno.'</td>';
    $output .= '<td>'.$mp1.'</td>';
    $output .= '<td>'.$aamm1.'</td>';
    $output .= '<td>'.$tcs1.'</td>';
    $output .= '<td>'.$dbms1.'</td>';
    $output .= '<td>'.$cn1.'</td>';
    $output .= '<td>'.$mp2.'</td>';
    $output .= '<td>'.$aamm2.'</td>';
    $output .= '<td>'.$tcs2.'</td>';
    $output .= '<td>'.$dbms2.'</td>';
    $output .= '<td>'.$cn2.'</td>';
    $output .= '</tr>';
   }
  }
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>

<html>
 <head>
  <title>Import Excel to Mysql For UT-1 Marks</title>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:1000px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }

  </style>
 </head>
 <body>
  <div class="container box">
   <h3 align="center">Import Excel to Mysql For UT Marks</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select Excel File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
   </form>
   <br />
   <br />
   <a href="output.php" >Result</a>
   <?php
   echo $output;
   ?>
  </div>
 </body>
</html>
