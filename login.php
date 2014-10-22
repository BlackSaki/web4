<html>
<head>

<link rel="stylesheet" href="login.css" type="text/css">


</head>
<script type="text/javascript">
//var result='';

var docEle = function()
{
return document.getElementById(arguments[0]) || false;
}
function openNewDiv(_id,url)
{
//alert(url);
var m = "mask";
if (docEle(_id)) document.body.removeChild(docEle(_id));
if (docEle(m)) document.body.removeChild(docEle(m));

//mask遮罩层
var newMask = document.createElement("div");
newMask.id = m;
newMask.style.position = "absolute";
newMask.style.zIndex = "1";
_scrollWidth = Math.max(document.body.scrollWidth,document.documentElement.scrollWidth-100);
_scrollHeight = Math.max(document.body.scrollHeight,document.documentElement.scrollHeight-15);
newMask.style.width = _scrollWidth + "px";
newMask.style.height = _scrollHeight + "px";
newMask.style.top = "0px";
newMask.style.left = "0px";
newMask.style.background = "#33393C";
newMask.style.filter = "alpha(opacity=40)";
newMask.style.opacity = "0.40";
document.body.appendChild(newMask);
//弹出层
var newDiv = document.createElement("div");
newDiv.id = _id;
newDiv.style.position = "absolute";
newDiv.style.zIndex = "9999";
newDivWidth = 550;
newDivHeight = 500;
newDiv.style.width = newDivWidth + "px";
newDiv.style.height = newDivHeight + "px";
newDiv.style.top = (document.body.scrollTop + document.body.clientHeight/2 - newDivHeight/2) + "px";
newDiv.style.left = (document.body.scrollLeft + document.body.clientWidth/2 - newDivWidth/2) + "px";
newDiv.style.background = "#EFEFEF";
newDiv.style.border = "1px solid #860001";
newDiv.style.padding = "5px";
newDiv.innerHTML = '<iframe scrolling="no" width="500" height="460" src='+url+'></iframe>';
document.body.appendChild(newDiv);
//弹出层滚动居中
function newDivCenter()
{
newDiv.style.top = (document.body.scrollTop + document.body.clientHeight/2 - newDivHeight/2-50) + "px";
newDiv.style.left = (document.body.scrollLeft + document.body.clientWidth/2 - newDivWidth/2-50) + "px";
}
if(document.all)
{
window.attachEvent("onscroll",newDivCenter);
}
else
{
window.addEventListener('scroll',newDivCenter,false);
}
//关闭新图层和mask遮罩层
var newA = document.createElement("a");
newA.href = "#";
newA.innerHTML = "关闭";
var result=0;
newA.onclick = function()
{


if(document.all)
{
window.detachEvent("onscroll",newDivCenter);
}
else
{
window.removeEventListener('scroll',newDivCenter,false);
}
document.body.removeChild(docEle(_id));
document.body.removeChild(docEle(m));
return false;
}
newDiv.appendChild(newA);
}
function close(){


if(document.all)
{
window.detachEvent("onscroll",newDivCenter);
}
else
{
window.removeEventListener('scroll',newDivCenter,false);
}
document.body.removeChild(docEle(_id));
document.body.removeChild(docEle(m));
return false;



}
</script>
<body>
<div id="menu">

<a href="http://localhost/web4/login.php?url=1">粘连扭曲</a>
<a href="http://localhost/web4/login.php?url=2">拼图验证码</a>
<a href="http://localhost/web4/login.php?url=3">汉字选择</a>
<a href="http://localhost/web4/login.php?url=4">拼音验证码</a>

</div>
<div id="login">
<div id="login_top">Login:</div>
<div id="login_content">
<form name="testform" id="submit" action="session_result.php" >
<ul class="input_test">

<li>
<label for="inp_name"></label>
&nbsp <input id="inp_name" class="input_out" name="" placeholder="请输入用户名" type="text" onfocus="this.className='input_on';this.onmouseout=''" onblur="this.className='input_off';this.onmouseout=function(){this.className='input_out'};" onmousemove="this.className='input_move'" onmouseout="this.className='input_out'" />

</li>
<li>
<label for="inp_password"></label>
&nbsp <input id="inp_password" class="input_out" placeholder="请输入密码" name="" type="password" onfocus="this.className='input_on';this.onmouseout=''" onblur="this.className='input_off';this.onmouseout=function(){this.className='input_out'};" onmousemove="this.className='input_move'" onmouseout="this.className='input_out'" />

</li>

</ul>
<font style="color:black">验证码</font>:

<div id="captcha">
<?php

if($_GET['url']==1 || $_GET['url']=='')
{

?>
<iframe width=350 height=100 frameborder=0 scrolling=no src="http://localhost/web4/code2.html"></iframe>
<?php

}
if($_GET['url']==2)
{
?>
<br>

<div id="captcha1" onclick="openNewDiv('newDiv','http://localhost/web4/index.php/code');return false;">拼图验证码</div>

<?php
}
if($_GET['url']==3)
{

?>
<br>

<div id="captcha3" onclick="openNewDiv('newDiv','http://localhost/web4/code3.html');return false;">汉字选择型</div>

<?php
}
if($_GET['url']==4)
{
?>
<iframe width=350 height=100 frameborder=0 scrolling=no src="http://localhost/web4/code4.html"></iframe>
<?php
}

?>
<input id="submit" type="submit" value="登录" class="pass-button pass-button-submit">

</form>

</div>




</div>


</body>

<script>
//var result=0;
var submit=document.getElementById("submit");
//submit.disabled=true;
//submit.style.color="#ccc"



</script>
</html>