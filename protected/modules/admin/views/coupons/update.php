<?php
/* @var $this CouponsController */
/* @var $model Coupons */

$this->breadcrumbs=array(
	'Coupons'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coupons', 'url'=>array('index')),
	array('label'=>'Create Coupons', 'url'=>array('create')),
	array('label'=>'View Coupons', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Coupons', 'url'=>array('admin')),
);
?>

<h1>Update Coupons <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>