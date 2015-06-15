<?php
/* @var $this PropertyController */
/* @var $model Property */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enable_google_street_view'); ?>
		<?php echo $form->textField($model,'enable_google_street_view'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'size'); ?>
		<?php echo $form->textField($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'size_unit'); ?>
		<?php echo $form->textField($model,'size_unit',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lot_size'); ?>
		<?php echo $form->textField($model,'lot_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lot_size_unit'); ?>
		<?php echo $form->textField($model,'lot_size_unit',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rooms'); ?>
		<?php echo $form->textField($model,'rooms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bedrooms'); ?>
		<?php echo $form->textField($model,'bedrooms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bathrooms'); ?>
		<?php echo $form->textField($model,'bathrooms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_built'); ?>
		<?php echo $form->textField($model,'year_built'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'garages'); ?>
		<?php echo $form->textField($model,'garages'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'garage_size'); ?>
		<?php echo $form->textField($model,'garage_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'garaze_size_unit'); ?>
		<?php echo $form->textField($model,'garaze_size_unit',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'basement'); ?>
		<?php echo $form->textField($model,'basement',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'external_constructions'); ?>
		<?php echo $form->textField($model,'external_constructions',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roofing'); ?>
		<?php echo $form->textField($model,'roofing',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_availability'); ?>
		<?php echo $form->textField($model,'date_availability',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'listed_in'); ?>
		<?php echo $form->textField($model,'listed_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'property_status'); ?>
		<?php echo $form->textField($model,'property_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'video_from'); ?>
		<?php echo $form->textField($model,'video_from'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->