<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:30:"./app/index/view/index/sp.html";i:1594468031;s:32:"./app/index/view/common/top.html";i:1592137484;s:35:"./app/index/view/common/bottom.html";i:1592150251;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>私品</title>
<link rel="stylesheet" type="text/css"  href="__frontcss__/pro_center1.css" />
<!-- <link rel="stylesheet" type="text/css" href="__frontcss__/page.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="__frontcss__/commonstyle.css" /> -->
<style type="text/css">

/*loading*/

.loading{
	width: 100%;
    height: 100%;
    position:fixed;
    top:0;
    left: 0;
    z-index: 100;
    background: white;
}
.pic{
	width:80px;
    height:80px;
    background-image:url(__img__/pro/load.gif);
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin:auto;
}


@media only screen and (max-width: 981px){
	#div_main{
		
	}

	 #div_top{
	 	width:1120px;
	 }
	 #div_top #div_nav{
	 	 width:100%;
         height:60px;
		 background: rgb(51,187,51);
	 }

     #div_top #ul_nav{
     	width:1100px;
        height:60px;
		margin:0px auto;   
	 }

	 #div_bottom{
	 	width:1120px;
     }
	  #div_bottom #div_bot{
	 	width:100%;
     

     }

}


{/literal}
</style>
<script src="__js__/jquery-1.5.2.min.js"></script>




</head>

<body>

<!-- 导航  -->
<div id="div_top" style="clear: both;">
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
</div>

<div id="main">
	<!-- position -->
	<div id="div_lead" style="clear:both;text-align:left;background: rgb(204,255,204);height:50px;line-height:50px;width:1100px;margin:20px auto 10px;border-radius: 8px;">
	&nbsp;<img style="vertical-align: middle;" height="25px" src="__img__/currentpos.png">&nbsp;<span style="vertical-align: middle;">当前位置：<a href="/index/Index/index">首页</a> >> 私品</span>
	</div>


	<!-- 加载模块 -->
	<ul id="ul1">



	<li id="li1">
		<div>
		   <a href="/myspace.html">
					<img src="__img__/add.jpg" />
				<p>
				   点击图标分享物品
				</p>
		   </a>
		</div>
	</li>
	<li id="li2">
		<div>
		   <a href="/myspace.html">
					<img src="__img__/add.jpg" />
				<p>
				   点击图标分享物品
				</p>
		   </a>
		</div>
	</li>
	<li id="li3">
		<div>
		   <a href="/myspace.html">
					<img src="__img__/add.jpg" />
				<p>
				   点击图标分享物品
				</p>
		   </a>
		</div>
	</li>
		
	</ul>

	<!-- 加载完所有产品后，提示没有更多了 -->
	<div id="div_ts">
	    <h3>没有更多啦！</h3>
	</div>
</div>

<div id="div_bottom">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bottom</title>
<style type="text/css">

*{margin:0;padding:0;}
a,img{border:0;}
a{text-decoration:none;}
li{list-style-type:none;}
#div_bot{clear:both;
	     width:100%;
         height:280px;
		 /*background:#666;*/
		 background: rgba(180,180,180,1);
		 margin-top:15px;
	     font-size:16px;
	     font-family: "微软雅黑";
	    }
	    

#div_link{
	   padding:10px 0px 10px 60px;
}
#div_link div{
	margin:5px;
}
#div_link a:hover{
	color:red;
}
#div_bot p,h4{
	text-align:center;
    margin-top:10px;
}

span#span_hits{
	display: inline-block;
	float:right;
}
span#span_hits font{
	border:1px solid lavender;
	padding:2px 5px;
	border-right:none;
	font-family: 宋体;
}

@media only screen and (max-width: 981px){
	 #div_bot{
	 	width:1000px;
     

     }

}

</style>

</head>

<body>
<div id="div_bot">
<h3 style="background:rgb(245,245,245);padding:15px 0px 10px 15px;">
<a href="/about.html" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">关于本站</a> <font style="color:rgb(153,102,0);">｜</font>
<a id="ly" href="/leavemessage/index.php" style="color:rgb(153,102,0);" onmouseover="this.style.color='red';" onmouseout="this.style.color='rgb(153,102,0)';">留&nbsp;言</a>
<span id="span_hits">

</span>
</h3>
<div id="div_link">
    <div><h3>友情链接:</h3></div>
    <div><a style="color:black;" href="https://www.freecycle.org/" onmouseover="this.style.color='red';" onmouseout="this.style.color='black';">Freecycle(全球捐赠网)</a></div>
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
</body>
</html>
</div>

<a href="javascript:void(0);" id="btn" title="回到顶部"></a>


<script>

// 下拉加载变量
var allProductData = [] //全部的数据
var productData = [] //要渲染的数据
var listQuery = {
	currPage: 1,
	pageSize: 12
}

var total = 0;

var page=0;

// 回到顶部变量
var obtn=document.getElementById('btn');
var clientHeight=document.documentElement.clientHeight;
var timer=null;
var isTop=true;


//获取界面节点
var ul = $('#ul1');
// var li = $('li');
// var liLen = li.length;    

function queryData(){
    //数据处理 
    productData = allProductData.slice((listQuery.currPage-1) * listQuery.pageSize, listQuery.currPage * listQuery.pageSize);

    console.log(productData.length);
    for(i=0;i<productData.length;i++){
    	//var index = getShort(li);//查找最短的li,适合高度不一致的图片排列
        var pronum= productData[i].number-(productData[i].number-productData[i].remainnum);  //计算当前产品的库存
		//创建新的节点：div>img+p
		var div = $('<div>');
		var a = $('<a>');
		if(pronum == 0){
			$(a).attr('href','javascript:void(0)').appendTo($(div));
		}else{
            $(a).attr('href','/proshow/id/'+productData[i].pro_id+'.html').appendTo($(div));
		}
		
		var img = $('<img>');
		$(img).attr('src',"__img__/pro/"+productData[i].pro_pic);//img获取图片地址
		$(img).attr("alt","我在努力加载...");
		if(pronum == 0){
			$(img).css({'opacity':'0.7'});
		}else{
            $(img).css({'opacity':'1'});
		}
		//根据宽高比计算img的高，为了防止未加载时高度太低影响最短Li的判断
		// $(img).css('height',(data[i].height+60) * (334 / data[i].width+20) + "px");
		$(img).appendTo($(a));
		var p = $('<p>');
		$(p).text(productData[i].pro_name);//获取产品标题
		$(p).css({"position":"relative"}).appendTo($(div));
        // 创建span元素，用来放置产品描述及数量
		var span = $('<span>');		
		$(span).html("还剩<font style='color:red;'>" + pronum + "</font>个/件");
		$(span).css({"position":"absolute","right":"5px","top":"0px"}).appendTo($(p));
		//加入到最短的li中,适合高度不一样的图片排列
		//$(div).appendTo(li[index]);
        var li = $('<li>');
		$(div).appendTo(li);
		$(li).appendTo($(ul));
	}

    // 小于总页数，当前页就不加1了
    if(listQuery.currPage < page+1){
         listQuery.currPage++;         
  	}    
}

// 下拉下载数据，用ajax获得所有数据
function getAllData(){
    
	$(document).ready(function(){
		$.ajax({url:"/ajaxSpData",async:true,success:function(result){
                allProductData = JSON.parse(result);
                total = allProductData.length;
                page=Math.ceil(allProductData.length / listQuery.pageSize);
                // console.log(page);
                queryData();
            }
        });
	});
}	


//打开网页预加载数据时显示，加载完后图标隐藏
document.onreadystatechange=function(){
	  var loading='<div class="loading"><div class="pic"></div></div>';
	  $('body').append(loading);
	  if(document.readyState=='complete'){
	  	  $('.loading').fadeOut();
	  };
}

window.onload = function() {
	getAllData();
	
	window.onscroll = function (){

		//适用于等高的图片排列
        var offsetHeight=document.body.offsetHeight;
		var offsetTop=document.body.offsetTop;
		var scrollTop = document.documentElement.scrollTop||document.body.scrollTop;
		var clientHeight1 = Math.max(document.documentElement.scrollHeight, document.body.scrollHeight);
		
		if(offsetHeight/2 + clientHeight1 <scrollTop + clientHeight1){
			if(listQuery.currPage < page+1){		   	
		    	queryData();
		    }else{
		    	if(total%3==1){
                   $("#li1").css({"display":"block"}).appendTo("#ul1");
                   $("#li2").css({"display":"block"}).appendTo("#ul1");
		    	}else if(total%3==2){
                   $("#li1").css({"display":"block"}).appendTo("#ul1");
		    	}else{
		    	   $("#li1").css({"display":"none"});
                   $("#li2").css({"display":"none"});
                   $("#li3").css({"display":"none"});
		    	}
		
		    	$("#div_ts").css({"display":"block"});
		    } 

		}
		

        // 下拉加载，适应高度不一致的图片排列
		// var index = getShort(li);
		// var minLi = li[index];
		// var scrollTop = document.documentElement.scrollTop||document.body.scrollTop;
		
		// if(minLi.offsetHeight+minLi.offsetTop<scrollTop+document.documentElement.clientHeight){
		// 	if(listQuery.currPage < page+1){		   	
		//     	queryData();
		//     }  
		// }

        //回到顶部
        var ostop=document.documentElement.scrollTop || document.body.scrollTop;
		if(ostop>=clientHeight){
            obtn.style.display='block';
		}else{
			obtn.style.display='none';
		}
		if(!isTop){
			clearInterval(timer);
		}
		isTop=false;

		obtn.onclick=function(){
	    	// alert(clientHeight);
	    	timer=setInterval(function(){
                var ostop=document.documentElement.scrollTop || document.body.scrollTop;
                var ispeed=Math.floor(-ostop / 10);
	    	    document.documentElement.scrollTop = document.body.scrollTop =ostop+ispeed;
	    	    isTop=true;
	    	    if(ostop==0){
	    	    	clearInterval(timer);
	    	    }
	    	},30);
	    	
	    }
/*******************************   回到顶部 *******************************/ 

    }

	 
}

//获得最短图片的索引
// function getShort(li) {
// 	var index = 0;
// 	var liHeight = li[index].offsetHeight;
// 	for(var i = 0; i < li.length; i++) {
// 		if(li[i].offsetHeight < liHeight) {
// 			index = i;
// 			liHeight = li[i].offsetHeight;
// 		}
// 	}
// 	return index;
// }

</script>


</body>
</html>
