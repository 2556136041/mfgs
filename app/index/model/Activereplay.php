<?php 
namespace app\index\model;

use think\Model;

class Activereplay extends Model
{
    public function replayuser(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','userid');
    }

}



?>