<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Code extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 *
	 */
        public function __cnstruct(){
	
	  
	
	
	}

	public function index(){
	 session_start();
	$shuju=array();

       for($i=0;$i<6;$i++)
      {       $key='i'.$i;
       

               $str = "abcdefghijklmnopqrstuvwxyz"; 
	      $finalStr = "";  for($j=0;$j<9;$j++)
       {       $finalStr .= substr($str,rand(0,25),1);  } 
      

              $str = $finalStr;
              $shuju[$i]=$str;
	      $_SESSION[$key]=$str;
	      
      }
       $random=mt_rand(0,5);
        
       //缩略图加密连接
       
               $str1 = "abcdefghijklmnopqrstuvwxyz"; 
               $finalStr1 = "";  
               for($j=0;$j<9;$j++)
		       $finalStr1 .= substr($str1,rand(0,25),1);  
	      $_SESSION['source_thumb']=$finalStr1; 
	       $data['source_thumb']=$finalStr1;





	       $rand_array1=array();
	       $rand_array2=array();
               $rand_array3=array();


	       $rand_array=range(0,5);
	       shuffle($rand_array);
	       $m=0;
	            while(true)
		    { for($i=0;$i<6;$i++)
		    {     if($rand_array[$i]==$i)
			       {$m++;
		
			       }
		    }
		        if($m>0 && $m<4)
				break;
				 $m=0;
			shuffle($rand_array);
		
		    }

			   
	     /*  for($i=0;$i<$random;$i++)
		       $rand_array1[$i]=$i;
	       for($i=$random+1;$i<6;$i++)
		       $rand_array2[$i]=$i;
               $rand_array3[$random]=$random;
	       //$rand_array($random)=;
//print_r($rand_array);
	       shuffle($rand_array1);
	       shuffle($rand_array2);//调用现成的数组随机排列函数 
	       $rand_array=array_merge($rand_array1,$rand_array3,$rand_array2);
//for($i=0;$i<6;$i++)
//{

//$rand_array[$i]=$rand_array[$i];
	       //} */
    $data['data']=$shuju;
$data['rand']=$rand_array;
$randd=rand(0,6);
//$_SEESION['r']=$randd;
$_SESSION['rand']=6*$randd;
 //$data[var1]=sprintf("%04d",$rand+1);
 //$var2=sprintf("%04d",$rand+2);
 //$var3=sprintf("%04d",$rand+3);
 //$var4=sprintf("%04d",$rand+4);
 //$var5=sprintf("%04d",$rand+5);
 //$var6=sprintf("%04d",$rand+6);
   	$this->load->view('welcome_message',$data);
	}










public function putpic(){
         session_start();
 	$data['url']=$this->uri->segment(3);
	 $this->load->view('putpic',$data);
	
//	echo $_SESSION['i0'];
	}



public function is_no(){
         session_start();
	 $a=1;
	 $i1=2;
//	 $c=
//	 echo $i$a;
	 //echo "123";
	 //echo $_GET['u1'];
	 $temp="http://localhost/web4/index.php/code/putpic/";
         $_GET['u1']=str_replace($temp,'',$_GET['u1']);
         $_GET['u2']=str_replace($temp,'',$_GET['u2']);
         $_GET['u3']=str_replace($temp,'',$_GET['u3']);
         $_GET['u4']=str_replace($temp,'',$_GET['u4']);
         $_GET['u5']=str_replace($temp,'',$_GET['u5']);
         $_GET['u6']=str_replace($temp,'',$_GET['u6']);
       //  $_GET['u2']=strtr($_GET['u2'],$temp,'');
        // $_GET['u3']=strtr($_GET['u3'],$temp,'');
         //$_GET['u4']=strtr($_GET['u4'],$temp,'');
         //$_GET['u5']=strtr($_GET['u5'],$temp,'');
	 //echo strtr($_GET['u6'],$temp,'');
	 // echo $_GET['u1'];
	   $_SESSION['result']=0;	
	 if( $_SESSION['i0']!= $_GET['u1'] ):

		 echo"http://localhost/web4/img/false.png";
	 return false;
	 endif;
		   if( $_SESSION['i1']!= $_GET['u2'] ):
		 echo"http://localhost/web4/img/false.png";
	 return false;
	 endif;
	 if( $_SESSION['i2']!= $_GET['u3'] ):

		 echo"http://localhost/web4/img/false.png";
	 return false;
	 endif;
	 if( $_SESSION['i3']!= $_GET['u4'] ):

		 echo"http://localhost/web4/img/false.png";
	 return false;
	 endif;
	 if( $_SESSION['i4']!= $_GET['u5'] ):

		 echo"http://localhost/web4/img/false.png";
	 return false;
	 endif;
	 if( $_SESSION['i5']!= $_GET['u6'] ):

		 echo"http://localhost/web4/img/false.png";
	 return false;
      	 endif;
		       echo "http://localhost/web4/img/true.png";
                       $_SESSION['result']=1;	
         

}

 public       function op(){
	    
//$this->load->library('image_lib');
$config['image_library'] = 'gd2';
$config['source_image'] = './code/source/8.jpg';
$config['create_thumb'] = TRUE;
$config['maintain_ratio'] = TRUE;
$config['width'] = 100;
$config['height'] = 150;

$this->load->library('image_lib', $config); 

$this->image_lib->resize();
	    
	
echo $this->image_lib->display_errors();	
	
 }



	//*********************
//  扭曲粘连验证码
//****************
//
//
public function code1(){
 session_start();

function make_rand($length="5"){//验证码文字生成函数 
        $str="23456789abcdefghkmnopqrstuvwxyz"; //验证码内容
    $result=""; 
    for($i=0;$i<$length;$i++){ 
        $num[$i]=rand(0,30); 
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
$im_y = 40;    //背景高度
    $im = imagecreateTRUECOLOR($im_x,$im_y); 
   
   // $tmpC0=mt_rand(100,255); 
    //$tmpC1=mt_rand(100,255); 
    //$tmpC2=mt_rand(100,255); 

$color = ImageColorAllocate($im,255,255,255);
//imagefill($im,0,0,$color);
$text_c = ImageColorAllocate($im, 0,189,0); 
   //imagefill($im,0,0,$buttum_c); 
   // imagefill($im, 16, 13, $color); 
    //echo $text; 
    $font = 'c://WINDOWS//Fonts//simsun.ttc'; 
    //echo strlen($text); 

    $text=iconv("gb2312","UTF-8",$text); 
    //echo mb_strlen($text,"UTF-8"); 
    $_SESSION['code1']=$text;
    for ($i=0;$i<mb_strlen($text);$i++) 
    { 
            $tmp =mb_substr($text,$i,1,"UTF-8");    
            $array = array(-1,1); 
            $p = array_rand($array); 
            $an = $array[$p]*mt_rand(1,26);//角度 
	   // $an=0;
            $size = mt_rand(24,28);        //字体大小 
            imagettftext($im,$size,$an,5+$i*$size,30,$text_c,$font,$tmp); 
    } 

    $distortion_im = imagecreatetruecolor ($im_x, $im_y); 
    $buttum_c = ImageColorAllocate($distortion_im,255,255,255);
//imagefill($distortion_im,0,0,$buttum_c);
    //$color = imagecolorat($distortion_im, 10 , 5);
   // imagefill($distortion_im, 16, 13, $buttum_c);
    //$temp1=mt_rand(2,8); 
     for ( $i=0; $i<$im_x; $i++) { 
         for ( $j=0; $j<$im_y; $j++) { 
             $rgb = imagecolorat($im, $i , $j); 
             if( (int)($i+sin($j/$im_y*2*M_PI)*10) <= imagesx($distortion_im) && (int)($i+sin($j/$im_y*2*M_PI)*10) >=0 ) { 
		    imagesetpixel ($distortion_im, (int)($i+sin($j/$im_y*2*M_PI-M_PI*0.5)*3) ,$j , $rgb); 
		     // imagesetpixel ($distortion_im, $i ,$j , $rgb);
             } 
         } 
   } 
    $distortion_im1= imagecreatetruecolor ($im_x, $im_y);
        $buttum_c = ImageColorAllocate($distortion_im1,255,255,255);
//imagefill($distortion_im1,0,0,$buttum_c);
    //生成纵向波新的SIN函数 
    $haha=mt_rand(5,10);        
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
    $distortion_im2= imagecreatetruecolor ($im_x, $im_y);  
     $buttum_c = ImageColorAllocate($distortion_im2,255,255,255);
//imagefill($distortion_im2,0,0,$buttum_c);
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
 for($i=0;$i<$start[0];$i++):
	 for($j=0;$j<$im_y;$j++):
		 $rgb=imagecolorat($distortion_im1, $i , $j);
                 imagesetpixel ($distortion_im2, $i,$j,$rgb);
         endfor;
endfor;

for($x=0;$x<count($start)-1;$x++):
	$result=0;
	for($x1=0;$x1<=$x;$x1++):
		$result+=$end[$x1]-$start[$x1];

	endfor;
 for($i=$end[$x];$i<$start[$x+1];$i++):
	 for($j=0;$j<$im_y;$j++):
		 $rgb=imagecolorat($distortion_im1, $i , $j);
                 imagesetpixel ($distortion_im2, $i-$result,$j,$rgb);
         endfor;
 endfor;
		 endfor; 
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
    ImagePNG($im); 
 //  ImagePNG($distortion_im2); 

    //销毁一图像,释放与image关联的内存; 
    ImageDestroy($distortion_im2); 
    //ImageDestroy($im); 





















}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
