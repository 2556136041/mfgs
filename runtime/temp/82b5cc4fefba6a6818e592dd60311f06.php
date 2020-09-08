<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:30:"./template/admin/wishlist.html";i:1542677466;s:25:"./template/admin/top.html";i:1542331245;s:30:"./template/admin/leftmenu.html";i:1542781198;}*/ ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>用户列表</title>
	
	<link rel="stylesheet" href="__backcss__/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="__frontcss__/page.css" type="text/css" media="screen" />
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
			<article class="breadcrumbs"><a href="/admin.html">后台管理中心</a> <div class="breadcrumb_divider"></div> <a class="current">寄语公告</a></article>
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
		<header><h3 class="tabs_involved">寄语管理列表</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
				<table class="tablesorter" cellspacing="0" style="margin:0"> 
					<thead> 
						<tr>  
			    				<th>ID</th>
			    				<th>发布人</th>
			    				<th>主题</th>
			    				<th>状态</th>
			    				<th>位置</th>
			    				<th>文字</th>
			    				<th>相片</th>
					    		<th>视频</th>
					    		<th>时间</th>
                                <th>操作</th>
						</tr> 
					</thead>
					<tbody>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$value): ?>
						<tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['title']; ?></td> 
                                <td><?php echo $value['state']; ?></td> 
                                <td><?php echo $value['pos']; ?></td> 
			    				<td><?php echo $value['username']; ?></td> 
			    				<td><?php echo $value['artical']; ?></td> 
			    				<td><?php echo $value['photo']; ?></td> 
			    				<td><?php echo $value['video']; ?></td> 
			    				<td><?php echo $value['pubtime']; ?></td>
			    				<td><input type="image" src="__img__/icn_edit.png" title="Edit" onClick="window.location.href='/wishupdate/id/<?php echo $value['id']; ?>'"><input type="image" src="__img__/icn_trash.png" title="Trash" onClick="window.location.href='/wish_del/id/<?php echo $value['id']; ?>'"></td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					<tfoot> 
						<tr>  
			    			<td align='center' colspan="10">
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