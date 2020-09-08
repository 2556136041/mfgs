<?php 

namespace app\common\controller;

class TestInput{

      function testinput($data){
		  $data = trim($data);
	      $data = stripslashes($data);
	      $data = htmlspecialchars($data);
	      return $data;
	  }


}














?>