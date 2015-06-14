<?php
/* @var $this EmailTemplatesController */
/* @var $model EmailTemplates */

$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	$model->subject,
);

$this->menu=array(
	array('label'=>'Add Email Templates', 'url'=>array('create')),
	array('label'=>'Manage Email Templates', 'url'=>array('manage')),
	array('label'=>'Update Email Templates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Send This Template', 'url'=>array('send', 'id'=>$model->id)),
);
?>

<h1><?php echo $model->subject; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'subject',
		array(
            'name' => 'email_body',
            'type' => 'raw',
            'value' => $model->email_body
        ),
	),
)); ?>

<div class="row-fluid">
  <div class="span12">
  <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Email Template Sent To",
        ));
        
    ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'itemsCssClass'=>'table table-bordered',
	'id'=>'email-sent-grid',
	'dataProvider'=>$email->search(),
	'columns'=>array(
		'sent_to',
		// 'sent_by',
		array(
            'name' => 'sent_by',
            'type' => 'raw',
            'value' => array($this, 'gridUserName')
        )
		// $grid_btns,
	),
)); ?>
<?php $this->endWidget();?>
</div>
</div>
