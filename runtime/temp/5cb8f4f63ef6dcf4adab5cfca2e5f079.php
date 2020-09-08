<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:24:"./template/user/reg.html";i:1597054243;s:32:"./app/index/view/common/top.html";i:1592137484;s:35:"./app/index/view/common/bottom.html";i:1592150251;}*/ ?>
<!DOCTYPE html> 
 <html lang="en"> 
 <head> 
 <meta charset="UTF-8"> 
 <title>用户注册</title> 
 <script type="text/javascript" src="__js__/checkform.js"> </script> 
 <script src="/public/static/js/jquery/jquery3.0.js"></script>
 <style type="text/css"> 
 
body
{
  /*background-image: url(__img__/fm.jpg);
  background-clip: content-box; */
} 
a
{
  text-decoration: none;
  color:black;
}
a:hover
{
  color:red;
}
div#div_main{
	width:650px;
	margin:50px auto;
	border:1px solid rgba(220,220,220,0.4);
    border-radius:15px;
    background: white;
    box-shadow: 3px 3px 5px rgba(220,220,220,0.8);    
    opacity:0.9;
	}
table{
   width:600px;
   margin:5px auto;

}

.input1
{
  width: 300px;
  height: 30px;
  font-size: 18px;
  padding-left:6px;
}
.input2
{
  padding:2px 15px;
  border-radius: 5px;
  font-size:18px;
  font-family: "黑体";

}
.input2:hover
{
   background: red;
}
 .td_first
 {color:black;
  font-family: "黑体";
  width: 100px;
  font-size: 17px;

 }
 textarea
 {
  font-size: 17px;
  width:300px;
  padding-top:6px;
  padding-left:6px;
  overflow:hidden;
 }

 div.result{
  font:16px 'Microsoft Yahei';
 }
input[type=checkbox]{
   zoom:150%;
   vertical-align: middle;
   margin:0px 6px 0px 4px;
}

 
 </style> 
 </head> 
 <body> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
<style type="text/css">
*{margin:0;padding:0;}
a{text-decoration:none;}
/*导航*/
/*#div_nav{width:100%;
         height:60px;
		 background-image: url(__img__/ys.jpg);
		 background-repeat: repeat;
	     }*/
#div_nav{width:100%;
         height:60px;
		 background: rgb(51,187,51);
	     }

#ul_nav{width:1100px;
        height:60px;
		margin:0px auto;   
	    }
#ul_nav div{float:left;
           width:12.5%;
		   font:20px "微软雅黑";
		   font-weight: 700;
		   height:60px;
		   text-align:center;
		   color:#FFF;
		   line-height:60px;
		   margin:0px;
		   padding:0px;
          }
span.space_pad{
	padding:0px 8px;
}
.li_nav a{color:#FFF;}
.li_nav a:list,.li_nav a:visited{color:#FFF;
	                 	         }
/*.li_nav a:hover{display:inline-block;
	            width:90%;
                height:60px;
				background-image: url(__img__/ys1.jpg);
                background-repeat: repeat;
				color:#FFF;
				}*/
.li_nav a:hover{display:inline-block;
	            width:90%;
                height:60px;
				background:rgb(102,204,102);
				color:#FFF;
				}
/*#li_nav_this{background:#FC0;}*/



</style>
</head>

<body>
<div id="div_nav">
	<div id="ul_nav">
			<div class="li_nav" style="padding-top:3px"><img width="100%" src="__img__/logo13.png"></div>
			<div class="li_nav" id="li_top"><a href="/index.html">首<span class='space_pad'></span>页</a></div>
			<div class="li_nav" id="li_nav_this"><a href="/jj.html">家<span class='space_pad'></span>具</a></div>
			<div class="li_nav"><a href="/jd.html">家<span class='space_pad'></span>电</a></div>
			<div class="li_nav"><a href="/yw.html">衣<span class='space_pad'></span>物</a></div>
			<div class="li_nav"><a href="/sp.html">私<span class='space_pad'></span>品</a></div>
			<div class="li_nav"><a href="/sj.html">书<span class='space_pad'></span>刊</a></div>
			<div class="li_nav"><a href="/cw.html">宠<span class='space_pad'></span>物</a></div>
	</div>
</div>

</body>
</html>
<div id="div_main">
<script>
//打网页获得焦点
$(document).ready(function(){
    $('#username').focus();
});

$(document).ready(function(){   
    checkConfirm();   
});   
//验证用户名是否存在   
function checkConfirm(){   
    
  	// $("#username").blur(function(){  
  	//       var gradename  = $(this).val();
   //          if(gradename==''){ 
  	// 		   $("#username").focus();
  	// 		   alert("不能为空！");			   
  		  
   //          }
  	// });
    $("#username").change(function(){    
          var gradename  = $(this).val();	
          var changeUrl = "/checkname/gradename/"+gradename;      
          $.get(changeUrl,function(str){   
              if(str == '1'){   
                  alert("您输入的用户名存在！请重新输入！");
                  $("#username").val('');
			            $("#username").focus();
              }else{
		          
		          }
          })   
      return false;   
    })   
}   


</script>
<form name="form" action="/savereg" method="post" onsubmit="return checkForm()"> 
 <table width="700px" cellpadding="0" border="0" cellspacing="10" align="center" > 
 <tr style="text-align:left;"> 
     <th colspan="3">&nbsp;&nbsp;如你已经是本站的用户，请点击<a href="/index.html">这里</a>登陆</th> 
 </tr> 
 <tr> 
     <th colspan="3"><h1>会员注册</h1></th> 
 </tr> 
 <tr> 
    <td class="td_first" align="right" >用户名：</td> 
    <td><input class="input1" type="text" name="username" id="username" onkeydown="switchKey(form.userpwd)" onfocus="focus_username()" onblur="blur_username()" ></td> 
    <td><div class="result" id="result_username"></div></td> 
 </tr> 
 <tr> 
    <td class="td_first" align="right">密码：</td> 
    <td><input class="input1" type="password" name="userpwd" onkeydown="switchKey(form.userpwd1)" id="userpwd" onfocus="focus_userpwd()" onblur="blur_userpwd()" /></td> 
    <td><div class="result" id="result_userpwd"></div></td> 
 </tr> 
 <tr> 
    <td class="td_first" align="right">确认密码：</td> 
    <td><input class="input1" type="password" name="userpwd1" onkeydown="switchKey(form.truename)" id="userpwd1" onfocus="focus_userpwd1()" onblur="blur_userpwd1()"/></td> 
    <td><div class="result" id="result_userpwd1"></div></td> 
</tr> 
<tr> 
    <td class="td_first" align="right" >性别：</td> 
    <td class="td_first" align="left" colspan="2">
    男<input type="radio" checked name="sex" value="男" />
    女<input type="radio" name="sex" value="女" />
    </td> 
</tr> 
<tr> 
    <td class="td_first" align="right">电子邮箱：</td> 
    <td><input class="input1" type="text" name="email" onkeydown="switchKey(form.Mobile)" id="email" onfocus="focus_email()" onblur="blur_email()"/></td> 
    <td><div class="result" id="result_email"></div></td> 
 </tr> 
 <tr> 
    <td class="td_first" align="right">手机号码：</td> 
    <td><input class="input1" type="text" name="Mobile" onkeydown="switchKey(form.qq)" id="Mobile" onfocus="focus_Mobile()" onblur="blur_Mobile()"/></td> 
    <td><div class="result" id="result_Mobile"></div></td> 
 </tr> 
 <tr> 
    <td class="td_first" align="right">QQ号码：</td> 
    <td><input class="input1" type="text" name="qq" id="qq" onkeydown="switchKey(form.address)" onfocus="focus_qq()" onblur="blur_qq()"/></td> 
    <td><div class="result" id="result_qq"></div></td> 
 </tr> 
 <tr>
    <td class="td_first" align="right">头像：</td> 
    <td colspan="2" align="left">
       <select name="photo" onchange="form.user_face.src=this.value">
       <?php $__FOR_START_813089472__=0;$__FOR_END_813089472__=11;for($i=$__FOR_START_813089472__;$i < $__FOR_END_813089472__;$i+=1){ ?>
           <option value="__img__/face/<?php echo $i; ?>.gif"><?php echo $i; ?>.gif</option>
       <?php } ?>
       </select> &nbsp;<img id=user_face src="__img__/face/0.gif" width="60" height="60"></td>
</tr>
<tr>
    <td class="td_first" align="right">地址：</td> 
    <td><input class="input1" type="text" name="address" onkeydown="switchKey(form.usermark)" id="address" onfocus="focus_address()" onblur="blur_address()"/></td> 
    <td><div class="result" id="result_address"></div></td> 
</tr>
<tr>
    <td class="td_first" align="right" valign="top">标签：</td>
    <td>
    <textarea name="usermark" onkeydown="switchKey(form.username)" id="usermark" cols="40" rows="10" onfocus="focus_usermark()" onblur="blur_usermark()"></textarea>
    <p style="font:16px 'Microsoft Yahei';">(能代表你个性的一句话)</p>
    </td>
    <td valign="top"><div class="result" style="margin-top:0px;" id="result_usermark"></div></td> 
</tr>
<tr>
    <td class="td_first" align="right" valign="top">兴趣：</td>
    <td colspan="2" valign="top" style="font:16px 'Microsoft Yahei';">

    运动<input type="checkbox" name="inter[]" value="运动" /> 
    旅游<input type="checkbox" name="inter[]" value="旅游" />
    看书<input type="checkbox" name="inter[]" value="看书" />
    唱歌<input type="checkbox" name="inter[]" value="唱歌" />
    上网<input type="checkbox" name="inter[]" value="上网" />
    音乐<input type="checkbox" name="inter[]" value="音乐" />
    摄影<input type="checkbox" name="inter[]" value="摄影" />
    电影<input type="checkbox" name="inter[]" value="电影" />
    交友<input type="checkbox" name="inter[]" value="交友" />
    美食<input type="checkbox" name="inter[]" value="美食" />
    </td>
</tr>
<tr> 
    <td align="center" colspan="3">
    <input id="tjbut" class="input2" type="submit" value="提交" /> 
    <input class="input2" type="reset" value="重置" /></td> 
 </tr> 
 </table> 
 </form>  

<script>
function switchKey(obj){
     if(event.keyCode==40){
             obj.focus();
     }

}

$("body").keydown(function() {
    if (event.keyCode == "13") {//keyCode=13是回车键
        $('#tjbut').click().css('background-color','red').css('color','white').text('提交...');
    }
});  


</script>

 </div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bottom</title>
<style type="text/css">

*{margin:0;padding:0;}
a,img{border:0;}
a{text-decoration:none;}
li{list-style-type:none;}
#div_bot{clear:both;
	     width:100%;
         height:280px;
		 /*background:#666;*/
		 background: rgba(180,180,180,1);
		 margin-top:15px;
	     font-size:16px;
	     font-family: "微软雅黑";
	    }
	    

#div_link{
	   padding:10px 0px 10px 60px;
}
#div_link div{
	margin:5px;
}
#div_link a:hover{
	color:red;
}
#div_bot p,h4{
	text-align:center;
    margin-top:10px;
}

span#span_hits{
	display: inline-block;
	float:right;
}
span#span_hits font{
	border:1px solid lavender;
	padding:2px 5px;
	border-right:none;
	font-family: 宋体;
}

@media only screen and (max-width: 981px){
	 #div_bot{
	 	width:1000px;
     

     }

}

</style>

</head>

<body>
<div id="div_bot">
<h3 style="background:rgb(245,245,245);padding:15px 0px 10px 15px;">
<a href="/about.html" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">关于本站</a> <font style="color:rgb(153,102,0);">｜</font>
<a id="ly" href="/leavemessage/index.php" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">留&nbsp;言</a>
<span id="span_hits">

</span>
</h3>
<div id="div_link">
    <div><h3>友情链接:</h3></div>
    <div><a style="color:black;" href="https://www.freecycle.org/" onmouseover="this.style.color='red';" onmouseout="this.style.color='black';">Freecycle(全球捐赠网)</a></div>
</div>

<h4>个人闲置物品分享平台</h4>
<p>
<!-- <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:379215781:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a> -->

<a id="talk" style="text-decoration:none;color:black;background-image:linear-gradient(to right bottom,rgb(102,208,205),white);border:1px solid rgb(220,220,220);border-radius: 5px;padding:3px 8px;display:inline-block;line-height: 20px;" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes">
              <img height="20px" style="vertical-align: middle;" border="0" src="__img__/icon/QQ.svg" alt="点击这里给我发消息" title="点击这里给我发消息"/>
              <span style="vertical-align: middle;">QQ交谈</span>
    </a>

</p>
<p>Copyright © <span id="bq"></span> www.51mfgs.com  版权所有 粤ICP备18045267号-1</p>

<script>
	var d = new Date();
	var x = document.getElementById("bq");
	x.innerHTML=d.getFullYear();
</script>

</div>
</body>
</html>
 </body> 
 </html>
