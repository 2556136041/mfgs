<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./app/apply/view/test/testfromipgetaddr.html";i:1593678327;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<title>testmap</title>
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
    var localtion={};
    var showLocation=function () {
        var local = JSON.stringify(localtion),
        nowDate = new Date();
        nowDate.setTime(nowDate.getTime() + (5 * 60 * 1000)); //5分钟过期
        $.cookie("location", local, {
            path: '/', //cookie的作用域
            expires: nowDate
        });
    },
    locationByIp=function () {
        localtion.ip = returnCitySN.cip;
        $.getJSON("http://api.map.baidu.com/location/ip?callback=?", {
            'ak' : 'Ru8ILQsBheGiiEzeZ7U9SHDtooFS5Hf2',
            'coor' : 'bd09ll',
            'ip' : localtion.ip
        }, function(data) {
            localtion.province = data.content.address_detail.province;
            localtion.city = data.content.address_detail.city;
            localtion.district = data.content.address_detail.district;
            console.log(data);
            showLocation();
        });
    },
    locationSuccess=function (position) {
        var gpsH = [position.coords.longitude,position.coords.latitude];
        var gaoGps=new AMap.convertFrom(gpsH,"gps",function(status,result){
                if(status=="complete"){
                    localtion.lng=result.locations[0].lng;
                    localtion.lat=result.locations[0].lat;
                }
            })
            localtion.ip = returnCitySN.cip;
            $.getJSON("http://api.map.baidu.com/geocoder/v2/?callback=?", {
                'ak' : 'Ru8ILQsBheGiiEzeZ7U9SHDtooFS5Hf2',
                'coordtype' : 'bd09ll',
                'location' : position.coords.latitude + "," + position.coords.longitude,
                'output' : 'json',
                'pois' : 0
            }, function(data) {
                localtion.province = data.result.addressComponent.province;
                localtion.city = data.result.addressComponent.city;
                localtion.country = data.result.addressComponent.district;
                showLocation();
            });
    },
    locationError=function (error) {
        locationByIp();
    },
    getLocation=function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(locationSuccess,
                    locationError, {
                        enableHighAcuracy : true,// 指示浏览器获取高精度的位置，默认为false  
                        timeout : 5000,// 指定获取地理位置的超时时间，默认不限时，单位为毫秒  
                        maximumAge : 3000
                    // 最长有效期，在重复获取地理位置时，此参数指定多久再次获取位置。  
                    });
        } else {
            locationByIp();
        }
    };
    window.onload = function(){
        var loc=$.cookie("location"),
            cc=$.cookie("cityCode"),
            cn=$.cookie("cityName");
        if(loc==null){
            getLocation();
        }else{
            loc=eval("("+loc+")");
            if(!("ip" in loc)&&!("lng" in loc)){
                getLocation();
            }
        }
        if(cc==null){
            $.cookie("cityCode",returnCitySN.cid,{
                path:"/"
            });
        }
        if(cn==null){
            $.cookie("cityName",returnCitySN.cname,{
                path:"/"
            });
        }

        $(document.body).html("<h1>你所在城市"+$.cookie("cityName")+"</h1>");
    }
})

       
</script>
		
		
</body>
</html>
