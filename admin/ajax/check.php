<?php
require('../dbconnect.php');
$dcode=$_POST['code'];
//echo $dcode;exit();
$query="SELECT * FROM destination WHERE dcode='$dcode'";
$result=mysqli_query($connect,$query);
if(mysqli_num_rows($result)>0){ echo "This destination code is taken."; }
?>