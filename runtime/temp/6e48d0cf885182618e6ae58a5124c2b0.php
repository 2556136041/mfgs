<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:37:"./app/index/view/index/searchpro.html";i:1594468560;s:32:"./app/index/view/common/top.html";i:1592137484;s:35:"./app/index/view/common/bottom.html";i:1592150251;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>搜索结果</title>
    <link rel="stylesheet" type="text/css" href="__searchinfo__" />
    <link rel="stylesheet" type="text/css" href="__frontcss__/page.css" />
    <link rel="stylesheet" type="text/css" href="/public/front/css/commonstyle.css" />
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
<div style="width: 100%;height: 15px;"></div>
<div id="div_search">
<form id="form1" name="form1" method="post" action="/searchpro.html" target="_blank" onsubmit="return search(this)">
    <input id="inp1" type="text" onfocus="this.placeholder='';this.style.border='1px solid rgb(51,187,51)'" onblur="this.placeholder='搜你想搜的东西';this.style.border='1px solid rgb(230,230,230)'" name="keywords" id="keywords" placeholder="搜你想搜的东西" />
    <input id="but1" type="submit" name="button" id="button" value="搜索" />
</form>


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

<?php if($resnums > 0): ?>
		<p id='p_total' style="font-weight: 600;">共查到<?php echo $total; ?>条（每页30条），共<?php echo $pages; ?>页／第<?php echo (isset($page) && ($page !== '')?$page:1); ?>页</p>  
		<table border='0' width='90%' cellpadding='10' cellspacing='0' align='center'>     
		<tr>
		<th>图片</th><th>名称</th><th>发布人</th><th>发布时间</th><th>数量</th><th>价格</th><th width='15%'>描述</th><th width='15%'>条件</th><th>有无预订</th>
		</tr>
		<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$proinfo): ?>
		<tr>
			<td><a href="/proshow/id/<?php echo $proinfo['pro_id']; ?>"><p class="p_img"><img src='__img__/pro/<?php echo $proinfo['pro_pic']; ?>' width='100'></a></p></td>
			<td><?php echo $proinfo['pro_name']; ?></td>
			<td><?php echo $proinfo['username']; ?></td>
			<td><?php echo $proinfo['pubtime']; ?></td>
			<td><?php echo $proinfo['number']; ?></td>
			<td><?php echo $proinfo['pro_price']; ?></td>
			<td valign='top' style="text-align:justify;"><?php echo $proinfo['pro_about']; ?></td>
			<td valign='top' style="text-align:justify;"><?php echo $proinfo['pro_con']; ?></td>
			<?php if($proinfo['setorder'] == 0): ?>
					<td valign='top' style='color:#338EDB;'>还未预订</td>
			<?php else: ?>
					<td valign='top' style='color:red;'>已经预订</td>
			<?php endif; ?>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</table>

<?php else: ?>
<table border='0' width='90%' cellpadding='10' cellspacing='0' align='center' style="margin:0px auto;">
<tr>
	<td style="border-bottom:none;font:18px 'Microsoft Yahei';text-align: left;">没有找到你想要的产品，请继续查询！</td>
</tr>
</table>
<div style="width: 100%;height:500px;"></div>

<?php endif; ?>


<div style='width:90%;height:40px;margin:10px auto;'>
<?php echo $list->render(); ?>
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

<literal>
<script>

//设置向baiduspider自动推送
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();


</script>
</literal>
</body>
</html>

