<?php
/* @var $this PackageController */
/* @var $model Package */

$this->breadcrumbs=array(
	'Packages'=>array('index'),
	$model->package_name,
);

$this->menu=array(
	array('label'=>'List Package', 'url'=>array('index')),
	array('label'=>'Create Package', 'url'=>array('create')),
	array('label'=>'Update Package', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Package', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Package', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->package_name; ?></h1>
<?php
    $model->currency = Currency::model()->findByPk($model->currency)->currency;
    foreach(getParam('time_period_unit') as $key => $val){
        if($key == $model->time_period_unit){
            $model->time_period_unit = $val;
        }
    }
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'package_name',
		'amount',
		'currency',
		'properties_no',
		'time_period',
		'time_period_unit',
		'listings',
		'featured',
	),
)); ?>
