<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:36:"./app/apply/view/test/testaxios.html";i:1598709555;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Vue 测试实例 - 菜鸟教程(runoob.com)</title>
<script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
<script src="/public/static/js/publicdatajs/axios.min.js"></script>
</head>
<body>
<!-- <div id="box">
	<input type="button" @click="get()" value="点我异步获取数据(Get)">
</div> -->
<div id="box">

    <ul v-for="site in sites">
        <li v-text="site"></li>    
    </ul>

</div>
<script type = "text/javascript">

    var vm = new Vue({
        el:'#box',
        data:{
            msg:'Hello World!',
            sites: []
        },

        /**   axios network-time:170ms   **/
        created: function () {
                var self = this;
                // 用jquery的$.parseJSON()方法转化成json对象 JSON.parse()方法不能用
                axios.post('/apply/readData',{},{emulateJSON:true}).then(function(res){
                     console.log($.parseJSON(res.data).everydaynumbers);  
                     let d=$.parseJSON(res.data).everydaynumbers;
                     self.sites = d[6].seven.d1;   
                },function(res){
                     console.log(res.status);
                });
        }

        /**   vue-resource network-time:151ms   **/
        // created: function () {
        //         var self = this;
        //         // 先用JSON.parse()将结果转化成JSON格式，然后用jquery的$.parseJSON()方法转化成json对象
        //         this.$http.get('/apply/readData').then(function(res){
        //             let d=$.parseJSON(JSON.parse(res.body)).everydaynumbers;
        //             self.sites = d[6].seven.d1;   
        //         },function(){
        //             console.log('请求失败处理');
        //         });                
                
        // }
        /**   普通的ajax  network-time:191ms   **/
    //     created: function () {
    // 　　　　　　//为了在内部函数能使用外部函数的this对象，要给它赋值了一个名叫self的变量。
    //             var self = this;
    //             $.ajax({
    //                 url: '/apply/readData',
    //                 type: 'get',
    //                 data: {},
    //                 dataType: 'json'
    //             }).then(function (res) {
    //                   // console.log(JSON.parse(res).everydaynumbers);
    //                   let d=JSON.parse(res).everydaynumbers;
    //                   console.log(d[6].seven.d1)
    // 　　　　　　　　　　//把从json获取的数据赋值给数组
    //                   self.sites = d[6].seven.d1;
    //             }).fail(function () {
    //                 console.log('失败');
    //             })
    //     }
    });

</script>
</body>
</html>