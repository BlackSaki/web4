<?php
session_start();
for($i=0;$i<2;$i++)
{
	$codes[0]=mt_rand(hexdec('B0'),hexdec('D7'));
//while($codes[1]==127 || $codes[1]==126 || $codes[1]==128)
$codes[1]=mt_rand(hexdec('A1'),hexdec('CC'));
$b[$i]=chr($codes[0]).chr($codes[1]);
$a[$i]=iconv("GB2312","UTF-8",$b[$i]);
//echo $a[$i];
}

require_once('pinyin_table.php');

function get_pinyin_array($string)
{
	global $pinyin_table;
	$flow = array();
	for ($i=0;$i<strlen($string);$i++)
	{
		if (ord($string[$i]) >= 0x81 and ord($string[$i]) <= 0xfe) 
		{
			$h = ord($string[$i]);
			if (isset($string[$i+1])) 
			{
				$i++;
				$l = ord($string[$i]);
				if (isset($pinyin_table[$h][$l])) 
				{
					array_push($flow,$pinyin_table[$h][$l]);
				}
				else 
				{
					array_push($flow,$h);
					array_push($flow,$l);
				}
			}
			else 
			{
				array_push($flow,ord($string[$i]));
			}
		}
		else
		{
			array_push($flow,ord($string[$i]));
		}
	}
	return $flow;
}
$pin = get_pinyin_array($b[0].$b[1]);
$c0=count($pin[0]);
$c1=count($pin[1]);
if($c0==1 && $c1==1)
	$_SESSION['code4a']=$pin[0][0].$pin[1][0];
if($c0==2 && $c1==1)
{
	$_SESSION['code4a']=$pin[0][0].$pin[1][0];
	$_SESSION['code4b']=$pin[0][1].$pin[1][0];


}
if($c0==1 && $c1==2)
{

    	$_SESSION['code4a']=$pin[0][0].$pin[1][0];
	$_SESSION['code4b']=$pin[0][0].$pin[1][1];

}
//print_r($pin1);
//echo $a[0].$a[1];
//echo count($pin1[0]);
//echo count($pin1[1]);








$im_x =130;   //背景宽度
$im_y = 100;    //背景高度
$im = imagecreatetruecolor($im_x,$im_y); 
$color = ImageColorAllocate($im,255,255,255);
    imagefill($im,0,0,$color);  
$text_c = ImageColorAllocate($im, 215,10,255); 
 $font = "./kongxin.ttf"; 
    //echo strlen($text); 

    //$text=iconv("gb2312","UTF-8",$text); 
    //echo mb_strlen($text,"UTF-8"); 
     for ($i=0;$i<2;$i++) 
     { 
	    //$tmp =mb_substr($text,$i,2,"GB2312");
	  //   echo $a[$i]; 
	    // $a[$i]=iconv("GB2312","UTF-8",$a[$i]);
            $array = array(-1,1); 
            $p = array_rand($array); 
            $an = $array[$p]*mt_rand(1,20);//角度 
	   // $an=0;
            $size = mt_rand(30,40);        //字体大小 
            imagettftext($im,$size,$an,$i*40,60,$text_c,$font,$a[$i]); 

     } 

      Header("Content-type: image/PNG"); 

	  //ImagePNG($im,"./temp.png");
    //以PNG格式将图像输出到浏览器或文件; 
	  
    ImagePNG($im); 
  //ImagePNG($im); 

    //销毁一图像,释放与image关联的内存; 
    ImageDestroy($im); 
?>
