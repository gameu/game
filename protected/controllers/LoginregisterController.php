<?php

class LoginregisterController extends NController{
    
        public $layout = '//layouts/login_default';
        public function actions(){
		// return external action classes, e.g.:
		return array(
                    'platformLogin'=>'application.controllers.login_register.PlatformLoginAction',
                    'platformRegister'=>'application.controllers.login_register.PlatformRegisterAction',
                     // captcha action renders the CAPTCHA image displayed on the contact page
                    'captcha'=>array(
                            'class'=>'CCaptchaAction',
                            'backColor'=>0xFFFFFF, 
                            'maxLength'=>'4',       // 最多生成几个字符
                             'minLength'=>'2',       // 最少生成几个字符
                           'height'=>'40'
                    ), 
		);
	}
        
        public function actionIndex(){
            echo "loginIndex";
        }
        public function actionlogincheck(){
            if(isset($_POST)){
                      $username = isset($_POST['username'])? $_POST['username']:"";
                      $password = isset($_POST['password'])? $_POST['password']:"";
                      if(empty($username)||empty($password)) return;
                      $uAndp = array(
                            'name'=>array(
                                     'field'=>'user',
                                     'value'=>$username,
                                 ),
                             'pwd'=>array(
                                     'field'=>'pwd',
                                     'value'=>$password,
                                 ),
                        );
                        if(UserIdentity::islogin($uAndp,"Company"))
                            echo "成功！";
                        else
                            echo "失败！";
                      
            }
        }
        public function actionRegistercheck(){
           
//            $companymessage = array("user","mail","pwd","name","short","url","address","tel","city","about_src");
//            $linkmanmessage = array("c_name","post","c_qq","c_tel");
//            $platformmessage = array("p_name","p_short","p_address","brief");
            $message = array(
                "postCompany"=>array("user","mail","pwd","name","short","url","address","tel","city","about_src"),
                "postPlatform"=>array("c_name","post","c_qq","c_tel"),
                "postLinkman"=>array("p_name","p_short","p_address","brief"),
            );
            if(isset($_POST['PlatformRegisterForm'])){
                $post = $_POST['PlatformRegisterForm'];
                $messagearray = array();
                foreach ($post as $field=>$value){
                    foreach ($message as $type=>$type_each){
                        if(in_array($field,$type_each)){
                           if(!isset($messagearray[$type])) $messagearray[$type] = array();
                           $messagearray[$type][$field] = $value;
                        }
                    }
                }
                
                var_dump($messagearray);
//                $postCompany["user"] = $post["user"];
                 
            }
        }
}