<?php
$temp1=array();
$a=array();

for($i=0;$i<2;$i++)
{
	$codes[1]=127;

	$codes[0]=mt_rand(hexdec('B0'),hexdec('C7'));
while($codes[1]==127 || $codes[1]==126 || $codes[1]==128)
$codes[1]=mt_rand(hexdec('A4'),hexdec('CA'));
//$temp0[$i]=$codes[0];
$temp1[$i]=$codes[1];
   
$temp1[$i]=$temp1[$i]+1;
$temp1[$i]=chr($codes[0]).chr($temp1[$i]);
$temp1[$i]=iconv("GBK","UTF-8",$temp1[$i]);


$a[$i]=chr($codes[0]).chr($codes[1]);
//$a[$i]=iconv("GBK","UTF-8",$a[$i]);

//$text.=$a[$i];
}
echo $a[0].$a[1];

?>
