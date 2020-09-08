<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./app/admin/view/index/publicnewsdata.html";i:1592995172;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>publicnewsdata</title>
	<style>
        table{
        	width:100%;
        	margin-top:100px;
        }

	</style>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div id="div_main">
	
	<table border="0" cellpadding="10" cellspacing="0">
    	<form action="/admin/upload_newsdata" id="form1" name="form1" enctype="multipart/form-data" method="post">         
		<tr>
			<td align="left" width="60%">
                选择上传的文件<input type="file" name="file" id="file" />
           </td>
           <td valign="top" align="left">
			<input style="width:80px;"  type="submit" value="上传" />	
		   </td>
		</form>
        <tr>
           <td colspan="2">
           <?php if(!(empty($filename) || (($filename instanceof \think\Collection || $filename instanceof \think\Paginator ) && $filename->isEmpty()))): if($filename == null): ?>
	                还没有上传文件
	           <?php else: ?>
	                <p>
	                   <?php echo $filename; ?>
	                    <!-- <iframe class="filename" :src="/public/data/<?php echo $filename; ?>" width='20' height='60' frameborder='1' ></iframe> -->
	                </p>

	           <?php endif; endif; if(!(empty($error) || (($error instanceof \think\Collection || $error instanceof \think\Paginator ) && $error->isEmpty()))): if($error == null): else: ?>
	                <p style="color:red;"><?php echo $error; ?></p>

	           <?php endif; endif; ?>
          </td>
        </tr>
	</table>
	
</div>
</body>
</html>