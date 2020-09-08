<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:36:"./app/index/view/index/proorder.html";i:1543473112;s:32:"./app/index/view/common/top.html";i:1543283279;}*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>预定</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<style type="text/css">

body{background:rgb(204,255,204);}
table{
      margin:10px auto;
     }
input[type="text"]{
     height:35px;
     width:400px;  
     font-size: 16px;  
     font-family: "微软雅黑";   
     border-radius: 5px;
     }
textarea{
     font-size: 16px;  
     font-family: "微软雅黑";   
     border-radius: 5px; 
     }
input[type="submit"]{
     height:35px;
     width:60px;  
     font-size: 16px; 
     line-height: 35px;
     font-family: "微软雅黑";     
     }
input[type="submit"]:hover{
     background: red;
     color:white;
}

button#tjbut{
     height:45px;
     width:100%;     
     font:20px "Microsoft Yahei";
     line-height: 45px;
     background: rgb(204,204,102);
     border-radius: 15px;

}
button#tjbut:hover{
     color:white;
     background: red;
}
.ts{
  padding-left:10px;
}

</style>

</head>

<body>

<script>

function order_ajax(){
    var orderlj=$('#orderlj').val();
    var ly=$('#ly').val();
    var ordername=$('#ordername').val();
    var orderaddr=$('#orderaddr').val();
    var reg=/^(13|14|15|17|18)[0-9]{9}$/; 
    if(orderlj==""){
          alert('联系方式不能为空');
          $('#orderlj').focus();
          return false;
    }else if(!reg.test(orderlj)){
          alert("手机号码不合法"); 
          $('#orderlj').val('');
          $('#orderlj').focus();
          return false; 
    }else if(ordername==""){
          alert("联系人不能为空");
          $('#ordername').focus();
          return false; 
    }else if(orderaddr==""){
          alert("地址不能为空");
          $('#orderaddr').focus();
          return false; 
    }else if(ly==""){
          alert('留言不能为空');
          $('#ly').focus();
          return false;
    }
    var order=$('#order').val();
    var ordertime=$('#ordertime').val();
    var pubtime=$('#pubtime').val();
    var id=$('#id').val();
    $.get("/order_ok.html",
        {"orderlj":orderlj,"ordername":ordername,"orderaddr":orderaddr,"ly":ly,"order":order,"id":id},function(data){
        if(data==0){
            alert('成功预订,请耐心等待对方回应！');
            window.location="/index.html";
        }else{
            alert('失败！');
            window.history.back();
        }
    });
}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
<style type="text/css">
*{margin:0;padding:0;}
li{list-style-type:none;}
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
#ul_nav{width:1000px;
        height:60px;

		margin:0px auto;   
	    }
#ul_nav li{float:left;
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
<ul id="ul_nav">
<li class="li_nav" style="padding-top:3px"><img width="100%" src="__img__/logo13.png"></li>
<li class="li_nav" id="li_top"><a href="/index.html">首<span class='space_pad'></span>页</a></li>
<li class="li_nav" id="li_nav_this"><a href="/jj.html">家<span class='space_pad'></span>具</a></li>
<li class="li_nav"><a href="/jd.html">家<span class='space_pad'></span>电</a></li>
<li class="li_nav"><a href="/yw.html">衣<span class='space_pad'></span>物</a></li>
<li class="li_nav"><a href="/sp.html">私<span class='space_pad'></span>品</a></li>
<li class="li_nav"><a href="/sj.html">书<span class='space_pad'></span>刊</a></li>
<li class="li_nav"><a href="/cw.html">宠<span class='space_pad'></span>物</a></li>
</ul>
</div>

</body>
</html>
<div style="width: 100%;height: 10px;"></div>
  <table width="800" border="0" cellspacing="15" cellpadding="10">
    <tr>
      <th width="200" scope="row" align="right">物品名称</th>
      <td width="300"><?php echo $data['pro_name']; ?></td>
    </tr>
    <tr>
      <th width="200" scope="row" align="right">联系人</th>
      <td width="300"><input id="ordername" type="text" /><text class="ts">(可以是昵称)</text></td>
    </tr>
    <tr>
      <th width="200" scope="row" align="right"><text class="ts">联系方式</text></th>
      <td width="300"><input id="orderlj" type="text" /><text class="ts">(手机号)</text></td>
    </tr>
    <tr>
      <th width="200" scope="row" align="right">收货地址</th>
      <td width="300"><input id="orderaddr" type="text" /><text class="ts">(详细)</text></td>
    </tr>
    <tr>
      <th valign="top" scope="row" align="right">留言</th>
      <td><label for="ly"></label>
      <textarea style="width: 400px;" id="ly" rows="10"></textarea></td>
    </tr>
    <tr>
      <th colspan="2" scope="row" style="padding-top: 20px;">
      <input id="order" type="hidden" value="1" />
      <input id="id" type="hidden" value="<?php echo $data['pro_id']; ?>" />
      <button id='tjbut' onclick='order_ajax()' />提交</button>
      </th>
    </tr>
  </table>


</body>
</html>

