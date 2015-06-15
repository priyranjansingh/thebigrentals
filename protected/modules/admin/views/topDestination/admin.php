<?php
/* @var $this TopDestinationController */
/* @var $model TopDestination */

$this->breadcrumbs=array(
	'Top Destinations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Top Destination', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#top-destination-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row-fluid">
    <div class="span12">
<h1>Manage Top Destinations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
    </div><!-- search-form -->
</div>
<div class="row-fluid">
    <div class="span12">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => "Top Destinations List",
        ));
        ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'itemsCssClass' => 'table table-bordered',
	'id'=>'top-destination-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'place',
		'image',
		'url',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php $this->endWidget(); ?>
    </div>
</div>