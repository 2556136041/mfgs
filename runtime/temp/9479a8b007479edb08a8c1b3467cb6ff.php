<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:33:"./app/index/view/index/about.html";i:1594480308;s:32:"./app/index/view/common/top.html";i:1592137484;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>让每一次分享，都成为美好记忆</title>
<style>

    *{margin:0;padding:0;
	  font-family:"微软雅黑";
	}
    a,img{border:0;}
    a{text-decoration:none;}
    li{list-style-type:none;}
    h1{text-align: center;
       margin: 20px 0px;
    }
    div#main{
        width: 90%;
        height: auto;
        margin: 20px auto;
        background:rgb(200,200,200,0.2);
        padding: 10px 0px;
    }
    div#main p{
    	text-align: justify;
    	text-indent: 2em;
    	line-height: 2em;
    	padding: 0px 30px;
    }
    div#main img{
    	width: 550px;
    	
    }
    #light{
        width: 550px;
        margin: 5px auto;
        text-align: right;
    }
    #div_bot{clear:both;
	     width:100%;
         height:250px;
		 /*background:#666;*/
         background: rgba(180,180,180,1);
		 margin-top:15px;
	     font-size:16px;
	    }
	#ulink{
		   padding:10px 0px 10px 60px;
		   }
	#ulink li{margin:5px;}
	.ulj a:hover{color:red;}
	#div_bot p{text-align:center;}
	h4{text-align:center;
	   margin:0px 0px 10px 0px;
	
	}
	.pp{
		margin:0px 0px 10px 0px;
	}
    span#span_hits font{
	/*border:1px solid gray;*/
	padding:2px 5px;
	/*border-right:none;*/
	font-family: 黑体;
	/*box-shadow:2px 2px 3px blue;*/
    }

    .div_img{
        overflow: hidden;
        background: gray;
        margin: 15px auto;
        width: 550px;
    }
    .div_img img{        
        cursor: pointer;  
        transition: transform 0.6s;
    }
    .front{
        filter:grayscale(100%);
    }
    .change{
        filter:grayscale(0%);
    }
    .div_img img:hover{
        transform: scale(1.2);
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
<div id="main">
<p>
    <span id="span_hits" style="letter-spacing: 1px;">
    已有{{ hits }}位访客读过本文
   </span>
</p>
	<h1>{{ tit }}</h1>
    <!-- __img__/gb_about_gray.jpg -->
	<div class="div_img">
     <img v-on:click="changeImg" id="img1" class="front" src="__img__/gb_about.jpg" alt="" />
    <!-- <img id="img1" class="front" src="__img__/gb_about.jpg" alt="" /> -->
    </div>
    <h3 id="light">{{ lighttj }}</h3>
	<p>几年前，我从一本书上看到freecycle、craigslist这样的国外闲置物品分享平台，他们都是由一些程序员搭建维护，不收取会员任何费用，倡导节约节能，会员间可以自由转送物品。赠人物品，手有余香，也许在你看来是没用的东西，但对于别人来说却视为珍宝。这样的平台之所以受到欢迎，不仅在于平台的公益性，更在于在它所传承的理念是与整个现代社会追求绿色节能、循环利用的理念相一致，是一件造福于大众的好事。当我发现还有这样的平台时，我感到由衷的高兴，并想为此做点什么。</p>
    <p>为此，我做了一些专门的准备工作，比如学习编程，了解一个网站的搭建、管理、运营。比如通过日常交流、观察和调查，了解人们对这一平台的需求。通过两年时间的筹备，终于有了这个平台的面世。</p>
    <p>我们生活在一个物质生活丰足的年代，新品永远是人们乐此不疲的话题。而旧物常常被人们束之高搁，或丢弃，尽管在当初购置时也是花了大价钱的。面对这些数目庞大、有着循环利用价值的旧物像垃圾一样扔掉，不得不说是一种巨大的社会资源浪费。不少一线城市居民近几年也许都有切身的体会：原来搬家或换新家具家电时还能找到收废品的人，让旧家具、旧家电进入二手市场。然而现在不仅找不到收废品的，小区没有地方也不允许业主随便乱扔。最后不得不花钱请人上门处理。</p>
    <p>实际上，我们准备扔掉的这些物品完全可以被其他人利用。但由于信息不对称，分享者和领取者之间无法建立联系。如果有这样的平台，是不是可以实现资源的共享，让旧物进入一种良性的可循环利用呢！
    <p>今天，搭建一个免费分享平台，在技术上已不是什么问题，但要想让其大行其道却不是件容易的事，关键是观念问题。在很多人看来，宁愿丢掉旧物也不愿给别人，一怕麻烦，二是心理障碍。但我相信，随着时间的推移，人们的观念也会有所改变。就拿我身边的人来说，当我说服一个老板把他闲置的名牌钢笔、笔记本电脑拿出来分享给山区大学生时，他很乐意。当我的女儿得知我在弄这样一个平台时，她表示要把自己八成新的芭比娃娃和玩具全部放在网上，给需要的人领取。</p>
    <p>我建议，当你准备丢弃一件在你看来觉得仍有价值或者估计还会有人需要时，不妨把它发到这个平台上，说不定能分享给有需要它的人。当你舍不得扔掉的旧物带着你的体温和记忆送到某个人的手上时，你会不会有一种释然之感油然而生，哦！终于找到它的归宿了。</p>
    <p>这个平台取名“免费公社”，“公社”寄意大众、共享。平台不收取任何费用，但需要注册成为会员，以便于管理。注册会员时请务必使用真实、正确的联系方式（手机号、邮箱、QQ、微信等），以便分享者和领取者双方之间的沟通联系。</p>
    <p>这是大家共同的平台，让我们携手为绿色节能、循环利用事业作出自己的贡献吧！</p>
    <div v-html="administer"></div>
    <div v-html="accept"></div>
</div>
<div id="div_bot">

<script>
  // var mes=document.getElementById('ly');
  // mes.onclick=function(){
  //   alert('留言还未开通！');
  // }
</script>

<ul id="ulink">
    <li><h3>友情链接:</h3></li>
    <li class="ulj"><a onmouseover="this.style.color='white';" onmouseout="this.style.color='black';" style="color:black;" href="https://www.freecycle.org/">Freecycle(全球捐赠网)</a></li>
</ul>
<h4>个人闲置物品分享平台</h4>
<p class="pp">
<!-- <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:379215781:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a> -->

<a id="talk" style="text-decoration:none;color:black;background-image:linear-gradient(to right bottom,rgb(102,208,205),white);border:1px solid rgb(220,220,220);border-radius: 5px;padding:3px 8px;display:inline-block;line-height: 20px;" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2556136041&site=qq&menu=yes">
              <img height="20px" style="vertical-align: middle;" border="0" src="/public/static/images/icon/QQ.svg" alt="点击这里给我发消息" title="点击这里给我发消息"/>
              <span style="vertical-align: middle;">QQ交谈</span>
</a>

</p>
<p>Copyright © <span id="bq"></span> www.51mfgs.com  版权所有 粤ICP备18045267号-1</p>

<script>
var d = new Date();
var x = document.getElementById("bq");
x.innerHTML=d.getFullYear();

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
</script>

</div>

<script src="/public/static/js/vue/vue2.6.min.js"></script>
<script src="/public/static/js/jquery-1.5.2.min.js"></script>
<script>
    var vue=new Vue({

        el:"#main",
        data:{
            tit:"让每一次分享，都成为美好记忆",
            hits:<?php echo $abouthits; ?>,
            lighttj:"点击图片有惊喜！",
            administer:"<p><b>平台管理人：GREEN</b></p>",
            accept:"<p><b>接受分享物品：</b>汽车、电器、家具、衣物、书刊、宠物等</p>"



        },
        methods:{
            changeImg:function(){                
                setTimeout(function(){
                    // document.getElementById("img1").setAttribute("src","__img__/gb_about.jpg");
                    $("#img1").addClass("change").removeClass("front");               
                },1000);
            }
        }



    })



</script>


</body>
</html>