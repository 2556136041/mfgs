<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"./app/apply/view/index/clock.html";i:1596160176;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>canvas-clock</title>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<style>
     *{margin: 0;padding: 0;}

     div{
     	text-align: center;
     	margin-top: 70px;

     }         

</style>
</head>
<body>

<div id="div0">
   <canvas id="clock">
       当前浏览器不支持Canvas，请更换浏览器后再试
   </canvas>
</div>

<!-- <script type="text/javascript" src="../js/clock.js"></script> -->
<script>
     
    var h=$(document).height();
    $("#div0").css({margin:(h-400)/2+"px auto"});

    var sty={
		width:400,
		height:400,
		bgArcwidth:8,
		hourfont:"30px Arial",
		potsize:3,
		centerpotColor:"white",
		hourmark:"black",
		minutemark:"rgba(150,150,150,0.9)",
		hourPointcolor:"black",
		minutePointcolor:"black"
    }


    clock("clock",sty);


    function clock(clockbox,style){
		    var canvas=document.getElementById(clockbox);
			var ctx=canvas.getContext("2d");
			// var width=ctx.canvas.width;
			// var height=ctx.canvas.height;
			canvas.width=style.width;
			canvas.height=style.height;
			
			var r =  style.width / 2;
			function drawBackground(){
			 	 ctx.save();
			 	 ctx.translate(r,r);
			 	 ctx.beginPath();
			 	 ctx.lineWidth=style.bgArcwidth;//10
			 	 ctx.arc(0,0,r-style.bgArcwidth/2,0,2*Math.PI,false);//-5
			 	 ctx.stroke();

			 	 var hourNumbers = [3,4,5,6,7,8,9,10,11,12,1,2];
			 	 ctx.font = style.hourfont;//18
			 	 ctx.textAlign = "center";
			 	 ctx.textBaseline = "middle";
			 	 hourNumbers.forEach(function(number,i){
			 	 	 var rad = 2 * Math.PI / 12 * i;
			 	 	 var x= Math.cos(rad) * (r - 46);//30
			 	 	 var y= Math.sin(rad) * (r - 46);//30
			 	 	 ctx.fillText(number,x,y);
			 	 });

			 	 for(var i=0;i<60;i++){
			 	 	var rad = 2 * Math.PI / 60 * i;
			 	 	var x=Math.cos(rad) * (r-20);//18
			 	 	var y=Math.sin(rad) * (r-20);//18
			 	 	ctx.beginPath();
			 	 	if(i % 5 === 0){
			 	 		ctx.fillStyle=style.hourmark;
			 	 		ctx.arc(x, y, style.potsize, 0, 2 * Math.PI,false);//2
			 	 	}else{
			 	 		ctx.fillStyle=style.minutemark;
			 	 		ctx.arc(x, y, style.potsize, 0, 2 * Math.PI,false);//2
			 	 	}
			 	 	 ctx.fill();
			 	 }

			 }

			 function drawHour(hour,minute){
			 	ctx.save();
			 	ctx.beginPath();
			 	var rad=2*Math.PI/12*hour;
			 	var mrad=2*Math.PI/12/60*minute;
			 	ctx.rotate(rad+mrad);
			 	ctx.lineWidth=15;//6
			 	ctx.lineCap="round";
			 	ctx.moveTo(0,10);
			 	ctx.lineTo(0,-r/3);//-r/2
			 	ctx.strokeStyle=style.hourPointcolor;
			 	ctx.stroke();
			 	ctx.restore();
			 }

			 function drawMinute(minute){
			 	ctx.save();
			 	ctx.beginPath();
			 	var rad=2*Math.PI/60*minute;
			 	ctx.rotate(rad);
			 	ctx.lineWidth=10;//3
			 	ctx.lineCap="round";
			 	ctx.moveTo(0,10);
			 	ctx.lineTo(0,-r+r/3);//+30
			 	ctx.strokeStyle=style.minutePointcolor;
			 	ctx.stroke();
			 	ctx.restore();

			 }

			  function drawSecond(second){
			 	ctx.save();
			 	ctx.beginPath(); 
			 	ctx.fillStyle="red";	
			 	var rad=2*Math.PI/60*second;
			 	ctx.rotate(rad);
			 	ctx.moveTo(-2,20);
			 	ctx.lineTo(2,20);
			 	ctx.lineTo(1,-r+(style.bgArcwidth*2+10));//+18
			 	ctx.lineTo(-1,-r+(style.bgArcwidth*2+10));//+18
			 	ctx.fill();
			 	ctx.restore();

			 }

			 function drawDot(){
			 	ctx.beginPath();
			 	ctx.fillStyle=style.centerpotColor;
			 	ctx.arc(0,0,3,0,2*Math.PI,false);
			 	ctx.fill();
			 }

			// drawBackground();
			// drawDot();

			function draw(){
				ctx.clearRect(0,0,style.width,style.height);
				var now=new Date();
				var hour=now.getHours();
				var minute=now.getMinutes();
				var second=now.getSeconds();
				drawBackground();
				drawHour(hour,minute);
			    drawMinute(minute);
			    drawSecond(second);
			    drawDot();
			    ctx.restore();

			}
			draw();
			setInterval(draw,1000);

    }
    
      
</script>

</body>
</html>