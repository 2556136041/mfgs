<?php 
namespace app\index\model;

use think\Model;

class Active extends Model
{
    public function activeinfo(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','userid');
    }
	
	public function replay(){
        // 用户HAS ONE档案关联
        return $this->hasMany('Activereplay','active_id','id');
    }
}



?>