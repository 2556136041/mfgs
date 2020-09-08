<?php 

use  think\Route;

// Route::get( '/' ,function(){
//             return  'Hello,world!';
// });
// 

// Route::rule('php','/phpMyAdmin');

return[
    'news/:id'  => 'admin/Index/newsinfo',
	'pro/:id'  => 'admin/Index/proinfo',
	'user/:id'  => 'admin/Index/userinfo',
	// 'admin/Index/demo' => 'admin/Index/demo'


];











?>