<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Property', 'url'=>array('create')),
	array('label'=>'Manage Property', 'url'=>array('manage')),
);
?>

<h1>Update: <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_update', array(
			'model' => $model,
            'listed' => $listed,
            'categories' => $categories,
            'amenities' => $amenities,
            'currency' => $currency,
            'modelAmenities' => $modelAmenities,
            'modelPrices' => $modelPrices,
            'modelGallery' => $modelGallery
			)); ?>