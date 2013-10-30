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
class GameAction extends StageAction{
    //put your code here
    public function run() {
        $this->setCustomTags(array(
            'newgame',
            'recogame',
        ),'[]');
        $this->controller->render('game');
        
    }
    
    public function getGameDataProvider($options){
       return new CActiveDataProvider("Game",array(
           "criteria"=>$options
       ));
    }
    
     public function tagRecogame(){
        $m = $this->getTagContents('recogame');
        if(isset($m[0])){
            $dataProvider = $this->getGameDataProvider(array(
                'condition'=>'`examine`=1',
                'order'=>'`created` DESC',
            ));
            $data = $dataProvider->getData();
            $html = '';
            foreach($data as $d){
                $logoPath = $dataProvider->model->getFilePath(null,'images')."/".$d['logo'];
                $html .= Yii::t('nan',$m[0],array(
                    '$img'=>$logoPath,
                    '$name'=>$d['name'],
                    '$grade'=>$d['estimate'],
                    '$combat'=>$d['fightform'],
                    '$state'=>$d['gstate'],
                    '$develop'=>GlobalFunction::substrcn($d['cCompany'], '3','..'),
                    '$run'=>GlobalFunction::substrcn($d['rCompany'], '3','..'),
                    '$type'=>$d['typet'],
                    '$ui'=>$d['ul'],
                    '$theme'=>$d['theme'],
                    '$zhuangtai'=>$d['gstate'],
                    '$url'=>Yii::app()->createUrl('stage/game_info',array('id'=>$d['id'])),
                ));
            }
        }
        return $html;
    }
    
    public function tagNewgame(){
        $m = $this->getTagContents('newgame');
        if(isset($m[0])){
            $dataProvider = $this->getGameDataProvider(array(
                'condition'=>'`examine`=1',
                'order'=>'`created` DESC',
            ));
            $data = $dataProvider->getData();
            $html = '';
            foreach($data as $d){
                $logoPath = $dataProvider->model->getFilePath(null,'images')."/".$d['logo'];
                $html .= Yii::t('nan',$m[0],array(
                    '$img'=>$logoPath,
                    '$name'=>$d['name'],
                    '$type'=>$d['typet'],
                    '$ui'=>$d['ul'],
                    '$theme'=>$d['theme'],
                    '$zhuangtai'=>$d['gstate'],
                    '$url'=>Yii::app()->createUrl('stage/game_info',array('id'=>$d['id'])),
                ));
            }
        }
        return $html;
    }
    
}

?>
