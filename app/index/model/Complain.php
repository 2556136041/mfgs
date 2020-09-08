<?php 
namespace app\index\model;

use think\Model;

class Complain extends Model
{
	 public function usercomplain(){
        // 用户HAS ONE档案关联
        return $this->hasOne('User','id','userid');
    }
    
}



 ?>