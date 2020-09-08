<?php 
namespace app\index\model;

use think\Model;

class Findpro extends Model
{
   
	
	public function wxuser(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','user_phone');
    }
	
	public function task(){
        // 用户HAS ONE档案关联
        return $this->hasMany('Task','findpro_id','id');
    }
	
	
 
    
}



 ?>