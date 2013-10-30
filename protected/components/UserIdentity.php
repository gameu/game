<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{       
        public $id;
        public function __construct($username, $password,$id) {
            parent::__construct($username, $password);
            $this->id = $id;
        }
        public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
                $self = Company::model()->find("user=:user",array(":user"=>$this->username)); 
                
                if($this->id === "admin"){
                    if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
                    elseif($users[$this->username]!==$this->password)
                            $this->errorCode=self::ERROR_PASSWORD_INVALID;
                    else
                            $this->errorCode=self::ERROR_NONE;
                    return !$this->errorCode;
                }else if($this->id === "self"){
                    if(!$self){
                        $this->errorCode=self::ERROR_USERNAME_INVALID;
                    }  else if($self->pwd != $this->password){
                        $this->errorCode=self::ERROR_PASSWORD_INVALID;
                    }  else {
                        // 赋值给session 
                         Yii::app()->session["id"] = $self->id;
                         Yii::app()->session["name"] = $self->user;
                         Yii::app()->session["mid"] = $self->mid;
                         Yii::app()->session["sign"] = $this->id;
                         $this->errorCode=self::ERROR_NONE;
                    }
                    return !$this->errorCode;
                }else{
                    return 0;
                }
		
	}
}