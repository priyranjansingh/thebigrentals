<?php
/* @var $this ListedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Listeds',
);

$this->menu=array(
	array('label'=>'Create Listed', 'url'=>array('create')),
	array('label'=>'Manage Listed', 'url'=>array('admin')),
);
?>

<h1>Listeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
