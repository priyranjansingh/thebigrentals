<?php
/* @var $this CouponsController */
/* @var $model Coupons */

$this->breadcrumbs=array(
	'Coupons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coupons', 'url'=>array('index')),
	array('label'=>'Manage Coupons', 'url'=>array('admin')),
);
?>

<h1>Create Coupons</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>