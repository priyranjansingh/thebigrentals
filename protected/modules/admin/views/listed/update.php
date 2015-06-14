<?php
/* @var $this ListedController */
/* @var $model Listed */

$this->breadcrumbs=array(
	'Listeds'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Listed', 'url'=>array('index')),
	array('label'=>'Create Listed', 'url'=>array('create')),
	array('label'=>'View Listed', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Listed', 'url'=>array('manage')),
);
?>

<h1>Update <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>