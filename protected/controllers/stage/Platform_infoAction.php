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
class Platform_infoAction extends StageAction{
    //put your code here
    public function run() {
        $this->setCustomTags(array(
             'info','contact',
        ),'[]');
        $this->controller->renderWithTags('platform_info');
       
    }
    
    public function tagInfo(){
          $model = Platform::model()->findByPk($_GET['id']);
          $m = $this->getTagContents('info');
          if(isset($m[0])){
              $pgame = new Pgame();
              $count = $pgame->count('`p_id`='.$_GET['id']);
              $logoPath = $model->getFilePath(null,'images')."/".$model->p_logo_thumb;
              $html = Yii::t('nan',$m[0],array(
                    '$name'=>$model->p_name,
                    '$logo'=>$logoPath,
                    '$intro'=>$model->brief,
                    '$tel'=>$model->tel,
                    '$url'=>$model->p_address,
                    '$count'=>$count,
              ));
              return $html;
          }
        
    }
    
    public function tagContact(){
        $m = $this->getTagContents('contact');
        if(isset($m[0])){
            $dataProvider = new CActiveDataProvider('Linkman',array(
                'criteria'=>array(
                    'condition'=>'t.`p_id`='.$_GET['id'],
                    'order'=>'t.`id` DESC',
                    'with'=>array(
                        'company'
                    ),
                ),
            ));
            $data = $dataProvider->getData();
           
            if(!empty ($data)){
                $html = Yii::t('nan',$m[0],array(
                    '$name'=>$data[0]['c_name'],
                    '$post'=>$data[0]['post'],
                    '$qq'=>$data[0]['c_qq'],
                    '$tel'=>$data[0]['c_tel'],
                    '$city'=>$data[0]->company['city'],
                ));
            }else{
                $html = $m[0];
            }
            return $html;
        }
    }
    
}

?>
