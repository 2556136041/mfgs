<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\Program Files\phpStudy\Thinkphp_5.0.9./app/index\view\index\write1.html";i:1536379177;}*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提交信息</title>
<style type="text/css">

    *{ 
	   font-family:"微软雅黑";
	   font-size:16px; 
		
	}
    a{text-decoration:none;}

	#div_main{
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

	th{text-align: right;}
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
    	 color:blue;
		 
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
</script>

</head>

<body>

<div id="div_main">
	<div id="div_upload">
	<p>回到<a href="/index.html">首页</a></p>
	<table border="0" cellpadding="10" cellspacing="0">
    	<form action="/upload_pro" id="form1" name="form1" enctype="multipart/form-data" method="post">
         
		<tr>
			<td align="left" width="60%">
		   请选择需要上传的图片<input type="file" name="file" id="file" />
           <p style="padding:0px;margin:10px;"><b>（大小不超过2MB，规格：<font style="color:red;">323×250/646×500</font>）</b></p>
           </td>
           <td valign="top" align="left">
            <input type="hidden" name="action" value="form1" />
			<input style="width:80px;"  type="submit" value="上传图片" />
	
		    </form>
         <tr>
           <td>
           <?php if(!(empty($imagename) || (($imagename instanceof \think\Collection || $imagename instanceof \think\Paginator ) && $imagename->isEmpty()))): if($imagename == null): ?>
	                还没有上传图片
	           <?php else: ?>
	                <p><img src='__img__/pro/<?php echo $imagename; ?>' width='350'></p>
	           <?php endif; endif; ?>
          </td>
        </tr>
	</table>

	</div>
	<div id="div_content">
	<form name="form2" action="/prosave" method="post" onsubmit="return check(this)">		
	<table border="0" cellpadding="10" cellspacing="0">
	        <tr>
				<th>类别：</th>
				<td>
				<select name="pro_type" id="">
					<option value="0">选择</option>
					<option value="jj">家具</option>
					<option value="jd">家电</option>
					<option value="yw">衣物</option>
					<option value="sp">私品</option>
					<option value="sj">书刊</option>
					<option value="cw">宠物</option>
				</select>
				</td>
			</tr>
			<tr>
				<th>名称：</th>
				<td><input class="proInp" type="text" name="pro_name" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="pro_name" /></td>
			</tr>
            <tr>
				<th valign="top">时长：</th>
				<td><input class="proInp" type="text" name="degree" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="degree" /></td>
			</tr>
            <tr>
				<th valign="top">数量：</th>
				<td><input class="proInp" type="text" name="number" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="number" /><p>(使用及豢养时间)</p></td>
			</tr>
			<tr>
				<th>费用：</th>
				<td><input class="proInp" type="text" name="pro_price" value="0"
				onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="pro_price" disabled /></td>
			</tr>
			<tr>
				<th valign="top">描述：</th>
				<td><textarea class="proInp proarea" rows="15" name="pro_about" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="pro_about"></textarea><p>(大小尺寸、颜色等，为了方便他人选用，尽量详细一点。)</p>
				</td>
			</tr>
			<tr>
				<th valign="top">条件：</th>
				<td><textarea class="proInp proarea" rows="5" name="pro_con" onfocus="setStyle(this.id)" onblur="loseStyle(this.id)" id="pro_con">先约先得，物流费自行承担。</textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
			    	<input type="submit" value="提交" />
                    <input type="reset" value="重置" />
			    </td>
			</tr>
			<input type="hidden" name="pro_pic" value="<?php echo (isset($imagename) && ($imagename !== '')?$imagename:''); ?>" />
			<input type="hidden" name="action" value="form2" />
		</table>
	</form>

	</div>
</div>
</body>
</html>
