<?php 
namespace app\index\model;

use think\Model;

class User extends Model
{
	public function myproinfo(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Pro2','username','username');
    }
    
}



 ?>