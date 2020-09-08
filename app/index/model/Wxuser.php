<?php 
namespace app\index\model;

use think\Model;

class Wxuser extends Model
{
    public function myfollowinfo(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Follow','followid','user_phone');
    }

    public function wxusertoaddr(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Useraddress','userid','user_phone');
    }

    public function wxuserpubpro(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Pro2','tel','user_phone');
    }

   
    
}



 ?>