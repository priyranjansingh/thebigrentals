<?php
/* @var $this EmailTemplatesController */
/* @var $model EmailTemplates */

$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Email Template <?php echo $model->subject; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>