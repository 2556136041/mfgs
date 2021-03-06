<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"./app/apply/view/index/publicnewsdatalogin.html";i:1594479779;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>登陆</title>
<style>

    div#app{
        width:50%;
		height:200px;
		position: absolute;
	 	top:0px;
	 	left:0px;
	 	right:0px;
	 	bottom: 0px;
	 	margin:auto;
    }

    p#warn{
    	width: 100%;
    	height: 25px;
    	font-size:14px;
    	text-align: left;
    	line-height: 25px;
    	color:red;
    	padding-left: 10px;
    }

    form{
		width:100%;
		height:155px;
	 	text-align: center;     	  
    }

    .form-group{
     	text-align: left;
     	font-size: 14px;
    }

</style>
<!-- bootstrap4 -->
<!-- <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>    -->

<link rel="stylesheet" href="__js__/publicdatajs/bootstrap.min.css">
<script src="__js__/publicdatajs/jquery.min.js"></script>
<script src="__js__/publicdatajs/bootstrap.min.js"></script>

</head>
<body>

<div id="app">
	<p id="warn"></p>
	<form id="form1" action="javascript:void(0)">
	  <div class="form-group">
	       <input v-model="pwd" type="password" class="form-control" id="pwd" placeholder="口令">
	      
	  </div>
	  <div class="form-group"> 
	      <span v-show="isshow">你输入的口令是：{{ pwd }}</span>
	  </div>
	  <button onclick="getData()" class="btn btn-primary">提交</button>
	</form>
</div>

 <script src="/public/static/js/jquery/jquery3.0.js"></script>
<script>
    $(document).ready(function(){
		  $("input").focus(function(){
		      $("input").attr("placeholder"," ");
		  });
		  // $("input").blur(function(){
		  //     $("input").attr("placeholder","口令");
		  // });
	});         

    function getData(){   
	   	    var pwd = $("#pwd").val();
	   	    var data = {"pwd":pwd};
	   	    if(pwd==""){
               $("#warn").text("不能为空！");
               $("#pwd").focus().val('').attr("placeholder","");
               //vue.isshow=false;
	   	    }else{
	   	    	$.ajax({
					url:"./apply/checkuser",
					data:data,
					dataType:'JSON',
                    type:'post',
					async:false,
					success:function(result){
						if(result==0){
			                $("#warn").text("口令错误！");			                
			                $("#pwd").focus().val('').attr("placeholder","");
			                //vue.isshow=false;

			            }else{
			                $("#form1").attr("action",'/apply/publicnewsdata');
			            }
					}
	            });
	   	    }		   	    
	}

</script>

<!-- vue.js -->
<script src="__js__/vue/vue2.6.min.js"></script>
<script>
	var vue=new Vue({
		  el: '#app',
		  data: {
		     pwd: '',
		     isshow:false
		  },
	      watch: {
		        pwd:function() {
		            if(this.pwd != ''){
		            	this.isshow = true
		            }else{
		            	this.isshow = false
		            }		            
		        }
	      },
	      methods: {
			    
		  }
	})
</script>
	
</body>
</html>