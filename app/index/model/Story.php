<?php 
namespace app\index\model;

use think\Model;

class Story extends Model
{
    public function storyinfo(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','userid');
    }
	
	public function replay(){
        // 用户HAS ONE档案关联
        return $this->hasMany('Storyreplay','tit_id','id');
    }
	
	
	
	
}



?>