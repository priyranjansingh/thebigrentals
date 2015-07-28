<?php
/* @var $this CouponsController */
/* @var $model Coupons */

$this->breadcrumbs=array(
	'Coupons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Coupons', 'url'=>array('index')),
	array('label'=>'Create Coupons', 'url'=>array('create')),
	array('label'=>'Update Coupons', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Coupons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coupons', 'url'=>array('admin')),
);
?>

<h1>View Coupons #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'coupon_code',
		'type',
		'value',
		'valid_till',
		'created_by',
		'modified_by',
		'created_date',
		'modified_date',
		'status',
		'deleted',
	),
)); ?>
