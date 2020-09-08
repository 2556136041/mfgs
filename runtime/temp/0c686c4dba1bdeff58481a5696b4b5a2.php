<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:30:"./template/myspace/pubpro.html";i:1537716224;s:29:"./template/myspace/write.html";i:1537458444;s:30:"./template/myspace/bottom.html";i:1536976601;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<link rel="stylesheet" href="__myspacecss__" />
<style>

</style>
</head>
<body>
<div id="ps_top" style="background: <?php echo (isset($color) && ($color !== '')?$color:'lavender'); ?>">
  <h1>my space</h1>
  <h4>【<a href="/myspace.html">个人中心</a>】</h4>
  <p id="cut1"></p>
  <p id="p_l" style="font-size:20px;"><a href="/index.html">首页</a></p>
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
            <td><a href="/pubpro">发布</a></td>
          </tr>
          <tr align="left">
            <td></td>
            <td><a href="/mymodify/id/<?php echo $userinfo['id']; ?>.html">修改</a></td>
          </tr>
        </table>

    </div>
    <div id="ps_right" style="width:72%;">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提交信息</title>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
	function check(form){
	       if(form.pro_name.value==""){
               alert("产品名称不能为空！");
               form.pro_name.focus();
               return(false);
           }
		   if(form.degree.value==""){
               alert("使用豢养时间不能为空！");
               form.degree.focus();
               return(false);
           }
		   if(form.number.value==""){
               alert("数量不能为空！");
               form.number.focus();
               return(false);
           }
           if(form.pro_price.value==""){
               alert("产品费用不能为空！");
               form.pro_price.focus();
               return(false);
           }
           if(form.pro_about.value==""){
               alert("产品描述不能为空！");
               form.pro_about.focus();
               return(false);
           }
           if(form.pro_con.value==""){
               alert("索取条件不能为空！");
               form.pro_con.focus();
               return(false);
           }
           return(true);
	}
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
	        imagepath='__img__/pro/'+imagename;
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

	    xhr.open('post','/upload_pro',true); //open打开的方式不能使用get,上传文件的地址,使用异步上传
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

<div id="div_main">
	<div id="div_upload">
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

	</div>
	<div id="div_content">
	<form name="form2" action="/prosave" method="post" onsubmit="return check(this)">		
	<table border="0" cellpadding="10" cellspacing="10">
	        <tr>
				<th class="th_ts">类别：</th>
				<td>
				<select name="pro_type" id="">
                    <option value="sp">私品</option>
					<option value="jj">家具</option>
					<option value="jd">家电</option>
					<option value="yw">衣物</option>					
					<option value="sj">书刊</option>
					<option value="cw">宠物</option>
				</select>
				</td>
			</tr>
			<tr>
				<th class="th_ts">名称：</th>
				<td><input class="proInp" type="text" name="pro_name" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="pro_name" /></td>
			</tr>
            <tr>
				<th class="th_ts" valign="top">时长：</th>
				<td><input class="proInp" type="text" name="degree" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="degree" /></td>
			</tr>
            <tr>
				<th class="th_ts" valign="top">数量：</th>
				<td><input class="proInp" type="text" name="number" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="number" /><p>(使用及豢养时间)</p></td>
			</tr>
			<tr>
				<th class="th_ts">费用：</th>
				<td><input class="proInp" type="text" name="pro_price" value="0"
				onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="pro_price" disabled /></td>
			</tr>
			<tr>
				<th class="th_ts" valign="top">描述：</th>
				<td><textarea class="proInp proarea" rows="15" name="pro_about" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="pro_about"></textarea><p>(大小尺寸、颜色等，为了方便他人选用，尽量详细一点。)</p>
				</td>
			</tr>
			<tr>
				<th class="th_ts" valign="top">条件：</th>
				<td><textarea class="proInp proarea" rows="5" name="pro_con" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="pro_con">先约先得，物流费自行承担。</textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
			    	<input id='tjbut' type="submit" value="提交" />
                    <input type="reset" value="重置" />
			    </td>
			</tr>
			<input id="pic" type="hidden" name="pro_pic" value="<?php echo (isset($imagename) && ($imagename !== '')?$imagename:''); ?>" />
			<input type="hidden" name="action" value="form2" />
		</table>
	</form>

<script>
     $("body").keydown(function() {
          if (event.keyCode == "13") {//keyCode=13是回车键
              $('#tjbut').click();
          }
    });  

</script>

	</div>
</div>
</body>
</html>
 

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
