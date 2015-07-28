<script type="text/javascript" src="<?php echo base_url()."/js/tinymce/tinymce.min.js" ?>"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea#Banners_text_on_banner",
    plugins: [
        "advlist autolink lists charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "table contextmenu paste"
    ],
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
});
</script>
<?php
/* @var $this BannersController */
/* @var $model Banners */
/* @var $form CActiveForm */
?>

<div class="row-fluid">
	<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banners-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row-12luid">
			<div class="span6">
				<?php echo $form->labelEx($model,'banner_image'); ?>
				<?php echo $form->fileField($model,'banner_image',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'banner_image'); ?>
		</div>

		<div class="span6">
			<?php echo $form->labelEx($model,'link_on_banner'); ?>
			<?php echo $form->textField($model,'link_on_banner',array('size'=>60,'maxlength'=>512)); ?>
			<?php echo $form->error($model,'link_on_banner'); ?>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<?php echo $form->labelEx($model,'text_on_banner'); ?>
			<?php echo $form->textArea($model,'text_on_banner',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'text_on_banner'); ?>
		</div>
	</div>
	<br />
	<div class="row-fluid">
		<div class="span4 buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>