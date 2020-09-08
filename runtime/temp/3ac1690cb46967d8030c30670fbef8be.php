<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:36:"./template/user/userupdatebytel.html";i:1594471481;s:32:"./app/index/view/common/top.html";i:1592137484;s:35:"./app/index/view/common/bottom.html";i:1592150251;}*/ ?>
<!DOCTYPE html> 
 <html lang="en"> 
 <head> 
 <meta charset="UTF-8"> 
 <title>修改密码</title> 
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
		width:50%;
		margin:50px auto;
		border:1px solid rgba(220,220,220,0.4);
	    border-radius:15px;
	    background: white;
	    box-shadow: 3px 3px 5px rgba(220,220,220,0.8);    
	    opacity:0.9;
	}
div#div_cut{
		width:100%;
		min-height: 200px;

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

</script>
<form name="form" action="/updatebytelyzm_user" method="post" onsubmit="return checkForm()"> 
 <table width="700px" cellpadding="0" border="0" cellspacing="10" align="center" > 

 <tr> 
    <td class="td_first" align="right">密码：</td> 
    <td><input class="input1" type="password" name="userpwd" id="userpwd" onfocus="focus_userpwd()" onblur="blur_userpwd()" /></td> 
    <td><div class="result" id="result_userpwd"></div></td> 
 </tr> 
 <tr> 
    <td class="td_first" align="right">确认密码：</td> 
    <td><input class="input1" type="password" name="userpwd1" id="userpwd1" onfocus="focus_userpwd1()" onblur="blur_userpwd1()"/></td> 
    <td><div class="result" id="result_userpwd1"></div></td> 
</tr> 

<tr> 
    <td align="center" colspan="3">
    <input type="hidden" name="username" value="<?php echo $data['username']; ?>">
    <input type="hidden" name="sex" value="<?php echo $data['sex']; ?>">
    <input type="hidden" name="tel" value="<?php echo $data['tel']; ?>">
    <input type="hidden" name="email" value="<?php echo $data['email']; ?>">
    <input type="hidden" name="address" value="<?php echo $data['address']; ?>">
    <input type="hidden" name="class" value="<?php echo $data['class']; ?>">
    <input type="hidden" name="usermark" value="<?php echo $data['usermark']; ?>">
    <input type="hidden" name="inter" value="<?php echo $data['inter']; ?>">
    <input type="hidden" name="state" value="<?php echo $data['state']; ?>">
    <input type="hidden" name="regtime" value="<?php echo $data['regtime']; ?>">
    <input type="hidden" name="lastlogintime" value="<?php echo $data['lastlogintime']; ?>">
    <input type="hidden" name="logintimes" value="<?php echo $data['logintimes']; ?>">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <input type="hidden" name="photo" value="<?php echo $data['photo']; ?>">
    <input type="hidden" name="truename" value="<?php echo $data['truename']; ?>">
    <input type="hidden" name="userID" value="<?php echo $data['userID']; ?>">
    <input type="hidden" name="ip" value="<?php echo $data['ip']; ?>">
    <input type="hidden" name="qq" value="<?php echo $data['qq']; ?>">
    <input id="tjbut" class="input2" type="submit" value="提交" /> 
    <input class="input2" type="reset" value="重置" /></td> 
 </tr> 
 </table> 
 </form>  

<script>


$("body").keydown(function() {
    if (event.keyCode == "13") {//keyCode=13是回车键
        $('#tjbut').click().css('background-color','red').css('color','white').text('提交...');
    }
});  


</script>

 </div>
 <div id="div_cut">

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
