<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:27:"./template/week/060814.html";i:1592323441;}*/ ?>
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
				height: 650px;
			}
			.zxw{
				width: auto;
				height: auto;
				overflow: hidden;				
				position: absolute;
				top: 5px;
				left: 60%;
				transform: translateX(-50%);
			}
			 #div_month{
		    	width:auto;
		    	height:40px;
		    	/*background: gray;*/
		    	position: fixed;
		    	bottom:0px;
		    	left:20px;
		    }
			.zxw button,#div_month button{
			   width: 100px;
               height:30px;
			   line-height: 30px;
			   font-size: 18px;
			   border-radius: 8px;
			   outline: none;
			   border:none;
			   cursor: pointer;
		    }
		    .zxw button:hover,#div_month button:hover{
		    	background:rgba(6,65,181,1);
		    	color:white;
		    }		   

		</style>
		<script src="__js__/echarts.min.js" ></script>
		<script src="__js__/jquery-1.5.2.min.js" ></script>
	</head>
	<body>
		<!--官网地址：https://www.echartsjs.com/zh/index.html-->
		<!--ECharts，一个使用 JavaScript 实现的开源可视化图表库，可以流畅的运行在 PC 和移动设备上，兼容当前绝大部分浏览器（IE8/9/10/11，Chrome，Firefox，Safari等）-->
		<!--ECharts 提供了常规的折线图、柱状图、饼状图、雷达图、K线图、散点图....-->
		
		<div class="container">
			<!--给图表准备一个容器-->
			<div id="box" ></div>
			
			<div class="zxw">
				<button id="line">折线图</button>
				<button id="bar">柱状图</button>
			</div>
		</div>		
		<div id="div_month">
			<button class="btn" id="1" onclick="send(this.id)">1月数据</button>
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
		<script type="text/javascript">	
		//获取当年的年份和月份
		var date=new Date;
        var y = date.getFullYear() 
        var secondMonth=getDaysOf2(y);
        var month = date.getMonth() + 1;
        // m = m < 10 ? '0' + m : m;        
   
        function send(id){		
	          $(document).ready(function(){
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
							        var d=[94];
							        break;
							    case 2:
							        var d=[94,82];
							        break;
							    case 3:
							        var d=[94,82,95];
							        break;
							    case 4:
							        var d=[94,82,95,45];
							        break;
							    case 5:
							        var d=[94,82,95,45,55];
							        break;
							    case 6:
							        var d=[94,82,95,45,55,48,74,57,79,99,
							                  107,76,74,106,82];
							        break;
							    case 7:
							        var d=[94,82,95,45,55,48,74];
							        break;
							    case 8:
							        var d=[94,82,95,45,55,48,74,57];
							        break;
							    case 9:
							        var d=[94,82,95,45,55,48,74,57,79];
							        break;
							    case 10:
							        var d=[94,82,95,45,55,48,74,57,79,99];
							        break;
							    case 11:
							        var d=[94,82,95,45,55,48,74,57,79,99,
							                  107];
							        break;
							    case 12:
							        var d=[94,82,95,45,55,48,74,57,79,99,
							                  107,76];
							        break;
							    default:
							        var d=null;
							}	

							if(month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12 ){
								 bigMonth(month,d);
							}else if(month==4 || month==6 || month==9 || month==11){
							     smallMonth(month,d);
							}else{
								 if(secondMonth == 28){
							         secondMonthOf28(month,d);
							     }else if(secondMonth == 29){
							         secondMonthOf29(month,d);
							     }
							}
			                
	                }
		        });
			});	

        }	

        // alert(month);
        switch(month){
		    case 1:
		        var d=[94];
		        break;
		    case 2:
		        var d=[94,82];
		        break;
		    case 3:
		        var d=[94,82,95];
		        break;
		    case 4:
		        var d=[94,82,95,45];
		        break;
		    case 5:
		        var d=[94,82,95,45,55];
		        break;
		    case 6:
		        var d=[94,82,95,45,55,48,74,57,79,99,
		                  107,76,74,106,82];
		        break;
		    case 7:
		        var d=[94,82,95,45,55,48,74];
		        break;
		    case 8:
		        var d=[94,82,95,45,55,48,74,57];
		        break;
		    case 9:
		        var d=[94,82,95,45,55,48,74,57,79];
		        break;
		    case 10:
		        var d=[94,82,95,45,55,48,74,57,79,99];
		        break;
		    case 11:
		        var d=[94,82,95,45,55,48,74,57,79,99,
		                  107];
		        break;
		    case 12:
		        var d=[94,82,95,45,55,48,74,57,79,99,
		                  107,76];
		        break;
		    default:
		        var d=null;
		}	

		if(month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12 ){
			 bigMonth(month,d);
		}else if(month==4 || month==6 || month==9 || month==11){
		     smallMonth(month,d);
		}else{
			 if(secondMonth == 28){
		         secondMonthOf28(month,d);
		     }else if(secondMonth == 29){
		         secondMonthOf29(month,d);
		     }
		}	     
		
        
        //小月 4、6、9、11
		function smallMonth(month,data){
		    var Month=month; //月份
		    var titName="读特·区域频道月度("+Month+"月)发稿曲线图"; //标题名称
		    var titColor="rgba(6,65,181,1)"; //标题颜色
		    var titFontsize=20; //标题字体大小
		    var XdataColor="black"; //横坐标字体颜色
		    var XdataFontsize=16; //横坐标字体大小
		    var titpos={  //标题对象
		    	left:400,
		    	top:5
		    }
            //全部数据
		    var alldata=data;		    

		    //顶部是否显示数据
		    var isTopShow=true;

		    //顶部字体样式
		    var topColor="red";
		    var topFontsize=16;

		    //平均值样式
		    var averageColor="rgba(6,65,181,1)";
			var averageWidth=5;

			// 圆柱折线颜色
			var baseColor=["rgba(209,48,43,1)"];

			//x y轴颜色大小
			var lineColor="black";
			var lineWidth=3;

			//x y轴文字颜色大小 
			var lineTextColor="black";
			var lineTextFontsize=16;
		    
			//给容器初始化图表实例
			var myChart=echarts.init(document.getElementById("box"));
			
			//指定图表配置项和数据
			var option={
				title:{
                    text:titName,
                    left:titpos.left,
                    top:titpos.top,
                    textStyle:{
                    	color:titColor,
                    	fontSize:titFontsize
                    },
                    // subtext:"汽车销售",
                    // sublink:"http://www.szfyxhm.com/",
                    // subtextStyle:{
                    // 	color:"blue",
                    // 	fontSize:14
                    // }
				},
				legend:{},//显示图例说明,把数据对应的name值显示出来
				//color:['#ff0000','#00ff00','#0000ff'],//调色盘颜色列表
				
				tooltip:{},
				xAxis:{
					name:"日期",
					nameTextStyle:{
                        color:lineTextColor,
                        fontSize:lineTextFontsize
					},  
					axisLine:{
                        lineStyle:{
                        	color:lineColor,
                        	width:lineWidth
                        }
					},
					// data:["6月8日(周一)","6月9日(周二)","6月10日(周三)","6月11日(周四)","6月12日(周五)","6月13日(周六)","6月14日(周日)"]
					data:[{
					   	 value:Month+".1",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".2",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".3",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".4",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".5",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".6",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".7",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".8",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

					},
				   {
	                     value:Month+".9",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".10",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".11",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".12",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".13",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".14",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".15",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".16",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	  }
				   	},
				    {
					   	 value:Month+".17",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	  }
				   	},
				   	{
					   	 value:Month+".18",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},				
				   	{
					   	 value:Month+".19",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},

				   	{
					   	 value:Month+".20",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".21",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".22",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".23",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".24",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".25",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".26",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".27",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".28",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".29",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".30",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	}]
				},
				yAxis:{  //Y轴   
				    name:"单位：篇",
					nameTextStyle:{
						color:lineTextColor,
						fontSize:lineTextFontsize
					},
					axisLine:{
						lineStyle:{
                        	color:lineColor,
                        	width:lineWidth
                        }

					}   

				},
				series:[{
					//type:'line',//折线图
					type:'bar', // 柱状图
					data:alldata,   //数据
					itemStyle: {   //顶部是否显示数据
	                   normal: {
	                       label: {
	                           show: isTopShow,		//开启显示
	                           position: 'top',	//在上方显示
	                           textStyle: {	    //数值样式
	                               color: topColor,
	                               fontSize: topFontsize
	                           }
	                       }
	                   }
	               },
					markLine:{ //平均值
						data:[{type:"median",name:'平均数'}],
						lineStyle:{
							color: averageColor,
							width: averageWidth
						}
						
					}
				}],
				color:baseColor
			};
			
			//把配置项和数据显示出来
			myChart.setOption(option);
			
			
			//切换到柱状图
			document.getElementById("bar").onclick=function(){
				option.series[0].type='bar';
				myChart.setOption(option);
			}
			
			//切换到折线图
			document.getElementById("line").onclick=function(){
				option.series[0].type='line';
				myChart.setOption(option);
			}

		}
        
        //大月 1、3、5、7、8、10、12
		function bigMonth(month,data){
		    var Month=month; //月份
		    var titName="读特·区域频道月度("+Month+"月)发稿曲线图"; //标题名称
		    var titColor="rgba(6,65,181,1)"; //标题颜色
		    var titFontsize=20; //标题字体大小
		    var XdataColor="black"; //横坐标字体颜色
		    var XdataFontsize=16; //横坐标字体大小
		    var titpos={  //标题对象
		    	left:400,
		    	top:5
		    }
            //全部数据
		    var alldata=data;		    

		    //顶部是否显示数据
		    var isTopShow=true;

		    //顶部字体样式
		    var topColor="red";
		    var topFontsize=16;

		    //平均值样式
		    var averageColor="rgba(6,65,181,1)";
			var averageWidth=5;

			// 圆柱折线颜色
			var baseColor=["rgba(209,48,43,1)"];

			//x y轴颜色大小
			var lineColor="black";
			var lineWidth=3;

			//x y轴文字颜色大小 
			var lineTextColor="black";
			var lineTextFontsize=16;
		    
			//给容器初始化图表实例
			var myChart=echarts.init(document.getElementById("box"));
			
			//指定图表配置项和数据
			var option={
				title:{
                    text:titName,
                    left:titpos.left,
                    top:titpos.top,
                    textStyle:{
                    	color:titColor,
                    	fontSize:titFontsize
                    },
                    // subtext:"汽车销售",
                    // sublink:"http://www.szfyxhm.com/",
                    // subtextStyle:{
                    // 	color:"blue",
                    // 	fontSize:14
                    // }
				},
				legend:{},//显示图例说明,把数据对应的name值显示出来
				//color:['#ff0000','#00ff00','#0000ff'],//调色盘颜色列表
				
				tooltip:{},
				xAxis:{
					name:"日期",
					nameTextStyle:{
                        color:lineTextColor,
                        fontSize:lineTextFontsize
					},  
					axisLine:{
                        lineStyle:{
                        	color:lineColor,
                        	width:lineWidth
                        }
					},
					// data:["6月8日(周一)","6月9日(周二)","6月10日(周三)","6月11日(周四)","6月12日(周五)","6月13日(周六)","6月14日(周日)"]
					data:[{
					   	 value:Month+".1",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".2",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".3",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".4",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".5",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".6",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".7",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".8",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

					},
				   {
	                     value:Month+".9",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".10",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".11",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".12",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".13",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".14",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".15",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".16",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	  }
				   	},
				    {
					   	 value:Month+".17",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	  }
				   	},
				   	{
					   	 value:Month+".18",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},				
				   	{
					   	 value:Month+".19",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},

				   	{
					   	 value:Month+".20",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".21",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".22",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".23",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".24",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".25",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".26",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".27",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".28",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".29",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".30",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".31",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	}]
				},
				yAxis:{  //Y轴   
				    name:"单位：篇",
					nameTextStyle:{
						color:lineTextColor,
						fontSize:lineTextFontsize
					},
					axisLine:{
						lineStyle:{
                        	color:lineColor,
                        	width:lineWidth
                        }

					}   

				},
				series:[{
					//type:'line',//折线图
					type:'bar', // 柱状图
					data:alldata,   //数据
					itemStyle: {   //顶部是否显示数据
	                   normal: {
	                       label: {
	                           show: isTopShow,		//开启显示
	                           position: 'top',	//在上方显示
	                           textStyle: {	    //数值样式
	                               color: topColor,
	                               fontSize: topFontsize
	                           }
	                       }
	                   }
	               },
					markLine:{ //平均值
						data:[{type:"median",name:'平均数'}],
						lineStyle:{
							color: averageColor,
							width: averageWidth
						}
						
					}
				}],
				color:baseColor
			};
			
			//把配置项和数据显示出来
			myChart.setOption(option);
			
			
			//切换到柱状图
			document.getElementById("bar").onclick=function(){
				option.series[0].type='bar';
				myChart.setOption(option);
			}
			
			//切换到折线图
			document.getElementById("line").onclick=function(){
				option.series[0].type='line';
				myChart.setOption(option);
			}			

		}

		//2月 28天
		function secondMonthOf28(month,data){
		    var Month=month; //月份
		    var titName="读特·区域频道月度("+Month+"月)发稿曲线图"; //标题名称
		    var titColor="rgba(6,65,181,1)"; //标题颜色
		    var titFontsize=20; //标题字体大小
		    var XdataColor="black"; //横坐标字体颜色
		    var XdataFontsize=16; //横坐标字体大小
		    var titpos={  //标题对象
		    	left:400,
		    	top:5
		    }
            //全部数据
		    var alldata=data;		    

		    //顶部是否显示数据
		    var isTopShow=true;

		    //顶部字体样式
		    var topColor="red";
		    var topFontsize=16;

		    //平均值样式
		    var averageColor="rgba(6,65,181,1)";
			var averageWidth=5;

			// 圆柱折线颜色
			var baseColor=["rgba(209,48,43,1)"];

			//x y轴颜色大小
			var lineColor="black";
			var lineWidth=3;

			//x y轴文字颜色大小 
			var lineTextColor="black";
			var lineTextFontsize=16;
		    
			//给容器初始化图表实例
			var myChart=echarts.init(document.getElementById("box"));
			
			//指定图表配置项和数据
			var option={
				title:{
                    text:titName,
                    left:titpos.left,
                    top:titpos.top,
                    textStyle:{
                    	color:titColor,
                    	fontSize:titFontsize
                    },
                    // subtext:"汽车销售",
                    // sublink:"http://www.szfyxhm.com/",
                    // subtextStyle:{
                    // 	color:"blue",
                    // 	fontSize:14
                    // }
				},
				legend:{},//显示图例说明,把数据对应的name值显示出来
				//color:['#ff0000','#00ff00','#0000ff'],//调色盘颜色列表
				
				tooltip:{},
				xAxis:{
					name:"日期",
					nameTextStyle:{
                        color:lineTextColor,
                        fontSize:lineTextFontsize
					},  
					axisLine:{
                        lineStyle:{
                        	color:lineColor,
                        	width:lineWidth
                        }
					},
					// data:["6月8日(周一)","6月9日(周二)","6月10日(周三)","6月11日(周四)","6月12日(周五)","6月13日(周六)","6月14日(周日)"]
					data:[{
					   	 value:Month+".1",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".2",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".3",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".4",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".5",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".6",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".7",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".8",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

					},
				   {
	                     value:Month+".9",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".10",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".11",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".12",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".13",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".14",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".15",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".16",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	  }
				   	},
				    {
					   	 value:Month+".17",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	  }
				   	},
				   	{
					   	 value:Month+".18",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},				
				   	{
					   	 value:Month+".19",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},

				   	{
					   	 value:Month+".20",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".21",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".22",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".23",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".24",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".25",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".26",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".27",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".28",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	}]
				},
				yAxis:{  //Y轴   
				    name:"单位：篇",
					nameTextStyle:{
						color:lineTextColor,
						fontSize:lineTextFontsize
					},
					axisLine:{
						lineStyle:{
                        	color:lineColor,
                        	width:lineWidth
                        }

					}   

				},
				series:[{
					//type:'line',//折线图
					type:'bar', // 柱状图
					data:alldata,   //数据
					itemStyle: {   //顶部是否显示数据
	                   normal: {
	                       label: {
	                           show: isTopShow,		//开启显示
	                           position: 'top',	//在上方显示
	                           textStyle: {	    //数值样式
	                               color: topColor,
	                               fontSize: topFontsize
	                           }
	                       }
	                   }
	               },
					markLine:{ //平均值
						data:[{type:"median",name:'平均数'}],
						lineStyle:{
							color: averageColor,
							width: averageWidth
						}
						
					}
				}],
				color:baseColor
			};
			
			//把配置项和数据显示出来
			myChart.setOption(option);
			
			
			//切换到柱状图
			document.getElementById("bar").onclick=function(){
				option.series[0].type='bar';
				myChart.setOption(option);
			}
			
			//切换到折线图
			document.getElementById("line").onclick=function(){
				option.series[0].type='line';
				myChart.setOption(option);
			}			

		}

		function secondMonthOf29(month,data){
		    var Month=month; //月份
		    var titName="读特·区域频道月度("+Month+"月)发稿曲线图"; //标题名称
		    var titColor="rgba(6,65,181,1)"; //标题颜色
		    var titFontsize=20; //标题字体大小
		    var XdataColor="black"; //横坐标字体颜色
		    var XdataFontsize=16; //横坐标字体大小
		    var titpos={  //标题对象
		    	left:400,
		    	top:5
		    }
            //全部数据
		    var alldata=data;		    

		    //顶部是否显示数据
		    var isTopShow=true;

		    //顶部字体样式
		    var topColor="red";
		    var topFontsize=16;

		    //平均值样式
		    var averageColor="rgba(6,65,181,1)";
			var averageWidth=5;

			// 圆柱折线颜色
			var baseColor=["rgba(209,48,43,1)"];

			//x y轴颜色大小
			var lineColor="black";
			var lineWidth=3;

			//x y轴文字颜色大小 
			var lineTextColor="black";
			var lineTextFontsize=16;
		    
			//给容器初始化图表实例
			var myChart=echarts.init(document.getElementById("box"));
			
			//指定图表配置项和数据
			var option={
				title:{
                    text:titName,
                    left:titpos.left,
                    top:titpos.top,
                    textStyle:{
                    	color:titColor,
                    	fontSize:titFontsize
                    },
                    // subtext:"汽车销售",
                    // sublink:"http://www.szfyxhm.com/",
                    // subtextStyle:{
                    // 	color:"blue",
                    // 	fontSize:14
                    // }
				},
				legend:{},//显示图例说明,把数据对应的name值显示出来
				//color:['#ff0000','#00ff00','#0000ff'],//调色盘颜色列表
				
				tooltip:{},
				xAxis:{
					name:"日期",
					nameTextStyle:{
                        color:lineTextColor,
                        fontSize:lineTextFontsize
					},  
					axisLine:{
                        lineStyle:{
                        	color:lineColor,
                        	width:lineWidth
                        }
					},
					// data:["6月8日(周一)","6月9日(周二)","6月10日(周三)","6月11日(周四)","6月12日(周五)","6月13日(周六)","6月14日(周日)"]
					data:[{
					   	 value:Month+".1",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".2",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".3",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".4",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".5",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".6",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".7",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".8",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

					},
				   {
	                     value:Month+".9",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".10",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
	                     value:Month+".11",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".12",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".13",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }

				   },
				   {
					   	 value:Month+".14",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".15",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   },
				   {
					   	 value:Month+".16",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	  }
				   	},
				    {
					   	 value:Month+".17",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	  }
				   	},
				   	{
					   	 value:Month+".18",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},				
				   	{
					   	 value:Month+".19",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},

				   	{
					   	 value:Month+".20",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".21",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".22",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".23",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".24",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".25",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".26",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".27",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".28",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	},
				   	{
					   	 value:Month+".29",
					   	 textStyle:{
					   	 	color:XdataColor,
					   	 	fontSize:XdataFontsize
					   	 }
				   	}]
				},
				yAxis:{  //Y轴   
				    name:"单位：篇",
					nameTextStyle:{
						color:lineTextColor,
						fontSize:lineTextFontsize
					},
					axisLine:{
						lineStyle:{
                        	color:lineColor,
                        	width:lineWidth
                        }

					}   

				},
				series:[{
					//type:'line',//折线图
					type:'bar', // 柱状图
					data:alldata,   //数据
					itemStyle: {   //顶部是否显示数据
	                   normal: {
	                       label: {
	                           show: isTopShow,		//开启显示
	                           position: 'top',	//在上方显示
	                           textStyle: {	    //数值样式
	                               color: topColor,
	                               fontSize: topFontsize
	                           }
	                       }
	                   }
	               },
					markLine:{ //平均值
						data:[{type:"median",name:'平均数'}],
						lineStyle:{
							color: averageColor,
							width: averageWidth
						}
						
					}
				}],
				color:baseColor
			};
			
			//把配置项和数据显示出来
			myChart.setOption(option);
			
			
			//切换到柱状图
			document.getElementById("bar").onclick=function(){
				option.series[0].type='bar';
				myChart.setOption(option);
			}
			
			//切换到折线图
			document.getElementById("line").onclick=function(){
				option.series[0].type='line';
				myChart.setOption(option);
			}			

		}

		function getDaysOf2(year){
            return (year % 400 == 0 || (year %100 != 0 && year % 4 == 0)) ? 29 : 28;
        }
		    
		    
		</script>
		
		
	</body>
</html>
