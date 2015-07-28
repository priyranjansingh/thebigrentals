<?php
/* @var $this CouponsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Coupons',
);

$this->menu=array(
	array('label'=>'Create Coupons', 'url'=>array('create')),
	array('label'=>'Manage Coupons', 'url'=>array('admin')),
);
?>

<h1>Coupons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
