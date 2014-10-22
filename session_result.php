<?php
session_start();
if($_SESSION['result'])
{         $_SESSION['result']='';
	echo '登陆成功';
      
}
else
	echo '验证码错误！登录失败';

?>
