<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NActiveRecord
 *
 * @author Administrator
 */
class NActiveRecord extends CActiveRecord{
    //put your code here
    protected $chosen = array();
    public function setChosen($field,$array=array()){
        $this->chosen[$field] = $array;
    }
    /**
     * 定义数据库中字段在后台的表现类型
     */
    public function fieldType(){
        
    }
    
    public function chosen(){
        return array(

        );
    }
    
    
}

?>
