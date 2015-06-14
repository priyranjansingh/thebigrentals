<?php
/* @var $this EmailTemplatesController */
/* @var $model EmailTemplates */

$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	'Create',
);

?>

<h1>Create Email Template</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>