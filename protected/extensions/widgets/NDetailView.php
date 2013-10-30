<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NDetailView
 *
 * @author Administrator
 */
Yii::import('zii.widgets.CDetailView');
class NDetailView extends CDetailView{
    //put your code here
    protected $fieldType;
    protected $chosen;
    public function init() {
        parent::init();
        $this->fieldType = $this->data->fieldType();
        $this->chosen = $this->data->chosen();
    }
    protected function renderItem($options, $templateData) {
//        var_dump($templateData);
        if($this->fieldType[$options['name']]=='image') {
             $temptag = '';
             $imagechosen = $this->chosen[$options['name']];
             $src = $this->data->getFilePath($templateData['{value}'],'images');
             $width = $imagechosen['width'];
             $height = $imagechosen['height'];
             $temptag .= "<div style='width:{$width}px;height:{$height}px;overflow:hidden;'>";
             $temptag .= $value = CHtml::image ($src,'',array(
                 'class'=>'fl',
//                 'style'=>"width:{$imagechosen['width']};height:{$imagechosen['height']};",
             ));
             $temptag .= "</div>";
            $templateData['{value}'] = $temptag;
        }
        parent::renderItem($options, $templateData);
    }
}

?>
