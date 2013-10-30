<?php
/* @var $this PlatformController */
/* @var $model Platform */

$this->breadcrumbs=array(
	'Platforms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Platform', 'url'=>array('index')),
	array('label'=>'Create Platform', 'url'=>array('create')),
	array('label'=>'Update Platform', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Platform', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Platform', 'url'=>array('admin')),
);
?>

<h1>View Platform #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'p_name',
		'p_short',
		'p_address',
		'p_r_address',
		'p_examine',
		'p_logo_thumb',
		'm_id',
		'created',
	),
)); ?>
