<?php
session_start();
//echo $_SESSION['a1'];
if($_POST['con']==$_SESSION['a1'].$_SESSION['a2'].$_SESSION['a3'].$_SESSION['a4'])
{
        $_SESSION['result']=1;
	echo "验证码正确";
        
}
      else
{
	      echo "验证码错误!";
              $_SESSION['result']='';
}


?>
