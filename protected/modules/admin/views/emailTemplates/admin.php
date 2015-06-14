<?php
/* @var $this EmailTemplatesController */
/* @var $model EmailTemplates */

$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#email-templates-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Email Templates</h1>

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
<?php
$role = Yii::app()->user->getState('role');
if($role == "admin"){
	$grid_btns = array(
				'class'=>'CButtonColumn',
				'template'=>'{view}{update}{delete}',
			);
} else {
	$grid_btns = array(
				'class'=>'CButtonColumn',
				'template'=>'{view}',
			);
}

?>
<div class="row-fluid">
  <div class="span12">
  <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Manage Email Templates",
        ));
        
    ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'itemsCssClass'=>'table table-bordered',
	'id'=>'email-templates-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'subject',
		$grid_btns,
	),
)); ?>
<?php $this->endWidget();?>
</div>
</div>