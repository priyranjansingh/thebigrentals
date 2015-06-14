<?php
/* @var $this AmenitiesFeaturesController */
/* @var $model AmenitiesFeatures */

$this->breadcrumbs=array(
	'Amenities Features'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AmenitiesFeatures', 'url'=>array('index')),
	array('label'=>'Create AmenitiesFeatures', 'url'=>array('create')),
	array('label'=>'Update AmenitiesFeatures', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AmenitiesFeatures', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AmenitiesFeatures', 'url'=>array('manage')),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
	),
)); ?>
