<?php
/* @var $this AmenitiesFeaturesController */
/* @var $model AmenitiesFeatures */

$this->breadcrumbs=array(
	'Amenities Features'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AmenitiesFeatures', 'url'=>array('index')),
	array('label'=>'Create AmenitiesFeatures', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#amenities-features-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Amenities Features</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="row-fluid">
  <div class="span12">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Amenities & Features List",
        ));
      ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
            'itemsCssClass'=>'table table-bordered',
	'id'=>'amenities-features-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php $this->endWidget();?>
</div>
</div>
