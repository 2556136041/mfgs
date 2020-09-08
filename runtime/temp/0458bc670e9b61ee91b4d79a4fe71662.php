<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:25:"./template/test/test.html";i:1586742351;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>isDeviceType</title>
</head>
<body>
<script>
		// var x=navigator;
		// document.write("CodeName=" + x.appCodeName);
		// document.write("<br />");
		// document.write("MinorVersion=" + x.appMinorVersion);
		// document.write("<br />");
		// document.write("Name=" + x.appName);
		// document.write("<br />");
		// document.write("Version=" + x.appVersion);
		// document.write("<br />");
		// document.write("CookieEnabled=" + x.cookieEnabled);
		// document.write("<br />");
		// document.write("CPUClass=" + x.cpuClass);
		// document.write("<br />");
		// document.write("OnLine=" + x.onLine);
		// document.write("<br />");
		// document.write("Platform=" + x.platform);
		// document.write("<br />");
		// document.write("UA=" + x.userAgent);
		// document.write("<br />");
		// document.write("BrowserLanguage=" + x.browserLanguage);
		// document.write("<br />");
		// document.write("SystemLanguage=" + x.systemLanguage);
		// document.write("<br />");
		// document.write("UserLanguage=" + x.userLanguage);
		// if(x.platform=="Win32" || x.platform=="Win64"){
  //            document.write("电脑端用户");
		// }else if(x.platform=="Iphone"){
		// 	 document.write("手机端用户");

		// }else{
		// 	document.write("平板用户");
		// }
var b=IsPC();
if(b){
   document.write("pc端");
}else{
	document.write("手机端");
}
document.write("<br>");
isUserAgent();
document.write("<br>");
if(isWeiXin()){
   document.write("微信端打开");
}


// 1、首先判断pc端还是移动端。 
function IsPC() { 
	var userAgentInfo = navigator.userAgent; 
	var Agents = ["Android", "iPhone", 
	"SymbianOS", "Windows Phone", 
	"iPad", "iPod"]; 
	var flag = true; 
	for (var v = 0; v < Agents.length; v++) { 
		if (userAgentInfo.indexOf(Agents[v]) > 0) { 
		   flag = false; 
		   break; 
		} 
	} 
	return flag; 
} 


// 2、判断用户移动端使用的系统平台 

function isUserAgent(){
    var u = navigator.userAgent; 
	if (u.indexOf('Android') > -1 || u.indexOf('Linux') > -1) { 
	//安卓手机 
	   document.write("安卓手机");
	} else if (u.indexOf('iPhone') > -1) { 
	//苹果手机 
	   document.write("苹果手机");
	} else if (u.indexOf('Windows Phone') > -1) { 
	//winphone手机 
	   document.write("winphone手机");
	} 


}



// 3、判断用户是否在微信中打开 


function isWeiXin(){ 
	var ua = navigator.userAgent.toLowerCase(); 
	if(ua.indexOf('micromessenger') != -1) { 
	   return true; 
	} else { 
	   return false; 
	} 
}
</script>

</body>
</html>