<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:35:"./app/apply/view/index/testmap.html";i:1593669717;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<title>testmap</title>
<style type="text/css">
    *{padding: 0px;margin: 0px;}

	.container{
		width: 100%;
		height: 100%;
		overflow: hidden;
		border: 5px solid rgba(256,256,256,1);
		margin: 18px auto 0px;
		position: relative;				
	}			
	#box{
		display:none;
		width: 100%;
		height: 600px;
	}

    #div_search{
    	margin-top:100px;
    }
	#div_search p{

       text-align: center;
       margin-bottom:20px;
	}


	#div_search p input,#div_search p button{
	   width: 200px;
	   height: 40px;
       
	}


    

</style>	

<script src="__js__/echarts.min.js" ></script>
<script src="__js__/jquery-1.5.2.min.js" ></script>

<!-- 利用搜狐接口查询ip地址 -->
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>


</head>
<body>

<div id="div_search">
     <p><input id="place-input" type="text"></p>
     <p><button id="btn">查询</button></p>
</div>
<div class="container"> 
   
	<div id="box"></div>
	
	
</div>		

<script type="text/javascript">	
    //console.log(returnCitySN["cip"]+','+returnCitySN["cname"])
    console.log(returnCitySN);
    var token='Ru8ILQsBheGiiEzeZ7U9SHDtooFS5Hf2';
	var base='http://api.map.baidu.com/geocoding/v3/?output=json&ak=' + token + '&address=';

	// http://api.map.baidu.com/geocoding/v3/?address=北京市海淀区上地十街10号&output=json&ak=您的ak&callback=showLocation

	var ePlaceInput = $('#place-input');
	var eSearchBtn=$('#btn');
	eSearchBtn.click(function(){
	    var place = ePlaceInput.val();
	    if(place){
	          $.getJSON(base+place+'&callback=?',function(res){
	               if(res.status===0){
	                      //drawMap(place,res.result.location);
                          console.log(res.result.location);
	                }else{
	                      alert("百度没有找到地址信息");
	                
	                }

	         })
	  //        $.ajax({
			// 	url: base + place,
			// 	dataType: "jsonp",
			// 	jsonp: "callback",
			// 	cache:true,
			// 	type:"get",
			// 	success: function(json){
			// 		res = json;
			// 		console.log(res);	

			// 	}
			// });
	    }

	})


    //给容器初始化图表实例
	var myChart=echarts.init(document.getElementById("box"));
	
	//指定图表配置项和数据
	var option={
		title:{
            text:"中国地图",
            left:15,
            top:10,
            link:"http://www.baidu.com/",
            target:"_blank",
            textStyle:{
            	color:"red",
            	fontSize:18
            },
            // subtext:"汽车销售",
            // sublink:"http://www.szfyxhm.com/",
            // subtextStyle:{
            // 	color:"blue",
            // 	fontSize:14
            // }
		},
		xAxis:{
			name:"日期",
			nameTextStyle:{
                color:"red",
                fontSize:20
			},
			axisLine:{
                lineStyle:{
                	color:"blue",
                	width:5
                }
			},
			// data:["周一","周二","周三","周四","周五","周六","周日"]
			data:[
			   {
			   	 value:"周一",
			   	 textStyle:{
			   	 	color:"black",
			   	 	fontSize:20
			   	 }

			   },
			   {
                 value:"周二",
			   	 textStyle:{
			   	 	color:"yellow",
			   	 	fontSize:20
			   	 }
			   },
			   {
                 value:"周三",
			   	 textStyle:{
			   	 	color:"blue",
			   	 	fontSize:20
			   	 }
			   },
			   {
                 value:"周四",
			   	 textStyle:{
			   	 	color:"green",
			   	 	fontSize:20
			   	 }
			   },
			   {
			   	 value:"周五",
			   	 textStyle:{
			   	 	color:"red",
			   	 	fontSize:20
			   	 }

			   },
			   {
			   	 value:"周六",
			   	 textStyle:{
			   	 	color:"gray",
			   	 	fontSize:20
			   	 }

			   },
			   {
			   	 value:"周日",
			   	 textStyle:{
			   	 	color:"rgb(10,10,10)",
			   	 	fontSize:20
			   	 }

			   }
			]
		},
		yAxis:{
			name:"单位：辆",
			nameTextStyle:{
				color:"red"
			},
			axisLine:{
				lineStyle:{
                	color:"red",
                	width:5
                }

			}
		},
		legend:{
            // right:15,
            // top:10,
            link:"http://www.baidu.com/",
            target:"_blank",
            textStyle:{
            	color:"blue",
            	fontSize:16
            }

		},
		tooltip:{},
		series:[
		{
			name:'宝马',
			type:'bar',//表示图表类型为柱状图					
			data:[10,15,12,14,18,20,25],   //数据
			markLine:{  //图表标线
				data:[{
					type:'average',
					name:'平均数'
				}]
			}
		},
		{
			name:'奔驰',
			type:'bar',//表示图表类型为柱状图					
			data:[8,11,17,15,12,6,19]   //数据
		},
		{
			name:'大众',
			type:'bar',//表示图表类型为柱状图					
			data:[2,22,12,25,13,16,17]   //数据
		}],
		
		color:["green","blue","yellow"]
		
	};
	
	//把配置项和数据显示出来
	myChart.setOption(option);

       
</script>
		
		
</body>
</html>
