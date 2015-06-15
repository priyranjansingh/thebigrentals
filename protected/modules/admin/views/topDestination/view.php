<?php
/* @var $this TopDestinationController */
/* @var $model TopDestination */

$this->breadcrumbs=array(
	'Top Destinations'=>array('index'),
	$model->place,
);

$this->menu=array(
	array('label'=>'Update Top Destination', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Top Destination', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Top Destination', 'url'=>array('manage')),
);
?>

<h1>Top Destination: <b><?php echo $model->place; ?></b></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'place',
		'image',
		'url',
		),
)); ?>
