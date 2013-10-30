<?php
/* @var $this LinkmanController */
/* @var $model Linkman */

$this->breadcrumbs=array(
	'Company'=>array('index'),
	$model->id,
);
?>


<?php 
    $addLabel = $model->attributeAddLabels();
    $key = array_keys($addLabel);
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array(
            'class'=>'table',
            'style'=>'text-indent:15px;',
        ),
        'attributes'=>$key,
)); ?>
