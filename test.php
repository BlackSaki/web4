<?php
session_start();
/*Header("Content-type: image/gif");
$im = imagecreate(400,300);
$black = ImageColorAllocate($im, 0,0,0);
$white = ImageColorAllocate($im, 255,255,255);
ImageTTFText($im, 10, -20, 0, 200, $white, "c://WINDOWS//Fonts//simsun.ttc", "I am NUMBER ONE !!");
ImageGif($im);
ImageDestroy($im);
 */
$chars = '一';
$text = '';
$codes = array ();
	
for ($i = 0; $i < strlen( $chars ); $i++) {
	$c = ord ( substr ( $chars, $i, 1 ) );
	$text .= chr ( $c );
	
	$codes []= $c;
}
//176-247
//162-253
//echo ( $text );
//print_r($codes);
$a=array();
$temp0=array();
$temp1=array();
    $arr=array();
    $arr[0]=-1;
    $arr[1]=1;
   // shuffle($arr);
    $text='';
$rand=mt_rand(0,3);
for($i=0;$i<4;$i++)
{
	$codes[1]=127;

	$codes[0]=mt_rand(hexdec('B0'),hexdec('F7'));
while($codes[1]==127 || $codes[1]==126 || $codes[1]==128)
$codes[1]=mt_rand(hexdec('A4'),hexdec('FA'));
//$temp0[$i]=$codes[0];
$temp1[$i]=$codes[1];
   
$temp1[$i]=$temp1[$i]+1;
$temp1[$i]=chr($codes[0]).chr($temp1[$i]);
$temp1[$i]=iconv("GBK","UTF-8",$temp1[$i]);


$a[$i]=chr($codes[0]).chr($codes[1]);
$temp0[$i]=$a[$i]=iconv("GBK","UTF-8",$a[$i]);
if($rand==$i)
{
  $a[8]=chr($codes[0]).chr($codes[1]-1);
  $a[8]=iconv("GBK","UTF-8",$a[8]);

}
//$text.=$a[$i];
}
// $a[0]=iconv("GB2312","UTF-8",$a[0]);
//echo $temp1[0];
//echo $a[0];
for($i=4;$i<8;$i++):
	$j=$i-4;
	$a[$i]=$temp1[$j];
endfor;
//echo mb_strlen($text);
$im_x = 230;   //背景宽度
$im_y = 280;    //背景高度
$im = imagecreatetruecolor($im_x,$im_y); 
$color = ImageColorAllocate($im,255,255,255);
    imagefill($im,0,0,$color);  
    $text_c = ImageColorAllocate($im, 0,0,0); 
   // $tmpC0=mt_rand(100,255); 
    //$tmpC1=mt_rand(100,255); 
    //$tmpC2=mt_rand(100,255); 
     
    //imagefill($im, 16, 13, $buttum_c); 
    //echo $text; 
    $font = "./7.ttf"; 
    //echo strlen($text); 

    //$text=iconv("gb2312","UTF-8",$text); 
    //echo mb_strlen($text,"UTF-8"); 
     for ($i=0;$i<4;$i++) 
     { 
	    //$tmp =mb_substr($text,$i,2,"GB2312");
	  //   echo $a[$i]; 
	    // $a[$i]=iconv("GB2312","UTF-8",$a[$i]);
            $array = array(-1,1); 
            $p = array_rand($array); 
            $an = $array[$p]*mt_rand(1,20);//角度 
	   // $an=0;
            $size = mt_rand(16,20);        //字体大小 
            imagettftext($im,$size,$an,20+$i*20,30,$text_c,$font,$a[$i]); 

     } 
     $size=20;
     shuffle($a);
     for($m=0;$m<9;$m++)
     {
     
        if($a[$m]==$temp0[0])
		$_SESSION['a1']=$m+1;
	  if($a[$m]==$temp0[1])
		  $_SESSION['a2']=$m+1;
	   if($a[$m]==$temp0[2])
		   $_SESSION['a3']=$m+1;
	    if($a[$m]==$temp0[3])
		$_SESSION['a4']=$m+1;
     
     
     
     
     
     
     }
     //echo $a[1];
     //mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(20,40),mt_rand(140,125)
     $font_arr=array();
     for($k=1;$k<8;$k++)
	     $font_arr[$k]="./".$k.".ttf";
    
    /* imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(20,40),mt_rand(140,125),$text_c,$font_arr[1],$a[0]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(90,110),mt_rand(140,125),$text_c,$font_arr[2],$a[1]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(160,180),mt_rand(140,125),$text_c,$font_arr[3],$a[2]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(20,40),mt_rand(200,185),$text_c,$font_arr[4],$a[3]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(90,110),mt_rand(200,185),$text_c,$font_arr[5],$a[4]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(160,180),mt_rand(200,185),$text_c,$font_arr[6],$a[5]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(20,40),mt_rand(260,245),$text_c,$font_arr[7],$a[6]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(90,110),mt_rand(260,245),$text_c,$font_arr[1],$a[7]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(160,180),mt_rand(260,245),$text_c,$font_arr[3],$a[8]);
     */
      imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(20,40),mt_rand(140,125),$text_c,$font_arr[mt_rand(1,7)],$a[0]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(90,110),mt_rand(140,125),$text_c,$font_arr[mt_rand(1,7)],$a[1]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(160,180),mt_rand(140,125),$text_c,$font_arr[mt_rand(1,7)],$a[2]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(20,40),mt_rand(200,185),$text_c,$font_arr[mt_rand(1,7)],$a[3]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(90,110),mt_rand(200,185),$text_c,$font_arr[mt_rand(1,7)],$a[4]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(160,180),mt_rand(200,185),$text_c,$font_arr[mt_rand(1,7)],$a[5]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(20,40),mt_rand(260,245),$text_c,$font_arr[mt_rand(1,7)],$a[6]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(90,110),mt_rand(260,245),$text_c,$font_arr[mt_rand(1,7)],$a[7]);
     imagettftext($im,$size,mt_rand(0,30)*$arr[mt_rand(0,1)],mt_rand(160,180),mt_rand(260,245),$text_c,$font_arr[mt_rand(1,7)],$a[8]);
    // imagettftext($im,$size,0,20,210,$text_c,$font,$a[2]);
    // imagettftext($im,$size,0,90,210,$text_c,$font,$a[3]);

    // imagettftext($im,$size,0,160,210,$text_c,$font,$a[4]);
    // imagettftext($im,$size,0,20,270,$text_c,$font,$a[5]);
    // imagettftext($im,$size,0,90,270,$text_c,$font,$a[6]);
    // imagettftext($im,$size,0,160,270,$text_c,$font,$a[8]);
     $distortion_im = imagecreatetruecolor (230, 280);
     $distortion_im1 = imagecreatetruecolor (230, 280);
     $color = ImageColorAllocate($distortion_im1,255,255,255);
    imagefill($distortion_im1,0,0,$color); 
       for ($i=20; $i<211; $i++) { 
         for ( $j=100; $j<270; $j++) { 
             $rgb = imagecolorat($im, $i , $j); 
             
		    imagesetpixel ($distortion_im1,(int)($i+sin(M_PI/25*($j%50))*3),$j,$rgb); 
		     // imagesetpixel ($distortion_im, $i ,$j , $rgb);
	 } 
       }
          ;
          for($j=0;$j<100;$j++)
		  for($i=0;$i<211;$i++)
	           {
                    $rgb = imagecolorat($im, $i , $j); 
		    imagesetpixel ($distortion_im1,$i,$j,$rgb);
		   } 
	  for ($j=100; $j<270; $j++) { 
         for ( $i=20; $i<211; $i++) { 
             $rgb = imagecolorat($im, $i , $j); 
             
		    imagesetpixel ($distortion_im1,(int)($i+sin(M_PI/95*($i-20))*5),$j,$rgb); 
		     // imagesetpixel ($distortion_im, $i ,$j , $rgb);
           } 
         
   } 
     Header("Content-type: image/PNG"); 

	  ImagePNG($distortion_im1,"./temp.png");
    //以PNG格式将图像输出到浏览器或文件; 
	  
    ImagePNG($distortion_im1); 
  //ImagePNG($im); 

    //销毁一图像,释放与image关联的内存; 
    ImageDestroy($distortion_im1); 

?>
