<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:33:"./app/admin/view/index/index.html";i:1536976253;s:33:"./app/admin/view/common/base.html";i:1536976253;s:32:"./app/admin/view/common/top.html";i:1536976253;s:37:"./app/admin/view/common/leftmenu.html";i:1536976253;}*/ ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>后台管理中心</title>
	
	<link rel="stylesheet" href="__backcss__/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="img/css/ie.css" type="text/css" media="screen" />
	<script src="img/js/html5.js"></script>
	<![endif]-->
	<script src="/public/static/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="/public/static/js/hideshow.js" type="text/javascript"></script>
	<script src="/public/static/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/public/static/js/jquery.equalHeight.js"></script>
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
		<p id="p_top_l"><a href="/index.html"><img src="/public/static/images/common/fyxaa.png" width="250px" height="75px" align="middle" /></a></p>
		<p id="p_top_r">后台管理</p>
	</header> <!-- end of header bar -->

	
	<section id="secondary_bar">
		<div class="user">
			<p>admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="admin.html?controller=admin">后台管理中心</a> <div class="breadcrumb_divider"></div> <a class="current">首页</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
	<h3>新闻管理</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="admin.html?controller=admin&method=newsadd">添加新闻</a></li>
		<li class="icn_categories"><a href="admin.html?controller=admin&method=newslist">管理新闻</a></li>
        <li class="icn_new_article"><a href="admin.html?controller=admin&method=seradd">添加知识</a></li>
		<li class="icn_categories"><a href="admin.html?controller=admin&method=serlist">管理知识</a></li>
        <li class="icn_new_article"><a href="admin.html?controller=admin&method=proadd">添加产品</a></li>
		<li class="icn_categories"><a href="admin.html?controller=admin&method=prolist">管理产品</a></li>
        <li class="icn_categories"><a href="admin.html?controller=admin&method=userlist">管理用户</a></li>
        <li class="icn_categories"><a href="admin.html?controller=admin&method=leavemeslist">管理留言</a></li>
	</ul>
	<h3>管理员管理</h3>
	<ul class="toggle">
		<li class="icn_jump_back"><a href="admin.html?controller=admin&method=logout">退出登录</a></li>
	</ul>
	
	<footer>
		
	</footer>
</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<article class="module width_full">
			<header><h3>站点统计</h3></header>
			<div class="module_content">
				<p>本站共有新闻<font style="color:blue">{}</font>篇</p>
                <p>本站共有知识<font style="color:blue">{}</font>篇</p>
                <p>本站共有产品<font style="color:blue">{}</font>条</p>
                <p>本站共有用户<font style="color:blue">{}</font>个</p>
                <p>本站共有留言<font style="color:blue">{}</font>条</p>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->

		<div class="clear"></div>

		<div class="spacer"></div>
	</section>


</body>

</html>