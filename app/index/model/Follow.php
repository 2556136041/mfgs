<?php 
namespace app\index\model;

use think\Model;

class Follow extends Model
{
    public function myfriend(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','followid');
    }
    public function myfans(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','userid');
    }
    
}



 ?>