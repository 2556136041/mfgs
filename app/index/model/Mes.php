<?php 
namespace app\index\model;

use think\Model;

class Mes extends Model
{
    public function personinfo(){
        // 用户HAS ONE档案关联
        return $this->hasOne('User','id','userid');
    }
}



?>