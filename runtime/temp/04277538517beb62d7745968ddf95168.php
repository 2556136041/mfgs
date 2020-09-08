<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:45:"./app/apply/view/test/testgetcityweather.html";i:1593682394;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<title>testgetweather</title>
<style type="text/css">
    

</style>	
<script src="__js__/jquery-1.5.2.min.js" ></script>
<script src="__js__/jqueryplugin/jquery.cookie.js" ></script>
<!-- 利用搜狐接口查询ip地址 -->
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>


</head>
<body>


<script type="text/javascript">	
    

$(function(){
     $.getJSON('http://api.map.baidu.com/weather/v1/?district_id=222405&data_type=all&callback=?',{     
        'ak' : 'Ru8ILQsBheGiiEzeZ7U9SHDtooFS5Hf2',
        'output' : 'json'

    },function(data){
         console.log(data); 
     
    });


    //  $.ajax({
    //         url:"http://api.map.baidu.com/telematics/v3/weather",
    //         type:"get",
    //         data:{
    //               location:'深圳',
    //               output:'json',
    //               ak:'Ru8ILQsBheGiiEzeZ7U9SHDtooFS5Hf2'
    //         },
    //         dataType:"jsonp",
    //         success:function(data){
    //             console.log(data)
            
    //         }
    // })


})   


       
</script>
		
		
</body>
</html>
