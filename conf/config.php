<?php 
return[   
	'auto_bind_module'       => true,
	'url_route_on'           => true,
	'url_route_must'         => false,
	'session'            => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => '',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
        'httponly'       => true,
        'secure'         => false,
    ],
	'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 视图基础目录，配置目录为所有模块的视图起始目录
        'view_base'    => '',
        // 当前模板的视图目录 留空为自动获取
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',
		'layout_on'    => false,
		'layout_name'  => 'layout'
    ],
	'view_replace_str'       => [
		'__frontcss__'     => '/public/front/css',
		'__backcss__'     => '/public/back/css',
	    '__img__'     => '/public/static/images',
		'__js__'     => '/public/static/js',
		'__leavewordcss__'     => '/public/static/css/leaveword',
		'__searchinfo__'     => '/public/static/css/searchinfo.css',
		'__myspacecss__'     => '/public/static/css/myspace.css',
		'__mymodify__'     => '/public/static/css/mymodify.css',
		'__hoverbox__'     => '/public/static/css/hoverbox.css'
	],
	'url_domain_deploy'      => false,
	'url_html_suffix' => 'html|shtml|xml',
	'url_convert'    =>  true,  // false大小写敏感,true大小写不敏感
	'app_namespace' => 'app', //自己定义应用名称
	'app_multi_module'  =>  true,  //false单一模块，true多模块
	
	




];

?>