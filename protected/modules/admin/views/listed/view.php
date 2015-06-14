<?php
/* @var $this ListedController */
/* @var $model Listed */

$this->breadcrumbs=array(
	'Listeds'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Listed', 'url'=>array('index')),
	array('label'=>'Create Listed', 'url'=>array('create')),
	array('label'=>'Update Listed', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Listed', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Listed', 'url'=>array('manage')),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
	),
)); ?>
