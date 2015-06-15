<?php
/* @var $this TopDestinationController */
/* @var $model TopDestination */

$this->breadcrumbs=array(
	'Top Destinations'=>array('index'),
	$model->place=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Top Destination', 'url'=>array('index')),
	array('label'=>'View Top Destination', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Top Destination', 'url'=>array('manage')),
);
?>

<h1>Update <?php echo $model->place; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>