<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Env;
use Think\Upload;
use Think\Image;
use think\Log;
use think\Cookie;
use think\Session;
use think\Redirect;
use think\Loader;
use think\Paginator;
use think\File;
use qqlogin\Qc;                   
use qqlogin\Oauth;
use wxlogin\Wxlogin;
use app\index\model\User;
use app\index\model\Pro;
use app\index\model\Mes;
use app\index\model\Follow;
use app\index\model\Pro2;
use app\index\model\Order;
use app\index\model\Complain;
use app\index\model\Active;
use app\index\model\Story;
use app\index\model\Storyreplay;
use app\index\model\Notice;
use app\index\model\Activereplay;

//use think\Loader;
use think\Config;
use think\Request;
class Index extends Controller
{

	
/**********************************微信小程序*******************************************************/
//免费公社
  public function wxindex(Request $request){
        $url = "https://api.weixin.qq.com/sns/jscode2session";  
        // 参数
        $params['appid']= 'wx503527dc340335fb';  
        $params['secret']= '6e0672f7ede2e39b67a5cc3a5b6a687f';  
        $params['js_code']= $request -> param('code');     
        $params['grant_type']= 'authorization_code';  
        $user_phone= $request -> param('user_phone');  
        // 微信API返回的session_key 和 openid
        $arr = httpCurl($url, $params, 'POST');  
        $arr = json_decode($arr,true);       
        // 判断是否成功
        if(isset($arr['errcode']) && !empty($arr['errcode'])){ 
             return json(['code'=>'2','message'=>$arr['errmsg'],"result"=>null]);
        }        
        $openid = $arr['openid'];        
        $session_key = $arr['session_key']; 
        // 从数据库中查找是否有该openid
        $is_openid = Db::name('wxuser')->where('openid',$openid)->find(); 
        // 如果openid存在，更新openid_time,返回登录成功信息及手机号
        if($is_openid){            
        // openid存在，先判断openid_time,与现在的时间戳相比，如果相差大于168个小时（7天），则则返回登录失败信息，使客户端跳转登录页，如果相差在7天内，则更新openid_time，然后返回登录成功信息及手机号；
            // 根据openid查询到所在条数据
            $data = Db::name('wxuser')->where('openid',$openid)->find();   
            // 计算openid_time与现在时间的差值
            $time = time() - $data['openid_time'];            
            $time = $time / 3600;            
            // 如果7天内没更新过，则登陆态消失，返回失败，重新登录
            if($time > 168){                
                  return json(['sendsure'=>'0','message'=>'登录失败',]);
            }else{                
            // 根据手机号更新openid时间
                $update = Db::name('wxuser')->where('openid', $openid)->update(['openid_time' => time()]);
                // 判断是否更新成功
                if($update){                    
                     return json(['sendsure'=>'1','message'=>'登录成功','user_phone' => $data['user_phone']]);
                }else{                    
                     return json(['sendsure'=>'0','message'=>'登录失败']);
                }
            }        
            // openid不存在时
        }else{            
        // dump($user_phone);
            // 如果openid不存在, 判断手机号是否为空
            if(isset($user_phone) && !empty($user_phone)){            
            // 如果不为空，则说明是登录过的，就从数据库中找到手机号，然后绑定openid，+时间
                // 登录后,手机号不为空，则根据手机号更新openid和openid_time
                $update = Db::name('wxuser')
                    ->where('user_phone', $user_phone)
                    ->update([                        
                        'openid'  => $openid,                        
                        'openid_time' => time(),
                    ]);                
                if($update){                    
                      return json(['sendsure'=>'1','message'=>'登录成功',]);
                }
            }else{                
            // 如果也为空，则返回登录失败信息，使客户端跳转登录页
                return json(['sendsure'=>'0','message'=>'读取失败',]);
                
            }
        }
    }   

//闲物分享   
    public function wxindex1(Request $request){
        $url = "https://api.weixin.qq.com/sns/jscode2session";  
        // 参数
        $params['appid']= 'wxd015b1639d2c0e53';  
        $params['secret']= '1657ba50a24d87c7e89968573db0cb0c';  
        $params['js_code']= $request -> param('code');     
        $params['grant_type']= 'authorization_code';  
        $user_phone= $request -> param('user_phone');  
        // 微信API返回的session_key 和 openid
        $arr = httpCurl($url, $params, 'POST');  
        $arr = json_decode($arr,true);       
        // 判断是否成功
        if(isset($arr['errcode']) && !empty($arr['errcode'])){ 
             return json(['code'=>'2','message'=>$arr['errmsg'],"result"=>null]);
        }        
        $openid = $arr['openid'];        
        $session_key = $arr['session_key']; 
        // 从数据库中查找是否有该openid
        $is_openid = Db::name('wxuser')->where('openid',$openid)->find(); 
        // 如果openid存在，更新openid_time,返回登录成功信息及手机号
        if($is_openid){            
        // openid存在，先判断openid_time,与现在的时间戳相比，如果相差大于168个小时（7天），则则返回登录失败信息，使客户端跳转登录页，如果相差在7天内，则更新openid_time，然后返回登录成功信息及手机号；
            // 根据openid查询到所在条数据
            $data = Db::name('wxuser')->where('openid',$openid)->find();   
            // 计算openid_time与现在时间的差值
            $time = time() - $data['openid_time'];            
            $time = $time / 3600;            
            // 如果7天内没更新过，则登陆态消失，返回失败，重新登录
            if($time > 168){                
                  return json(['sendsure'=>'0','message'=>'登录失败',]);
            }else{                
            // 根据手机号更新openid时间
                $update = Db::name('wxuser')->where('openid', $openid)->update(['openid_time' => time()]);
                // 判断是否更新成功
                if($update){                    
                     return json(['sendsure'=>'1','message'=>'登录成功','user_phone' => $data['user_phone']]);
                }else{                    
                     return json(['sendsure'=>'0','message'=>'登录失败']);
                }
            }        
            // openid不存在时
        }else{            
        // dump($user_phone);
            // 如果openid不存在, 判断手机号是否为空
            if(isset($user_phone) && !empty($user_phone)){            
            // 如果不为空，则说明是登录过的，就从数据库中找到手机号，然后绑定openid，+时间
                // 登录后,手机号不为空，则根据手机号更新openid和openid_time
                $update = Db::name('wxuser')
                    ->where('user_phone', $user_phone)
                    ->update([                        
                        'openid'  => $openid,                        
                        'openid_time' => time(),
                    ]);                
                if($update){                    
                      return json(['sendsure'=>'1','message'=>'登录成功',]);
                }
            }else{                
            // 如果也为空，则返回登录失败信息，使客户端跳转登录页
                return json(['sendsure'=>'0','message'=>'读取失败',]);
                
            }
        }
    }   

    public function wxlogin(Request $request){
        // 获取到前台传输的手机号
        $user_phone = $request -> param('user_phone'); 
        // 判断数据库中该手机号是否存在
        $is_user_phone = Db::name('wxuser')->where('user_phone',$user_phone)->find(); 
        if(isset($is_user_phone) && !empty($is_user_phone)){     
        // 登录时，数据库中存在该手机号，则更新openid_time
            $update = Db::name('wxuser')
                    ->where('user_phone', $user_phone)
                    ->update([                      
                         'openid_time' => time(),
                    ]);            
                    if($update){        
                    return json(['sendsure'=>'1','message'=>'登录成功',]);
            }
        }else{            
            $data = [          
                  "user_phone" => $user_phone,   
                  "password" => '12345'
                ];            
                // 如果数据库中不存在该手机号，则进行添加
                Db::name('wxuser')->insert($data);
            }        
            return json(['sendsure'=>'1','message'=>'登录成功',]);

    }

     public function saveuserinfo(Request $request){
         $tel=$request -> param('phone'); 
         $userphoto=$request -> param('photo'); 
         $name=$request -> param('nickname'); 
         $wxuser=Db::name('wxuser');         
         $data=[            
            'nickname'=>$name,
            'sex'=>$request->param("sex"),
            'addr'=>$request->param("addr"),
            'photo'=>$userphoto
         ];
         $res=$wxuser->where('user_phone',$tel)->update($data);   
         if($res){
                // return json(['phone'=>$userphone,'name'=>$name,]);
                 echo $userphoto;
   
          }else{
                 echo $userphoto;
          }


    }

    public function getwxuseraddr(){
         $userphone=input('userphone');
         $Model=model('Wxuserinfo');
         $res_all=$Model->with('wxuserinfo')
                ->where('userid',$userphone)
                ->order('id DESC')
                ->select();
         echo json_encode($res_all);
         exit;

    }

    public function activefm(){
        $Model=model('Active');
        $res=$Model->with('activeinfo')
                    ->where('state',1)
                    ->where('pos',1)
                    ->limit(1)
                    ->order('id DESC')
                    ->select();
         echo json_encode($res);
         exit;
  }

  public function storyfm(){
        $Model=model('Story');
        $res=$Model->with('storyinfo')
                    ->where('state',1)
                    ->where('pos',1)
                    ->limit(1)
                    ->order('id DESC')
                    ->select();
         echo json_encode($res);
         exit;

  }
   public function reportfm(){
        $Model=Db::name('reportage');
        $res=$Model->where('state',1)
                    ->where('pos',1)
                    ->limit(1)
                    ->order('id DESC')
                    ->select();
         echo json_encode($res);
         exit;

  }
  public function noticefm(){
        $Model=Db::name('notice');
        $res=$Model->where('state',1)
                    ->where('pos',1)
                    ->limit(1)
                    ->order('id DESC')
                    ->select();
         echo json_encode($res);
         exit;

  }

  public function activeall(){
    $page=input('page');
    $Model=model('Active');
    $res_all=$Model->with(['activeinfo','replay'])
                ->where('state',1)
                ->limit(5*($page-1),5)
                ->order('id DESC')
                ->select();
     echo json_encode($res_all);
     exit;

  } 

  public function activeaddhits(){        
        $proid=input('id');
        $Model=Db::name('active');
        $res=$Model->where('id','eq',$proid)->find();
        $oldhits=$res['hits'];
        $oldpubtime=$res['pubtime'];
        $data=[            
            'hits'=>$oldhits+1,
            'pubtime'=>$oldpubtime
        ];
        $Model->where('id',$proid)->update($data);   
  }

  public function activedetail(){
      $id=input('id');
      $Model=model('Active');
      $res=$Model->with(['activeinfo','replay'])->where('id',$id)->find();
      echo json_encode($res);
      exit;
  }

  public function reportaddhits(){        
        $id=input('id');
        $Model=Db::name('reportage');
        $res=$Model->where('id','eq',$id)->find();
        $oldhits=$res['hits'];
         $data=[            
            'hits'=>$oldhits+1
        ];
        $Model->where('id',$id)->update($data);   
  }

  public function reportdetail(){
      $id=input('id');
      $Model=Db::name('reportage');
      $res=$Model->where('id',$id)->find();
      echo json_encode($res);
      exit;
  }

  public function replayactive(){
      $Model=Db::name('activereplay');
      $pubtime=date('Y-m-d H:i:s');
      $data=[     
          'tit_id'=>input('id'),
          'userid'=>input('userid'),
          'username'=>input('username'),
          'replay'=>input('content'),     
          'pubtime'=>$pubtime
      ];
                
      $res=$Model->insertGetId($data);
      if($res){
           echo 1;
      }else{
           echo 0;
      }

  }
  
  public function storyall(){
    $page=input('page');
    $Model=model('Story');    
    $res_all=$Model->with(['storyinfo','replay'])
                ->where('state',1)
                ->limit(5*($page-1),5)
                ->order('id DESC')
                ->select();
     echo json_encode($res_all);
     exit;

  }   

  public function storyaddhits(){        
        $proid=input('id');
        $Model=Db::name('story');
        $res=$Model->where('id','eq',$proid)->find();
        $oldhits=$res['hits'];
        $oldpubtime=$res['pubtime'];
        $data=[            
            'hits'=>$oldhits+1,
            'pubtime'=>$oldpubtime
        ];
        $Model->where('id',$proid)->update($data);   
  }

  public function storydetail(){
      $id=input('id');
      $Model=model('Story');
      $res=$Model->with(['storyinfo','replay'])->where('id',$id)->find();
      echo json_encode($res);
      exit;
  }

  public function replaystory(){
      $Model=Db::name('storyreplay');
      $pubtime=date('Y-m-d H:i:s');
      $data=[     
          'tit_id'=>input('id'),
          'userid'=>input('userid'),
          'username'=>input('username'),
          'replay'=>input('content'),     
          'pubtime'=>$pubtime
      ];
                
      $res=$Model->insertGetId($data);
      if($res){
           echo 1;
      }else{
           echo 0;
      }

  }

  public function noticeall(){
      $Model=Db::name('notice');
      $res=$Model->order("id DESC")->select();
      echo json_encode($res);
      exit;
  }
  public function noticedetail(){
      $id=input('id');
      $Model=Db::name('notice');
      $res=$Model->where('id',$id)->find();
      echo json_encode($res);
      exit;
  }

  public function allpro2(){
    $page=input('page');
    $Model=model('Pro2');
    // $counts=$Model->with(['wxuser','order'])->where('state',1)->count();
    $res_all=$Model->with(['wxuser','order'])
          ->where('state',1)
          ->limit(10*($page-1),10)
          ->order('pro_id DESC')
          ->select();
   echo json_encode($res_all);
   exit;    

  } 


  public function allpro3(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
          ->where('state',1)
          ->limit(10*($page-1),10)
          ->order('pro_id DESC')
          ->select();
   echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'pages'=>$pages]);
   exit;    

  } 

  public function showuser(){
    $Model=Db::name('wxuser');
    $res_all=$Model->limit(10)
          ->order('id DESC')
          ->select();
   echo json_encode($res_all);
   exit;    

  } 

//allcw

  public function allcw(){
    $page=input('page');
    $Model=model('Pro2');
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','cw')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
     echo json_encode($res_all);
     exit;
  } 

  public function allcw1(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','cw')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','cw')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
    echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'pages'=>$pages]);
    exit;
  } 

  public function allcw2(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','cw')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','cw')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
    echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'cwpages'=>$pages]);
    exit;
  } 

//alljj

  public function alljj(){
    $page=input('page');
    $Model=model('Pro2');
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','jj')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
     echo json_encode($res_all);
     exit;
  } 
  public function alljj1(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','jj')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','jj')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
     echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'pages'=>$pages]);
     exit;
  } 

  public function alljj2(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','jj')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','jj')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
     echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'jjpages'=>$pages]);
     exit;
  } 

//allyw

  public function allyw(){
    $page=input('page');
    $Model=model('Pro2');
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','yw')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
     echo json_encode($res_all);
     exit;
  } 

  public function allyw1(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','yw')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','yw')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
     echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'pages'=>$pages]);
     exit;
  } 

  public function allyw2(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','yw')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','yw')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
     echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'ywpages'=>$pages]);
     exit;
  } 

//allsp

  public function allsp(){
    $page=input('page');
    $Model=model('Pro2');
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','sp')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
     echo json_encode($res_all);
     exit;
  }
  public function allsp1(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','sp')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','sp')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
    echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'pages'=>$pages]);
    exit;
  }

  public function allsp2(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','sp')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','sp')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
    echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'sppages'=>$pages]);
    exit;
  }

//allsj

  public function allsj(){
    $page=input('page');
    $Model=model('Pro2');
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','sj')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
     echo json_encode($res_all);
     exit;
  } 

  public function allsj1(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','sj')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','sj')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
    echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'pages'=>$pages]);
    exit;
  } 

  public function allsj2(){
    $page=input('page');
    $Model=model('Pro2');
    $counts=$Model->with(['wxuser','order'])->where('state',1)->where('pro_type','sj')->count();
    $pages=ceil($counts/10);
    $res_all=$Model->with(['wxuser','order'])
                ->where('pro_type','sj')
                ->where('state',1)
                ->limit(10*($page-1),10)
                ->order('pro_id DESC')
                ->select();
    echo json_encode(['res_all'=>$res_all,'counts'=>$counts,'sjpages'=>$pages]);
    exit;
  } 

  //allsj
  public function findpro(){
        $keywords=input('keyword');
        $Model=model('Pro2');
        $proall=$Model->with(['wxuser','order']);
        // $res=Pro::relation('wxuserinfo')->where('pro_name','like',"%{$keywords}%")->order('pubtime DESC')->select();
        $res=$proall->where('pro_name','like',"%{$keywords}%")->order('pubtime DESC')->select();
        echo json_encode($res);
        exit;
  }

  public function myaddress(){
        $phone=input('userphone');
        $Model=model('Useraddress');
        $res=$Model->with('myaddress')->where("userid",$phone)->select();
        echo json_encode($res);
        exit;
  } 

  public function getuserhot(){
        $list = db('wxuser')
        ->field('u.*,e.*,count(e.tel) count')
        ->alias('u')
        ->join('pro2 e','u.user_phone = e.tel')
        // ->order(' desc')
        // ->where('e.create_time','between',[$start,$end])
        ->group('e.tel')
        ->limit(10)
        ->order('count(e.tel) desc')
        ->order('u.createtime desc')
        ->select();       
        echo json_encode($list);
        exit;

  }

  public function getboot(){
       $Model=Db::name("bootlanguage");
       $res=$Model->where("status",1)->limit(1)->select();
       echo json_encode($res);
       exit;
  }

  public function getmyaddr(){
        $id=input('id');
        $Model=Db::name('useraddress');
        $res=$Model->where("id",$id)->find();
        echo json_encode($res);
        exit;
  }

  public function modifymyaddr(){
        $id=input('id');
        $username=input('username');
        $address=input('address');
        $Model=Db::name('useraddress');
        $finduserid=$Model->where('id',$id)->find();
        $userid=$finduserid['userid'];
        $data=[            
            'username'=>$username,
            'address'=>$address,
            'userid'=>$userid
        ];
        $res= $Model->where('id',$id)->update($data); 
        if($res){
            echo 1;
        }else{
            echo 0;
        }
       
  }

  public function addmyaddr(){
        $userid=input('userid');
        $username=input('username');
        $address=input('address');

        $data=[
            'userid'=>$userid,
            'username'=>$username,
            'address'=>$address
        ];
        $Model=Db::name('useraddress');
        $res=$Model->insertGetId($data);
        if($res){
            echo 1;
        }else{
            echo 0;
        }
  }

  public function updatemyaddr(){
        $id=input('id');
        $userphone=input('userphone');
        $Model=Db::name('wxuser');        
        $data=[            
            'addrid'=>$id
        ];
        $res= $Model->where('user_phone',$userphone)->update($data); 
        if($res){
            $Model1=Db::name('useraddress');
            $result=$Model1->where("userid",$userphone)->where("id",$id)->find();
            echo json_encode($result);
            exit;
        }else{
            echo 0;
        }


  }


  public function getuserinfo(){   
         $myphone=input('userphone'); 
         $userModel=Db::name('wxuser'); 
         $myres=$userModel->where('user_phone',$myphone)->find();
         $jf=$myres['jf'];
         $Model=model('Follow');
         $obj=$Model->with('myfriend');
         $fansnum=$obj->where('userid',$myphone)->count();
         $friends=$obj->where('followid',$myphone)->count();
         return json(['jf'=>$jf,'fansnum'=>$fansnum,'friends'=>$friends]);                
         exit;  
    }

    public function getuseraddr(){
          $userphone=input('userphone'); 
          $userModel=Db::name('wxuser'); 
          $userres=$userModel->where('user_phone',$userphone)->find();
          $useraddress=$userres['useraddress'];
          echo json_encode($useraddress);       
          exit; 

    }

    public function userpubinfo(){
         $userphone=input('userphone'); 
         $myphone=input('myphone');
         $userModel=Db::name('wxuser'); 
         $userres=$userModel->where('user_phone',$userphone)->find();
         $jf=$userres['jf'];
         $photo=$userres['photo'];
         //关注的和我的粉丝
         $Model=model('Follow');
         $obj=$Model->with('myfriend');
         $fansnum=$obj->where('userid',$userphone)->count();
         $friends=$obj->where('followid',$userphone)->count();

         $name = $userres['nickname'];
         $addr = $userres['addr'];
         $sex1 = $userres['sex'];
         switch ($sex1) {
          case 0:
            $sex="未知";
            break;
          case 1:
            $sex="男";
            break;
          case 2:
            $sex="女";
            break;
          default:
            $sex="未知";
            break;
        }
        $addr = $userres['addr'];

        $followobj=Db::name('follow');
        $followres=$followobj->where("followid",$userphone)->where("userid",$myphone)->find();
        if( $followres){
          $is_friend=1;
        }else{
          $is_friend=0;
        }

       $Model=model('Pro2');
       $sendnums=$Model->with('pubpros')->where('tel',$userphone)->order('pro_id DESC')->count();
       $Model=model('order');
       $getnums=$Model->with('orderlist')->where('orderlj',$userphone)->order('pro_id DESC')->count();

       return json(['jf'=>$jf,'sendnums'=>$sendnums,'photo'=>$photo,'getnums'=>$getnums,'name'=>$name,'sex'=>$sex,'addr'=>$addr,'fansnum'=>$fansnum,'friends'=>$friends,'is_friend'=>$is_friend]);                
       exit;      

      
    }

    public function addfriend(){
          $userphone=input('userphone');
          $myphone=input('myphone');
          $Model=Db::name('follow');
          // $res=$Model->where('userid',$myphone)->find();
          // if($res){
          //     echo 0;
               
          // }else{
              $data=[     
              'userid'=>$myphone,
              'followid'=>$userphone,
              'status'=>1
             ];               
             $res1=$Model->insertGetId($data);
             echo 1;
          // }

    }

    public function cancelfollowfriend(){
          $userphone=input('userphone');
          $myphone=input('myphone');
          $follow=Db::name('follow');
          $res1=$follow->where('userid',$myphone)->where('followid',$userphone)->delete();
          if($res1){
              echo 1;
          }else{
              echo 0;
          }

    }

    public function myfriends(){
         $userphone=input('userphone');
         $Model=model('Follow');
         $obj1=$Model->with('myfriend');               
         $friendsres=$obj1->where('userid',$userphone)->where('status',1)->select();
         return json($friendsres);
         exit;      
    }

    public function myfans(){
         $userphone=input('userphone');
         $Model=model('Follow');
         $obj2=$Model->with('myfans'); 
         $fansres=$obj2->where('followid',$userphone)->where('status',1)->select();
         return json($fansres);
         exit;    
    }



//小程序图片处理
    public function upload_miniimg(){
             $file = request()->file('file');
             $info = $file->validate(['size'=>1024*1024*2,'ext'=>'jpg,png,gif,jpeg'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . '/static/images/pro');
            if($info){
                $imagename=$info->getSaveName();
                $image = \think\Image::open('./public/static/images/pro/'.$imagename);
                // $thumbimg="thumb_".$imagename;
                $image->thumb(646, 500)->save('./public/static/images/pro/'.$imagename);                
                // $imgpath="./public/statice/images/pro/".$imagename;
                // unlink($imgpath);
                echo $imagename;
                       
            }else{
                echo $file->getError();
            }

                 
    }

//小程序文字处理
    public function upload_minicon(){
        $gettype=input("protype");
        $pic=input('pic');
        $newtype="";
        switch ($gettype){
        case "家具":
            $newtype="jj";
            break;
        case "私品":
            $newtype="sp";
            break;
        case "家电":
            $newtype="jd";
            break;
        case "宠物":
            $newtype="cw";
            break;
        case "书刊":
            $newtype="sj";
            break;
        case "衣物":
            $newtype="yw";
            break;
        default:
            $newtype="sp";
        }

        $getdig=input("userdig");
        $newdig="";
        switch ($getdig){
        case "个人":
            $newdig=0;
            break;
        case "商人":
            $newdig=1;
            break;  
        default:
            $newdig=0;
        }

        $Model=Db::name('pro2');
        if(input('tel')==null || input('address')==null){
              $this->error('手机号和地址不能为空！');

        }else{
              $pubtime=date('Y-m-d H:i:s');
              $data=[     
                  'username'=>input('username'),
                  'tel'=>input('tel'),
                  'address'=>input('address'),     
                  'pro_type'=>$newtype,
                  'degree'=>input('usetime'), 
                  'user_dig'=>$newdig,
                  'pro_name'=>input('proname'),
                  'number'=>input('pronumber'),                  
                  'remainnum'=>input('pronumber'), 
                  'city'=>input('city'), 
                  'pro_about'=>input('proabout'),            
                  'pro_pic'=>$pic,
                  'pubtime'=>$pubtime
              ];
                        
              $regex='/^<$/';
              if(preg_match($regex,$pic)==0 && $pic!=''){
                    $res=$Model->insertGetId($data);
                    if($res){
                         $tel=input('tel');
                         $wxuser=Db::name('wxuser');
                         $userres=$wxuser->where('user_phone',$tel)->find();
                         $oldjf=$userres['jf'];
                         $data=[            
                            'jf'=>$oldjf+100,
                            'useraddress'=>input('address')
                         ];
                         $saveres=$wxuser->where('user_phone',$tel)->update($data);   
                         if($saveres){                          
                                 echo 1;
                         }else{
                                 echo 0;
                         }
                    }

              }else{
                    echo 0;
              }  

        } 
        
        
    }

//新
     public function upload_minicon1(){
        $gettype=input("protype");
        $pic=input('pic');
        $newtype="";
        switch ($gettype){
        case "家具":
            $newtype="jj";
            break;
        case "私品":
            $newtype="sp";
            break;
        case "家电":
            $newtype="jd";
            break;
        case "宠物":
            $newtype="cw";
            break;
        case "书刊":
            $newtype="sj";
            break;
        case "衣物":
            $newtype="yw";
            break;
        default:
            $newtype="sp";
        }

        $getdig=input("userdig");
        $newdig="";
        switch ($getdig){
        case "个人":
            $newdig=0;
            break;
        case "商人":
            $newdig=1;
            break;  
        default:
            $newdig=0;
        }

        $Model=Db::name('pro2');
        if(input('myaddress')==null || input('proabout')==null){
              $this->error('描述和地址不能为空！');

        }else{
              $pubtime=date('Y-m-d H:i:s');
              $data=[     
                  'username'=>input('username'),
                  'tel'=>input('tel'),
                  'useraddress'=>input('myaddress'),     
                  'pro_type'=>$newtype,
                  'degree'=>input('usetime'), 
                  'user_dig'=>$newdig,
                  'pro_name'=>input('proname'),
                  'number'=>input('pronumber'),                  
                  'remainnum'=>input('pronumber'), 
                  'address'=>input('address'), 
                  'city'=>input('city'), 
                  'pro_about'=>input('proabout'),            
                  'pro_pic'=>$pic,
                  'pubtime'=>$pubtime
              ];
                        
              $regex='/^<$/';
              if(preg_match($regex,$pic)==0 && $pic!=''){
                    $res=$Model->insertGetId($data);
                    if($res){
                         $tel=input('tel');
                         $wxuser=Db::name('wxuser');
                         $userres=$wxuser->where('user_phone',$tel)->find();
                         $oldjf=$userres['jf'];
                         $data=[            
                            'jf'=>$oldjf+100,
                            'useraddress'=>input('address')
                         ];
                         $saveres=$wxuser->where('user_phone',$tel)->update($data);   
                         if($saveres){                          
                                 echo 1;
                         }else{
                                 echo 0;
                         }
                    }

              }else{
                    echo 0;
              }  

        } 
        
        
    }

   
//分享加分
    public function addsharescore(){
        $userphone=input('userphone');
        $wxuser=Db::name('wxuser');
        $userres=$wxuser->where('user_phone',$userphone)->find();
        $oldjf=$userres['jf'];
        $data=[            
            'jf'=>$oldjf+20
        ];
        $saveres=$wxuser->where('user_phone',$userphone)->update($data);   
        if($saveres){                          
              echo 1;
        }else{
             echo 0;
        }
    }


//话题图片处理
    public function upload_storyimg(){
             $file = request()->file('file');
             $info = $file->validate(['size'=>1024*1024*2,'ext'=>'jpg,png,gif,jpeg'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . '/static/images/story');
            if($info){
                $imagename=$info->getSaveName();
                $image = \think\Image::open('./public/static/images/story/'.$imagename);
                // $thumbimg="thumb_".$imagename;
                $image->thumb(646, 500)->save('./public/static/images/story/'.$imagename);                
                // $imgpath="./public/statice/images/pro/".$imagename;
                // unlink($imgpath);
                echo $imagename;
                       
            }else{
                echo $file->getError();
            }

                 
    }
//话题文字处理
    public function upload_storycon(){      
        $Model=Db::name('story');
        if(input('title')==null || input('content')==null){
              $this->error('主题和内容不能为空！');

        }else{
              $pubtime=date('Y-m-d H:i:s');
              $data=[     
                  'username'=>input('username'),
                  'about'=>input('about'),
                  'title'=>input('title'),
                  'content'=>input('content'),  
                  'storyphoto'=>input('pic'),
                  'pubtime'=>$pubtime
              ];
                        
              $res=$Model->insertGetId($data);
              if($res){
                   $tel=input('tel');
                   $wxuser=Db::name('wxuser');
                   $userres=$wxuser->where('user_phone',$tel)->find();
                   $oldjf=$userres['jf'];
                   $data=[            
                      'jf'=>$oldjf+200
                   ];
                   $saveres=$wxuser->where('user_phone',$tel)->update($data);   
                   if($saveres){
                           echo 1;
                    }else{
                           echo 0;
                    }
              }
    

        } 
        
        
    }

    public function prodetail(){
          $id=input('id');
          $Model=model('Pro2');
          $res=$Model->with(['wxuser','order'])->where('pro_id',$id)->find();
          echo json_encode($res);
          exit;
    }

    public function addhits(){        
        $proid=input('id');
        $Model=Db::name('pro2');
        $res=$Model->where('pro_id','eq',$proid)->find();
        $oldhits=$res['hits'];
         $data=[            
            'hits'=>$oldhits+1
        ];
        $Model->where('pro_id',$proid)->update($data);   
    }

    //setorder
    public function setorder(){   
         $proid=input('id');
         $pubtime=date('Y-m-d H:i:s');  
         $pro2res=Db::name("pro2")->where("pro_id",$proid)->find();
         $pronum=$pro2res['remainnum'];
         $tel=$pro2res['tel'];
         if($pronum>0){
              $userModel=Db::name("wxuser");
              $data1=[
                  'useraddress'=>input('orderaddress')
              ];
              $updataaddr=$userModel->where('user_phone',$tel)->update($data1);
              $data=[
                'pro_id'=>$proid,
                'ly'=>input('ly'),
                'ordername'=>input('ordername'),
                'ordertime'=>$pubtime,
                'orderlj'=>input('orderlj'),
                'orderaddress'=>input('orderaddress')
              ];
              $Model=Db::name('order');   
              $res=$Model->insertGetId($data);
              if($res){
                    $Model1=Db::name('pro2');
                    $prores=$Model1->where('pro_id',$proid)->find();
                    $pronum=$prores['remainnum'];
                     $data=[            
                        "remainnum"=>$pronum-1,
                        "setorder"=>1
                    ];
                    $res1=$Model1->where('pro_id',$proid)->update($data);                     
                    echo "success";
              }    
              

         }elseif($pronum<=0){
              echo "false";

         }
        
  
    }     

    public function setorder1(){   
         $proid=input('id');
         $pubtime=date('Y-m-d H:i:s');  
         $pro2res=Db::name("pro2")->where("pro_id",$proid)->find();
         $pronum=$pro2res['remainnum'];
         $username=$pro2res['username'];
         $proname=$pro2res['pro_name'];
         $wxts="点击进入详情页";
         $tel=$pro2res['tel'];

         // $code=input('code');
         $formid=input('formId');
         // $data=$formdata;
         // $login=new Wxlogin();
         // $loginRes=$login->login($code);
         // $openId=$loginRes['openid'];
         $wxuser=Db::name('wxuser')->where("user_phone",input('orderlj'))->find();
         $openId=$wxuser['openid'];

         $tokenUrl='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s';
         $tokenUrl=sprintf($tokenUrl,'wx503527dc340335fb','6e0672f7ede2e39b67a5cc3a5b6a687f');

         $access_token=curl_get($tokenUrl);
         $access_token=json_decode($access_token,true);
         $tplMSG=array(
              'touser'=>$openId,
              'form_id'=>$formid,
              'page'=>'pages/get/get',
              'template_id'=>'Hv0fF7pJ59YGEJcYygZihBmk5KtF4F1jpyagXJS6S6I',
              'data'=>array(
                    'keyword1'=>array(
                          'value'=>$proname,
                          'color'=>'#333'
                    ),
                    'keyword2'=>array(
                          'value'=>$username,
                          'color'=>'#333'
                    ),
                    'keyword3'=>array(
                          'value'=>$tel,
                          'color'=>'#333'
                    ),
                    'keyword4'=>array(
                          'value'=>$pubtime,
                          'color'=>'#333'
                    ),
                    'keyword5'=>array(
                          'value'=>$wxts,
                          'color'=>'#333'
                    )

              ),
              "emphasis_keyword"=>"keyword1.DATA"

         );
         $tplMSGURL=sprintf('https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=%s',$access_token['access_token']);
         $msgResult=curl_post( $tplMSGURL,$tplMSG);
         if($msgResult){
                 if($pronum>0){
                      $userModel=Db::name("wxuser");
                      $data1=[
                            'useraddress'=>input('orderaddress')
                      ];
                      $updataaddr=$userModel->where('user_phone',$tel)->update($data1);
                      $data=[
                            'pro_id'=>$proid,
                            'ly'=>input('ly'),
                            'ordername'=>input('ordername'),
                            'ordertime'=>$pubtime,
                            'orderlj'=>input('orderlj'),
                            'orderaddress'=>input('orderaddress')
                      ];
                      $Model=Db::name('order');   
                      $res=$Model->insertGetId($data);
                      if($res){
                            $Model1=Db::name('pro2');
                            $prores=$Model1->where('pro_id',$proid)->find();
                            $pronum=$prores['remainnum'];
                             $data=[            
                                "remainnum"=>$pronum-1,
                                "setorder"=>1
                            ];
                            $res1=$Model1->where('pro_id',$proid)->update($data);      
                            if($res1){                         
                                echo "success";
                            }               
                            
                      }    
                      

                 }elseif($pronum<=0){
                      echo "false";

                 }

         }    
        
  
    }  

//闲物分享
    public function setorder2(){   
         $proid=input('id');
         $pubtime=date('Y-m-d H:i:s');  
         $pro2res=Db::name("pro2")->where("pro_id",$proid)->find();
         $pronum=$pro2res['remainnum'];
         $username=$pro2res['username'];
         $proname=$pro2res['pro_name'];
         $wxts="点击进入详情页";
         $tel=$pro2res['tel'];

         // $code=input('code');
         $formid=input('formId');
         // $data=$formdata;
         // $login=new Wxlogin();
         // $loginRes=$login->login($code);
         // $openId=$loginRes['openid'];
         $wxuser=Db::name('wxuser')->where("user_phone",input('orderlj'))->find();
         $openId=$wxuser['openid'];

         $tokenUrl='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s';
         $tokenUrl=sprintf($tokenUrl,'wxd015b1639d2c0e53','1657ba50a24d87c7e89968573db0cb0c');

         $access_token=curl_get($tokenUrl);
         $access_token=json_decode($access_token,true);
         $tplMSG=array(
              'touser'=>$openId,
              'form_id'=>$formid,
              'page'=>'pages/get/get',
              'template_id'=>'gydHmxt1XkkLBuwnVV5NXQQggi6Hxy4s_dO2MVZek_c',
              'data'=>array(
                    'keyword1'=>array(
                          'value'=>$proname,
                          'color'=>'#333'
                    ),
                    'keyword2'=>array(
                          'value'=>$username,
                          'color'=>'#333'
                    ),
                    'keyword3'=>array(
                          'value'=>$tel,
                          'color'=>'#333'
                    ),
                    'keyword4'=>array(
                          'value'=>$pubtime,
                          'color'=>'#333'
                    ),
                    'keyword5'=>array(
                          'value'=>$wxts,
                          'color'=>'#333'
                    )

              ),
              "emphasis_keyword"=>"keyword1.DATA"

         );
         $tplMSGURL=sprintf('https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=%s',$access_token['access_token']);
         $msgResult=curl_post( $tplMSGURL,$tplMSG);
         if($msgResult){
                 if($pronum>0){
                      $userModel=Db::name("wxuser");
                      $data1=[
                            'useraddress'=>input('orderaddress')
                      ];
                      $updataaddr=$userModel->where('user_phone',$tel)->update($data1);
                      $data=[
                            'pro_id'=>$proid,
                            'ly'=>input('ly'),
                            'ordername'=>input('ordername'),
                            'ordertime'=>$pubtime,
                            'orderlj'=>input('orderlj'),
                            'orderaddress'=>input('orderaddress')
                      ];
                      $Model=Db::name('order');   
                      $res=$Model->insertGetId($data);
                      if($res){
                            $Model1=Db::name('pro2');
                            $prores=$Model1->where('pro_id',$proid)->find();
                            $pronum=$prores['remainnum'];
                             $data=[            
                                "remainnum"=>$pronum-1,
                                "setorder"=>1
                            ];
                            $res1=$Model1->where('pro_id',$proid)->update($data);      
                            if($res1){                         
                                echo "success";
                            }               
                            
                      }                      

                 }elseif($pronum<=0){
                      echo "false";

                 }
                 
         }    
        
  
    } 

    //点赞
    public function addpoints(){        
        $proid=input('id');
        $Model=Db::name('pro2');
        $res=$Model->where('pro_id','eq',$proid)->find();
        $oldhits=$res['points'];
        $oldpubtime=$res['pubtime'];
        $data=[            
            'points'=>$oldhits+1,
            'pubtime'=>$oldpubtime
        ];
        $Model->where('pro_id',$proid)->update($data);   
        exit;
    }

    public function cutdownpoints(){
        
        $proid=input('id');
        $Model=Db::name('pro2');
        $res=$Model->where('pro_id','eq',$proid)->find();
        $oldhits=$res['points'];
        $oldpubtime=$res['pubtime'];
        $data=[            
            'points'=>$oldhits-1,
            'pubtime'=>$oldpubtime
        ];
        $Model->where('pro_id',$proid)->update($data);   
    }

    public function givepros(){
       $myphone=input('userphone');
       $Model=model('Pro2');
       $pronums=$Model->with('order')->where('tel',$myphone)->count();
       $mypros=$Model->with('order')->where('tel',$myphone)->order('pro_id DESC')->select();
       echo json_encode(['mypros'=>$mypros,'pronums'=>$pronums]);
       exit;
    }

    public function getpros(){
       $tel=input('userphone');
       $Model=model('order');
       $pronums=$Model->with('orderlist')->where('orderlj',$tel)->count();
       $mygetpros=$Model->with('orderlist')->where('orderlj',$tel)->order('pro_id DESC')->select();
       echo json_encode(['mypros'=>$mygetpros,'pronums'=>$pronums]);
       // echo json_encode($mygetpros);
       exit;
    }

    public function getpros1(){
       $tel=input('userphone');
       $Model=model('order');
       $pronums=$Model->with('orderlist')->where('orderlj',$tel)->count();
       $mygetpros=$Model->with('orderlist')->where('orderlj',$tel)->order('pro_id DESC')->select();
       echo json_encode(['mypros'=>$mygetpros,'pronums'=>$pronums]);
       // echo json_encode($mygetpros);
       exit;
    }
    
    public function mysearchpro(){
       $myphone=input('userphone');
       $Model=model('Findpro');
       $mysearchpros=$Model->with(['task','wxuser'])->where('user_phone',$myphone)->order('id DESC')->select();
       echo json_encode($mysearchpros);
       exit;
    }

    public function userly(){
      $Model=Db::name('mes');
      $pubtime=date('Y-m-d H:i:s');
      $data=[     
          'userphone'=>input('tel'),
          'title'=>input('tit'),
          'content'=>input('ly'),     
          'createtime'=>$pubtime
      ];
                
      $res=$Model->insertGetId($data);
      if($res){
           echo 1;
      }else{
           echo 0;
      }

    }

    public function sendpro(){
        $proid=input('proid');
        $Model=Db::name('pro2');
         $data=[            
            'sendstate'=>1
        ];
        $res=$Model->where('pro_id',$proid)->update($data);   
        if($res){
             echo 1;
        }else{
             echo 0;
        }

    }


    public function wxgetpro(){
        $proid=input('proid');
        $Model=Db::name('order');
         $data=[            
            'getstate'=>1
        ];
        $res=$Model->where('pro_id',$proid)->update($data);   
        if($res){
             echo 1;
        }else{
             echo 0;
        }

    }

    public function allfindpros(){
         $Model=model('Findpro');
         $res_all=$Model->with(['wxuser','task'])
                ->order('createtime DESC')
                ->select();
         echo json_encode($res_all);
         exit;


    }

    public function pubfindpro(){
        $Model=Db::name('findpro');
        $pubtime=date('Y-m-d H:i:s');
        $data=[     
            'user_phone'=>input('tel'),
            'proname'=>input('proname'),
            'content'=>input('reason'),     
            'createtime'=>$pubtime
        ];                  
        $res=$Model->insertGetId($data);
        if($res){
             echo 1;
        }else{
             echo 0;
        }

    }

    public function answerfindpro(){
        $Model=Db::name('task');
        $pubtime=date('Y-m-d H:i:s');
        $data=[     
            'taskusername'=>input('username'),
            'user_phone'=>input('tel'),
            'findpro_id'=>input('id'),
            'answer'=>input('answer'),     
            'answertime'=>$pubtime
        ];                  
        $res=$Model->insertGetId($data);
        if($res){
             echo 1;
        }else{
             echo 0;
        }
    }

    public function complain(){
        $userphone=input('userphone');
        echo $userphone;
        exit;
        $Model=Db::name('complain');
        $time=date('Y-m-d H:i:s');
        $data=[     
            'userid'=>$userphone,
            'complainuser'=>input('complaintel'),
            'explain'=>input('explain'),   
            'complaintime'=>$time
        ];                  
        $res=$Model->insertGetId($data);
        if($res){
             echo 1;
        }else{
             echo 0;
        }
    }

// 小程序删除图片

    public function wxprodel(){
        $id=input('id');
        $Model=Db::name('pro2');
        $thisdata=$Model->where('pro_id',$id)->find();             
        $imgname=$thisdata['pro_pic'];        
        if($imgname){
            $imgpath = "./public/static/images/pro/$imgname";
            if($imgpath){
                 unlink($imgpath);
            }
            
        } 
        $res=$Model->where('pro_id',$id)->delete();
        if($res){
            $order=Db::name('order');
            $findorder=$order->where('pro_id',$id)->find();
            if($findorder){
                 $res1=$order->where('pro_id',$id)->delete();
                 if($res1){
                      echo 1;
                  }else{
                      echo 0;
                  }            

            }else{
                      echo 1;
            }
            
        }

    }
	
	  public function wxprodelimg(){
        $proimg=input('id');      
        $imgpath = "./public/static/images/pro/$proimg";
        if(unlink($imgpath)){
             echo 1;
        }  

    }  

 

/********************************************小程序完 ***********************************/

/**************************************** pc ****************************/
//judgelogin
    private function judgeLogin(){
        if(!cookie('unc') && !session('unc')){
            $this->error('请登陆','/index.html');

        }
    }

//judgelogin_mes
    private function judgeLogin_mes(){
        if(!cookie('unc') && !session('unc')){
            $this->error('请登陆','/leavemessage.html');

        }
    }

    public function miniguide(){
        return $this->fetch();

    }

//index
    public function index(Request $request)
    {
       //家具
       $res_jj=Db::name('pro2')
	   ->where('pro_type','eq','jj')
     ->where('state',1)
     ->where('pos',1)
	   ->order('pro_id DESC')
	   ->limit(3)
	   ->select();
       //家电
       $res_jd=Db::name('pro2')
	   ->where('pro_type','eq','jd')
     ->where('state',1)
     ->where('pos',1)
	   ->order('pro_id DESC')
	   ->limit(3)
	   ->select();
	   //衣服
       $res_yw=Db::name('pro2')
	   ->where('pro_type','eq','yw')
     ->where('state',1)
     ->where('pos',1)
	   ->order('pro_id DESC')
	   ->limit(3)
	   ->select();
	   //私品
       $res_sp=Db::name('pro2')
	   ->where('pro_type','eq','sp')
     ->where('state',1)
     ->where('pos',1)
	   ->order('pro_id DESC')
	   ->limit(3)
	   ->select();
	   //书集
       $res_sj=Db::name('pro2')
	   ->where('pro_type','eq','sj')
     ->where('state',1)
     ->where('pos',1)
	   ->order('pro_id DESC')
	   ->limit(3)
	   ->select();
	   
	   //宠物
       $res_cw=Db::name('pro2')
       ->where(function($query){
       	    $query->where('pro_type','eq','cw')
            ->where('state',1)
            ->where('pos',1)
       	    ->order('pro_id DESC')
       	    ->limit(3);
       })
       ->select();
       //达人
       $res_user=User::all(function($query){
       	    $query->where('state','eq',1)
       	    ->order('id DESC')
       	    ->limit(3);
	   });
	   //最新产品   $newpro = mysql_query("SELECT * FROM pro order by pubtime desc limit 5",$conn);
	    $res_newpro=Pro::where('pro_id','gt',0)
       ->where('state',1)
	     ->order('pro_id DESC')
	     ->limit(3)
	     ->select();
       //date
       $time=date('Y-m-d H:i:s');
       //counthits
      // $indexhits=$this->counthits();
       //登陆状态
       //session('unc','wxl');
       $sessionuser=$request->session('unc');
       $usersess=session('unc');
       if(empty($sessionuser)){
            $userclass=null;
       }else{
             $loginuser=Db::name('user')->where('username','eq',$sessionuser)
             ->field('class')
             ->find();
             $userclass=$loginuser['class'];
       }

       //点击数
       $hitModel=Db::name('pagehits');
       $hitModel->where('id',1)->setInc('hits',1);
       $index_hits_res=$hitModel->where('id',1)->field('hits')->find();
       $index_hits=$index_hits_res['hits'];
       
       $this->assign('indexhits',$index_hits);  

       //传值
       $this->assign('userclass',$userclass);
       $this->assign('usersess',$usersess);
       $this->assign('res_newpro',$res_newpro);
       $this->assign('res_user',$res_user);
       //$this->assign('indexhits',$indexhits);
       $this->assign('time',$time);
       $this->assign('res_jj',$res_jj);
	     $this->assign('res_jd',$res_jd);
	     $this->assign('res_yw',$res_yw);
	     $this->assign('res_sp',$res_sp);
	     $this->assign('res_sj',$res_sj);
	     $this->assign('res_cw',$res_cw);
       return $this->fetch();
    }

//banwu
    public function banwu(){
         return $this->fetch('./template/banwu/index.html');
    }
    public function a2(){
         return $this->fetch('./template/banwu/a2.html');
    }
    public function a3(){
         return $this->fetch('./template/banwu/a3.html');
    }
    public function a4(){
         return $this->fetch('./template/banwu/a4.html');
    }

    public function b1(){
         return $this->fetch('./template/banwu/b1.html');
    }
    public function b2(){
         return $this->fetch('./template/banwu/b2.html');
    }
    public function b3(){
         return $this->fetch('./template/banwu/b3.html');
    }
    public function b4(){
         return $this->fetch('./template/banwu/b4.html');
    }

    public function c1(){
         return $this->fetch('./template/banwu/c1.html');
    }
    public function c2(){
         return $this->fetch('./template/banwu/c2.html');
    }
    public function c3(){
         return $this->fetch('./template/banwu/c3.html');
    }
    public function c4(){
         return $this->fetch('./template/banwu/c4.html');
    }


//getbackpwd
    public function getbackpwd(){
         return $this->fetch('./template/user/getbackpwd.html');
    }


//在数据库中保存手机验证码，1分钟后作废
public function savetelyzm(){

        $Model=Db::name('user');
        $tn=$Model->where('tel',test_input(input('tel')))->find();
        if(empty($tn)){
            echo '0';
        }else{
            //更新手机验证码
            $Model->where('id',$tn['id'])->setField( 'telyzm',test_input(input('telyzm')));
            // sleep(60);
            // $Model->where('id',$tn['id'])->setField( 'telyzm',0);
            //1代表成功
            $arr=1;
            echo $arr;
        }
    }

    public function checktelyzm(){
       $tel=test_input(input('tel'));
       $telyzm=test_input(input('telyzm'));
       $data=Db::name('user')->where('tel',$tel)->find();
       $usertelyzm= $data['telyzm'];
       if( $telyzm===$usertelyzm){
            $this->assign('data', $data);
            // 渲染模板输出
            return $this->fetch('./template/user/userupdatebytel.html');

       }else{
            $this->error('修改失败','/getbackpwd.html');
            
       }
       

    }


    public function updatebytelyzm_user(){
        
        $Model=Db::name('user');
        $id=input('id');
        $username=input('username');
        $pwd=test_input(input('userpwd'));
        $truename=input('truename');
        $sex=input('sex');
        $email=input('email');
        $tel=input('tel');
        $qq=input('qq');
        $address=input('address');
        $photo=input('photo');
        $ip=input('ip');
        $usermark=input('usermark');
        $inter=input('inter');
        $regtime=input('regtime');
        $lastlogintime=input('lastlogintime');
        $logintimes=input('logintimes');
        $class=input('class');
        $state=input('state');
        $userID=input('userID');
        $authnum=join(array_rand(array_flip(explode(" ","2 3 4 5 6 7 9 a b c d e f g h j k m n p r s t u v w x y A C D E F G H J K M N P R S T U V W X")),6));
        $telyzm=$authnum;
        $data=[            
            'username'=>$username,
            'pwd'=>$pwd,
            'truename'=>$truename,
            'sex'=>$sex,
            'email'=>$email,
            'tel'=>$tel,            
            'qq'=>$qq,
            'address'=>$address,
            'photo'=>$photo,
            'usermark'=>$usermark,
            'inter'=>$inter,
            'ip'=>$ip,
            'userID'=>$userID,
            'regtime'=>$regtime,
            'logintimes'=>$logintimes,
            'lastlogintime'=>$lastlogintime,
            'class'=>$class,
            'state'=>$state,
            'telyzm'=>$telyzm
        ];
        $res=$Model->where('id',$id)->update($data);        
        if($res){
            $this->success('修改成功','/index.html');
        }else{
            $this->error('修改失败');
        }

    }
  
    
//reg
    public function reg(){
         return $this->fetch('./template/user/reg.html');
    }
    public function savereg(Request $request){

        $Model=Db::name('user');
        if(input('username')==null  || input('userpwd')==null || input('sex')==null || input('email')==null || input('Mobile')==null || input('qq')==null || input('photo')==null || input('usermark')==null || input('inter/a')==null){
             $this->error('无效提交');

        }else{
              $username=input('username');
              $userpwd=input('userpwd');
              $sex=input('sex');
              $email=input('email');
              $Mobile=input('Mobile');
              $qq=input('qq');
              $address=input('address');
              $photo=input('photo');
              $usermark=input('usermark');

              $inter= implode(',',input('inter/a'));
              $data=[            
                  'username'=>test_input($username),
                  'pwd'=>test_input($userpwd),
                  'sex'=>$sex,
                  'email'=>test_input($email),
                  'tel'=>test_input($Mobile),            
                  'qq'=>test_input($qq),
                  'address'=>test_input($address),
                  'photo'=>$photo,
                  'usermark'=>test_input($usermark),
                  'inter'=>$inter,
                  'ip'=>getRealIpAddr(),
                  'regtime'=>date('Y-m-d H:i:s'),
                  'lastlogintime'=>date('Y-m-d H:i:s')
              ];
              
              $res=$Model->insert($data);
              if($res){
                  $this->success('注册成功','/index');
              }else{
                  $this->error('注册失败');
              }
        }
        
    }

//checkname
    public function checkname(){
         $name=input('gradename');
          $res=Db::name('user')->where('username',$name)->find();
          if($res){
              echo '1';
          }else{
              echo '0';
          }
    }

//login
    public function login_ok(){

        $Model=Db::name('user');
        $tn=$Model->where('username',test_input(input('username')))->find();
        //验证密码
        $tp=$Model->where('pwd',test_input(input('pwd')))->find();
        if(empty($tn)||empty($tp)){
            echo '用户名或密码错误';
        }else{
            //登陆成功，更新登陆次数
            $Model->where('id',$tn['id'])->setField( 'logintimes',$tn['logintimes']+1);
            cookie('unc',$tn['username'],3600*24);
            session('unc',$tn['username']);
            //传值，判断是否验证通过
            $arr=0;
            echo $arr;
        }
    }

    public function logout(){
         session('unc',null);
         cookie('unc',null);
         cookie("qq_accesstoken",null);
         cookie("qq_openid",null);
         cookie("userimg",null);

         $this->success('成功退出！','/index.html');
         //dump(cookie('unc'));
    }

//qqlogin

// 处理qq登录
    public function qqlogin(){
        $oauth = new Oauth();
        $oauth->qq_login();
        // $qq = new Qc();
        // $url = $qq->qq_login();
        // $this->redirect($url);
    }
// qq登录回调函数
    public function qqcallback() {
                $oauth = new Oauth();
                $accesstoken = $oauth->qq_callback();
                $openid = $oauth->get_openid();
                cookie("qq_accesstoken",$accesstoken,86400);
                cookie("qq_openid",$openid,86400);
                $qc = new Qc(cookie('qq_accesstoken'),cookie('qq_openid'));
                $userinfo = $qc->get_user_info();
                if($userinfo){                  
                              $name=$userinfo['nickname'];
                              $sex=$userinfo['gender'];
                              $addr=$userinfo['province'].".".$userinfo['city'];
                              $userImg=$userinfo['figureurl_qq_2'];   
                              cookie('userimg',$userImg,86400);
                              cookie('unc',$name,86400);
                              session('unc',cookie('unc'));
                              $userModel=Db::name('user');                    
                              $olduser=$userModel->where('username',$name)->find();                               
                              if($olduser==null){
                                  $data=[            
                                      'username'=>$name,
                                      'pwd'=>'',
                                      'truename'=>'',
                                      'sex'=>$sex,
                                      'email'=>'',
                                      'tel'=>'',            
                                      'qq'=>'',
                                      'address'=>$addr,
                                      'photo'=>$userImg,
                                      'class'=>0,
                                      'usermark'=>'',
                                      'inter'=>'',
                                      'ip'=>$_SERVER['REMOTE_ADDR'],
                                      'regtime'=>date('Y-m-d H:i:s'),
                                      'logintimes'=>0,
                                      'lastlogintime'=>date('Y-m-d H:i:s')
                                  ];
                                  $userModel->insert($data);                                   
                              }else{
                                  $olddata=$userModel->where('username',$name)->find();
                                  $data=[                               
                                      'ip'=>$_SERVER['REMOTE_ADDR'],
                                      'regtime'=>$olddata['regtime'],
                                      'logintimes'=>$olddata['logintimes']+1,
                                      'lastlogintime'=>date('Y-m-d H:i:s')
                                  ];
                                  $userModel->where('username',$name)->update($data);                       
                              }  
                             
                              $this->success('登陆成功','/index.html');
                               // $this->redirect('/index.html');
                }
              
    }

   
    public function qqlogout(){
        cookie("qq_accesstoken",null);
        cookie("qq_openid",null);
        cookie("userimg",null);
        cookie('unc',null);
        session('unc',null);
        //$this->redirect('index');
        $this->success('成功退出！','/index.html');
    }

//mes
    public function leavemessage(){
        $MesModel=Mes::relation('personinfo');
        $UserModel=Db::name('user');
        $list=$MesModel->where('state',1)->paginate(Env::get("meslist"));
        $count=$MesModel->where('state',1)->count();
        $user=$UserModel->where('username',session('unc'))->find();
        $class=$user['class'];
        $pwd=$user['pwd'];
        $time=time();       
        $data=$MesModel->where('state',1)->order('createtime DESC')->select();
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        $this->assign('total',$count);
        $this->assign('class',$class);
        $this->assign('now',$time);
        $this->assign('data', $data);
        $this->assign('pwd', $pwd);
        return $this->fetch('./template/leavemessage/index.html');
    }

    public function mestop(){
       return $this->fetch('./template/leavemessage/top.html');

    }

    public function mesbottom(){
       return $this->fetch('./template/leavemessage/bottom.html');

    }

    public function publicmes(){
        $this->judgeLogin_mes();
        $UserModel=Db::name('user');
        $time=time(); 
        $user=$UserModel->where('username',session('unc'))->find();
        $data=Db::name('mes')->where('state',1)->order('createtime DESC')->select();
        $pwd=$user['pwd'];
        $this->assign('now',$time);
        $this->assign('pwd', $pwd);
        $this->assign('data', $data);
        return $this->fetch('./template/leavemessage/publicmes.html');
    }

    public function savemes(){
        $title=input('title');
        $content=input('content');
        $user=Db::name('user')->where('username',session('unc'))->find();
        $userid=$user['id'];
        $data=[
            'userid'=>$userid,
            'title'=>test_input($title),
            'content'=>test_input($content),
            'createtime'=>date('Y-m-d H:i:s')
        ];
        $res=Db::name('mes')->insert($data);
        if($res){
            $this->success('留言成功','/leavemessage.html');
        }else{
            $this->error('留言失败');
        }

    }

    public function lookleaveword(){
        $MesModel=Mes::relation('personinfo');
        $UserModel=Db::name('user');
        $id=input('id');
        $mesinfo=$MesModel->where('id',$id)->find();
        $user=$UserModel->where('username',session('unc'))->find();
        $pwd=$user['pwd'];
        $time=time();       
        $data=$MesModel->where('state',1)->order('createtime DESC')->select();
        // 把分页数据赋值给模板变量list
        $this->assign('mesinfo', $mesinfo);
        $this->assign('now',$time);
        $this->assign('data', $data);
        $this->assign('pwd', $pwd);
        return $this->fetch('./template/leavemessage/lookleaveword.html');
    }

//留言退出
    public function leavemess_logout(){
         session('unc',null);
         cookie('unc',null);
         cookie("qq_accesstoken",null);
         cookie("qq_openid",null);
         cookie("userimg",null);
         $this->success('成功退出！','/leavemessage.html');
    }

//search
    public function searchpro(){
        $keywords=input('keywords');
        $page=input('page');
        $res=Db::name('pro2')->where('pro_name','like',"%{$keywords}%")->order('pubtime DESC')->paginate(30);
        $resnums=$res->total();
        $count=Db::name('pro2')->where('pro_name','like',"%{$keywords}%")->count();
        $this->assign('list', $res);
        $this->assign('total',$count);
        $this->assign('resnums',$resnums);
        $this->assign('page',$page);
        $this->assign('pages',ceil($resnums/30));
        return $this->fetch();
    }
//jj
    public function jj(){
        $list = Db::name('pro2')->where('pro_type','jj')->where('state',1)->order("pubtime DESC")->paginate(100);
        $count=Db::name('pro2')->where('pro_type','jj')->where('state',1)->count();
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        $this->assign('total',$count);
        // 渲染模板输出
        return $this->fetch('jj');
    }
     
    public function jd(){
        $list = Db::name('pro2')->where('pro_type','jd')->where('state',1)->order("pubtime DESC")->paginate(100);
        $count=Db::name('pro2')->where('pro_type','jd')->where('state',1)->count();
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        $this->assign('total',$count);
        // 渲染模板输出
        return $this->fetch('jd');
    }

    public function yw(){
        $list = Db::name('pro2')->where('pro_type','yw')->where('state',1)->order("pubtime DESC")->paginate(100);
        $count=Db::name('pro2')->where('pro_type','yw')->where('state',1)->count();
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        $this->assign('total',$count);
        // 渲染模板输出
        return $this->fetch('yw');
    }

    // public function sp(){
    //     $list = Db::name('pro2')->where('pro_type','sp')->where('state',1)->order("pubtime DESC")->paginate(100);
    //     $count=Db::name('pro2')->where('pro_type','sp')->where('state',1)->count();
    //     // 把分页数据赋值给模板变量list
    //     $this->assign('list', $list);
    //     $this->assign('total',$count);
    //     // 渲染模板输出
    //     return $this->fetch('sp');
    // }

    //前端通过ajax请求
    //sp私品
    public function ajaxSpData(){
        $res_sp=Db::name('pro2')
        ->where('pro_type','eq','sp')
        ->where('state',1)
        ->order('pro_id DESC')
        ->select();
        echo json_encode($res_sp);
        exit;
    }

    //sj书集
    public function ajaxSjData(){
        $res_sp=Db::name('pro2')
        ->where('pro_type','eq','sj')
        ->where('state',1)
        ->order('pro_id DESC')
        ->select();
        echo json_encode($res_sp);
        exit;
    }

    //jj家具
    public function ajaxJjData(){
        $res_sp=Db::name('pro2')
        ->where('pro_type','eq','jj')
        ->where('state',1)
        ->order('pro_id DESC')
        ->select();
        echo json_encode($res_sp);
        exit;
    }

    //yw衣物
    public function ajaxYwData(){
        $res_sp=Db::name('pro2')
        ->where('pro_type','eq','yw')
        ->where('state',1)
        ->order('pro_id DESC')
        ->select();
        echo json_encode($res_sp);
        exit;
    }

    //cw宠物
    public function ajaxCwData(){
        $res_sp=Db::name('pro2')
        ->where('pro_type','eq','cw')
        ->where('state',1)
        ->order('pro_id DESC')
        ->select();
        echo json_encode($res_sp);
        exit;
    }

    //jd家电
    public function ajaxJdData(){
        $res_sp=Db::name('pro2')
        ->where('pro_type','eq','jd')
        ->where('state',1)
        ->order('pro_id DESC')
        ->select();
        echo json_encode($res_sp);
        exit;
    }


    /***************前端通过ajax请求完*******************/

    public function sp(){
        return $this->fetch('sp');
    }

    public function sj(){
        $list = Db::name('pro2')->where('pro_type','sj')->where('state',1)->order("pubtime DESC")->paginate(100);
        $count=Db::name('pro2')->where('pro_type','sj')->where('state',1)->count();
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        $this->assign('total',$count);
        // 渲染模板输出
        return $this->fetch('sj');
    }

    public function cw(){
        $list = Db::name('pro2')->where('pro_type','cw')->where('state',1)->order("pubtime DESC")->paginate(100);
        $count=Db::name('pro2')->where('pro_type','cw')->where('state',1)->count();
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        $this->assign('total',$count);
        // 渲染模板输出
        return $this->fetch();
    }

//s
     public function proshow(){
        $pro_id=input('id');
        $data=Pro2::where('pro_id','eq',$pro_id)
        ->find();
        $this->assign('data',$data);
        return $this->fetch();
     }
//order
     public function proorder(Request $request){
         $this->judgeLogin();
         if(session('unc')){
             $pro_id=input('id');
             $data=Pro2::where('pro_id','eq',$pro_id)
             ->find();
             $time=date('Y-m-d H:i:s');
             $this->assign('time',$time);
             $this->assign('data',$data);
             return $this->fetch();
        }    
     }


     public function order_ok(){
     	     $time=date('Y-m-d H:i:s');
             $data=[
                    'pro_id'=>input('id'),
                    // 'setorder'=>input('order'),
                    'ly'=>input('ly'),
                    'ordername'=>input('ordername'),
                    'orderaddress'=>input('orderaddr'),
                    'ordername'=>session('unc'),
                    // 'pubtime'=>input('pubtime'),
                    'ordertime'=>date("Y-m-d H:i:s"),
                    'orderlj'=>input('orderlj')

             ];
             $res=Db::name("order")->insertGetId($data);
             if($res){
	                  $data=[
	                    'pro_id'=>input('id'),
	                    'setorder'=>input('order')
		                ];
    		             $res1=Db::name("pro2")->update($data);
    	             	  if($res1){
    	                       $arr=0;
    	                       echo $arr;

    	             	  }
                  
             } 

     	         
     }



//about
    public function about(){         
       $hitModel=Db::name('pagehits');
       $hitModel->where('id',2)->setInc('hits',1);
       $about_hits_res=$hitModel->where('id',2)->field('hits')->find();
       $about_hits=$about_hits_res['hits'];
       $this->assign('abouthits',$about_hits); 
       return $this->fetch();
    }    


//myspace
    public function myspace(){
       $this->judgeLogin();
       // $list=Db::name('pro2')->where('username',session('unc'))->order('pubtime DESC')->paginate(Env::get('setpronums'));
       // $total=Db::name('pro2')->where('username',session('unc'))->count();
       $Model=model('Pro2');       
       $list=$Model->with('pubpros')->where('username',session('unc'))->order('pubtime DESC')->paginate(Env::get('setpronums'));
       $total=$Model->with('pubpros')->where('username',session('unc'))->count();
       $userinfo=Db::name('user')->where('username',session('unc'))->find();
       $time=time();
       if($userinfo['sex']=='男'){
           $color='rgb(51,187,51)';
       }else{
           $color='rgb(51,187,51)';
       }
       $this->assign('time',$time);
       $this->assign('list',$list);
       $this->assign('color',$color);
       $this->assign('total',$total);
       $this->assign('userinfo',$userinfo);
       return $this->fetch('./template/myspace/index.html');
    }

    public function getpro(){
       $this->judgeLogin();
       $Model=model('Order');        
       $list=$Model->with('orderlist')->where('ordername',session('unc'))->paginate(Env::get('getpronums'));
       $total=$Model->with('orderlist')->where('ordername',session('unc'))->count();
       $userinfo=Db::name('user')->where('username',session('unc'))->find();
       $time=time();
       if($userinfo['sex']=='男'){
           $color='rgb(51,187,51)';
       }else{
           $color='rgb(51,187,51)';
       }
       $this->assign('time',$time);
       $this->assign('list',$list);
       $this->assign('color',$color);
       $this->assign('total',$total);
       $this->assign('userinfo',$userinfo);
       return $this->fetch('./template/myspace/getpro.html');
    }

    //addpro   
    public function pubpro(){
       $this->judgeLogin();
       $userinfo=Db::name('user')->where('username',session('unc'))->find();
       $time=time();
       if($userinfo['sex']=='男'){
           $color='rgb(51,187,51)';
           $color='rgb(51,187,51)';
       }
       $this->assign('time',$time);
       $this->assign('color',$color);
       $this->assign('userinfo',$userinfo);
       return $this->fetch('./template/myspace/pubpro.html');
    }

    public function upload_pro(){
       $this->judgeLogin();
       $userinfo=Db::name('user')->where('username',session('unc'))->find();
       $time=time();
       if($userinfo['sex']=='男'){
           $color='rgb(51,187,51)';
       }else{
           $color='rgb(51,187,51)';
       }
       $this->assign('time',$time);
       $this->assign('color',$color);
       $this->assign('userinfo',$userinfo);
       //image
        $file = request()->file('file');
        $info = $file->validate(['size'=>1024*1024*2,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . '/static/images/pro');
        if($info){
            $imagename=$info->getSaveName();
            $image = \think\Image::open('./public/static/images/pro/'.$imagename);
            $image->thumb(646, 500)->save('./public/static/images/pro/'.$imagename);
			      echo $imagename;
            $this->assign('imagename',$imagename);
            //return $this->fetch('./template/myspace/pubpro.html');            
        }else{
            echo $file->getError();
        }
    }

    public function prosave(){
       // $this->judgeLogin();
        $Model=Db::name('pro2');
        if(input('pro_pic')==null || input('pro_type')==null){
              $this->error('未提交图片或者没有选择类型！');

        }else{
              $pro_type=input('pro_type');
              $pro_name=input('pro_name');
              $degree=input('degree');
              $number=input('number');
              $pro_price=input('pro_price');
              $pro_about=input('pro_about');
              $pro_con=input('pro_con');
              $pro_pic=input('pro_pic');
              $pubtime=date('Y-m-d H:i:s');
              $data=[     
                  'username'=>session('unc'),       
                  'pro_type'=>$pro_type,
                  'pro_name'=>test_input($pro_name),
                  'degree'=>test_input($degree),
                  'number'=>test_input($number),
                  'remainnum'=>test_input($number),
                  'pro_price'=>0,
                  'pro_about'=>test_input($pro_about),            
                  'pro_con'=>test_input($pro_con),
                  'pro_pic'=>$pro_pic,
                  'pubtime'=>$pubtime
              ];
                        
              $res=$Model->insertGetId($data);
              if($res){
                  $this->success('成功提交','/pubpro.html');
              }else{
                  $this->error('提交失败');
              }

        }
        

    }

    public function sendprostate(){
           $id=input('id');
           $data=[
                'sendstate'=>1
                  ];
           $res1=Db::name("pro2")->where("pro_id",$id)->update($data);
           if($res1){
                   $this->success('成功发货','/myspace');
            }
     }

    public function getprostate(){
           $id=input('id');
           $data=[
                'getstate'=>1
                  ];
           $res1=Db::name("order")->where("pro_id",$id)->update($data);
           if($res1){
                   $this->success('收到','/getpro');
            }
     }

    public function mymodify(){
       $this->judgeLogin();
       $userinfo=Db::name('user')->where('username',session('unc'))->find();
       $time=time();
       if($userinfo['sex']=='男'){
           $color='rgb(200,200,50)';
       }else{
           $color='pink';
       }
       $this->assign('time',$time);
       $this->assign('color',$color);
       $this->assign('userinfo',$userinfo);
       return $this->fetch('./template/myspace/mymodify.html');

        
    }

    public function iupdate(){
        $id=input('id');
        $Model=Db::name('user');
        $username=input('username');
        $pwd=input('pwd');
        $sex=input('sex');
        $email=input('email');
        $tel=input('tel');
        $qq=input('qq');
        $address=input('address');
        $usermark=input('usermark');
        $regtime=input('regtime');
        $lastlogintime=input('lastlogintime');
        $data=[            
            'username'=>$username,
            'pwd'=>test_input($pwd),
            'sex'=>$sex,
            'email'=>test_input($email),
            'tel'=>test_input($tel),            
            'qq'=>test_input($qq),
            'address'=>test_input($address),
            'usermark'=>test_input($usermark),
            'regtime'=>$regtime,
            'lastlogintime'=>$lastlogintime
        ];
        $res=$Model->where('id',$id)->update($data);        
        if($res){
            $this->success('修改成功','/myspace.html');
        }else{
            $this->error('修改失败');
        }

    }



//admin
    public function admin(){
        $this->judgeLogin();
        $pro=Db::name('pro2')->count();
        $user=Db::name('user')->count();
        $wxuser=Db::name('wxuser')->count();
        $mes=Db::name('mes')->count();
        $this->assign('prototal',$pro);
        $this->assign('usertotal',$user);
         $this->assign('wxusertotal',$wxuser);
        $this->assign('mestotal',$mes);
        return $this->fetch('./template/admin/index.html');
    }

//prolist
    public function prolist(){
        $this->judgeLogin();
        $Model=model('Pro2');
        // $list = Db::name('pro2')->order('pubtime DESC')->paginate(Env::get("prolist"));
        $list = $Model->with('pubpros')->order('pubtime DESC')->paginate(100);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('./template/admin/prolist.html');

    }
 //产品审核
    public function pro_sh(){
        $this->judgeLogin();
        $Model=Db::name('pro2');
        $id=input('id');
        $data=$Model->where('pro_id',$id)->find();
        $this->assign('data',$data); 
        return $this->fetch('./template/admin/pro_sh.html');
    }

    public function sh_pro(){
        $this->judgeLogin();
        $id=input('id');
        $state=input('state');
        $pubtime=input('pubtime');
        $res=Db::name('pro2')
        ->where('pro_id', $id)
        ->update([
            'state'  => $state,
            'pubtime' => $pubtime
        ]);
        if($res){
            $this->success('通过审核','/prolist.html');
        }else{
            $this->error('失败');
        }
        
    }

//产品位置
    public function pro_pos(){
        $this->judgeLogin();
        $Model=Db::name('pro2');
        $id=input('id');
        $data=$Model->where('pro_id',$id)->find();
        $this->assign('data',$data); 
        return $this->fetch('./template/admin/pro_pos.html');
    }

    public function pos_pro(){
        $this->judgeLogin();
        $id=input('id');
        $pos=input('pos');
        $pubtime=input('pubtime');
        $res=Db::name('pro2')
        ->where('pro_id', $id)
        ->update([
            'pos'  => $pos,
            'pubtime' => $pubtime
        ]);
        if($res){
            $this->success('成功','/prolist.html');
        }else{
            $this->error('失败');
        }
        
    }

//prodel

    public function pro_del(){
         $this->judgeLogin();
         $Model=Db::name('pro2');
         $id=input('id');
         $data=$Model->where('pro_id',$id)->find();
         $this->assign('data',$data); 
         $usersess=session('unc');
         if(empty($usersess)){
              $this->error('还未登陆');

         }else{
               $loginuser=Db::name('user')->where('username','eq',$usersess)
               ->field('class')
               ->find();
               $userclass=$loginuser['class'];
               if($userclass==2){
                   return $this->fetch('./template/admin/pro_del.html');
               }else{
                   $this->error('没有权限','/prolist.html');
               }

         }
        
    }

    public function del_pro(){
        $this->judgeLogin();
        $id=input('id');
        $Model=Db::name('Pro2');
        $thisdata=$Model->where('pro_id',$id)->find();             
        $imgname=$thisdata['pro_pic'];        
        if($imgname){
            $imgpath = "./public/static/images/pro/$imgname";
            if($imgpath){
                 unlink($imgpath);
            }
            
        } 
        $res=$Model->where('pro_id',$id)->delete();
        if($res){
            $order=Db::name('order');
            $findorder=$order->where('pro_id',$id)->find();
            if($findorder){
                 $res1=$order->where('pro_id',$id)->delete();
                 if($res1){
                      $this->success('成功删除一款产品','/prolist.html');
                  }            

            }else{
                      $this->success('成功删除一款产品','/prolist.html');
            }
            
        }

        

    }
//noticelist
    public function noticepub(){
          return $this->fetch('./template/admin/noticepub.html');

    }

    public function savenotice(){
       // $this->judgeLogin();
        $Model=Db::name('notice');
        if(input('title')==null || input('content')==null){
              $this->error('标题和内容不能为空！');

        }else{
              $username=input('username');
              $title=input('title');
              $userid="";
              $content=input('content');
              $state=0;
              $pos=0;
              $pubtime=date('Y-m-d H:i:s');
              $data=[     
                  'username'=>$username,       
                  'title'=>$title,
                  'userid'=>$userid,
                  'state'=>$state,
                  'pos'=>$pos,
                  'content'=>$content,                  
                  'pubtime'=>$pubtime
              ];
                        
              $res=$Model->insertGetId($data);
              if($res){
                  $this->success('成功发布','/noticelist.html');
              }else{
                  $this->error('发布失败');
              }

        }
        

    }
    public function noticelist(){
        $this->judgeLogin();
        $list = Db::name('notice')->order('pubtime DESC')->paginate(100);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('./template/admin/noticelist.html');

    }   
    public function noticeupdate(){
       $this->judgeLogin();
       $id=input('id');
       $data=Db::name('notice')->where('id',$id)->find();
       $this->assign('data', $data);
        // 渲染模板输出
       return $this->fetch('./template/admin/noticeupdate.html');

    }
    public function update_notice(){
        $id=input('id');
        $Model=Db::name('notice');
        $username=input('username');
        $title=input('title');
        $content=input('content');
        $pubtime=input('pubtime');
        $state=input('state');
        $pos=input('pos');
        $userid=input('userid');       
        $data=[            
            'username'=>$username,
            'userid'=>$userid,
            'title'=>$title,
            'state'=>$state,
            'pos'=>$pos,
            'content'=>$content, 
            'userid'=>$userid,
            'pubtime'=>$pubtime
        ];
        $res=$Model->where('id',$id)->update($data);        
        if($res){
            $this->success('修改成功','/noticelist');
        }else{
            $this->error('修改失败');
        }

    }

    public function notice_del(){
        $this->judgeLogin();
        $Model=Db::name('notice');
        $id=input('id');
        $data=$Model->where('id',$id)->find();
        $this->assign('data',$data); 
        $usersess=session('unc');
         if(empty($usersess)){
              $this->error('还未登陆');

         }else{
               $loginuser=Db::name('user')->where('username','eq',$usersess)
               ->field('class')
               ->find();
               $userclass=$loginuser['class'];
               if($userclass==2){
                    return $this->fetch('./template/admin/notice_del.html');
               }else{
                   $this->error('没有权限','/noticelist.html');
               }

         }
       
    }

    public function del_notice(){
        $this->judgeLogin();
        $id=input('id');
        $Model=Db::name('notice');
        $res=$Model->where('id',$id)->delete();
        if($res){
            $this->success('成功删除一条公告','/noticelist.html');
        }

    }
//active

     public function activelist(){
        $this->judgeLogin();
        $list = Db::name('active')->order('pubtime DESC')->paginate(100);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('./template/admin/activelist.html');

    }  
    public function activepub(){
       $this->judgeLogin();
      
       return $this->fetch('./template/admin/activepub.html');
    }

    public function upload_active(){
       $this->judgeLogin();
        $file = request()->file('file');
        $info = $file->validate(['size'=>1024*1024*2,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . '/static/images/active');
        if($info){
            $imagename=$info->getSaveName();
            $image = \think\Image::open('./public/static/images/active/'.$imagename);
            $image->thumb(646, 500)->save('./public/static/images/active/'.$imagename);
            echo $imagename;
            $this->assign('imagename',$imagename);
            // return $this->fetch('./template/admin/activepub.html');            
        }else{
            echo $file->getError();
        }
    }
 
    public function saveactive(){
       $this->judgeLogin();
       
        $Model=Db::name('active');
        // if(input('active_pic')==null){
        //       $this->error('未提交图片！');

        // }else{
              $username=input('username');
              $title=input('title');
              $userid="";
              $content=input('content');
              $pic=input('active_pic');
              $state=0;
              $pos=0;
              $pubtime=date('Y-m-d H:i:s');
              $data=[     
                  'username'=>$username,       
                  'title'=>$title,
                  'userid'=>$userid,
                  'state'=>$state,
                  'pos'=>$pos,
                  'activephoto'=>$pic,
                  'content'=>$content,                  
                  'pubtime'=>$pubtime
              ];
                        
              $res=$Model->insertGetId($data);
              if($res){
                  $this->success('成功发布','/activelist.html');
              }else{
                  $this->error('发布失败');
              }

        // }
        

    }

    public function activeupdate(){
       $this->judgeLogin();
       $id=input('id');
       $data=Db::name('active')->where('id',$id)->find();
       $this->assign('data', $data);
        // 渲染模板输出
       return $this->fetch('./template/admin/activeupdate.html');

    }
    public function update_active(){
        $id=input('id');
        $Model=Db::name('active');
        $username=input('username');
        $title=input('title');
        $content=input('content');
        $pubtime=input('pubtime');
        $activephoto=input('activephoto');
        $state=input('state');
        $pos=input('pos');
        $userid=input('userid');       
        $data=[            
            'username'=>$username,
            'userid'=>$userid,
            'title'=>$title,
            'state'=>$state,
            'activephoto'=>$activephoto,
            'pos'=>$pos,
            'content'=>$content, 
            'userid'=>$userid,
            'pubtime'=>$pubtime
        ];
        $res=$Model->where('id',$id)->update($data);        
        if($res){
            $this->success('修改成功','/activelist');
        }else{
            $this->error('修改失败');
        }

    }

    public function active_del(){
        $this->judgeLogin();
        $Model=Db::name('active');
        $id=input('id');
        $data=$Model->where('id',$id)->find();
        $this->assign('data',$data); 
         $usersess=session('unc');
         if(empty($usersess)){
              $this->error('还未登陆');

         }else{
               $loginuser=Db::name('user')->where('username','eq',$usersess)
               ->field('class')
               ->find();
               $userclass=$loginuser['class'];
               if($userclass==2){
                    return $this->fetch('./template/admin/active_del.html');
               }else{
                   $this->error('没有权限','/activelist.html');
               }

         }
        
    }

    public function del_active(){
        $this->judgeLogin();
        $id=input('id');
        $Model=Db::name('active');
        $thisdata=$Model->where('id',$id)->find();             
        $imgname=$thisdata['activephoto'];        
        if($imgname){
            $imgpath = "./public/static/images/active/$imgname";
            if($imgpath){
                 unlink($imgpath);
            }
        } 
        $res=$Model->where('id',$id)->delete();
        if($res){
              $this->success('成功删除一条活动资讯','/prolist.html');
        }     

    }  
//wish
    public function wishlist(){
        $this->judgeLogin();
        $list = Db::name('wish')->order('pubtime DESC')->paginate(100);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('./template/admin/wishlist.html');



    }

    public function wishupdate(){
       $this->judgeLogin();
       $id=input('id');
       $data=Db::name('wish')->where('id',$id)->find();
       $this->assign('data', $data);
        // 渲染模板输出
       return $this->fetch('./template/admin/wishupdate.html');

    }

    public function update_wish(){
        $id=input('id');
        $Model=Db::name('wish');
        $username=input('username');
        $title=input('title');
        $artical=input('artical');
        $pubtime=input('pubtime');
        $photo=input('photo');
        $video=input('video');
        $state=input('state');
        $pos=input('pos');
        $userid=input('userid');       
        $data=[            
            'username'=>$username,
            'userid'=>$userid,
            'title'=>$title,
            'state'=>$state,
            'photo'=>$photo,
            'pos'=>$pos,
            'artical'=>$artical, 
            'userid'=>$userid,
            'pubtime'=>$pubtime
        ];
        $res=$Model->where('id',$id)->update($data);        
        if($res){
            $this->success('修改成功','/wishlist');
        }else{
            $this->error('修改失败');
        }

    }

    public function wish_del(){
        $this->judgeLogin();
        $Model=Db::name('wish');
        $id=input('id');
        $data=$Model->where('id',$id)->find();
        $this->assign('data',$data); 
        $usersess=session('unc');
         if(empty($usersess)){
              $this->error('还未登陆');

         }else{
               $loginuser=Db::name('user')->where('username','eq',$usersess)
               ->field('class')
               ->find();
               $userclass=$loginuser['class'];
               if($userclass==2){
                    return $this->fetch('./template/admin/wish_del.html');
               }else{
                   $this->error('没有权限','/wishlist.html');
               }

         }
        
    }

    public function del_wish(){
        $this->judgeLogin();
        $id=input('id');
        $Model=Db::name('wish');
        $thisdata=$Model->where('id',$id)->find();             
        $imgname=$thisdata['photo'];   
        $video=$thisdata['video'];     
        if($imgname && $video){
            $imgpath = "./public/static/images/wish/$imgname";
            if($imgpath){
                unlink($imgpath);
            }
            
            $videopath = "./public/static/images/wish/$video";
            if($videopath){
                unlink($videopath);
            }            
        } 
        $res=$Model->where('id',$id)->delete();
        if($res){
              $this->success('成功删除一条寄语','/wishlist.html');
        }     

    }  

//complain
    public function complainlist(){
        $this->judgeLogin();
        $list = Db::name('complain')->order('complaintime DESC')->paginate(100);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('./template/admin/complainlist.html');



    }

    //是否列为黑名单
    public function complainupdate(){
       $this->judgeLogin();
       $id=input('id');
       $data=Db::name('complain')->where('id',$id)->find();
       $this->assign('data', $data);
        // 渲染模板输出
       return $this->fetch('./template/admin/complainupdate.html');

    }
    
    public function update_complain(){
        $id=input('id');
        $Model=Db::name('complain');
        $username=input('username');
        $complainuser=input('complainuser');
        $explain=input('explain');
        $pubtime=date('Y-m-d H:i:s');
        $userid=input('userid');  
        $num=input('num');    
        $state=input('state');   
        $data=[            
            'username'=>$username,
            'userid'=>$userid,
            'complainuser'=>$complainuser,
            'explain'=>$explain,
            'num'=>$num,
            'state'=>$state,
            'complaintime'=>$pubtime
        ];
        $res=$Model->where('id',$id)->update($data);        
        if($res){
            $this->success('处理成功','/complainlist');
        }else{
            $this->error('处理失败');
        }

    }

//story
    public function storylist(){
        $this->judgeLogin();
        $list = Db::name('story')->order('id DESC')->paginate(100);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('./template/admin/storylist.html');



    }

    public function storyupdate(){
       $this->judgeLogin();
       $id=input('id');
       $data=Db::name('story')->where('id',$id)->find();
       $this->assign('data', $data);
        // 渲染模板输出
       return $this->fetch('./template/admin/storyupdate.html');

    }
    
    public function update_story(){
        $id=input('id');
        $Model=Db::name('story');
        $username=input('username');
        $title=input('title');
        $state=input('state');
        $pos=input('pos');
        $about=input('about');
        $storyphoto=input('storyphoto');
        $pubtime=input('pubtime');
        $userid=input('userid');  
        $content=input('content');
        $data=[            
            'username'=>$username,
            'userid'=>$userid,
            'title'=>$title,
            'content'=>$content,
            'about'=>$about,
            'state'=>$state,
            'pos'=>$pos,
            'storyphoto'=>$storyphoto,
            'pubtime'=>$pubtime,
        ];
        $res=$Model->where('id',$id)->update($data);        
        if($res){
            $this->success('修改成功','/storylist');
        }else{
            $this->error('修改失败');
        }

    }

    public function story_del(){
        $this->judgeLogin();
        $Model=Db::name('story');
        $id=input('id');
        $data=$Model->where('id',$id)->find();
        $this->assign('data',$data); 
        $usersess=session('unc');
         if(empty($usersess)){
              $this->error('还未登陆');

         }else{
               $loginuser=Db::name('user')->where('username','eq',$usersess)
               ->field('class')
               ->find();
               $userclass=$loginuser['class'];
               if($userclass==2){
                    return $this->fetch('./template/admin/story_del.html');
               }else{
                   $this->error('没有权限','/storylist.html');
               }

         }
        
    }

    public function del_story(){
        $this->judgeLogin();
        $id=input('id');
        $Model=Db::name('story');
        $res=$Model->where('id',$id)->delete();
        if($res){
            $this->success('成功删除一条分享','/storylist.html');
        }

    }



//wxuserlist
    public function wxuserlist(){
        $this->judgeLogin();
        $list = Db::name('wxuser')->order('createtime DESC')->paginate(100);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('./template/admin/wxuserlist.html');

    }

    public function wxuserupdate(){
       $this->judgeLogin();
       $id=input('id');
       $data=Db::name('wxuser')->where('id',$id)->find();
       $this->assign('data', $data);
       $this->assign('data',$data); 
       $usersess=session('unc');
       if(empty($usersess)){
               $this->error('还未登陆');
       }else{
               $loginuser=Db::name('user')->where('username','eq',$usersess)
               ->field('class')
               ->find();
               $userclass=$loginuser['class'];
               if($userclass==2){
                     return $this->fetch('./template/admin/wxuserupdate.html');
               }else{
                   $this->error('没有权限','/wxuserlist.html');
               }
        }       

    }

    public function update_wxuser(){
        $id=input('id');
        $Model=Db::name('wxuser');
        $nickname=input('nickname');
        $password=input('password');
        $sex=input('sex');
        $user_phone=input('user_phone');
        $addr=input('addr');
        $photo=input('photo');  
        $createtime=input('createtime');   
        $jf=input('jf');       
        $data=[            
            'nickname'=>$nickname,
            'password'=>$password,
            'sex'=>$sex,
            'user_phone'=>$user_phone, 
            'addr'=>$addr,
            'photo'=>$photo,
            'createtime'=>$createtime,
            'jf'=>$jf,
        ];
        $res=$Model->where('id',$id)->update($data);        
        if($res){
            $this->success('修改成功','/wxuserlist');
        }else{
            $this->error('修改失败');
        }

    }

     public function wxuserdel(){
        $this->judgeLogin();
        $Model=Db::name('wxuser');
        $id=input('id');
        $data=$Model->where('id',$id)->find();
        $this->assign('data',$data); 
        $usersess=session('unc');
        if(empty($usersess)){
              $this->error('还未登陆');

        }else{
               $loginuser=Db::name('user')->where('username','eq',$usersess)
               ->field('class')
               ->find();
               $userclass=$loginuser['class'];
               if($userclass==2){
                     return $this->fetch('./template/admin/wxuser_del.html');
               }else{
                     $this->error('没有权限','/wxuserlist.html');
               }

        }
       
    }

    public function del_wxuser(){
        $this->judgeLogin();
        $id=input('id');
        $Model=Db::name('wxuser');
        $res=$Model->where('id',$id)->delete();
        if($res){
            $this->success('成功删除一个用户','/wxuserlist.html');
        }

    }

//pcuserlist
    public function pcuserlist(){
        $this->judgeLogin();
        $list = Db::name('user')->order('regtime DESC')->paginate(100);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('./template/admin/pcuserlist.html');

    }

    public function pcuserupdate(){
       $this->judgeLogin();
       $id=input('id');
       $data=Db::name('user')->where('id',$id)->find();
       $this->assign('data', $data);
        // 渲染模板输出
       return $this->fetch('./template/admin/pcuserupdate.html');

    }

    public function update_pcuser(){
        $id=input('id');
        $Model=Db::name('user');
        $username=input('username');
        $pwd=input('pwd');
        $truename=input('truename');
        $sex=input('sex');
        $email=input('email');
        $tel=input('tel');
        $qq=input('qq');
        $address=input('address');
        $photo=input('photo');
        $ip=input('ip');
        $usermark=input('usermark');
        $inter=input('inter');
        $regtime=input('regtime');
        $lastlogintime=input('lastlogintime');
        $logintimes=input('logintimes');
        $class=input('class');
        $state=input('state');
        $userID=input('userID');
        $data=[            
            'username'=>$username,
            'pwd'=>$pwd,
            'truename'=>$truename,
            'sex'=>$sex,
            'email'=>$email,
            'tel'=>$tel,            
            'qq'=>$qq,
            'address'=>$address,
            'photo'=>$photo,
            'usermark'=>$usermark,
            'inter'=>$inter,
            'ip'=>$ip,
            'userID'=>$userID,
            'regtime'=>$regtime,
            'logintimes'=>$logintimes,
            'lastlogintime'=>$lastlogintime,
            'class'=>$class,
            'state'=>$state
        ];
        $res=$Model->where('id',$id)->update($data);        
        if($res){
            $this->success('修改成功','/pcuserlist');
        }else{
            $this->error('修改失败');
        }

    }

     public function pcuserdel(){
        $this->judgeLogin();
        $Model=Db::name('user');
        $id=input('id');
        $data=$Model->where('id',$id)->find();
        $this->assign('data',$data); 
        $usersess=session('unc');
        if(empty($usersess)){
              $this->error('还未登陆');

         }else{
               $loginuser=Db::name('user')->where('username','eq',$usersess)
               ->field('class')
               ->find();
               $userclass=$loginuser['class'];
               if($userclass==2){
                     return $this->fetch('./template/admin/pcuser_del.html');
               }else{
                    $this->error('没有权限','/pcuserlist.html');
               }

         }
        
    }

    public function del_pcuser(){
        $this->judgeLogin();
        $id=input('id');
        $Model=Db::name('user');
        $res=$Model->where('id',$id)->delete();
        if($res){
            $this->success('成功删除一个用户','/pcuserlist.html');
        }

    }

// mes
    public function meslist(){
        $this->judgeLogin();
        $list = Db::name('mes')->order('createtime DESC')->paginate(100);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('./template/admin/meslist.html');
    }

     public function mesdel(){
        $this->judgeLogin();
        $Model=Db::name('mes');
        $id=input('id');
        $data=$Model->where('id',$id)->find();
        $this->assign('data',$data); 
        $usersess=session('unc');
        if(empty($usersess)){
              $this->error('还未登陆');

         }else{
               $loginuser=Db::name('user')->where('username','eq',$usersess)
               ->field('class')
               ->find();
               $userclass=$loginuser['class'];
               if($userclass==2){
                      return $this->fetch('./template/admin/mes_del.html');
               }else{
                    $this->error('没有权限','/meslist.html');
               }

         }
       
    }

    //留言审核
    public function mes_sh(){
        $this->judgeLogin();
        $Model=Mes::relation('personinfo');
        $id=input('id');
        $data=$Model->where('id',$id)->find();
        $this->assign('data',$data); 
        return $this->fetch('./template/admin/mes_sh.html');
    }

    public function sh_mes(){
        $id=input('id');
        $state=input('state');
        $createtime=input('createtime');
        $res=Db::name('mes')
        ->where('id', $id)
        ->update([
            'state'  => $state,
            'createtime' => $createtime
        ]);
        if($res){
            $this->success('通过审核','/meslist.html');
        }else{
            $this->error('失败');
        }
        
    }

    public function del_mes(){
        $this->judgeLogin();
        $id=input('id');
        $Model=Db::name('mes');
        $res=$Model->where('id',$id)->delete();
        if($res){
            $this->success('成功删除一条留言','/meslist.html');
        }

    }
	
	  public function _empty($name){
           $this->success('页面跳转中...','/index.html');
    }

    public function test_think(){        
        $data=$_SERVER['REQUEST_URI'];
        $this->assign('data',$data);
        return $this->fetch('test');
    }

// 用于微信小程序测试 

    public function wxloginapi(){
         $code=input('code');
         $login=new Wxlogin();
         echo json_encode($login->login($code));
    }

    public function wxcheckuserinfo(Request $request){  
        $code=input("code");
        $signature=input('signature');
        $rawData=input('rawData');
        
        $login=new Wxlogin();
        $sessionRes=$login->login($code);        
        $valid=$this->checkUserInfo($signature,$rawData,$sessionRes['session_key']);
        echo $valid;

    }

    function checkUserInfo($signatureOri,$rawData,$session_key){
        $signatureSha1=sha1($rawData.$session_key);
        if($signatureOri==$signatureSha1){
              return "校验通过";
        }else{
              return "校验不通过";
        }

    }

//免费公社模板消息
    // public function wxtplmes(Request $request){

    //        $code=input('code');
    //        $formid=input('formId');
    //        $formdata=$request->post('formData/a');
    //        $data=$formdata;
    //        $login=new Wxlogin();
    //        $loginRes=$login->login($code);
    //        $openId=$loginRes['openid'];

 
    //        $tokenUrl='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s';
    //        $tokenUrl=sprintf($tokenUrl,'wx503527dc340335fb','6e0672f7ede2e39b67a5cc3a5b6a687f');


    //        $access_token=curl_get($tokenUrl);
    //        $access_token=json_decode($access_token,true);
    //        $tplMSG=array(
    //             'touser'=>$openId,
    //             'form_id'=>$formid,
    //             'page'=>'pages/index/index',
    //             'template_id'=>'3HF4LkWYbFN7mA9XXsXgDHaT4bmkihOnh4xH3kJymu8',
    //             'data'=>array(
    //                   'keyword1'=>array(
    //                         'value'=>$data['id'],
    //                         'color'=>'#333'
    //                   ),
    //                   'keyword2'=>array(
    //                         'value'=>$data['name'],
    //                         'color'=>'#333'
    //                   ),
    //                   'keyword3'=>array(
    //                         'value'=>$data['date'],
    //                         'color'=>'#333'
    //                   ),
    //                   'keyword4'=>array(
    //                         'value'=>$data['place'],
    //                         'color'=>'#333'
    //                   )

    //             ),
    //             "emphasis_keyword"=>"keyword3.DATA"

    //        );
    //        $tplMSGURL=sprintf('https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=%s',$access_token['access_token']);
    //        $msgResult=curl_post( $tplMSGURL,$tplMSG);
    //        echo $msgResult;

    // }

//闲物分享——模板消息
    // public function wxtplmes1(Request $request){

    //        $code=input('code');
    //        $formid=input('formId');
    //        $formdata=$request->post('formData/a');
    //        $data=$formdata;
    //        $login=new Wxlogin();
    //        $loginRes=$login->login($code);
    //        $openId=$loginRes['openid'];

 
    //        $tokenUrl='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s';
    //        $tokenUrl=sprintf($tokenUrl,'wxd015b1639d2c0e53','1657ba50a24d87c7e89968573db0cb0c');


    //        $access_token=curl_get($tokenUrl);
    //        $access_token=json_decode($access_token,true);
    //        $tplMSG=array(
    //             'touser'=>$openId,
    //             'form_id'=>$formid,
    //             'page'=>'pages/index/index',
    //             'template_id'=>'3HF4LkWYbFN7mA9XXsXgDHaT4bmkihOnh4xH3kJymu8',
    //             'data'=>array(
    //                   'keyword1'=>array(
    //                         'value'=>$data['id'],
    //                         'color'=>'#333'
    //                   ),
    //                   'keyword2'=>array(
    //                         'value'=>$data['name'],
    //                         'color'=>'#333'
    //                   ),
    //                   'keyword3'=>array(
    //                         'value'=>$data['date'],
    //                         'color'=>'#333'
    //                   ),
    //                   'keyword4'=>array(
    //                         'value'=>$data['place'],
    //                         'color'=>'#333'
    //                   )

    //             ),
    //             "emphasis_keyword"=>"keyword3.DATA"

    //        );
    //        $tplMSGURL=sprintf('https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=%s',$access_token['access_token']);
    //        $msgResult=curl_post( $tplMSGURL,$tplMSG);
    //        echo $msgResult;

    // }
	
	/* 
    [getXcxCode 获取微信小程序二维码]
     * @return [type] [小程序二维码图片]
     */
    public function getRrCode(){
        $name=input("name"); 
        $path=input("path");
        //获取参数值
        $moduleid=$this->request->get('moduleid');
        $itemid=$this->request->get('itemid');
 
        $url="https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=".$this->_getAccessToken();
        $data=[
          'scene'=>'1001',  
          'page'=>$path,         
          'width'=>430,
          'auto_color'=>false,
        ];
        
        $data=json_encode($data);
        $result = $this->_requestPost($url,$data);

        if (!$result) {
            return false;
        } 
        $fileName=$name;       
        if ($fileName) {
            //判断file文件中是否存在数据库当中
            $isfile=Db::name('wxqrcode')->where('filename',$fileName)->select();
            if(!$isfile){
               file_put_contents("./public/static/images/wxqrcode/".$fileName.".jpg", $result);
               $datafile=['filename'=>$fileName.".jpg"];
               Db::name('wxqrcode')->insert($datafile);
            }
 
            return "./public/static/images/wxqrcode/".$fileName.".jpg";       
        }
   
    }
 
 
    /**
    * 获取 access_tonken
    * @param string $token_file 用来存储token的临时文件
    */
    private function _getAccessToken($token_file='./access_token') {
 
        // 考虑过期问题，将获取的access_token存储到某个文件中
        $life_time = 7200;
        if (file_exists($token_file) && time()-filemtime($token_file)<$life_time) {
            // 存在有效的access_token
            return file_get_contents($token_file);
        }
        // 免费公社目标URL：      
        // $appId='wx503527dc340335fb';
        // $appSecret='6e0672f7ede2e39b67a5cc3a5b6a687f';  
        // 闲物分享目标URL：
        $appId='wxd015b1639d2c0e53';
        $appSecret='1657ba50a24d87c7e89968573db0cb0c'; 

        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appId."&secret=".$appSecret;
        //向该URL，发送GET请求
        $result = $this->_requestGet($url);
        if (!$result) {
            return false;
        }
        // 存在返回响应结果
        $result_obj = json_decode($result);
        // 写入
        file_put_contents($token_file, $result_obj->access_token);
        return $result_obj->access_token;
    }

    protected function _requestGet($url, $ssl=true) {
        // curl完成
        $curl = curl_init();
 
        //设置curl选项
        curl_setopt($curl, CURLOPT_URL, $url);//URL
        $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '
Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0 FirePHP/0.7.4';
        curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);//user_agent，请求代理信息
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);//referer头，请求来源
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);//设置超时时间
 
        //SSL相关
        if ($ssl) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//禁用后cURL将终止从服务端进行验证
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//检查服务器SSL证书中是否存在一个公用名(common name)。
        }
        curl_setopt($curl, CURLOPT_HEADER, false);//是否处理响应头
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//curl_exec()是否返回响应结果
 
        // 发出请求
        $response = curl_exec($curl);
        if (false === $response) {
            echo '<br>', curl_error($curl), '<br>';
            return false;
        }
        curl_close($curl);
        return $response;
    }
    /**
     * 发送GET请求的方法
     * @param string $url URL
     * @param bool $ssl 是否为https协议
     * @return string 响应主体Content
     */
     protected function _requestPost($url, $data, $ssl=true) {
            //curl完成
            $curl = curl_init();
            //设置curl选项
            curl_setopt($curl, CURLOPT_URL, $url);//URL
            $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '
    Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0 FirePHP/0.7.4';
            curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);//user_agent，请求代理信息
            curl_setopt($curl, CURLOPT_AUTOREFERER, true);//referer头，请求来源
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);//设置超时时间
            //SSL相关
            if ($ssl) {
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//禁用后cURL将终止从服务端进行验证
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//检查服务器SSL证书中是否存在一个公用名(common name)。
            }
            // 处理post相关选项
            curl_setopt($curl, CURLOPT_POST, true);// 是否为POST请求
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);// 处理请求数据
            // 处理响应结果
            curl_setopt($curl, CURLOPT_HEADER, false);//是否处理响应头
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//curl_exec()是否返回响应结果
 
            // 发出请求
            $response = curl_exec($curl);
            if (false === $response) {
                echo '<br>', curl_error($curl), '<br>';
                return false;
            }
            curl_close($curl);
            return $response;
    }

//观澜大水坑服务专页
      //留言审核
    public function dshserver(){
        //$this->judgeLogin();
        return $this->fetch('./template/dsk/dskindex.html');
    }

    public function redwoodaction(){
       return $this->fetch('./template/play/redwoodaction.html');
    }


//test
    public function test(){       
        return $this->fetch('./template/test/test.html');
    }
    public function dute(){       
        return $this->fetch('./template/test/duteicon.html');
    }

    public function testmedia(){       
        return $this->fetch('./template/test/testmedia.html');
    }

/********************发稿数据2020年度，跳转到admin模块*******************************/
    public function public2020(){     
        //只显示曲线，没有发布数据的功能  
        //return $this->fetch('./template/data/pub/2020-1.html');
        //跳转到apply模块，带有发布数据的功能
        $this->redirect('./apply/public2020');
    }


    public function readData(){
      $str = file_get_contents('./public/data/data.json'); 
      $data = json_encode($str);
      echo $data;

      //$str = file_get_contents('./public/data/data1.json'); 
      // $rep = str_replace("\r\n", ',', $str); 
      // $cont = explode(',', $rep);
      // echo json_encode($cont);
      
  }


  public function ajaxMonthData(){
      $id=input('id');
      echo json_encode($id);
  }




}
