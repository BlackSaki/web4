<?php
session_start();

if($_SESSION['code1']==$_POST['con'])
{
         $_SESSION['result']='1';
	echo "验证码正确";

}
else
{       
         $_SESSION['result']='';
	 echo "验证码错误";


}
?>
