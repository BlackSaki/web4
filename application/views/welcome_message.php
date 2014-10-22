<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="http://localhost/web4/css/style.css" />
	
<script type="text/javascript" src="http://localhost/web4/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="http://localhost/web4/js/jquery-ui-1.10.3.custom.min.js"></script>



</head>
<body>
<div>
<div id="content">
<center>
<div id="source">
<img id="source_thumb" mark="0"  src=http://localhost/web4/index.php/code/putpic/<?php echo $source_thumb;?>         >

</div>
<div id="c1enter">
<p>请拼出上图的图像:</p>
<input type=button value="换一组" onclick="location.reload()" >
</div>

<div id="codepic">



<div id="i1">
<img id="b1" mark="0"  src=http://localhost/web4/index.php/code/putpic/<?php echo $data[$rand[0]];?>         >
</div>

<div id="i2">
<img id="b2" mark="0"  src=http://localhost/web4/index.php/code/putpic/<?php echo $data[$rand[1]];?>         >
</div>

<div id="i3">
<img src=http://localhost/web4/index.php/code/putpic/<?php echo $data[$rand[2]];?>         >
</div>

<div id="i4">
<img src=http://localhost/web4/index.php/code/putpic/<?php echo $data[$rand[3]];?>         >
</div>

<div id="i5">
<img src=http://localhost/web4/index.php/code/putpic/<?php echo $data[$rand[4]];?>         >
</div>

<div id="i6">
<img src=http://localhost/web4/index.php/code/putpic/<?php echo $data[$rand[5]];?>         >
</div>
<div id="button1" onclick="ajax()"></div>
<div id="is_no"><img id="panduan" src="http://localhost/web4/img/false.png"></div>
</div>
</center>
</div>
 
<script>
var temp;
var tuo;
function ajax(){
	var all=document.getElementsByTagName("img");
	//for(var i=0;i++;i<6)
       // alert("ajax");
	$.get("http://localhost/web4/index.php/code/is_no",{
		u1:all[1].src,
		u2:all[2].src,
		u3:all[3].src,
		u4:all[4].src,
		u5:all[5].src,
		u6:all[6].src
	
	
	
		
	
	
	},function(data,textStatus){
	
	 // $("#is_no").html(data);
           var url=data;
	  // alert(url);	 
	   var rt=document.getElementById("panduan");
	   rt.src=url;
	     
});


}
$(function(){
	$('#codepic img').draggable({start:function(){temp=this.src;tuo=this;},revert:true,cursor:'pointer',opacity:'1',zIndex:'3'});


$('#codepic img').droppable({

  drop:function(event,ui){
          
	  
	  tuo.src=this.src;
	  this.src=temp;
	  ajax();
  
  }


});

});
</script>
</body>
</html>
