<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\Program Files\phpStudy\Thinkphp_5.0.9bak./app/index\view\index\sp.html";i:1536844969;s:75:"D:\Program Files\phpStudy\Thinkphp_5.0.9bak./app/index\view\common\top.html";i:1536329933;s:78:"D:\Program Files\phpStudy\Thinkphp_5.0.9bak./app/index\view\common\bottom.html";i:1536373042;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>私品</title>
<link rel="stylesheet" type="text/css"  href="__frontcss__/pro_center.css" />
<link rel="stylesheet" type="text/css" href="__frontcss__/page.css" />
<style type="text/css">

.loading{width: 100%;
           height: 100%;
           position:fixed;
           top:0;
           left: 0;
           z-index: 100;
           background: white;
           }
.pic{width:80px;
         height:80px;
         background-image:url(images/load.gif);
         position: absolute;
         top: 0;
         bottom: 0;
         left: 0;
         right: 0;
         margin:auto;
}



</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
  document.onreadystatechange=function(){
	      var loading='<div class="loading"><div class="pic"></div></div>';
	      $('body').append(loading);
          if(document.readyState=='complete'){
          	  $('.loading').fadeOut();
          };
	}
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

<div id="div_lead">
&nbsp;<img height="25px" align="top" src="__img__/currentpos.png">&nbsp;当前位置：<a href="/index/Index/index">首页</a> >> 私品
</div>
<div id="div_show">
<?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$all): switch($all['setorder']): case "0": ?>
<p class='p_img'><a href='/proshow/id/<?php echo $all['pro_id']; ?>'><img class='pro_order' width='100%' height='100%' src='__img__/pro/<?php echo $all['pro_pic']; ?>' alt='' /></a>
<span id="span_about"><?php echo $all['pro_name']; ?>&nbsp;&nbsp;&yen;<?php echo $all['pro_price']; ?>&nbsp;
<font color='blue'>未预订</font>
<?php break; case "1": ?>
<p class='p_img'><a href='javascript:void(0)'><img class='pro_order' width='100%' height='100%' src='__img__/pro/<?php echo $all['pro_pic']; ?>' alt='' /></a>
<span id="span_about"><?php echo $all['pro_name']; ?>&nbsp;&nbsp;&yen;<?php echo $all['pro_price']; ?>&nbsp;
<font color='red'>已预订</font>
<?php break; endswitch; ?>
</span></p>
<?php endforeach; endif; else: echo "" ;endif; else: ?>
还没有产品
<?php endif; if($total%3==1): $__FOR_START_13527__=0;$__FOR_END_13527__=2;for($i=$__FOR_START_13527__;$i < $__FOR_END_13527__;$i+=1){ ?>
        <p class='p_img'><a href="/myspace.html"><img src='__img__/add.jpg' width='100%'></a><span id='span_about'>点击图标填加产品</span></p>
    <?php } elseif($total%3==2): ?>
        <p class='p_img'><a href="/myspace.html"><img src='__img__/add.jpg' width='100%'></a><span id='span_about'>点击图标填加产品</span></p>
<?php else: ?>
        <p class='p_img' style='display:none;'></p>
<?php endif; ?>


</div>
<div style="clear:both;height:2px;width:1000px;margin:auto;"></div>
<?php echo $list->render(); ?>

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
