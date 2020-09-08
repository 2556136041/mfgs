<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:29:"./template/admin/prolist.html";i:1542849214;s:25:"./template/admin/top.html";i:1542331245;s:30:"./template/admin/leftmenu.html";i:1542781198;}*/ ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>后台管理系统</title>
	
	<link rel="stylesheet" href="__backcss__/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="__frontcss__/page.css" type="text/css" media="screen" />
	<link rel="stylesheet" href='__hoverbox__' type="text/css" media="screen, projection" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="img/css/ie.css" type="text/css" media="screen" />
	<script src="img/js/html5.js"></script>
	<![endif]-->
	<script src="__js__/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="__js__/hideshow.js" type="text/javascript"></script>
	<script src="__js__/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="__js__/jquery.equalHeight.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<p id="p_top_l"><a href="/index.html"><img src="__img__/logo_new2.png" width="250px" height="75px" align="middle" /></a></p>
		<p id="p_top_r">后台管理</p>
	</header> <!-- end of header bar -->

	
	<section id="secondary_bar">
		<div class="user">
			<p>admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="/admin.html">后台管理中心</a> <div class="breadcrumb_divider"></div> <a class="current">管理产品</a></article>
		</div>
	</section><!-- end of secondary bar -->

<aside id="sidebar" class="column">

	<h3>产品管理</h3>
	<ul class="toggle">
	    <li class="icn_new_article"><a href="#">添加产品</a></li>
		<li class="icn_categories"><a href="/prolist">分享物品</a></li>
	</ul>
	<h3>用户管理</h3>
	<ul class="toggle">
		<li class="icn_categories"><a href="/wxuserlist">手机用户</a></li>
		<li class="icn_categories"><a href="/pcuserlist">电脑用户</a></li>
	</ul>
    <h3>公告管理</h3>
	<ul class="toggle">
		<li class="icn_categories"><a href="/noticelist">公告清单</a></li>
		<li class="icn_categories"><a href="/noticepub">公告发布</a></li>
	</ul>
    <h3>活动管理</h3>
	<ul class="toggle">
		<li class="icn_categories"><a href="/activelist">活动清单</a></li>
		<li class="icn_categories"><a href="/activepub">活动发布</a></li>
	</ul>
    <h3>名人寄语</h3>
	<ul class="toggle">
		<li class="icn_categories"><a href="/wishlist">寄语清单</a></li>
	</ul>
    <h3>分享社区</h3>
	<ul class="toggle">
		<li class="icn_categories"><a href="/storylist">话题清单</a></li>
	</ul>
    <h3>投诉平台</h3>
	<ul class="toggle">
		<li class="icn_categories"><a href="/complainlist">投诉清单</a></li>
	</ul>
	<h3>留言管理</h3>
	<ul class="toggle">
		<li class="icn_categories"><a href="/meslist">留言管理</a></li>
	</ul>
	<h3>登陆管理</h3>
	<ul class="toggle">
		<li class="icn_jump_back"><a href="/logout.html">退出登录</a></li>
	</ul>
	
	<footer>
		
	</footer>
</aside><!-- end of sidebar -->

	<section id="main" class="column">
		
		<article class="module width_full">
		<header><h3 class="tabs_involved">产品管理列表</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
				<table class="tablesorter" cellspacing="0" style="margin:0"> 
					<thead> 
						<tr>  
			    				<th>ID</th>
			    				<th>图片</th>
			    				<th>捐献者</th>
			    				<th>类别</th>
			    				<th>位置</th>
			    				<th>时间</th>
                                <th>审核</th>
			    				<th>预订人</th>
			    				<th>预订时间</th>
			    				<th>操作</th>
						</tr> 
					</thead>
					<tbody>
					<?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$value): ?>
						<tr>
			    				<td><?php echo $value['pro_id']; ?></td> 
			    				<td>
			    				<ul class="hoverbox">
			    				<li>
			    				<a href="#"><img height="40px" src="__img__/pro/<?php echo $value['pro_pic']; ?>" alt="description"><img src="__img__/pro/<?php echo $value['pro_pic']; ?>" alt="" class="preview"></a>
			    				</li>
                                </ul>
			    				</td>		
			    				<td><?php echo $value['username']; ?></td>
			    				<td>
			    				<?php switch($value['pro_type']): case "jj": ?>家具<?php break; case "jd": ?>家电<?php break; case "yw": ?>衣物<?php break; case "sp": ?>私品<?php break; case "cw": ?>宠物<?php break; case "sj": ?>书刊<?php break; default: endswitch; ?>
			    				</td> 
			    				<td>
			    				<?php if($value['pos'] == 1): ?>
                                <font color="red">首页</font>
                                <?php else: ?>
                                <font color='blue'>分类页</font>
                                <?php endif; ?>
			    				</td> 
			    				<td style="width:10%;word-wrap: break-word;word-break: break-all;"><?php echo $value['pubtime']; ?></td>                                 
			    				<td>
                                <?php if($value['state'] == 1): ?>
                                <font color="red">审核</font>
                                <?php else: ?>
                                <font color='blue'>未审核</font>
                                <?php endif; ?>
                                </td> 
                                <td><?php echo (isset($value['pubpros']['ordername']) && ($value['pubpros']['ordername'] !== '')?$value['pubpros']['ordername']:''); ?></td>
			    				<td style="width:10%;word-wrap: break-word;word-break: break-all;"><?php echo (isset($value['pubpros']['ordertime']) && ($value['pubpros']['ordertime'] !== '')?$value['pubpros']['ordertime']:''); ?></td> 
			    				<td><input type="image" src="__img__/icn_alert_success.png" title="Edit" onClick="window.location.href='/pro_sh/id/<?php echo $value['pro_id']; ?>'"><input type="image" src="__img__/pos.png" title="pos" onClick="window.location.href='/pro_pos/id/<?php echo $value['pro_id']; ?>'"><input type="image" src="__img__/icn_trash.png" title="Trash" onClick="window.location.href='/pro_del/id/<?php echo $value['pro_id']; ?>'"></td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; else: ?>
                         还没有产品
                    <?php endif; ?>
					</tbody>
					<tfoot> 
						<tr>  
			    			<td align='center' colspan="9">
			    			<?php echo $list->render(); ?>
			    			</td>
						</tr> 
					</tfoot>
				</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		<div class="spacer"></div>
	</section>


</body>

</html>