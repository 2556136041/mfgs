<?php 
namespace app\index\model;

use think\Model;

class Notice extends Model
{
    public function noticeinfo(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','userid');
    }
}



?>