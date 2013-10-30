<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('validform',"
    seajs.use('$baseUrl/js/admin/validform.js');
",CClientScript::POS_END);

$this->breadcrumbs=array(
    '游戏管理',
);

?>


<?php
 
?>
<?php
    $urlPrefix='Yii::app()->createUrl("/'.$modelName.'/';
    $this->widget('ext.mylib.NGridView',$options);
?>
    
   