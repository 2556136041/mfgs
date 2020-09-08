<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\Program Files\phpStudy\Thinkphp_5.0.9bak./app/index\view\index\index.html";i:1536936911;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="免费公社网：一对一的个人私品分享平台">
<meta name="keywords" content="家具、家电、衣物、书刊、私品等自由馈赠领取">
<meta name="baidu-site-verification" content="cBjfCIUmX8" />
<meta name="360-site-verification" content="2f7f9f66f6e5ac8e035df6ead74392ea" />
<meta name="sogou_site_verification" content="QjlImBuxRJ"/>
<title>免费公社</title>
<link rel="stylesheet" href="__frontcss__/index.css" type="text/css"  />
<style type="text/css">


/*loading style***************************************************/
.loading{
  width:100%;
  height: 100%;
  background: white;
  position: fixed;
  z-index: 100;
  left: 0;
  top: 0;
}
.pic{
  width: 0%;
  height: 5px;
  background: green;
  position: absolute;
  left: 0;
  top: 0;
}

/*mes*/

div#div_mes
{
   width:100%;
   height: 400px;
   background-image: url("__img__/mesbg2.jpg");
   color:rgb(255,255,200);
   font-size:25px;

}

div#div_mes h2
{
   text-align: center;
   padding-top: 25px;
   font-family:"微软雅黑" ;
   margin-bottom:20px;

}
div#div_mes p
{
   font-size: 18px;
   font-family: "黑体";
   width: 80%;
   text-indent: 2em;
   margin:10px auto;
   line-height: 2em;
   text-align: justify;   
}
#closemes
{
   padding: 3px 5px;

}


/*login*/
#login_cover
{
  position: fixed;
  width: 100%;
  height: 100%;
  background: black;
  opacity:0.9;
  display: none;

}
#login_modal
{
  position: absolute;
  width: 400px;
  height: 400px;
  background: white;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  border-radius: 10px;

}
#login_closer
{
  font-size: 25px;
  position: absolute;
  top: 20px;
  right: 25px;
  color: black;

}
#login_closer a
{
  color:black;
}
#login_closer a:hover
{
  color:red;
  -webkit-animation: 3s;
  -o-animation: 3s;
  animation: 3s;
}
#login_tab
{
  width:400px;
  margin-top: 30px;
   
}
.logintab_th
{
   width: 20%;
}
.logintab_td
{ 
  width: 80%;

}
button#tjbut{
     height:45px;
     width:100%;     
     font-size:18px;
     font-family: "微软雅黑";
     line-height: 45px;
     background: red;
     border-radius: 15px;

}
input.inp1
{
    height:35px;
    font-size:16px;
    border:1px solid black;
    width: 100%;
    padding-left: 10px;
    border-radius:10px;
}
.user_icon
{
   background:url(__img__/user_icon.jpg) right center no-repeat;
}


</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
function login(obj){
    var login_cover=document.getElementById('login_cover');
    var login_modal=document.getElementById('login_modal');
    var login_closer=document.getElementById('login_closer');
    login_cover.style.display='block';
    login_closer.onclick=function(){
      login_cover.style.display='none';
    }

}
function login_ajax(){
    var username=$('#username').val();
    var pwd=$('#pwd').val();
    $.get("/login_ok.html",
        {"username":username,"pwd":pwd},function(data){
        if(data==0){
            window.location="/index.html";
        }
        else {
            alert(data);
        }
    });
}
</script>
</head>

<body>
<!-- loading -->
<div class="loading">
  <div class="pic"></div>
</div>

<!-- login -->
<div id="login_cover">
  <div id="login_modal">
     <span id="login_closer"><a href="javascript:void(0);">×</a></span>
      <table id="login_tab" border="0" cellpadding="0" cellspacing="15">
        <tr>
           <td colspan="2"><h1 style="text-align: center;">用户登陆</h1></td>
        </tr>
        <tr>
          <td class="logintab_td"><input type="text" class="inp1 user_icon" name='username' id="username" size="40" placeholder="用户名" /></td>
        </tr>
        <tr>
          <td class="logintab_td"><input type="password" class="inp1 user_icon" name='pwd' id="pwd" size="40" placeholder="密码" /></td>
        </tr>
        <tr>
              <td>
                  <span style="float: left;"><input type="radio" value="7" name="savetime" id="savetime" checked="checked" /><label for="savetime">保存7天</label></span>                  
                  <span style="float:right;"><a href="/getbackpwd">忘记密码?</a>
    </span>       
              </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
            <button id="tjbut" onclick="login_ajax()">登陆</button>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
            <p id="login_rel"></p>

            </td>
        </tr>
        <tr>
            <td style="text-align:left;">
                其他登陆方式:&nbsp;<a href="qqlogin.php"><img align="top" border="0" src="__img__/QQ.jpg" width="30px"></a>
            </td>
        </tr>
      </table>
  </div>
</div>
<script>
/*
$("#login_modal").mousedown(function(e){
    $("#login_modal").css("position","relative");
    $("#login_modal").css("left",endx).css("top",endy);
    var endx=0;     
    var endy=0;      
    var left= parseInt($("#login_modal").css("left"));     
    var top = parseInt($("#login_modal").css("top"));       
    var downx=e.pageX;     
    var downy=e.pageY; 
    $("#login_modal").bind("mousemove",function(es){        
    var endx= es.pageX-downx+left;       
    var endy=es.pageY-downy+top;   
    $("#login_modal").css("left",endx+"px").css("top",endy+"px");
    });
});         
$("#login_modal").mouseup(function(){$("#login_modal").unbind("mousemove")});
*/
</script>
<!-- message -->
<div id="div_mes">
<p style="height:60px;"></p>
<h2>本站正式上线啦</h2>
<p>经过一段时间的筹备，免费公社正式上线啦。这是一个属于大家的个人私品共享平台，在免费公社实行的是真正的免费，不需要任何费用，你就可以索取到别人共享出来的物品，你也可以将物品放在平台上奉献给别人领取。这样做的目的在于倡导节约和可循环利用，详情请阅读<a style="color:rgb(255,255,100);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(255,255,100)';" href="/about.html">[关于本站]</a>。&nbsp;&nbsp;<a style="color:rgb(255,255,100);float:right;" id="closemes" onclick="document.getElementById('div_mes').style.display='none';" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(255,255,100)';" href="javascript:void(0))">点击关闭</a>
</p>
</div>
<!-- 头部 -->
<div id="div_head">
<div id="div_top">
<p id="p_l">
&nbsp;&nbsp;&nbsp;
<?php if((\think\Cookie::get('qq_accesstoken') == null) OR (\think\Cookie::get('qq_openid') == null)): if($usersess): switch($userclass): case "1": ?>
                  欢迎<font style='color:red;'><?php echo \think\Session::get('unc'); ?></font>来到本站！&nbsp;<a href='/admin.html'>后台管理</a>&nbsp;<a href="/logout">注销</a>    
             <?php break; case "0": ?>
                  欢迎<font style='color:red;'><?php echo \think\Session::get('unc'); ?></font>来到本站！&nbsp;<a href=''>个人中心</a>&nbsp;<a href='/logout'>注销</a>   
             <?php break; endswitch; else: ?>
        欢迎来到本站！&nbsp;<a href='/reg.html'>注册</a>&nbsp;&nbsp;<a href='#' onclick="login()" >登陆</a>&nbsp;&nbsp;<a href='/qqlogin.html'><!-- <img style="height:30px;margin-top: 7px;
" src="__img__/qqz.png"/> -->&nbsp;QQ登陆</a>

    <?php endif; else: ?>
    <a href="#">个人中心</a>&nbsp;<img align="top" src="<?php echo \think\Cookie::get('userimg'); ?>" style="border-radius: 50%;" width="40px" />&nbsp;<a href="/qqlogout">退出QQ</a>
<?php endif; ?>

<a href="/banwu.html">版务</a>

<!-- 
<?php switch($userclass): case "1": ?>
&nbsp欢迎<font style='color:red;'><?php echo \think\Session::get('unc'); ?></font>来到本站！&nbsp;<a href="/admin.html">后台管理</a>&nbsp;<a href="/logout">注销</a>
<?php break; case "0": ?>
&nbsp欢迎<font style='color:red;'><?php echo \think\Session::get('unc'); ?></font>来到本站！&nbsp;<a href="/myspace.html">个人中心</a>&nbsp;<a href="/logout">注销</a>
<?php break; default: ?>
&nbsp欢迎来到本站！&nbsp;<a href="/reg.html" >注册</a>&nbsp;&nbsp;<a href="#" onclick="login()" >登陆</a>&nbsp;&nbsp;<a href='/qqlogin.html'>QQ登陆</a>
<a href="/banwu">版务</a>
<?php endswitch; ?> -->

</p>
<p id="p_r"><font style="color:red;"><?php echo $time; ?></font></p>
</div>
<!-- logo -->
<div id="div_logo">
<p id="p_logo">
<img src="__img__/logo11.png">
</p>
<p id="p_gg">
一对一的私品共享平台
</p>
</div>
<p id="p_city">&nbsp;
<a href="#">深圳</a>｜<a href="#">广州</a>｜<a href="#">北京</a>｜<a href="#">上海</a> <a id="li_warm" href="#">更多</a>
</p>

<script>
  var warm=document.getElementById('li_warm');
  warm.onclick=function(){
    alert('寻求合作！');
  }
</script>

</div>
</div>
<!-- nav -->
<div id="div_nav">
<ul id="ul_nav">
<li id="li_top">首页</li>
<li class="li_nav"><a href="/jj.html">家具</a></li>
<li class="li_nav"><a href="/jd.html">家电</a></li>
<li class="li_nav"><a href="/yw.html">衣物</a></li>
<li class="li_nav"><a href="/sp.html">私品</a></li>
<li class="li_nav"><a href="/sj.html">书刊</a></li>
<li class="li_nav"><a href="/cw.html">宠物</a></li>
</ul>
</div>

<!-- loading 10% -->
<script>
    $('.pic').animate({width:'10%'},100);
</script>

<div id="div_search">
<p id="p_sc">
       <marquee direction="left" scrollamount="2" scrolldelay="80" onmouseover="stop()" onmouseout="start()">
		<span>最新消息:</span>
<?php if(is_array($res_newpro) || $res_newpro instanceof \think\Collection || $res_newpro instanceof \think\Paginator): if( count($res_newpro)==0 ) : echo "" ;else: foreach($res_newpro as $key=>$data_newpro): ?>
    <?php echo $data_newpro['username']; ?>发布了<?php echo $data_newpro['pro_name']; ?>&nbsp;&nbsp;&nbsp;
<?php endforeach; endif; else: echo "" ;endif; ?>
        </marquee>    
</p>
  <form id="form1" name="form1" method="post" action="/searchpro.html" target="_blank">
    <input type="text" name="keywords" id="keywords" />
    <input type="submit" name="button" id="button" value="寻&nbsp;宝" />
  </form>
</div>

<!-- loading 20% -->
<script>
    $('.pic').animate({width:'20%'},100);
</script>

<div id="div_story" style="font:14px '宋体';">
<p id="p_fxlb"><span id="span_lbmc">分享达人</span><span class="span_gengduo"><a href="javascript:void(0)">更多</a></span></p>
<?php if(is_array($res_user) || $res_user instanceof \think\Collection || $res_user instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($res_user) ? array_slice($res_user,0,3, true) : $res_user->slice(0,3, true); if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$data_user): $mod = ($i % 2 );++$i;?>

<table border="0" cellpadding="10" cellspacing="8" >
  <tr>
    <td colspan="2" align="center"><img style="border-radius:50%" src="__img__/face/<?php echo $data_user['photo']; ?>" alt="" width="180px" /></td>
  </tr>
  <tr>
    <td colspan="2" width="70%" align="center"><b><?php echo $data_user['username']; ?></b></td>
  </tr>
  <tr align="center">
    <td colspan="2" align="center"><img width="50px" src="__img__/rose.png" alt="" /></td>
  </tr>
  <tr align="center">
    <th valign="top" align="right">标签</th>
    <td align="left" valign="top"><?php echo $data_user['usermark']; ?></td>
  </tr>
  <tr align="center">
    <th align="right">姓别</th>
    <td align="left"><?php echo $data_user['sex']; ?></td>
  </tr>
  <tr align="center">
    <th align="right">地址</th>
    <td align="left"><?php echo $data_user['address']; ?></td>
  </tr>
  <tr align="center">
    <th align="right">Q&nbsp;Q</th>
    <td align="left"><?php echo $data_user['qq']; ?></td>
  </tr>
  <tr align="center">
    <th align="right">兴趣</th>
    <td align="left"><?php echo $data_user['inter']; ?></td>
  </tr>

</table>

<?php endforeach; endif; else: echo "没有数据" ;endif; ?>
</div>

<!-- 流程 -->

<div id="div_flow">
<a href="javascript:void(0);"><img src="__img__/flow/11.jpg" alt="" /></a>
<a href="javascript:void(0);"><img src="__img__/flow/22.jpg" alt="" /></a>
<a href="javascript:void(0);"><img src="__img__/flow/33.jpg" alt="" /></a>
<a href="javascript:void(0);"><img src="__img__/flow/44.jpg" alt="" /></a>
<a href="javascript:void(0);"><img src="__img__/flow/55.jpg" alt="" /></a>
</div>

<!-- loading 40% -->
<script>
    $('.pic').animate({width:'40%'},100);
</script>

<!-- 产品 -->
<div id="div_pro_all">
<p class="p_lb"><span class="span_lbmc">家具</span><span class="span_gengduo"><a href="/jj.html">更多</a></span></p>
<ul id="ul_jj" class="ul_lb">
<?php if(is_array($res_jj) || $res_jj instanceof \think\Collection || $res_jj instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($res_jj) ? array_slice($res_jj,0,3, true) : $res_jj->slice(0,3, true); if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$data_jj): $mod = ($i % 2 );++$i;?>
    <li class="li_pro"> 
    <img class="pro_img" src="__img__/pro/<?php echo $data_jj['pro_pic']; ?>" />
    <p class="p_name"><?php echo mb_substr($data_jj['pro_name'],0,12); ?></p>
    <p class="p_con">&yen;<?php echo $data_jj['pro_price']; ?></p>
    <p class="p_degree">使用时间：<?php echo $data_jj['degree']; ?></p>
    <p class="p_number">数量：<?php echo $data_jj['number']; ?></p>
    </li>
<?php endforeach; endif; else: echo "没有数据" ;endif; ?>
</ul>
<p class="p_lb"><span class="span_lbmc">家电</span><span class="span_gengduo"><a href="/jd.html">更多</a></span></p>
<ul id="ul_jd" class="ul_lb">
<?php if(is_array($res_jd) || $res_jd instanceof \think\Collection || $res_jd instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($res_jd) ? array_slice($res_jd,0,3, true) : $res_jd->slice(0,3, true); if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$data_jd): $mod = ($i % 2 );++$i;?>
    <li class="li_pro"> 
    <img class="pro_img" src="__img__/pro/<?php echo $data_jd['pro_pic']; ?>" />
    <p class="p_name"><?php echo mb_substr($data_jd['pro_name'],0,12); ?></p>
    <p class="p_con">&yen;<?php echo $data_jd['pro_price']; ?></p>
    <p class="p_degree">使用时间：<?php echo $data_jd['degree']; ?></p>
    <p class="p_number">数量：<?php echo $data_jd['number']; ?></p>
    </li>
<?php endforeach; endif; else: echo "没有数据" ;endif; ?>
</ul>
<p class="p_lb"><span class="span_lbmc">衣物</span><span class="span_gengduo"><a href="/yw.html">更多</a></span></p>
<ul id="ul_yw" class="ul_lb">
<?php if(is_array($res_yw) || $res_yw instanceof \think\Collection || $res_yw instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($res_yw) ? array_slice($res_yw,0,3, true) : $res_yw->slice(0,3, true); if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$data_yw): $mod = ($i % 2 );++$i;?>
    <li class="li_pro"> 
    <img class="pro_img" src="__img__/pro/<?php echo $data_yw['pro_pic']; ?>" />
    <p class="p_name"><?php echo mb_substr($data_yw['pro_name'],0,12); ?></p>
    <p class="p_con">&yen;<?php echo $data_yw['pro_price']; ?></p>
    <p class="p_degree">使用时间：<?php echo $data_yw['degree']; ?></p>
    <p class="p_number">数量：<?php echo $data_yw['number']; ?></p>
    </li>
<?php endforeach; endif; else: echo "没有数据" ;endif; ?>
</ul>

<p class="p_lb"><span class="span_lbmc">私品</span><span class="span_gengduo"><a href="/sp.html">更多</a></span></p>
<ul id="ul_sp" class="ul_lb">
<?php if(is_array($res_sp) || $res_sp instanceof \think\Collection || $res_sp instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($res_sp) ? array_slice($res_sp,0,3, true) : $res_sp->slice(0,3, true); if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$data_sp): $mod = ($i % 2 );++$i;?>
    <li class="li_pro">
    <img class="pro_img" src="__img__/pro/<?php echo $data_sp['pro_pic']; ?>" />
    <p class="p_name"><?php echo mb_substr($data_sp['pro_name'],0,12); ?></p>
    <p class="p_con">&yen;<?php echo $data_sp['pro_price']; ?></p>
    <p class="p_degree">使用时间：<?php echo $data_sp['degree']; ?></p>
    <p class="p_number">数量：<?php echo $data_sp['number']; ?></p>
    </li>
<?php endforeach; endif; else: echo "没有数据" ;endif; ?>
</ul>

<p class="p_lb"><span class="span_lbmc">书刊</span><span class="span_gengduo"><a href="/sj.html">更多</a></span></p>
<ul id="ul_sk" class="ul_lb">
<?php if(is_array($res_sj) || $res_sj instanceof \think\Collection || $res_sj instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($res_sj) ? array_slice($res_sj,0,3, true) : $res_sj->slice(0,3, true); if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$data_sj): $mod = ($i % 2 );++$i;?>
    <li class="li_pro"> 
    <img class="pro_img" src="__img__/pro/<?php echo $data_sj['pro_pic']; ?>" />
    <p class="p_name"><?php echo mb_substr($data_sj['pro_name'],0,12); ?></p>
    <p class="p_con">&yen;<?php echo $data_sj['pro_price']; ?></p>
    <p class="p_degree">使用时间：<?php echo $data_sj['degree']; ?></p>
    <p class="p_number">数量：<?php echo $data_sj['number']; ?></p>
    </li>
<?php endforeach; endif; else: echo "没有数据" ;endif; ?>
</ul>
<p class="p_lb"><span class="span_lbmc">宠物</span><span class="span_gengduo"><a href="/cw.html">更多</a></span></p>
<ul id="ul_cw" class="ul_lb">
<?php if(is_array($res_cw) || $res_cw instanceof \think\Collection || $res_cw instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($res_cw) ? array_slice($res_cw,0,3, true) : $res_cw->slice(0,3, true); if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$data_cw): $mod = ($i % 2 );++$i;?>
    <li class="li_pro"> 
    <img class="pro_img" src="__img__/pro/<?php echo $data_cw['pro_pic']; ?>" />
    <p class="p_name"><?php echo mb_substr($data_cw['pro_name'],0,12); ?></p>
    <p class="p_con">&yen;<?php echo $data_cw['pro_price']; ?></p>
    <p class="p_degree">使用时间：<?php echo $data_cw['degree']; ?></p>
    <p class="p_number">数量：<?php echo $data_cw['number']; ?></p>
    </li>
<?php endforeach; endif; else: echo "没有数据" ;endif; ?>
</ul>
</div>

<!-- loading 80% -->
<script>
    $('.pic').animate({width:'80%'},100);
</script>

<!-- 尾部 -->
<div id="div_bot">
<h3 style="background:rgba(200,200,200,0.8);padding:15px 0px 10px 15px;">
<a href="/about.html" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">关于本站</a> <font style="color:rgb(153,102,0);">｜</font>
<a id="ly" href="/leavemessage.html" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">留&nbsp;言</a>
<span id="span_hits">
<font>你</font><font>是</font><font>本</font><font>页</font><font>第</font><font><?php echo (isset($indexhits) && ($indexhits !== '')?$indexhits:'0'); ?></font><font>位</font><font>访</font><font style='border-right:1px solid lavender;'>客</font>

</span>
</h3>
<ul id="ulink">
    <li><h3>友情链接:</h3></li>
    <li class="ulj"><a style="color:black;" href="https://www.freecycle.org/" onmouseover="this.style.color='red';" onmouseout="this.style.color='black';">Freecycle(全球捐赠网)</a></li>
</ul>

<h4>个人旧物私物馈赠分享平台</h4>
<p><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:379215781:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
<p>Copyright © <span id="bq"></span> www.51mfgs.com  版权所有 粤ICP备18045267号</p>

<script>
  var d = new Date();
  var x = document.getElementById("bq");
  x.innerHTML=d.getFullYear();
</script>

</div>


<!-- loading 100% -->
<script>
    $('.pic').animate({width:'100%'},100,function(){
      $('.loading').fadeOut();
    });
</script>

</body>
</htm>