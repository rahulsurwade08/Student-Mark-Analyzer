<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Name</th>
<th>RollNo</th>
<th>AvgMP</th>
<th>AvgAAMM</th>
<th>AvgTCS</th>
<th>AvgDBMS</th>
<th>AvgCN</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "db");
// Check connection
$qtest="SELECT * FROM tbl_excel ORDER BY rollno";
$data0=mysqli_query($conn,$qtest);
while ($row0 = mysqli_fetch_assoc($data0)) {
  $avgmp=(((int)$row0['mp1']+(int)$row0['mp2'])/2);
  $avgaamm=(((int)$row0['aamm1']+(int)$row0['aamm2'])/2);
  $avgtcs=(((int)$row0['tcs1']+(int)$row0['tcs2'])/2);
  $avgdbms=(((int)$row0['dbms1']+(int)$row0['dbms2'])/2);
  $avgcn=(((int)$row0['cn1']+(int)$row0['cn2'])/2);
  echo "<tr><th>".$row0["name"]."</th><th>".$row0['rollno']."</th><th>".$avgmp."</th><th>".$avgaamm."</th><th>".$avgtcs."</th><th>".$avgdbms."</th><th>".$avgcn;
}
  ?>
</table>
</body>
</html>
