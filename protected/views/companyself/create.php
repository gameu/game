<?php
/* @var $this LinkmanController */
/* @var $model Linkman */

$this->breadcrumbs=array(
	'Company'=>array('index'),
	'Create',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>