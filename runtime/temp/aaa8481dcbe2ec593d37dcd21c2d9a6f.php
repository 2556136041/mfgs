<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:31:"./template/user/getbackpwd.html";i:1594471480;s:32:"./app/index/view/common/top.html";i:1592137484;s:35:"./app/index/view/common/bottom.html";i:1592150251;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>取回密码</title>
<style type="text/css">
 
    a{text-decoration: none;}
    a:hover{color:red;}
	div#div_main{
		width:700px;
		margin:50px auto;
		/*border:1px solid black;*/
	}
	div#div_cut{
		width:100%;
		min-height: 200px;

	}
	table{width:700px;

	      }
	th{text-align: right;}
	td{text-align: left;}
	
	input[type="button"]{
         margin-right:15px;
		 height:35px;
		 padding:5px 10px;		 
		 font-size:16px;

	}

	input[type="submit"]{
         margin-right:15px;
		 height:35px;
		 width:80px;
		 padding:5px 10px;		 
		 font-size:16px;

	}

	input.inp1
	{
		height:35px;
		font-size:16px;
		/*border:1px solid black;*/
		padding-left:3px;
	}
	h2{width: 600px;margin: 10px auto;margin-bottom:15px;text-align: center; }


</style>

 <script src="/public/static/js/jquery/jquery3.0.js"></script>
<script>
	 $(function(){
            var tel;
            //向指定手机发送验证码
            $("#sendbtn").click(function(){
                 tel=$("#tel").val();
                 var len=tel.length;
                 var num=Math.floor(Math.random()*8999+1000);
                 //alert(num);
                  if(tel!==""){
                          if(len=="11"){
                                 $.get({
						            //请求方式
						            //type : "POST",
						            //请求的媒体类型
						            //contentType: "application/json;charset=UTF-8",
						            //请求地址
						            url : "https://v.juhe.cn/sms/send",
						            //数据，json字符串
						            data : {
						                mobile:tel,
                                        tpl_id:"105908",
                                        tpl_value:encodeURI("#code#=")+num,
                                        key:"e02ff088d77893adeb3e26f0e7070c2c"
						            
						            },
						            dataType:"jsonp",
						            //请求成功
						            success : function(result) {
						                    console.log(result);
						                    $.get("/savetelyzm.html",
												    {"telyzm":num,"tel":tel},
												    function(data){
											           if(data=="1"){
												            console.log("成功");
												            var second = 60;
															var timer = null;
															timer = setInterval(function(){
																second -= 1;
																if(second >0 ){
																	$('#sendbtn').attr("value",second+"秒后重试");
																}else{
																	clearInterval(timer);
																	$('#sendbtn').attr("value","获取验证码");
																}
															},1000);
												        }else {
												              console.log("失败");
												        }  
										  });

						            }
						        });
			        
                          }else{
                               alert("位数不正确!");
                               $("#tel").val("");
                               $("#tel").focus();
                          
                          }
                  
                  }else{
                      alert("不能为空!");
                      $("#tel").focus();
                  
                  }
                  
              });
                  
      });
			
</script>

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
<h2>取回密码</h2>

<table border="0" cellpadding="0" cellspacing="15">
    <form action="/checktelyzm" method="post">
	<tr>
		<th>手机号</th>
		<td><input type="text" class="inp1" id="tel" name="tel" size="40" />
            <input type="button" value="获取验证码" id="sendbtn">

		</td>
	</tr>
	<tr>
		<th>输入验证码</th>
		<td><input type="text" class="inp1" id="verify" name="telyzm" size="40" /></td>
	</tr>
	
	<tr>
	    <td colspan="2" style="text-align:center;">
	    <input size="40" type="submit" id="submit" value="提交" />
	    </td>
		
	</tr>
	</form>
</table>

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