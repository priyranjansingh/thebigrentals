<?php
/* @var $this AmenitiesFeaturesController */
/* @var $model AmenitiesFeatures */

$this->breadcrumbs=array(
	'Amenities Features'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AmenitiesFeatures', 'url'=>array('index')),
	array('label'=>'Create AmenitiesFeatures', 'url'=>array('create')),
	array('label'=>'View AmenitiesFeatures', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AmenitiesFeatures', 'url'=>array('admin')),
);
?>

<h1>Update AmenitiesFeatures <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>