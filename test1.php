<?php


//$temp1[$i]=$temp1[$i]+$arr[0];
//AA40
//FEA0
hexdec('4e');
$codes[0]=127;
while($codes[0]==127)
//	$codes[0]=mt_rand(127,128);
 $codes[0]=mt_rand(hexdec('41'),hexdec('A0'));
 $codes[1]=mt_rand(hexdec('AA'),hexdec('FD'));
//$codes[2]=hexdec('A7');
$temp0=chr($codes[1]).chr($codes[0]-1);
$temp1=chr($codes[1]).chr($codes[0]);
$temp2=chr($codes[1]).chr($codes[0]+1);
//echo $temp1;
//$temp1=iconv("GB2312","UTF-8",$temp1;

//echo "12";

echo $temp0.$temp1.$temp2;

?>
