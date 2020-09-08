<?php 

namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;
class User extends Model
{
   use SoftDelete;
   // protected $auto=[
   //     'time'
   // ];
   // protected $autoWriteTimestamp=true;
   // protected $createTime=false;
   //protected $updateTime='update_at';
   protected $deleteTime='delete_at';
   protected $insert=[
      'time_insert'
   ];
   protected $update=[
       'time_update'
   ];
   public function getSexAttr($val){
   	    switch ($val) {
   	    	case 0:
   	    		return '女';
   	    		break;
   	    	case 1:
   	    		return '男';
   	    		break;
   	    	default:
   	    		return '未知';
   	    		break;
   	    }

   }
   public function setPwdAttr($val){
         return md5($val);
   }
   public function setTimeInsertAttr(){
         return time();

   }
   public function setTimeUpdateAttr(){
         return time();

   }
   
   
}





 ?>