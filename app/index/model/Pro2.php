<?php 
namespace app\index\model;

use think\Model;

class Pro2 extends Model
{
   
	
	public function wxuser(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','tel');
    }

    public function user(){
        // 用户HAS ONE档案关联
        return $this->hasOne('User','username','username');
    }
	
	public function order(){
        // 用户HAS ONE档案关联
        return $this->hasMany('Order','pro_id','pro_id');
    }
	
    public function pubpros(){
		return $this->hasOne('Order','pro_id','pro_id');

	}	
	


    
}



 ?>