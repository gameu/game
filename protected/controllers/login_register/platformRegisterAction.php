<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of platformRegisterAction
 *
 * @author micheal
 */
class PlatformRegisterAction extends LoginregisterAction{
    //put your code here
    public function run() {
       $model = new PlatformRegisterForm();
       $this->controller->render('platformRegister',array('model'=>$model));
    }
}

?>
