<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件



//列出所有粉丝
function fslist($data){
	$arr=explode(",",$data);	
	return $arr;
}

//删除粉丝，每次一个
function delfs($allfs,$fsname){
      $arr=explode(",",$allfs);
      if(in_array($fsname, $arr)){
      	  foreach ($arr as $key=>$value){
		      if ($value === $fsname){
		         unset($arr[$key]);
		      }
          }
      }
}


//加关注
function followfs($oldfs,$newname){
	  $arr=explode(",",$oldfs);
	  $str1=$newname;
      array_push($arr,$str1);
      $arrchangestr=join(',',$arr);
      return $arrchangestr;
}

// 计算粉丝数

function countfs($allfs){
       $arr=explode(",",$allfs);
       return count($arr); 
	       
}

function is_class($obj){
	if(gettype($obj)=="string"){
		echo "string";
	}elseif (gettype($obj)=="array") {
		echo "array";
	}elseif (gettype($obj)=="integer") {
		echo "integer";
	}elseif (gettype($obj)=="object") {
		echo "object";
	}else {
		echo "unknown type";
	}

}

// httpCurl
function httpCurl($url, $params, $method = 'GET', $header = array(), $multi = false)
{
        date_default_timezone_set('PRC');  
        $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $header,
            CURLOPT_COOKIESESSION  => true,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_COOKIE         =>session_name().'='.session_id(),

        );        

        /* 根据请求类型设置特定参数 */

        switch(strtoupper($method)){   
              case 'GET':       
              // $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                      // 链接后拼接参数  &  非？
                      $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);                
                      break;            
              case 'POST':                //判断是否传输文件

                      $params = $multi ? $params : http_build_query($params);                
                      $opts[CURLOPT_URL] = $url;               
                      $opts[CURLOPT_POST] = 1;                
                      $opts[CURLOPT_POSTFIELDS] = $params;                
                      break;            
              default:                
                     throw new Exception('不支持的请求方式！');

        }        

        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);  
        $data  = curl_exec($ch);   
        $error = curl_error($ch);
        curl_close($ch);        
        if($error) throw new Exception('请求发生错误：' . $error); 
        return  $data;

}

//Curl_post
function curl_post($url,array $params=array()){
       $data_string=json_encode($params);
       $ch=curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
       curl_setopt($ch, CURLOPT_HTTPHEADER, 
             array(
                'Content-Type:application/json'
             )

        );

       $data = curl_exec($ch); 
       curl_close($ch); 
       return $data;      

}

//Curl_get
function curl_get($url){
       $ch=curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
       $file_contents=curl_exec($ch);
       curl_close($ch);
       return $file_contents;   

}
//字符串截取
function cut_str($sourcestr,$cutlength)  
{  
   $returnstr='';  
   $i=0;  
   $n=0;  
   $str_length=strlen($sourcestr);//字符串的字节数  
   while (($n<$cutlength) and ($i<=$str_length))  
   {  
      $temp_str=substr($sourcestr,$i,1);  
      $ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码  
      if ($ascnum>=224)    //如果ASCII位高与224，  
      {  
    $returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符          
         $i=$i+3;            //实际Byte计为3  
         $n++;            //字串长度计1  
      }  
      elseif ($ascnum>=192) //如果ASCII位高与192，  
      {  
         $returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符  
         $i=$i+2;            //实际Byte计为2  
         $n++;            //字串长度计1  
      }  
      elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，  
      {  
         $returnstr=$returnstr.substr($sourcestr,$i,1);  
         $i=$i+1;            //实际的Byte数仍计1个  
         $n++;            //但考虑整体美观，大写字母计成一个高位字符  
      }  
      else                //其他情况下，包括小写字母和半角标点符号，  
      {  
         $returnstr=$returnstr.substr($sourcestr,$i,1);  
         $i=$i+1;            //实际的Byte数计1个  
         $n=$n+0.5;        //小写字母和半角标点等与半个高位字符宽...  
      }  
   }  
         if ($str_length>$i){  
          $returnstr = $returnstr . "...";//超过长度时在尾处加上省略号  
      }  
    return $returnstr;  
}

//提交过滤

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//获取IP

function getip(){ 
       if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")){
           $ip = getenv("HTTP_CLIENT_IP"); 
       }else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")){ 
           $ip = getenv("HTTP_X_FORWARDED_FOR"); 
       } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")){
          $ip = getenv("REMOTE_ADDR"); 
       } else if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")){ 
           $ip = $_SERVER['REMOTE_ADDR']; 
       }else { 
           $ip = "unknown"; 
       } 
       return ($ip); 
 } 

function getRealIpAddr(){
      if (!empty($_SERVER['HTTP_CLIENT_IP'])){
          $ip=$_SERVER['HTTP_CLIENT_IP'];
      }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
         $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      }else{
         $ip=$_SERVER['REMOTE_ADDR'];
      }
      return $ip;
} 





?>