<?php
/* @var $this TopDestinationController */
/* @var $model TopDestination */

$this->breadcrumbs=array(
	'Top Destinations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Top Destination', 'url'=>array('manage')),
);
?>

<h1>Add Top Destination</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>