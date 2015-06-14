<?php
/* @var $this ListedController */
/* @var $model Listed */

$this->breadcrumbs=array(
	'Listeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Listed', 'url'=>array('index')),
	array('label'=>'Manage Listed', 'url'=>array('admin')),
);
?>

<h1>Create Listed</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>