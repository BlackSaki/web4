<?php
session_start();
if($_SESSION['code4a']==$_POST['code4'])
	echo "验证码正确";
else
	
	if($_SESSION['code4b']==$_POST['code4'])
		echo "验证码正确";
         else
		 echo "验证码错误";



?>
