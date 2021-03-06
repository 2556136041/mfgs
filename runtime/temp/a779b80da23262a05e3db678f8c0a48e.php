<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:36:"./app/apply/view/index/testajax.html";i:1593355374;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>testajax</title>
	<link rel="stylesheet" type="text/css" href="__js__/jasmine/jasmine.css">
	<script src="__js__/jquery-1.5.2.min.js"></script>
	<script src="__js__/jasmine/jasmine.js"></script>
	<script src="__js__/jasmine/jasmine-html.js"></script>
	<script src="__js__/jasmine/boot.js"></script>
</head>
<body>
<h1 id="h1"></h1>
<!-- <button onclick="getData()">send ajax</button> -->
<script>

$(function(){
	$("h1").text("testajax");
})

// window.onload=function(){
// 	get1();
// }

// function getData(){
// 	var baseurl = "https://www.szfyxhm.com/apply";
// 	$(document).ready(function(){
// 		  $.ajax({
// 			  	url:baseurl+"/testajax",
// 			  	async:true,
// 			  	success:function(result){
// 	                console.log(result);

// 	            }
//           });

//     });

// }

    


function get1() {
	//是专门为ajax获取json数据而设置的，并且支持跨域调用，其语法的格式为：是专门为ajax获取json数据而设置的，并且支持跨域调用，其语法的格式为：
	$.getJSON("https://www.szfyxhm.com/apply/testajax").then(function(result) {
		console.log(result);
	});
}

	// 每一个测试用例的超时时间
	jasmine.DEFAULT_TIMEOUT_INTERVAL = 1000;

	// 请求的接口的前缀 // http://localhost:8080/test
	var base = "https://www.szfyxhm.com/apply";

	//测试模块
	describe("ajax跨域请求", function() {

        // 测试方法
			it("getjson请求", function(done) {
				// 服务器返回的结果
				var result;

                //getJSON专门针对传送json格式数据的请求
				$.getJSON(base + "/testgetjson").then(function(jsonObj) { 
					 result = jsonObj;
					//console.log(typeof jsonObj);
					//result = JSON.parse(jsonObj);  //将传过来的字符串转化成json对象

					// 由于是异步请求，需要使用setTimeout来校验
					setTimeout(function() {
						expect(result).toEqual({
							"data" : "testgetjson"
						});

						// 校验完成，通知jasmine框架
						done();
					}, 100);
				});

				
			});

		// 测试方法
		it("testajax请求", function(done) {
			// 服务器返回的结果
			var res;
			var checkdata="getajax";

			$.ajax({
				type : "get",
			  	url:base+"/testajax",
			  	async:true,
			  	success:function(result){			  		
	                //console.log(JSON.parse(result));
	                //console.log(typeof result);
	                res=result;
	                //console.log(res == result);

	                // 由于是异步请求，需要使用setTimeout来校验
					setTimeout(function() {
						
						//console.log(res);
						expect(res).toEqual(checkdata);

						// 校验完成，通知jasmine框架
						done();
					}, 100);

	            }
            });

			
		});
		
		// 测试方法
		it("jsonp请求", function(done) {
			// 服务器返回的结果
			var res;

			$.ajax({
				url: base +"/testjsonp",
				dataType: "jsonp",
				jsonp: "callback",
				cache:true,
				type:"get",
				success: function(json){
					res = json;
					//console.log(res);
					// 由于是异步请求，需要使用setTimeout来校验
					setTimeout(function() {
						expect(res).toEqual("hello jsonp");
						// 校验完成，通知jasmine框架
						done();
					}, 100);

				}
			});

			
		});

		
		it("postJson请求", function(done) {
			// 服务器返回的结果
			var result;

			$.ajax({				
				url: base + "/postJson",
				asyunc:true,
				type:"post",
				// contentType : "application/json;charset=utf-8",
				//data: JSON.stringify({name: "xiaofengqing"}),
				data:{name: "xiaofengqing"},
				success: function(json){
					result = JSON.parse(json);
					//console.log(result);

					// 由于是异步请求，需要使用setTimeout来校验
					setTimeout(function() {
						expect(result).toEqual({
							"data" : "postJson xiaofengqing"
						});

						// 校验完成，通知jasmine框架
						done();
					}, 100);
				}
			});

			
		});
		
		
		// it("getCookie请求", function(done) {
		// 	// 服务器返回的结果
		// 	var result;

		// 	$.ajax({
		// 		type : "get",
		// 		url: base + "/getCookie",
		// 		xhrFields:{
		// 			withCredentials:true
		// 		},
		// 		success: function(json){
		// 			result = JSON.parse(json);
		// 			console.log(typeof result);

		// 			// 由于是异步请求，需要使用setTimeout来校验
		// 			setTimeout(function() {
		// 				expect(result).toEqual({
		// 					"data" : "getCookie wsm"
		// 				});

		// 				// 校验完成，通知jasmine框架
		// 				done();
		// 			}, 100);
		// 				}
		// 			});
			
		// });

		// it("getHeader请求", function(done) {
		// 	// 服务器返回的结果
		// 	var result;

		// 	$.ajax({
		// 		type : "get",
		// 		url: base + "/getHeader",
		// 		headers:{
		// 			"x-header1" : "AAA"
		// 		},
		// 		beforeSend: function(xhr){
		// 			xhr.setRequestHeader("x-header2","BBB")
		// 		},
		// 		success: function(json){
		// 			result = json;
		// 		}
		// 	});

		// 	// 由于是异步请求，需要使用setTimeout来校验
		// 	setTimeout(function() {
		// 		expect(result).toEqual({
		// 			"data" : "getHeader AAA BBB"
		// 		});

		// 		// 校验完成，通知jasmine框架
		// 		done();
		// 	}, 100);
		// });
	
	});


	


</script>
	
</body>
</html>