<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:29:"./template/myspace/index.html";i:1542183219;s:30:"./template/myspace/bottom.html";i:1536976601;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<link rel="stylesheet" href="__myspacecss__" />
<link rel="stylesheet" href="__frontcss__/page.css" type="text/css" media="screen" />
<link rel="stylesheet" href='__hoverbox__' type="text/css" media="screen, projection" />
<style>

</style>
</head>
<body>
<div id="ps_top" style="background:url('__img__/logo13.png');background-repeat:no-repeat;background: <?php echo (isset($color) && ($color !== '')?$color:'lavender'); ?>;">
	<h1>my space</h1>
	<h4>【<a href="/myspace.html">个人中心</a>】</h4>
  <p id="cut1"></p>
	<p id="p_l"><a href="/index.html">首页</a></p>
	<p id="p_m"><?php echo date('Y-m-d',$time); ?></p>
  <p id="p_r"><a href="/logout.html">安全退出</a></p>
	<p id="hidden"></p>
</div>
<div id="ps_main">
    <div id="ps_left" style="width:26%;">
        <table id="tab1" align="center" width="90%" border="0" cellpadding="5" cellspacing="10">
          <tr>
            <td style="text-align: center;">
                <img style="border-radius: 50%;" width="120px" src="<?php echo $userinfo['photo']; ?>" alt="" />
            </td>
          </tr>

          <tr>
              <td align="center"><font color="#FF0000"><?php echo $userinfo['username']; ?></font></td> 

          </tr>

          <tr>
              <th align="left">邮箱:</th>    
          </tr>

          <tr>
              <td align="left"><?php echo $userinfo['email']; ?></td>
          </tr>

          <tr>
             <th align="left">Q&nbsp;Q:</th>    
          </tr>

          <tr>
             <td align="left"><?php echo $userinfo['qq']; ?></td>
          </tr>

          <tr>
             <th align="left">电话:</th>    
          </tr>

          <tr>
             <td align="left"><?php echo $userinfo['tel']; ?></td>
          </tr>

          <tr>
             <th align="left">地址:</th>    
          </tr>

          <tr>
             <td align="left"><?php echo $userinfo['address']; ?></td>
          </tr>

          <tr>
              <th align="left">标签:</th>    
          </tr>

          <tr>
              <td align="left"><?php echo $userinfo['usermark']; ?></td>
          </tr>

          <tr>
              <th align="left">兴趣:</th>    
          </tr>  

          <tr>
              <td align="left"><?php echo $userinfo['inter']; ?></td>
          </tr>
        </table>
        <table id='tab2' width="90%" cellspacing="10px" cellpadding="5px" border="0" align='center'>
          <tr>
            <th align="right" id="th_fx">分享：</th>
            <td><a href="/pubpro.html">发布</a></td>
          </tr>
          <tr align="left">
            <td></td>
            <td><a href="/mymodify/id/<?php echo $userinfo['id']; ?>.html">修改</a></td>
          </tr>
        </table>

    </div>
    <div id="ps_right" style="width:72%;">
        <h2 style="text-align: center;font-size: 25px;width:100%;margin-bottom:15px;">捐献物品</h2>
        <table id='tab3' width="100%" align='left' cellspacing="10" cellpadding="10" border='0'>  
          <tr>
            <td colspan="8">共<?php echo $total; ?>件</td>
          </tr>
          <tr>
            <th width="12.5%">图片</th>
            <th width="12.5%">名称</th>
            <th width="12.5%">时间</th>
            <th width="12.5%">预订人</th>
            <th width="12.5%">留言</th>
            <th width="12.5%">预订时间</th>
            <th width="12.5%">联系方式</th>
            <th width="12.5%">收货状况</th>
          </tr>
<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂无留言" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
          <tr>
            <td align="center">
                 <ul class="hoverbox">
                  <li>
                  <a href="#"><img height="40px" src="__img__/pro/<?php echo $val['pro_pic']; ?>" alt="description"><img src="__img__/pro/<?php echo $val['pro_pic']; ?>" alt="" class="preview"></a>
                  </li>
            </ul>
            </td>
            <td align="center"><?php echo $val['pro_name']; ?></td>
            <td align="center"><?php echo $val['pubtime']; ?></td>
            <td align="center"><?php echo $val['pubpros']['ordername']; ?></td>
            <td align="center"><?php echo $val['pubpros']['ly']; ?></td>
            <td align="center"><?php echo $val['pubpros']['ordertime']; ?></td>
            <td align="center"><?php echo $val['pubpros']['orderlj']; ?></td>
            <?php if($val['sendstate']==1): ?>
                 <td align="center"><a style="javascript:void(0);background:red;color:white;border-radius: 10px;padding:5px 20px;">已发货</a></td>
            <?php else: ?>
                 <td align="center"><a href="/sendprostate/id/<?php echo $val['pro_id']; ?>" style="background:green;color:white;border-radius: 10px;padding:5px 20px;">发货</a></td>
            <?php endif; ?>

          </tr>          
<?php endforeach; endif; else: echo "暂无留言" ;endif; ?>
           <tr>
            <td colspan="8">
                <?php echo $list->render(); ?>

            </td>
          </tr>
        </table>
        <p style="width: 100%;height: 40px;clear:both;"></p>
        <p id='getpro'><a href="/getpro.html">获取物品清单</a><span style='padding-left:80px;'></span></p>

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
		 background:#666;

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
   background:rgba(200,200,200,0.8);
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
<div id="div_bot">
<p class="p_con" id="p_con">
&nbsp;&nbsp;&nbsp;&nbsp;<a href="/about.html" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">关于本站</a> <font style="color:rgb(153,102,0);">｜</font>
<a id="ly" href="/banwu.html" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">版&nbsp;务</a>
<span id="span_hits">

</span>
</p>
<ul id="ulink">
    <li><p class="p_con p_tit">友情链接:</p></li>
    <li class="ulj"><a style="color:black;" href="https://www.freecycle.org/" onmouseover="this.style.color='red';" onmouseout="this.style.color='black';">Freecycle(全球捐赠网)</a></li>
</ul>
<p class="p_con p_center p_tit">个人旧物私物馈赠分享平台</p>
<p class="p_con p_center"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:379215781:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
<p class="p_con p_center">Copyright © <span id="bq"></span> www.51mfgs.com  版权所有 粤ICP备18045267号</p>

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
