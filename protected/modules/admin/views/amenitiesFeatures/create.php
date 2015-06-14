<?php
/* @var $this AmenitiesFeaturesController */
/* @var $model AmenitiesFeatures */

$this->breadcrumbs=array(
	'Amenities Features'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AmenitiesFeatures', 'url'=>array('index')),
	array('label'=>'Manage AmenitiesFeatures', 'url'=>array('admin')),
);
?>

<h1>Create AmenitiesFeatures</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>