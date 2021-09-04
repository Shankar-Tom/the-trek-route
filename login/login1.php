<?php
require('../inc/function.php');

$msg='';
if(isset($_POST['login-email']))
{	$username=$_POST['login-email'];
	$password=md5(md5($_POST['login-password']));
	//print_r($password);exit();
    $sql="SELECT * FROM admin";
    $result=mysqli_query($connect,$sql);
   	$ad=mysqli_fetch_assoc($result);
   	if($ad['username']== $username && $ad['password']==$password)
	{
    session_start();

	$_SESSION['user'] = $username;
	$_SESSION['type'] = $ad['admintype'];
	$_SESSION['pass'] = "yes";
	$msg=1;
}

}

echo $msg; 
?>