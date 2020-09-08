<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"./app/index/view/index/index.html";i:1594467839;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="我要免费公社网：个人闲置物品免费分享平台">
<meta name="keywords" content="家具、家电、衣物、书刊、私品等个人闲置物品免费分享领取">
<link rel="shortcut icon" href="__img__/favicon1.ico" type="image/x-icon" />
<meta name="baidu-site-verification" content="cBjfCIUmX8" />
<meta name="360-site-verification" content="2f7f9f66f6e5ac8e035df6ead74392ea" />
<meta name="sogou_site_verification" content="QjlImBuxRJ"/>
<title>免费公社</title>
<link rel="stylesheet" href="__frontcss__/index.css" type="text/css"  />
<script src="__js__/jquery-1.5.2.min.js"></script>
<script src="__js__/time.js"></script>
<script src="__js__/isDevice.js"></script>
<script src="__js__/howler.min.js"></script>

<!-- <link href="https://cdn.bootcdn.net/ajax/libs/animate.css/4.1.0/animate.compat.css" rel="stylesheet">
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

<style type="text/css">

/*html { overflow-x: auto; overflow-y: hidden; }*/

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

/********************************loadingyle end***************************/

/*动画*/
/*#logo{
    animation:dh 3s ease 1s infinite normal;
    -webkit-animation:dh 3s ease 2s infinite normal; 
}
@keyframes dh
{
  0%   {opacity:0;}
  10%  {opacity:0.1;}
  20%  {opacity:0.2;}
  30%  {opacity:0.3;}
  40%  {opacity:0.4;}
  50%  {opacity:0.5;}
  60%  {opacity:0.6;}
  70%  {opacity:0.7;}
  80%  {opacity:0.8;}
  90%  {opacity:1;}
  90%  {opacity:1;}
}

@-webkit-keyframes dh
{
  0%   {opacity:0;}
  10%  {opacity:0.1;}
  20%  {opacity:0.2;}
  30%  {opacity:0.3;}
  40%  {opacity:0.4;}
  50%  {opacity:0.5;}
  60%  {opacity:0.6;}
  70%  {opacity:0.7;}
  80%  {opacity:0.8;}
  90%  {opacity:1;}
  90%  {opacity:1;}
}*/
/*  分割  */

/*  背景音乐播放 */

#play{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
    position: fixed;
    top: 5%;
    right: 2%;
    z-index: 9;
  
}
.rotate{
    animation: ani 2s linear infinite;
}

@keyframes ani{
    from{ transform: rotate(0deg);}
    to{ transform: rotate(360deg);}
}

/*背景音乐播放 end*/

div#cutarea{
  	width: 100%;
  	height: 60px; 
    position: relative;

}

div#cutarea>p{
  	width:50px;
  	height: 50px;
  	margin: 5px auto;
    left:50%;
    margin-left: -25px;
    top:0;   
    position: absolute;  
    animation: ghostUpdown 1s infinite alternate; 
    -webkit-animation: ghostUpdown 1s infinite alternate; 
	
}

 @keyframes ghostUpdown { 
     	0% { 
        opacity: 0.1; 
        margin-top: 5px;        
      } 
     	50%{ 
        opacity: 0.4; 
        margin-top: 0px;
      } 
        100%{ 
        opacity: 0.8; 
        margin-top: 5px;
      } 
 } 

 @-webkit-keyframes ghostUpdown { 
 	    0%{ 
        opacity: 0.1; 
        margin-top: 5px;
      } 
     	50%{ 
        opacity: 0.4; 
        margin-top: 0px;
      } 
        100%{ 
        opacity: 0.8; 
        margin-top: 5px;
      } 
 }

.arrow1{
  background:url(__img__/icon/todown.png) no-repeat;
}
.arrow2{
  background:url(__img__/icon/toup.png) no-repeat;

}

#logo{
   border:0px;
   width:200px;
   height: auto;
   position:relative; 
   left:0px; 
   top:0px;
/*   transform:rotate(0deg);
   -ms-transform:rotate(0deg); 
   -webkit-transform:rotate(0deg); */
/*   -webkit-transform-origin: 50% 50%;
   -ms-transform-origin: 50% 50%;
   transform-origin: 50% 50%;*/
}

/* 搜索 */
#submit_btn{ 
     width:60px; 
     height:48px; 
     background:url(__img__/icon/sousuo.svg) no-repeat center; 
     background-size: 100% 100%;
     cursor:pointer; 
     display:inline-block; 
     text-indent:-9999px; 
     border:none;    
} 

</style>
</head>

<body>
<!-- loading -->
<div class="loading">
  <div class="pic"></div>
</div>

<!-- 背景音乐播放 -->

<div id="play" class="rotate">
      <img src="__img__/icon/play44.png" width="40px" height="40px"/>
</div>

<!-- login -->
<div id="login_cover">
  <div id="login_modal">
     <span id="login_closer"><a href="javascript:void(0);">×</a></span>
      <table id="login_tab" border="0" cellpadding="0" cellspacing="8">
        <tr>
           <td colspan="2">
              <h2 style="text-align: center;">用户登陆</h2>
           </td>
        </tr>
        <tr>
          <td colspan="2">
             <input class="inputgroup user_icon" onfocus="this.placeholder='';this.style.border='1px solid rgba(51,178,51,1)'" onblur="this.placeholder='用户名';this.style.border='1px solid gray'" type="text" name='username' onkeydown="switchKey(document.getElementById('pwd'))" id="username" placeholder="用户名" />
          </td>
        </tr>
        <tr>
          <td colspan="2">
             <input class="inputgroup user_icon" onfocus="this.placeholder='';this.style.border='1px solid rgba(51,178,51,1)'" onblur="this.placeholder='密码';this.style.border='1px solid gray'" type="password" name='pwd' onkeydown="switchKey(document.getElementById('username'))" id="pwd" placeholder="密码" />
          </td>
        </tr>
        <tr>
              <td>
                  <span style="float: left;"><input type="radio" value="7" name="savetime" id="savetime" checked="checked" /><label for="savetime">保存7天</label></span>                  
                  <span style="float:right;"><a href="/getbackpwd.html">忘记密码?</a>

                  </span>       
              </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
            <button id="loginbtn" onclick="login_ajax()">登陆</button>
            </td>
        </tr>

        <tr>
            <td colspan="2" style="clear: both;">
                <p>其他登陆方式:&nbsp;<a href="/qqlogin.html"><img align="top" border="0" src="__img__/QQ.jpg" width="30px"></a>
                </p>
                <p class="regbtn">
                    <a href="/reg.html">注册</a>
                </p>
            </td>
        </tr>
      </table>
  </div>
</div>

<!-- 头部 -->
<div id="div_head">
<div id="div_top" style="margin-top:10px;">
    <p id="p_left">
    &nbsp;&nbsp;&nbsp;
    <?php if((\think\Cookie::get('qq_accesstoken') == null) OR (\think\Cookie::get('qq_openid') == null)): if($usersess): switch($userclass): case "1": ?>
                      欢迎<font style='color:black;'><?php echo \think\Session::get('unc'); ?></font>&nbsp;<span id="youdevice"></span>&nbsp;来到本站！&nbsp;<a href='/admin.html' style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">后台管理</a>&nbsp;<a href="/logout" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">注销</a>  
                      &nbsp;&nbsp;<a href="/banwu.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">版务</a>  
                 <?php break; case "2": ?>
                      &nbsp;<span id="youdevice"></span>&nbsp;欢迎<font style='color:black;'><?php echo \think\Session::get('unc'); ?></font>来到本站！&nbsp;<a href='/admin.html' style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">后台管理</a>&nbsp;<a href="/logout" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">注销</a>   
                      &nbsp;&nbsp;<a href="/banwu.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">版务</a> 
                 <?php break; case "0": ?>
                      &nbsp;<span id="youdevice"></span>&nbsp;欢迎<font style='color:black;'><?php echo \think\Session::get('unc'); ?></font>来到本站！&nbsp;<a href='/myspace.html' style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">个人中心</a>&nbsp;<a href='/logout' style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">注销</a>   
                 <?php break; endswitch; else: ?>
            &nbsp;<span id="youdevice"></span>&nbsp;欢迎来到本站！&nbsp;<a href='/reg.html' style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">注册</a>&nbsp;&nbsp;<a href='#' onclick="login()" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">登陆</a>&nbsp;&nbsp;<a href='/qqlogin.html' style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';"><img style="height:30px;vertical-align:middle;" src="__img__/qqz.png" />&nbsp;QQ登陆</a>
            &nbsp;&nbsp;<a href="/banwu.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">版务</a>

        <?php endif; else: ?>
        &nbsp;<span id="youdevice"></span>&nbsp;<a href="/myspace.html" style="color:black;">个人中心</a>&nbsp;<img align="top" src="<?php echo \think\Cookie::get('userimg'); ?>" style="vertical-align:middle;border-radius: 50%;height: 30px;" />&nbsp;<a href="/qqlogout" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">退出QQ</a>

        &nbsp;&nbsp;<a href="/banwu.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">版务</a>
    <?php endif; ?>
    </p>

    <p id="p_middle">             
          <span style="color:black;">
          你是本站第<?php echo (isset($indexhits) && ($indexhits !== '')?$indexhits:'0'); ?>位访客&nbsp;&nbsp;&nbsp;
          </span>
    </p>

    <p id="p_right"><font id="nowtime" style="color:black;"></font></p>

</div>
</div>


<script>
    $('.pic').animate({width:'10%'},100);//loading 10%
</script>


<!-- main -->
<div id="content">
   <!-- logo -->
  <div style="width: 60%;height: auto;margin:0px auto;text-align:left;">
  <img id="logo" src="__img__/newlogo2.png" alt="" />
  </div><!-- logo -->
  <!-- 介绍 -->
  <div id="div_about">
         欢迎来到免费公社！这是一个致力于推广闲置物品免费分享的平台，我们倡导一场完全非营利性的运动。这一切源于绿色环保、循环利用的理念。会员资格是免费的，但要注册，为方便你随时发布和领取物品请通过同名小程序(见下方二维码)操作。祝你玩得高兴！

  </div><!-- 介绍 -->
  <!-- <div style="width: 100%;height:1px;margin: 0;padding: 0;"></div> -->
  <!-- 搜索 -->
  <div style="width: 100%;height: auto;text-align: center;margin: 20px auto;">
  <form name="form1" method="post" action="/searchpro.html" target="_blank">
    <input style="border: none;border-radius:10px;" onfocus="this.placeholder=''" onblur="this.placeholder='搜你想搜的东西'" placeholder="搜你想搜的东西" type="text" name="keywords" id="keywords" />
    <input id="submit_btn" style="" type="submit" />
  </form>
  
  </div><!-- 搜索 -->
  <!-- 类别 -->
  <div style="width: 100%;height: auto;">
    <ul id="searchclass">
        <li><a href="/jj.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">家<span class='space_pad'></span>具</a></li>
        <li><a href="/jd.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">家<span class='space_pad'></span>电</a></li>
        <li><a href="/yw.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">衣<span class='space_pad'></span>物</a></li>
        <li><a href="/sp.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">私<span class='space_pad'></span>品</a></li>
        <li><a href="/sj.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">书<span class='space_pad'></span>刊</a></li>
        <li><a href="/cw.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">宠<span class='space_pad'></span>物</a></li>
    </ul>


  </div> <!-- 类别 -->
</div><!-- main -->

<!-- loading 50% -->
<script>
    $('.pic').animate({width:'50%'},100);
</script>


<!-- 分割 -->

<div id="cutarea">
		<p class="arrow1"></p>
</div>


<!-- 尾部 -->
<div id="div_bot" style="font-size: 16px;font-family: 'Microsoft Yahei';">

<div id="bot_box">
     <div class="box-item div_l">   
          <h3 style="padding:15px 0px 10px 15px;color:black;font-weight:300;font-size:16px;"> 
          <a href="/about.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">关于本站</a> <font style="color:black;">｜</font>
              <a id="ly" href="/leavemessage.html" style="color:black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">留&nbsp;言</a>
          </h3>
          <ul id="ulink">
              <li><h3 style="color:black;font-weight:300;font-size:16px;">友情链接:</h3></li>
              <li class="ulj"><a style="color:black;" href="https://www.freecycle.org/" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';">Freecycle(全球捐赠网)</a></li>
          </ul>
    </div>

    <div class="box-item div_m">
          <div id="qr" style="width: 100%;height: auto;">
               <p style="width: 220px;height: 100px;margin:5px auto;">
                   <img style="width: 100px;height: 100px;padding-right: 10px;" src="__img__/wxqrcode/22.jpg" alt="" /><img style="width: 100px;height: 100px;" src="__img__/wxqrcode/11.jpg" alt="" />
               </p>            
          </div>
          <span style="font-size: 16px;color:white;text-align: center;">
                  拿起手机 随时分享
          </span>

    </div>

    <div class="box-item div_r">
         
    </div>

</div>

<h4>个人闲置物品分享平台</h4>
<p>
<!-- <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:379215781:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a> -->
    <a id="talk" style="text-decoration:none;color:black;background-image:linear-gradient(to right bottom,rgb(102,208,205),white);border:1px solid rgb(220,220,220);border-radius: 5px;padding:3px 8px;display:inline-block;line-height: 20px;" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes">
              <img height="20px" style="vertical-align: middle;" border="0" src="__img__/icon/QQ.svg" alt="点击这里给我发消息" title="点击这里给我发消息"/>
              <span style="vertical-align: middle;">QQ交谈</span>
    </a>
</p>
<p>Copyright © <span id="bq"></span> www.51mfgs.com  版权所有 粤ICP备18045267号-1</p>

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
    


<script>

    //判断用户设备 
    var dev = isDevice();
    if(dev == 0){
        $("#youdevice").text("手机端用户");
    }else if(dev == 1){
        $("#youdevice").text("PC端用户");
    }else if(dev == 2){
        $("#youdevice").text("微信用户");
    }else if(dev == 3){
        $("#youdevice").text("安卓手机用户");
    }else if(dev == 4){
        $("#youdevice").text("苹果手机用户");
    }else if(dev == 5){
        $("#youdevice").text("WP手机用户");
    }

    //切换表单焦点
    function switchKey(obj){
           if(event.keyCode==40){
                 obj.focus();
           }
    }
    //点击登陆
    function login_ajax(){
        var username=$('#username').val();
        var pwd=$('#pwd').val();
        $.get("/login_ok.html",
            {"username":username,"pwd":pwd},function(data){
            if(data==0){
                 setTimeout(function(){
                       $('#tjbut').css("background-color","red").css('color','white').text('登陆...');
                       window.location="/index.html"; 
                 },1000); 
            }else{
                alert('失败！');
            }
        });
    }

    //按回车键登陆
    $("body").keydown(function() {
        if (event.keyCode == "13") {//keyCode=13是回车键
            var username=$('#username').val();
            var pwd=$('#pwd').val();
            $.get("/login_ok.html",
                {"username":username,"pwd":pwd},function(data){
                if(data==0){
                     setTimeout(function(){
                         $('#tjbut').css("background-color","red").css('color','white').text('登陆...');
                         window.location="/index.html"; 
                     },1000);
                     
                }else{
                    alert('失败！');
                }
            });        
        }
    });  

    // 点击模态小X关闭登陆弹窗
    $(document).ready(function(){
        $("#closemes").click(function(){
             $("#div_mes").slideUp(3000);
        });
    });

    // 点击向下箭头,出现尾部信息
    $(".arrow1").click(function(){
        $('#div_bot').slideToggle("slow");     
        $("#cutarea>p").toggleClass("arrow2");
      
    });    

    <!-- logo jquery 动画效果 -->
    var LOGO = $("#logo");
     
    function runIt() {
        LOGO.fadeIn("slow");
        // LOGO.show("slow");
        var w=$("#div_about").width();
        var l=w-200;
        LOGO.animate({left:'+='+l},4000);
        //LOGO.animate({left:'+='+l,transform:'rotate('+90+'deg)'},4000);
        // $(LOGO).css({"transform":"rotate("+xzDeg+"deg)"});
        LOGO.animate({top:'+=30'},500);
        LOGO.fadeToggle(1000);
        LOGO.fadeToggle("slow");
        LOGO.animate({left:'-='+l},4000);
        LOGO.animate({top:'-=30'},500,runIt);
        // LOGO.hide("slow");
        // LOGO.show(1200);
        LOGO.fadeOut("normal");
    }     
    runIt();

    // 当屏幕高度小于1000时，撑满整个设备的高度
    window.onload=function(){
       if($(window).height()<1000){
            $(document.body).css("height","100vh");
        }
    }

    // 打开登陆窗口函数
    function login(obj){
        var login_cover=document.getElementById('login_cover');
        var login_modal=document.getElementById('login_modal');
        var login_closer=document.getElementById('login_closer');
        login_cover.style.display='block';
        login_closer.onclick=function(){
            login_cover.style.display='none';
        }

    }

    //设置向baiduspider自动推送
  	(function(){
  	    var bp = document.createElement('script');
  	    var curProtocol = window.location.protocol.split(':')[0];
  	    if (curProtocol === 'https') {
  	        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
  	    }
  	    else {
  	        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
  	    }
  	    var s = document.getElementsByTagName("script")[0];
  	    s.parentNode.insertBefore(bp, s);
  	})();

    // 背景音乐
    //实例化音频
    var sound = new Howl({
        src:["__img__/audio/audio1.mp3","__img__/audio/sweet.mp3","__img__/audio/sweet.wav","__img__/audio/audio1.wav"],  
        autoplay:true,
        loop: true,
        volume: 1,
        onend: function() {
            console.log("finished");
       }
    });

    
    // 用于移动端触摸
    document.getElementById("play").addEventListener("touchstart",function(){
        //获取当前播放状态
        var playing = sound.playing();
        if (playing) {
          sound.pause();
          this.className="";
        } else{
          sound.play();
          this.className="rotate";          
        }
    });

     // 用于PC端点击
    document.getElementById("play").addEventListener("click",function(){
        //获取当前播放状态
        var playing = sound.playing();
        if (playing) {
          sound.pause();
          this.className="";
        } else{
          sound.play();
          this.className="rotate";          
        }
      });
</script>
  


</body>
</htm>