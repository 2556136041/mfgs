<?php 
namespace app\index\model;

use think\Model;

class Wxuserinfo extends Model
{
      public function wxuserinfo(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','userid');
    }

    
}



 ?>