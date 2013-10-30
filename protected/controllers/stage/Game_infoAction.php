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
class Game_infoAction extends StageAction{
    //put your code here
    public function run() {
        $this->setCustomTags(array(
            'info',
        ),'[]');
        $this->controller->render('game_info');
       
    }
    
    public function tagInfo(){
        $m = $this->getTagContents('info');
        if(isset($m[0])){
            $model = Game::model()->findByPk($_GET['id']);
            $logoPath = $model->getFilePath(null,'images')."/".$model->logo;
            $bigimg = $model->getFilePath(null,'images')."/".$model->img;
            $html = Yii::t('nan',$m[0],array(
                '$img'=>$logoPath,
                '$bigimg'=>$bigimg,
                '$name'=>$model->name,
                '$grade'=>$model->estimate,
                '$combat'=>$model->fightform,
                '$state'=>$model->gstate,
                '$develop'=>GlobalFunction::substrcn($model->cCompany, '5','..'),
                '$run'=>GlobalFunction::substrcn($model->rCompany, '5','..'),
                '$type'=>$model->typet,
                '$ui'=>$model->ul,
                '$theme'=>$model->theme,
                '$zhuangtai'=>$model->gstate,
                '$url'=>$model->site,
                '$brief'=>$model->brief,
                '$enter'=>"[进入官网]",
            ));
             return $html;
        }
       
       
//        return $chosen;
    }
    
}

?>
