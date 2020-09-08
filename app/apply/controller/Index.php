<?php 

namespace app\apply\controller;
use think\Controller;
use think\View;
use think\Db;
use think\File;
use think\Cookie;
use think\Session;


class Index extends Controller
{
   public function index(){

     
   }	



  /********************************上传数据，显示曲线图********************************/ 
   
  
  public function _empty($name){
        $this->error('页面跳转中...','/apply/emptyurl');
  }

  public function emptyurl(){
        return $this->fetch('emptyurl');
  }
  //judgelogin
  private function judgePuncLogin(){
        if(!session('punc')){
            $this->error('请登陆','/apply/publicnewsdatalogin.html');

        }
  }

  public function readData(){
      //只读取data.json这个文件的数据，要求这个文件的名字不能变，且数据是最新的
      $str = file_get_contents('./public/data/data.json'); 
      $data = json_encode($str);
      echo $data;

      //$str = file_get_contents('./public/data/data1.json'); 
      // $rep = str_replace("\r\n", ',', $str); 
      // $cont = explode(',', $rep);
      // echo json_encode($cont);
      
  }

  public function public2020(){       
      return $this->fetch('2020');
  }

  // public function public2020_1(){       
  //     return $this->fetch('./template/data/pub/2020.html');
  // }

  public function ajaxMonthData(){
      $id=input('id');
      echo json_encode($id);
  }

  // 发布发送新闻数据
  // 
  public function publicnewsdatalogin(){
      return $this->fetch("publicnewsdatalogin");
  }

  public function checkuser(){
      $pwd=input('pwd');
      $d=date("Ymd");
      if($d==$pwd){
          // $this->success('登陆成功','/index');
          session('punc','dute'.$d);
          echo 1;
      }else{
          echo 0;
      }        
  }

  public function publicnewsdata(){
     $this->judgePuncLogin();
     return $this->fetch("publicnewsdata");
  }

  //上传json数据文件
  public function upload_newsdata(){
      // tp框架自带的方法
      // $file = request()->file('file');
      // $info = $file->validate(['size'=>1024*1024*1,'ext'=>'json'])->move(ROOT_PATH . 'public' . DS . '/data');
      // if($info){
      //     $filename=$info->getSaveName();           
      //     $this->assign('filename',$filename);
      //     return $this->fetch("publicnewsdata");         
      // }else{
      //     $error = $file->getError();
      //     $this->assign('error',$error);
      //     return $this->fetch("publicnewsdata");             
      // }
      
      //自定义的方法
      $this->judgePuncLogin();        
      $allowedExts=array("json");
      $path=ROOT_PATH . "public/data/" ;
      //$error = $this->uploadFile($allowedExts,$path);
      // 调用自己在extend里自定义的方法
      $upload=new \myfunction\Functions();
      $error = $upload->uploadFile($allowedExts,$path);
      
      if($error == 2 || $error == 1){
          $this->success('提交成功','/apply/public2020');          
      }else{
          $this->assign('error',$error);
          return $this->fetch("publicnewsdata");
      }  
  }

  public function showmovingdata(){
         return $this->fetch("showmovingdata");
  }

  public function clock(){
         return $this->fetch("clock");
  }

  public function clock1(){
         return $this->fetch("clock1");
  }



/**************************************test****************************************/

  public function testaxios(){
         return $this->fetch("test/testaxios");
  }
  public function testajax(){
         return $this->fetch("test/testajax");
  }

  public function testmap(){
         return $this->fetch("test/testmap");
  }

  public function testfromipgetaddr(){
         return $this->fetch("test/testfromipgetaddr");
  }

  public function testgetcityweather(){
         return $this->fetch("test/testgetcityweather");
  }

  public function testexportinport(){
         return $this->fetch("test/testexportinport");
  }

  public function testdate(){
         echo date("Y-m-d H:i:s");
  }

  public function testextend(){
        $path = "data.json";
        $arr = explode(".",$path);
       
        echo "文件名：".$arr[0]." 后缀：".$arr[1];
  }




}
