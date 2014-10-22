<?php
 session_start();


function make_rand($length="5"){//验证码文字生成函数 
        $str="abcdefghkmnopqrstuvwxyz"; //验证码内容
    $result=""; 
    for($i=0;$i<$length;$i++){ 
        $num[$i]=rand(0,22); 
        $result.=$str[$num[$i]]; 
    } 
    return $result; 
} 
$checkcode = make_rand(5); 
function make_crand($length="5") { 
    $string = ''; 
    for($i=0;$i<$length;$i++) { 
        $string .= chr(rand(0xB0,0xF7)).chr(rand(0xA1,0xFE)); 
    } 
    return $string; 
} 
$text=make_rand();
$im_x = 140;   //背景宽度
$im_y = 60;    //背景高度
  $im = imagecreate($im_x,$im_y); 
$color = ImageColorAllocate($im,255,255,255);
  //  imagefill($im,0,0,$color);  
    $text_c = ImageColorAllocate($im, 0,0,0); 
   //imagefill($im,0,0,$buttum_c); 
   // imagefill($im, 16, 13, $color); 
    //echo $text; 
    $font = 'c://WINDOWS//Fonts//simsun.ttc'; 
    //echo strlen($text); 

    $text=iconv("gb2312","UTF-8",$text); 
    //echo mb_strlen($text,"UTF-8"); 
    $_SESSION['code1']=$text;
    $an=array();
    for ($i=0;$i<mb_strlen($text);$i++) 
    { 
            $tmp =mb_substr($text,$i,1,"UTF-8");    
            $array = array(-1,1); 
            $p = array_rand($array); 
            $an[$i] = $array[$p]*mt_rand(5,12);//角度 
	   // $an=0;
	    $size = mt_rand(28,32);        //字体大小 
	    if($i==0)
		    imagettftext($im,$size,$an[$i],10,50,$text_c,$font,$tmp); 
	    if($i==1)
	    
		   
			    imagettftext($im,$size,-$an[$i],27,50,$text_c,$font,$tmp);
                     
            		    
	    if($i==2)
		    imagettftext($im,$size,$an[$i],44,50,$text_c,$font,$tmp); 
	    if($i==3)
		    imagettftext($im,$size,$an[$i],61,50,$text_c,$font,$tmp); 
            if($i==4)
            imagettftext($im,$size,$an[$i],78,50,$text_c,$font,$tmp); 
    } 

    $distortion_im = imagecreate($im_x, $im_y); 
   $buttum_c = ImageColorAllocate($distortion_im,255,255,255);
imagefill($distortion_im,0,0,$buttum_c);
    //$color = imagecolorat($distortion_im, 10 , 5);
   // imagefill($distortion_im, 16, 13, $buttum_c);
    //$temp1=mt_rand(2,8); 
     for ( $i=0; $i<$im_x; $i++) { 
         for ( $j=0; $j<$im_y; $j++) { 
             $rgb = imagecolorat($im, $i , $j); 
             if( (int)($i+sin($j/$im_y*2*M_PI)*10) <= imagesx($distortion_im) && (int)($i+sin($j/$im_y*2*M_PI)*10) >=0 ) { 
		    imagesetpixel ($distortion_im, (int)($i+sin($j/$im_y*2*M_PI-M_PI*0.5)*6) ,$j , $rgb); 
		     // imagesetpixel ($distortion_im, $i ,$j , $rgb);
             } 
         } 
   } 
    $distortion_im1= imagecreate ($im_x, $im_y);
        $buttum_c = ImageColorAllocate($distortion_im1,255,255,255);
imagefill($distortion_im1,0,0,$buttum_c);
    //生成纵向波新的SIN函数 
    $haha=mt_rand(2,8);        
    $half_t=mt_rand(120,240);
    $boxing=mt_rand(0,$half_t);
   // $sin=sin(M_PI/$half_t*());
      for ( $j=0; $j<$im_y; $j++) { 
	      for ( $i=0; $i<$im_x; $i++) {
		       $rgb1 = imagecolorat($distortion_im, $i , $j); 
	                 imagesetpixel ($distortion_im1, $i,$j+(int)(sin(M_PI/$half_t*($i-$boxing))*$haha),$rgb1);         
	      }
      }
    $a="";
    $nu=0;
    $arr=array();
   //	print_r($color);  
    $distortion_im2= imagecreate ($im_x, $im_y);  
    $buttum_c = ImageColorAllocate($distortion_im2,255,255,255);
imagefill($distortion_im2,0,0,$buttum_c);
    for ( $i=15; $i<140; $i++) { 
	    $num=0;
        // echo $i;
	 for ( $j=0; $j<$im_y; $j++) {
		 $rgb2 = imagecolorat($distortion_im1, $i , $j);
	//	 echo $rgb2."*";
		 //$r=($rgb2>>16) & 0xFF;
		 //$g=($rgb2>>8) & 0xFF;
		 //$b=$rgb2 & 0xFF;
		 //echo $r."-".$g."-".$b."#";

	         $is_no=1;	 
		 if($rgb2 !='0')
		 {       $num++;
		        if($num>4):
			 $is_no=0;
		         break(1); 
                        endif;
		      //   echo"123";
		 }
		
	 }
	 //echo "<br>";

       //echo $is_no."$";        
	 //echo "<br>";
	 if($is_no)
	 {   $arr[$nu++]=$i;
	      
	 
	 }
	

 } 
 // for($c=0;$c<count($arr);$c++)
 $c=0;
 $start=array();
 $end=array();
 $ii=0;
 $start[$c]=$arr[$c];
 //echo $arr[0];
 $hj= count($arr);
while($c<($hj-1))
{	 
	       
		 if($arr[$c]+1==$arr[$c+1])
	 
			 $c++;
		 else{
		     $end[$ii++]=$arr[$c++];     
		     $start[$ii]=$arr[$c];

		 
		 }

	      
	 
}	

 /*for($r=0;$r<count($start);$r++){
	 echo $start[$r]."#";
 
 
 
 
 }
 for($r=0;$r<count($end);$r++){
	 echo $end[$r]."@";
 
 
 
 
 }*/
 for($i=0;$i<$start[0];$i++){
	 for($j=0;$j<$im_y;$j++){
		 $rgb=imagecolorat($distortion_im1, $i , $j);
                 imagesetpixel ($distortion_im2, $i,$j,$rgb);
	 }
 }

for($x=0;$x<count($start)-1;$x++){
	$result=0;
	for($x1=0;$x1<=$x;$x1++){
		$result+=$end[$x1]-$start[$x1];

                }
 for($i=$end[$x];$i<$start[$x+1];$i++){
	 for($j=0;$j<$im_y;$j++){
		 $rgb=imagecolorat($distortion_im1, $i , $j);
                 imagesetpixel ($distortion_im2, $i-$result,$j,$rgb);
	 }
 }
}
     //加入干扰象素;i
   /* $count = 600;//干扰像素的数量 
    for($i=0; $i<$count; $i++){ 
            $randcolor = ImageColorallocate($distortion_im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255)); 
            imagesetpixel($distortion_im, mt_rand()%$im_x , mt_rand()%$im_y , $randcolor); 
    } :if expand("%") == ""|browse confirm w|else|confirm w|endif


    $line_c=5; 
     //imageline 
     for($i=0; $i < $line_c; $i++) { 
         $linecolor = imagecolorallocate($distortion_im, 17, 158, 20); 
         $lefty = mt_rand(1, $im_x-1); 
         $righty = mt_rand(1, $im_y-1); 
         imageline($distortion_im, 0, $lefty, imagesx($distortion_im), $righty, $linecolor); 
     } */ 
 Header("Content-type: image/PNG"); 

    //以PNG格式将图像输出到浏览器或文件; 
  //  ImagePNG($im); 
   ImagePNG($distortion_im2); 

    //销毁一图像,释放与image关联的内存; 
  
  //  ImageDestroy($im); 
?>
