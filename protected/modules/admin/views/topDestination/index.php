<?php
/* @var $this TopDestinationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Top Destinations',
);

$this->menu=array(
	array('label'=>'Create TopDestination', 'url'=>array('create')),
	array('label'=>'Manage TopDestination', 'url'=>array('admin')),
);
?>

<h1>Top Destinations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
