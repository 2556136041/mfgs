<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:35:"./app/index/view/index/proshow.html";i:1594468559;s:32:"./app/index/view/common/top.html";i:1592137484;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>proshow</title>
<style type="text/css">
#div_main{width: 600px;
	      margin:20px auto;
	      background:rgb(204,255,204);
	      border-radius:5px; 
}
table{width:100%;
      margin:0px;
	  padding:0px;
}
th{text-align: right;}

#allow{
  background:rgb(204,204,102);
  font:18px '微软雅黑';
  text-align:center;
  display: inline-block;
  border-radius: 10px;
  box-shadow: 3px 3px 3px black;
  text-decoration: none;
  color:white;
  padding:3px 15px;
  }
#allow:hover{
	background-color: rgb(51,187,51);
	color:white;
  }
#refuse{
  background:red;
  font:18px '微软雅黑';
  text-align:center;
  display: inline-block;
  border-radius: 10px;
  box-shadow: 3px 3px 3px black;
  text-decoration: none;
  color:white;
  padding:3px 15px;
  }
#refuse:hover{
	background-color: red;
	color:white;
  }

</style>
</head>
<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
<style type="text/css">
*{margin:0;padding:0;}
a{text-decoration:none;}
/*导航*/
/*#div_nav{width:100%;
         height:60px;
		 background-image: url(__img__/ys.jpg);
		 background-repeat: repeat;
	     }*/
#div_nav{width:100%;
         height:60px;
		 background: rgb(51,187,51);
	     }

#ul_nav{width:1100px;
        height:60px;
		margin:0px auto;   
	    }
#ul_nav div{float:left;
           width:12.5%;
		   font:20px "微软雅黑";
		   font-weight: 700;
		   height:60px;
		   text-align:center;
		   color:#FFF;
		   line-height:60px;
		   margin:0px;
		   padding:0px;
          }
span.space_pad{
	padding:0px 8px;
}
.li_nav a{color:#FFF;}
.li_nav a:list,.li_nav a:visited{color:#FFF;
	                 	         }
/*.li_nav a:hover{display:inline-block;
	            width:90%;
                height:60px;
				background-image: url(__img__/ys1.jpg);
                background-repeat: repeat;
				color:#FFF;
				}*/
.li_nav a:hover{display:inline-block;
	            width:90%;
                height:60px;
				background:rgb(102,204,102);
				color:#FFF;
				}
/*#li_nav_this{background:#FC0;}*/



</style>
</head>

<body>
<div id="div_nav">
	<div id="ul_nav">
			<div class="li_nav" style="padding-top:3px"><img width="100%" src="__img__/logo13.png"></div>
			<div class="li_nav" id="li_top"><a href="/index.html">首<span class='space_pad'></span>页</a></div>
			<div class="li_nav" id="li_nav_this"><a href="/jj.html">家<span class='space_pad'></span>具</a></div>
			<div class="li_nav"><a href="/jd.html">家<span class='space_pad'></span>电</a></div>
			<div class="li_nav"><a href="/yw.html">衣<span class='space_pad'></span>物</a></div>
			<div class="li_nav"><a href="/sp.html">私<span class='space_pad'></span>品</a></div>
			<div class="li_nav"><a href="/sj.html">书<span class='space_pad'></span>刊</a></div>
			<div class="li_nav"><a href="/cw.html">宠<span class='space_pad'></span>物</a></div>
	</div>
</div>

</body>
</html>
<div id="div_main">
	<table border="0" cellspacing="10" cellpadding="10">
		<tr>
			<td colspan="2"><img width="100%" src="__img__/pro/<?php echo $data['pro_pic']; ?>" alt="" /></td>
		</tr>
        <tr>
			<th>类别：</th>
			<?php switch($data['pro_type']): case "jj": ?>
                      <td>家具</td>

			    <?php break; case "jd": ?>
			           <td>家电</td>
			    <?php break; case "yw": ?>
			           <td>衣物</td>
			    <?php break; case "cw": ?>
			           <td>宠物</td>
			    <?php break; case "sp": ?>
			           <td>私品</td>
			    <?php break; case "sj": ?>
			           <td>书刊</td>
			    <?php break; default: ?>未知
			<?php endswitch; ?>			
		</tr>
		<tr>
			<th>名称：</th>
			<td><?php echo $data['pro_name']; ?></td>
		</tr>
	<!-- 	<tr>
			<th>费用：</th>
			<td><?php echo $data['pro_price']; ?></td>
		</tr> -->
		<tr>
			<th>介绍：</th>
			<td><?php echo $data['pro_about']; ?></td>
		</tr>
		<tr>
			<th>条件：</th>
			<td><?php echo $data['pro_con']; ?></td>
		</tr>
		<!-- <tr>
			<td colspan="2">
			<p style="padding:20px;"><img src="__img__/tb22.png" width="30px"  align="absmiddle" />&nbsp;&nbsp;<img src="__img__/tel.png" width="30px" height="30px" align="absmiddle" />&nbsp;&nbsp;<img src="__img__/QQ11.png" width="30px" height="30px" align="absmiddle" /></p>
			</td>
		</tr> -->
		<tr>
			<td colspan="2" align="center" style="padding-bottom: 30px;">
			      <?php if(($data['remainnum'] >= 1)): ?> 
                       <a id="allow" href="/proorder/id/<?php echo $data['pro_id']; ?>">我要了</a>
                  <?php elseif(($data['remainnum'] == 0)): ?>
                       <a id="refuse" href="javascript:void(0)">来晩了</a>
                  <?php else: endif; ?>
			      
			</td>
		</tr>
	
	</table>
</div>
</body>
</html>
</html>