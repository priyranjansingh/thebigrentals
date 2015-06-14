<?php
/* @var $this AmenitiesFeaturesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Amenities Features',
);

$this->menu=array(
	array('label'=>'Create AmenitiesFeatures', 'url'=>array('create')),
	array('label'=>'Manage AmenitiesFeatures', 'url'=>array('admin')),
);
?>

<h1>Amenities Features</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
