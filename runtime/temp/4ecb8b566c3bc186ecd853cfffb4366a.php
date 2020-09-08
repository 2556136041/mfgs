<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"./template/data/pub/2020-1.html";i:1592723694;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>publicnews</title>
<style type="text/css">
    *{padding: 0px;margin: 0px;}

	.container{
		width: 2000px;
		height: 100%;
		overflow: hidden;
		border: 5px solid rgba(256,256,256,1);
		margin: 20px auto 0px;
		position: relative;				
	}			
	#box{
		width: 2000px;
		height: 600px;
	}

	#div_logo{
		width:60px;
		height:60px;
		position:absolute;
		top:10px;
		left:50px; 
	}
	a{
    	text-decoration: none;
    	font-size:14px; 
    	cursor: pointer;	
    	color:black;
    	position: absolute;
    	top:80px;
    	left:55px;  
    	z-index: 100;	
    }
	.qh{
		width: auto;
		height: auto;
		overflow: hidden;				
		position: absolute;
		top: 5px;
		left: 70%;
		transform: translateX(-50%);
	}
	 #div_month{
    	width:2000px;
    	height:40px;
    	/*background: gray;*/
    	position: fixed;
    	bottom:0px;
    	left:20px;
    	text-align: left;
    	z-index: 90;
    }
	.qh button,#div_month button{
	   width: 110px;
       height:30px;
	   line-height: 30px;
	   font-size: 16px;
	   border-radius: 8px;
	   outline: none;
	   border:none;
	   cursor: pointer;
    }
    .qh button:hover,#div_month button:hover{
    	background:rgba(6,65,181,1);
    	color:white;
    }	
    .active{
    	background:rgba(6,65,181,1);
    	color:white;
    }	
    @media only screen and (max-width: 981px){    
		 /*.container{
		 	  transform: rotate(-90deg);
		 } */

	}

	@media (orientation: portrait) {
		.container{
			margin-top: 100px;
	        transform: rotate(-90deg);
	        position: absolute;
	        left:0px;
	        top:0px;
	        font-size: 10vw;
	    }

	    #box{

		}
		#div_logo{
            display:none;


		}
	    a{
	    	/*top:120px;*/
	    	display:none;

	    }
	    .qh{
            top: -60px;


	    }
	    #div_month{
	    	position: absolute;
	    	left:20px;
	    	top:20px;
	    }
        .qh button,#div_month button{
            border:1px solid gray;
            box-shadow: 1px 1px 3px black;


        }
	    #div_month button{
	    	width: 120px;
	    	display: block;
	    	margin-top:16px;
	    }
    }

</style>	
<link rel="stylesheet" href="__frontcss__/animate.min.css" type="text/css"  />	
<script src="__js__/echarts.min.js" ></script>
<script src="__js__/jquery-1.5.2.min.js" ></script>
<script src="__js__/publicnews.js" ></script>

</head>
<body>

		
<div class="container">    

    <!-- 读特logo -->
    
    <div id="div_logo" class="animated flipInY infinite">       
          <img src="__img__/icon/dute.png" alt="" width="100%" height="100%">      
    </div>    

    <!-- 链接官网 -->
    <a href="https://www.dutenews.com/" target="_blank">进入官网</a>
   
	<!--给图表准备一个容器-->
	<div id="box"></div>
	
	<div class="qh">
		<button id="line">折线图</button>
		<button id="bar">柱状图</button>
	</div>


	<div id="div_month">
	<button class="btn" id="1" onclick="send(this.id);">1月数据</button>
	<button class="btn" id="2" onclick="send(this.id)">2月数据</button>
	<button class="btn" id="3" onclick="send(this.id)">3月数据</button>
	<button class="btn" id="4" onclick="send(this.id)">4月数据</button>
	<button class="btn" id="5" onclick="send(this.id)">5月数据</button>
	<button class="btn" id="6" onclick="send(this.id)">6月数据</button>
	<button class="btn" id="7" onclick="send(this.id)">7月数据</button>
	<button class="btn" id="8" onclick="send(this.id)">8月数据</button>
	<button class="btn" id="9" onclick="send(this.id)">9月数据</button>
	<button class="btn" id="10" onclick="send(this.id)">10月数据</button>
	<button class="btn" id="11" onclick="send(this.id)">11月数据</button>
	<button class="btn" id="12" onclick="send(this.id)">12月数据</button>
</div>
</div>		

<script type="text/javascript">	

        //获取当年的年份和月份
		var date=new Date;
        var y = date.getFullYear() 
        var secondMonth=getDaysOf2(y);
        var month = date.getMonth() + 1;
        // m = m < 10 ? '0' + m : m;  
        //  
	    //自定义样式
        var style={
        	topcolor:"rgba(209,48,43,1)",
            //柱体三种颜色
            basecolor:["rgba(255,204,0,1)","rgba(154,206,151,1)","rgba(209,48,43,1)"],
            //平均数标线颜色
            averagecolor:"rgba(6,65,181,1)",
            //平均数大小
            averagewidth:3,
            //主标名称 
            //titname:"2020读特·区域频道月度("+month+"月)发稿曲线图",
            //主标题颜色
            titcolor:"rgba(6,65,181,1)",
			//主标题字体大小
			titfontsize:20,
			//副标题颜色
			subtitcolor:"rgba(10,10,10,.9)",
			//副标题字体大小
			subtitfontsize:15,			
			//x轴颜色
			xdatacolor:"black",
			//x轴字体大小
			xdatafontsize:16,
			//圆柱体上面字体大小
			topfontsize:16,
			//折线颜色
			linecolor:"black",
			//拆线大小
			linewidth:3,
			//折线字体颜色
			linetextcolor:"black",
			//拆线字体大小
			linetextfontsize:16,
			//标题位置
			titposleft:400,
            titpostop:0,
            //色块提示
            tipname1:"记者发稿量",
            tipname2:"抓取稿件",
            tipname3:"一天发稿总量"

        }

       
		//拿到所有的数据
		var everydays;
        getData();

        function getData(){   
		   $(function(){
		   	    $.ajax({
					url:"/readData",
					dataType:'JSON',
                    type:'post',
					async:false,
					success:function(result){
						 everydays=(JSON.parse(result)).everydaynumbers;
						 sixd1=everydays[5].six.d1;
						 console.log(sixd1);
						 sixd2=everydays[5].six.d2;
						 sixd3=everydays[5].six.d3;

                         // alert(month);
				        switch(month){
						    case 1:
						        var d1=everydays[0].one.d1;
								var d2=everydays[0].one.d2;
								var d3=everydays[0].one.d3;
						        break;
						    case 2:
						        var d1=everydays[1].two.d1;
								var d2=everydays[1].two.d2;
								var d3=everydays[1].two.d3;
						        break;
						    case 3:
						        var d1=everydays[2].three.d1;
								var d2=everydays[2].three.d2;
								var d3=everydays[2].three.d3;
						        break;
						    case 4:
						        var d1=everydays[3].four.d1;
								var d2=everydays[3].four.d2;
								var d3=everydays[3].four.d3;
						        break;
						    case 5:		        
								var d1=everydays[4].five.d1;
								var d2=everydays[4].five.d2;
								var d3=everydays[4].five.d3;
						        break;
						    case 6:		       
								var d1=everydays[5].six.d1;
								var d2=everydays[5].six.d2;
								var d3=everydays[5].six.d3;
						        break;
						    case 7:
						        var d1=everydays[6].seven.d1;
								var d2=everydays[6].seven.d2;
								var d3=everydays[6].seven.d3;
						        break;
						    case 8:
						        var d1=everydays[7].eight.d1;
								var d2=everydays[7].eight.d2;
								var d3=everydays[7].eight.d3;
						        break;
						    case 9:
						        var d1=everydays[8].nine.d1;
								var d2=everydays[8].nine.d2;
								var d3=everydays[8].nine.d3;
						        break;
						    case 10:
						        var d1=everydays[9].ten.d1;
								var d2=everydays[9].ten.d2;
								var d3=everydays[9].ten.d3;
						        break;
						    case 11:
						        var d1=everydays[10].eleven.d1;
								var d2=everydays[10].eleven.d2;
								var d3=everydays[10].eleven.d3;
						        break;
						    case 12:
						        var d1=everydays[11].twelve.d1;
								var d2=everydays[11].twelve.d2;
								var d3=everydays[11].twelve.d3;
						        break;
						    default:
						        
						}	

						if(month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12 ){
							 diffMonth(style,31,month,d1,d2,d3);
						}else if(month==4 || month==6 || month==9 || month==11){
						     diffMonth(style,30,month,d1,d2,d3);
						}else{
							 if(secondMonth == 28){
						         diffMonth(style,28,month,d1,d2,d3);
						     }else if(secondMonth == 29){
						         diffMonth(style,29,month,d1,d2,d3);
						     }
						}
					}
		       });
		   })      
		}

        //控制logo动画
		$("#div_logo").mouseover(function(){
			$("#div_logo").removeClass("animated bounceIn infinite");
		});

		$("#div_logo").mouseout(function(){
			$("#div_logo").addClass("animated bounceIn infinite");
		});

		
   
        var btn = $("#div_month button"); //获取button集合
        //当前月份btn样式
        btn.eq(month-1).addClass("active").siblings("button").removeClass("active");
        function send(id){		
	          $(document).ready(function(){
                btn.eq(id-1).addClass("active").siblings("button").removeClass("active");
				$.ajax({
					url:"/ajaxMonthData",
					data:{'id':id},
					dataType:'JSON',
                    type:'post',
					async:false,
					success:function(result){                 
		                 month=parseInt(result);
		                 switch(month){
						    case 1:
						        var d1=everydays[0].one.d1;
								var d2=everydays[0].one.d2;
								var d3=everydays[0].one.d3;
						        break;
						    case 2:
						        var d1=everydays[1].two.d1;
								var d2=everydays[1].two.d2;
								var d3=everydays[1].two.d3;
						        break;
						    case 3:
						        var d1=everydays[2].three.d1;
								var d2=everydays[2].three.d2;
								var d3=everydays[2].three.d3;
						        break;
						    case 4:
						        var d1=everydays[3].four.d1;
								var d2=everydays[3].four.d2;
								var d3=everydays[3].four.d3;
						        break;
						    case 5:		        
								var d1=everydays[4].five.d1;
								var d2=everydays[4].five.d2;
								var d3=everydays[4].five.d3;
						        break;
						    case 6:		       
								var d1=everydays[5].six.d1;
								var d2=everydays[5].six.d2;
								var d3=everydays[5].six.d3;
						        break;
						    case 7:
						        var d1=everydays[6].seven.d1;
								var d2=everydays[6].seven.d2;
								var d3=everydays[6].seven.d3;
						        break;
						    case 8:
						        var d1=everydays[7].eight.d1;
								var d2=everydays[7].eight.d2;
								var d3=everydays[7].eight.d3;
						        break;
						    case 9:
						        var d1=everydays[8].nine.d1;
								var d2=everydays[8].nine.d2;
								var d3=everydays[8].nine.d3;
						        break;
						    case 10:
						        var d1=everydays[9].ten.d1;
								var d2=everydays[9].ten.d2;
								var d3=everydays[9].ten.d3;
						        break;
						    case 11:
						        var d1=everydays[10].eleven.d1;
								var d2=everydays[10].eleven.d2;
								var d3=everydays[10].eleven.d3;
						        break;
						    case 12:
						        var d1=everydays[11].twelve.d1;
								var d2=everydays[11].twelve.d2;
								var d3=everydays[11].twelve.d3;
						        break;
						    default:
						        
						}
		     

						if(month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12 ){
							 diffMonth(style,31,month,d1,d2,d3);
						}else if(month==4 || month==6 || month==9 || month==11){
						     diffMonth(style,30,month,d1,d2,d3);
						}else{
							 if(secondMonth == 28){
						         diffMonth(style,28,month,d1,d2,d3);
						     }else if(secondMonth == 29){
						         diffMonth(style,29,month,d1,d2,d3);
						     }
						}
			                
	                }
		        });
			});	

        }        

        
		function sumArr(data){
			  var sum=0;
			  for(var i=0;i<data.length;i++){
                  sum+=data[i];
			  }
			  return sum;
		} 

		function getDaysOf2(year){
            return (year % 400 == 0 || (year %100 != 0 && year % 4 == 0)) ? 29 : 28;
        }		    
		    
</script>
		
		
</body>
</html>
