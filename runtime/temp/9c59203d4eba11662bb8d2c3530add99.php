<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:34:"./template/leavemessage/index.html";i:1594471933;s:32:"./template/leavemessage/top.html";i:1594471932;s:35:"./template/leavemessage/bottom.html";i:1594471933;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>留言首页</title>
<link rel="stylesheet" type="text/css"  href="__leavewordcss__/index.css" />
<link rel="stylesheet" href="__frontcss__/page.css" type="text/css" media="screen" />
<style>

</style>
</head>
<body>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言本</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">

     *{font: 14px verdana;
        }
	 div#div_head{width:100%;
	 	          height:155px;
				  background-image:url(__img__/mes/tdtop1.jpg);
	 	          /*background-repeat:repeat-x;*/
				  margin-bottom:0px;
	               }
	 p#p_zw{width:100%;
            height: 15px;
            margin:0px auto;
	        }
	 p#p_marquee{width: 100%;
                 height: 50px;
                 clear: both;
	              }

	 #div_top{margin:0px auto;
	          width:779px;
			  height:100px;
	          }
	 p#p_img{width:30%;
             height: 100%;
             float: left;
			 text-align:left;
			 margin:0px;

	          }
	 p#p_nav{width: 70%;
             height: 100%;
             float: right;
			 margin:0px;

	          }
     p#p_nav a{color: black; 
	           text-decoration: none;
                }
     p#p_nav a:hover{color: red; 
                      }

</style>
</head>

<body>
<div id="div_head">
    <p id="p_zw"></p>
    <p id="p_marquee">
        <marquee scrollamount="2" scrolldelay="80" height="50px">
			 <?php if(!empty(\think\Session::get('unc'))): ?>			 
			         欢迎<?php echo \think\Session::get('unc'); ?>登陆本站！
			
			 <?php else: ?>
				    匿名用户，欢迎来到免费公社留言版！
			 <?php endif; ?>
			 
		</marquee>
    </p>
    <div id="div_top">
       <p id="p_img"><a href="/index.html"><img style="width:100px;height: auto;border: 0;" src="__img__/newlogo2.png" alt=""></a></p>
       <p id="p_nav" style="text-align: center;">    
       <br /><br />
      <a href="/index/Index/index">首&nbsp;&nbsp;页</a>&nbsp;|&nbsp;<a href="/publicmes.html">发表留言</a>&nbsp;|&nbsp;<a href="javascript:location.reload()" target="_self">刷新页面</a>&nbsp;
       <?php if(\think\Session::get('unc') != null): ?>
              <a href="/leavemess_logout.html">退出登录</a>&nbsp;
		
		<?php endif; ?>
        </p>
    </div>
      
</div>
</body>
</html>


<p id="p_pos" style="background: rgb(220,220,220,0.4);">
今天是:<?php echo date('Y-m-d',$now); ?>&nbsp;&nbsp;您当前的位置：查看留言
</p>
<div id="div_main">
<div id="div_left">


<table width="300" height="100" border="0" align="center" cellpadding="0" cellspacing="10">
    <tr>
         <th colspan="2" align="center">用户登录</th>
    </tr>

 <script src="/public/static/js/jquery/jquery3.0.js"></script>
<script language="javascript">
//点击登陆
function login_ajax(){
    var username=$('#username').val();
    var pwd=$('#pwd').val();
    $.get("/login_ok.html",
        {"username":username,"pwd":pwd},function(data){
        if(data==0){
             setTimeout(function(){
                   $('#tjbut').css("background-color","red").css('color','white').val('登陆...');
                   window.location="/leavemessage.html"; 
             },1000);             
        }else{
            alert('失败！');
        }
    });
}

//按回车键登陆
$("body").keydown(function() {
    if (event.keyCode == "13") {//keyCode=13是回车键
        var username=$('#username').val();
        var pwd=$('#pwd').val();
        $.get("/login_ok.html",
            {"username":username,"pwd":pwd},function(data){
            if(data==0){
                 setTimeout(function(){
                      $('#tjbut').css("background-color","red").css('color','white').val('登陆...');
                      window.location="/leavemessage.html"; 
                 },1000);                 
            }else{
                alert('失败！');
            }
        });        
    }
}); 
// function chkinputlogin(form){
//  if(form.usernc.value==""){
//  alert("请输入用户昵称！");
//  form.usernc.focus();
//  return(false);
// }

// if(form.userpwd.value==""){
//  alert("请输入登录密码！");
//  form.userpwd.focus();
//  return(false);
// }
// return(true);

// }
</script>


<tr>
    <th class="td_ts">用户名：</th>
    <td><input class="input_con" type="text" size="16" class="inputcss" id="username" name="username" value="<?php echo (\think\Session::get('unc') ?: ''); ?>"></td>
</tr>
<tr>
    <th class="td_ts">密&nbsp;&nbsp;码：</th>
    <td><input class="input_con" type="password" size="16" class="inputcss" id="pwd" name="pwd" value="<?php echo (isset($pwd) && ($pwd !== '')?$pwd:''); ?>"></td>
</tr>
<tr>
    <td colspan="2" align="center">
        <input id="tjbut" class="input_button" type="button" value="登录" onclick="login_ajax()">&nbsp;&nbsp;
        <input class="input_button" type="reset" value="重置" >
    </td>
</tr>
<?php if(\think\Cookie::get('unc') == null): ?>
<tr>
    <td colspan="2" align="left">
       其他登陆方式:&nbsp;<a href="/qqlogin.html"><img valign="middle" border="0" src="__img__/QQ.jpg" width="30px"></a>
    </td>
</tr>
<?php endif; ?>
</form>
</table>
<!-- <p id="p_fg"></p>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="10" >
<tr>
    <th colspan="2" align="center">最新留言</th>
</tr>


<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($data) ? array_slice($data,0,10, true) : $data->slice(0,10, true); if( count($__LIST__)==0 ) : echo "暂无留言" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
 <tr>
     <td width="15" align="right"><img src="__img__/mes/mark_0.gif" width="10" height="10" /></td>
     <td> <a href="/lookleaveword/id/<?php echo $val['id']; ?>.html" class="a1" style="color:black;" onmouseover="this.style.color='red';" onmouseout="this.style.color='black';"><?php echo cut_str($val['title'],8); ?></a> <font color=blue><?php echo substr($val['createtime'],2,8); ?></font></td>
</tr>
<?php endforeach; endif; else: echo "暂无留言" ;endif; ?>


</table> -->

</div>
<div id="div_right">
<table id="tab_main" width="680" border="0" align="center" cellpadding="0" cellspacing="10">
<tr>
<td  colspan="2" align="left">
共有<?php echo $total; ?>条留言
</td>
</tr>
 
<?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$mesval): ?>
<tr>
    <td colspan="2" align="left">
    &nbsp;主&nbsp;&nbsp;题：<?php echo $mesval['title']; ?>
    </td>
</tr>
<tr>
    <td style="height: 25px;padding:5px 10px;background:rgba(200,200,200,0.2);" colspan="2" align="right">
        <?php echo $mesval['createtime']; ?>
	 
    </td>
</tr>
<tr>
    <td width="100" align="center">
        <img width="80%" src="<?php echo (isset($mesval['personinfo']['photo']) && ($mesval['personinfo']['photo'] !== '')?$mesval['personinfo']['photo']:''); ?>" alt="" />
        <br>
        <p style="text-align: center;">
               <?php echo (isset($mesval['personinfo']['username']) && ($mesval['personinfo']['username'] !== '')?$mesval['personinfo']['username']:''); ?>
		</p>
    </td>
    <td width="580" valign="top">留言：<?php echo $mesval['content']; ?></td>
</tr>
<?php endforeach; endif; else: echo "" ;endif; else: ?>
还没有留言
<?php endif; if($total > 10): ?>
<tr>
	<td colspan="2"><hr /></td>
</tr>
<?php endif; ?>
<tr>
    <td colspan="2" align="center">
    <?php echo $list->render(); ?>
          

    </td>
</tr>
</table>
</div>
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">

*{margin:0;
  padding:0;
  }
a,img{border:0;}
a{text-decoration:none;}
li{list-style-type:none;}
div#div_hidden
{
	width:100%;
	height:20px;
	clear:both;
}
div#div_bot{
	     width:100%;
         height:280px;
		 /*background:#666;*/
		 background: rgba(180,180,180,1);

	    }
#ulink{
	   padding:10px 0px 10px 60px;
	   }
#ulink li{margin:5px;}
.ulj a:hover{color:red;}

p.p_con
{
   font-family: "微软雅黑";
   font-size: 16px;
}
p.p_center
{
   text-align:center;
   margin:8px;
}
p.p_tit
{
   font-size:18px;
}
p#p_con
{
   height:40px;
   background:rgba(200,200,200,.2);
   line-height:40px;
}
span#span_hits{
	display: inline-block;
	height:40px;
	line-height:40px;
	float:right;
	
}
span#span_hits font{
	border:1px solid lavender;
	padding:2px 5px;
	border-right:none;
	font-family: 微软雅黑;
    font-size: 16px;
}

</style>

</head>

<body>
<div id="div_hidden">
</div>

<p class="p_con" id="p_con">
&nbsp;&nbsp;&nbsp;&nbsp;<a href="/about.html" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">关于本站</a> <font style="color:rgb(153,102,0);">｜</font>
<a id="ly" href="/banwu.html" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">版&nbsp;务</a>
<span id="span_hits">

</span>
</p>
<div id="div_bot">
<ul id="ulink">
    <li><p class="p_con p_tit">友情链接:</p></li>
    <li class="ulj"><a style="color:black;" href="https://www.freecycle.org/" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">Freecycle(全球捐赠网)</a></li>
</ul>
<p class="p_con p_center p_tit">个人闲置物品分享平台</p>
<p class="p_con p_center"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:379215781:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
<p class="p_con p_center">Copyright © <span id="bq"></span> www.51mfgs.com  版权所有 粤ICP备18045267号-1</p>

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
