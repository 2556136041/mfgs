<?php 

namespace app\index\model;
use think\Model;
//use traits\model\SoftDelete;
class Pro extends Model
{
	
	public function wxuserinfo(){
        // 用户HAS ONE档案关联
        return $this->hasOne('Wxuser','user_phone','tel');
    }
    public function getProTypeAttr($val){
   	    switch ($val) {
   	    	case 'jj':
   	    		return '家具';
   	    		break;
   	    	case 'jd':
   	    		return '家电';
   	    		break;
			case 'yw':
   	    		return '衣物';
   	    		break;
			case 'sp':
   	    		return '私品';
   	    		break;
			case 'sj':
   	    		return '书刊';
   	    		break;
			case 'cw':
   	    		return '宠物';
   	    		break;
   	    	default:
   	    		return '未知';
   	    		break;
   	    }
	}
}



















 ?>