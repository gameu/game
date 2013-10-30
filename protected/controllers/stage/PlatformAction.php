<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameAction
 *
 * @author Administrator
 */
class PlatformAction extends StageAction{
    //put your code here
    
    public function run() {
        $this->setCustomTags(array(
           "rlist","newlist",
        ),'[]');
        $this->controller->renderWithTags('platform');
    }
    
    public function getPlatformDataProvider($options){
       return new CActiveDataProvider("Platform",array(
           "criteria"=>$options
       ));
    }
    
    public function tagRlist(){
        $m = $this->getTagContents('rlist');
        if(isset($m[0])){
            $dataProvider = $this->getPlatformDataProvider(array(
                'condition'=>'`placement`=1 and `examine`=1',
            ));
            $data = $dataProvider->getData();
            $html = '';
            foreach($data as $d){
                $logoPath = $dataProvider->model->getFilePath(null,'images')."/".$d['p_logo_thumb'];
                $html .= Yii::t('nan',$m[0],array(
                    '{p_name}'=>$d['p_name'],
                    '$id'=>$d['id'],
                    '{logo}'=>$logoPath,
                ));
            }
            return $html;
        }
    }
    
    public function tagNewlist(){
        $m = $this->getTagContents('newlist');
       
        if(isset($m[0])){
            $dataProvider = $this->getPlatformDataProvider(array(
                'condition'=>'`examine`=1',
                'order'=>'`created` DESC',
            ));
            $data = $dataProvider->getData();
            $html = '';
            foreach($data as $d){
                $logoPath = $dataProvider->model->getFilePath(null,'images')."/".$d['p_logo_thumb'];
                $html .= Yii::t('nan',$m[0],array(
                    '{p_name}'=>$d['p_name'],
                    '$id'=>$d['id'],
                    '{logo}'=>$logoPath,
                ));
            }
            return $html;
        }
        
    }
    
    
}

?>
