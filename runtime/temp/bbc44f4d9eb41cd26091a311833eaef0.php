<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:30:"./template/admin/wish_del.html";i:1542678427;s:25:"./template/admin/top.html";i:1542331245;s:30:"./template/admin/leftmenu.html";i:1542675604;}*/ ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>后台管理系统</title>
	
	<link rel="stylesheet" href="__backcss__/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="img/css/ie.css" type="text/css" media="screen" />
	<script src="img/js/html5.js"></script>
	<![endif]-->
	<script src="__js__/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="__js__/hideshow.js" type="text/javascript"></script>
	<script src="__js__/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="__js__/jquery.equalHeight.js"></script>
    <script src="__js__/ckeditor/ckeditor.js"></script>
	<script src="__js__/ckeditor/adapters/jquery.js"></script>   
	    
	<script type="text/javascript">
	$(document).ready(function()
	{
	$('#content').ckeditor();
	}
	);
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
			<article class="breadcrumbs"><a href="/admin.html">后台管理系统</a> <div class="breadcrumb_divider"></div> <a class="current">公告删除</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
<aside id="sidebar" class="column">

	<h3>产品管理</h3>
	<ul class="toggle">
	    <li class="icn_new_article"><a href="#">添加产品</a></li>
		<li class="icn_categories"><a href="/prolist">管理产品</a></li>
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
		<li class="icn_categories"><a href="/storylist">分享清单</a></li>
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
    <form id="form1" name="form1" method="post" action="/del_wish">
	<article class="module width_full">
		<header><h3>公告删除</h3></header>
			   <div class="module_content">
				<fieldset>
						<label>标题</label>
							确定要删除 <?php echo $data['title']; ?>这条寄语吗？
				</fieldset>				
             </div>
		<footer>
			<div class="submit_link">
			    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
				<input type="submit" name="submit" value="确定" class="alt_btn">
			</div>
		</footer>
	</article>
	</form>
		<div class="spacer"></div>
</section>

</body>
</html>