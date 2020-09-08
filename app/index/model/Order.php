<?php 
namespace app\index\model;

use think\Model;

class Order extends Model
{
	public function orderlist(){
        return $this->hasOne('Pro2','pro_id','pro_id');
    }
    
}



 ?>