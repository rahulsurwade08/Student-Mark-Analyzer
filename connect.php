<?php
$username=$_POST['username'];//username
$password=$_POST['password'];//password
session_start();

$con=mysqli_connect("localhost","root","","db");//mysqli("localhost","username of database","password of database","database name")
$result=mysqli_query($con,"SELECT * FROM `login` WHERE `username`='$username' && `password`='$password'");
$count=mysqli_num_rows($result);
if($count==1)
{
	echo "Login success";
	$_SESSION['log']=1;
	header("refresh:0;url=findex.php");

}
else
{
	echo "Please Fill Proper Details";
	header("refresh:1;url=Login Page.php");// it takes 2 sec to go index page
}
?>
