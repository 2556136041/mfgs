<?php 
namespace app\index\model;

use think\Model;

class Useraddress extends Model
{
      public function myaddress(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','userid');
    }

    
}



 ?>