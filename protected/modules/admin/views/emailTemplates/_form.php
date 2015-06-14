<script type="text/javascript" src="<?php echo base_url()."/js/tinymce/tinymce.min.js" ?>"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea#EmailTemplates_email_body",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<?php
/* @var $this EmailTemplatesController */
/* @var $model EmailTemplates */
/* @var $form CActiveForm */
?>
<div class="row-fluid">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-templates-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row-fluid">
	<div class="span4">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>
	
	<div class="span8">
		<?php echo $form->labelEx($model,'email_body'); ?>
		<?php echo $form->textArea($model,'email_body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'email_body'); ?>
	</div>
	</div>

	<div class="row-fluid">
		<div class="span4 buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>