<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"D:\Program Files\phpStudy\Thinkphp_5.0.9bak./app/index\view\index\searchpro.html";i:1536677630;s:75:"D:\Program Files\phpStudy\Thinkphp_5.0.9bak./app/index\view\common\top.html";i:1536329933;s:78:"D:\Program Files\phpStudy\Thinkphp_5.0.9bak./app/index\view\common\bottom.html";i:1536373042;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>搜索结果</title>
    <link rel="stylesheet" type="text/css" href="__searchinfo__" />
    <link rel="stylesheet" type="text/css" href="__frontcss__/page.css" />
    <style type="text/css">
 
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
li{list-style-type:none;}
a{text-decoration:none;}
/*导航*/
#div_nav{width:100%;
         height:60px;
		 background-image: url(__img__/ys.jpg);
		 background-repeat: repeat;
	     }
#ul_nav{width:1000px;
        height:60px;

		margin:0px auto;   
	    }
#ul_nav li{float:left;
           width:12.5%;
		   font:20px "微软雅黑";
		   height:60px;
		   text-align:center;
		   color:#FFF;
		   line-height:60px;
		   margin:0px;
		   padding:0px;
		   letter-spacing:16px;
          }
.li_nav a{color:#FFF;}
.li_nav a:list,.li_nav a:visited{color:#FFF;
	                 	         }
.li_nav a:hover{display:inline-block;
	            width:90%;
                height:60px;
				background-image: url(__img__/ys1.jpg);
                background-repeat: repeat;
				color:#FFF;
				}
/*#li_nav_this{background:#FC0;}*/

</style>
</head>

<body>
<div id="div_nav">
<ul id="ul_nav">
<li class="li_nav" style="padding-top:3px"><img width="100%" src="__img__/logo13.png"></li>
<li class="li_nav" id="li_top"><a href="/index.html">首页</a></li>
<li class="li_nav" id="li_nav_this"><a href="/jj.html">家具</a></li>
<li class="li_nav"><a href="/jd.html">家电</a></li>
<li class="li_nav"><a href="/yw.html">衣物</a></li>
<li class="li_nav"><a href="/sp.html">私品</a></li>
<li class="li_nav"><a href="/sj.html">书刊</a></li>
<li class="li_nav"><a href="/cw.html">宠物</a></li>
</ul>
</div>

</body>
</html>
<div id="div_search">
<form id="form1" name="form1" method="post" action="/searchpro.html" target="_blank" onsubmit="return search(this)">
    <input id="inp1" type="text" name="keywords" id="keywords" placeholder="关键词" />
    <input id="but1" type="submit" name="button" id="button" value="搜索" />
</form>
<p id="p_sc">
输入关键字：
</p>

<script>
function search(form){
     if(form.keywords.value==""){
		  alert("还未输入你想要搜索的产品");
		  form.keywords.focus();
		  return false;
     }
	 return true;
}
</script>

</div>
<p id='p_total'>共查到<?php echo $total; ?>条</p>  
<table border='0' width='90%' cellpadding='10' cellspacing='0' align='center'>     
<tr>
<th>图片</th><th>名称</th><th>发布人</th><th>发布时间</th><th>数量</th><th>价格</th><th width='15%'>描述</th><th width='15%'>条件</th><th>有无预订</th>
<?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$proinfo): ?>
<tr>
	<td><a href="/proshow/id/<?php echo $proinfo['pro_id']; ?>"><img src='__img__/pro/<?php echo $proinfo['pro_pic']; ?>' width='100'></a></td>
	<td><?php echo $proinfo['pro_name']; ?></td>
	<td><?php echo $proinfo['username']; ?></td>
	<td><?php echo $proinfo['pubtime']; ?></td>
	<td><?php echo $proinfo['number']; ?></td>
	<td><?php echo $proinfo['pro_price']; ?></td>
	<td valign='top' align='justify'><?php echo $proinfo['pro_about']; ?></td>
	<td valign='top' align='justify'><?php echo $proinfo['pro_con']; ?></td>
	<?php if($proinfo['setorder'] == 0): ?>
			<td valign='top' style='color:blue;'>还未预订</td>
	<?php else: ?>
			<td valign='top' style='color:red;'>已经预订</td>
	<?php endif; ?>
</tr>
<?php endforeach; endif; else: echo "" ;endif; else: ?>
还没有产品
<?php endif; ?>

</table>
<div style='width:90%;height:40px;margin:10px auto;'>
<?php echo $list->render(); ?>
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">

*{margin:0;padding:0;}
a,img{border:0;}
a{text-decoration:none;}
li{list-style-type:none;}
#div_bot{clear:both;
	     width:100%;
         height:280px;
		 background:#666;
		 margin-top:15px;
	     font-size:16px;
	     font-family: "微软雅黑";
	    }
#ulink{
	   padding:10px 0px 10px 60px;
	   }
#ulink li{margin:5px;}
.ulj a:hover{color:red;}
#div_bot p,h4{text-align:center;
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

</style>

</head>

<body>
<div id="div_bot">
<h3 style="background:rgba(200,200,200,0.8);padding:15px 0px 10px 15px;">
<a href="/about.html" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">关于本站</a> <font style="color:rgb(153,102,0);">｜</font>
<a id="ly" href="/leavemessage/index.php" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">留&nbsp;言</a>
<span id="span_hits">

</span>
</h3>
<ul id="ulink">
    <li><h3>友情链接:</h3></li>
    <li class="ulj"><a style="color:black;" href="https://www.freecycle.org/" onmouseover="this.style.color='red';" onmouseout="this.style.color='black';">Freecycle(全球捐赠网)</a></li>
</ul>

<h4>个人旧物私物馈赠分享平台</h4>
<p><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:379215781:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
<p>Copyright © <span id="bq"></span> www.51mfgs.com  版权所有 粤ICP备18045267号</p>

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

