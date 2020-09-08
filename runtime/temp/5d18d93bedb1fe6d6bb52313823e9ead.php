<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:31:"./template/admin/activepub.html";i:1542639094;s:25:"./template/admin/top.html";i:1542331245;s:30:"./template/admin/leftmenu.html";i:1542781198;}*/ ?>
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

<style type="text/css">


    a{text-decoration:none;}

	#div_main{
	    font-family:"微软雅黑";
	    font-size:16px; 
		width:100%;
		height:auto;
		margin:15px auto; 
		/*background:rgba(102,255,204,1);*/
		padding: 20px 0px;
	}
	#div_upload,#div_content{width:100%;
		                     height:auto;
		                     margin:15px auto;
		                /*     background:rgba(10,10,10,0.1); */
	}
	table{width:90%;
          height:auto;
	}

	.th_ts{text-align: right;}
	.proInp{
		width: 100%;
		height:35px;
		font-size: 15px;
		padding-left: 6px;
		line-height: 40px;
		
	}
	
	.proarea{
	    height:300px;
	}

    select{
         outline: none;
         width: 100px;
         height: 35px;
         line-height: 35px;
         padding-left: 6px;
    	 font-size: 16px;
    	 font-family: "微软雅黑";
    	 color:red;
		 
    }

    input[type="submit"],input[type="reset"]{
    	height: 30px;
    	width:50px;
    	font-size: 16px;
    	margin-left: 16px;
		border-radius:3px;

    }
	
    input[type="submit"]:hover,input[type="reset"]:hover{
    	background: lavender;
    	cursor:pointer;
    }

/*上传图片进程条*/    
#probox {
    width: 800px; 
    height: 30px; 
    line-height: 30px; 
    position: relative;
    display: none;
}
#probar {
	display:inline-block;
    width: 0; 
    height: 10px; 
    background: red;
}
#imgshow{
	display:none;

}
#imgname{
	color:blue;
}
input[type=file]{
	display: inline-block;
	font-size:20px;
	width:250px;
	height:40px;

}
input[type=button]{
	display: inline-block;
	font-size:20px;
	padding:3px 10px;
}
input[type=button]:hover{
	background:red;
	color:white;
}

</style>

<script type="text/javascript">
	
	function setStyle(x){
           document.getElementById(x).style.background="rgba(255,255,204,0.8)";
     }
     function loseStyle(x){
     	   document.getElementById(x).style.background="white";
     }


//上传图片
window.onload = function(){
	var oBtn = document.getElementById('btn');
	var oMyFile = document.getElementById('myFile');
	var oDiv1 = document.getElementById('probox');
	var oDiv2 = document.getElementById('probar');
	var oDiv3 = document.getElementById('prorel');
    oBtn.onclick = function() {
	    //利用ajax发送必须要有一个ajax对象
	    var xhr = new XMLHttpRequest();

	    //监听上传事件
	    xhr.onload = function(){
	    	var imagename,imagepath;
	        //alert(1);
	        //alert(this.responseText);//后端返回的数据

	        //var d = JSON.parse(this.responseText);
	        //alert(d.msg + ' : ' + d.url); //显示上传成功 并且显示文件路径
	        //alert('OK 上传完成');
	        imagename=this.responseText;
	        imagepath='__img__/active/'+imagename;
	        document.getElementById('imgshow').style.display='block';
	        document.getElementById('imgshow').src=imagepath;
	        document.getElementById('imgname').style.color='red';
	        document.getElementById('imgname').innerHTML=imagename;
	        document.getElementById('pic').value=imagename;

	    }

	    //如果要实现上传进度条，则要使用上传进度对象
	    var oUpload = xhr.upload;
	    // alert(oUpload);//上传进度的事件对象
	    // 上传过程中是连续被触发的 监控上传进度
	    oUpload.onprogress = function(ev){
	        //ev.total(要发送的总量)、ev.loaded(待发送的总量)
	        console.log(ev.total + ' : ' + ev.loaded);
	        document.getElementById('probox').style.display="block";
	        var iScale = ev.loaded / ev.total;
	        oDiv2.style.width = 700 * iScale + 'px';//显示上传进度
	        oDiv3.innerHTML = iScale * 100 + '%'; //显示上传百分百
	    }

	    xhr.open('post','/upload_active',true); //open打开的方式不能使用get,上传文件的地址,使用异步上传
	    //在使用post发送的时候必须要带一些请求头信息
	    xhr.setRequestHeader('X-Request-With', 'XMLHttpRequest');

	    //send要发送数据 
	    //将要上传的数据转换成二进制数据
	    //那么必须知道后端接收当前文件的名称是什么 然后后面带上当前文件的数据

	    var oFormData = new FormData(); //通过FormData来构建提交数据
	    oFormData.append('file',oMyFile.files[0]);

	    xhr.send(oFormData);
    }
}
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
			<article class="breadcrumbs"><a href="/admin.html">后台管理系统</a> <div class="breadcrumb_divider"></div> <a class="current">活动发布</a></article>
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
		<header><h3>活动发布</h3></header>
			   <div class="module_content">
         <table width="94%" border="0" cellspacing="0" cellpadding="10" style="margin:20px auto;">
         <tr>
            <td colspan="2">
            	<div id="probox">
			       <span id="probar"></span>
			       <span id="prorel">0%</span>
			    </div>
            </td>
         <tr>
            <td align="left" width="600px"><input type="file" id="myFile" /><font style="color:red;">（图片规格：323×250/646×500）</font>
            </td>
            <td align="left">
               <input type="button" id="btn" value="上传" />
        	
            </td>
        <tr>
           <td colspan="2">          
           <p><img id="imgshow" src='' width='350'></p>
           <p id="imgname">还没有上传图片</p>
          </td>
        </tr>

     </table> 
    	<form id="form1" name="form1" method="post" action="/saveactive">
                <fieldset style="width:96%;">
						<label>标题</label>
						<input type="text" name="title" style="width:92%;height:40px;font-size:18px;">
				</fieldset>
                <fieldset style="width:96%;">
					    <label>发布人</label>
						<input type="text" name="username" style="width:92%;height:40px;font-size:18px;">
				</fieldset><div class="clear"></div>
                <fieldset style="width:96%;margin-right: 3%;">
						<label>内容</label>
						<textarea type="text" name="content" style="width:92%;height:100px;font-size:18px;"></textarea>
				</fieldset>
				<div class="clear"></div>				
				
             </div>
		<footer>
			<div class="submit_link">
                <input id="pic" type="hidden" name="active_pic" value="<?php echo (isset($imagename) && ($imagename !== '')?$imagename:''); ?>" />
				<input type="submit" name="submit" value="发布" class="alt_btn">
			</div>
		</footer>
	</article>
	</form>
		<div class="spacer"></div>
</section>

</body>
</html>