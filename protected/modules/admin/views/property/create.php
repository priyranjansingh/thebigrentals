<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Property', 'url'=>array('index')),
	array('label'=>'Manage Property', 'url'=>array('admin')),
);
?>

<h1>Create Property</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
			'listed' => $listed,
			'categories' => $categories,
			'amenities' => $amenities,
			'currency' => $currency)); ?>