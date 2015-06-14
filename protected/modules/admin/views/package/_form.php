<?php
/* @var $this PackageController */
/* @var $model Package */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'package-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row-fluid">
            <div class="span6">
                <?php echo $form->labelEx($model,'package_name'); ?>
		<?php echo $form->textField($model,'package_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'package_name'); ?>
            </div>
            <div class="span6">
                <?php echo $form->labelEx($model,'properties_no'); ?>
		<?php echo $form->textField($model,'properties_no'); ?>
		<?php echo $form->error($model,'properties_no'); ?>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <?php echo $form->labelEx($model,'currency'); ?>
                <?php $all_currency = CHtml::listData($currencies, 'id', 'currency'); ?>
		<?php echo $form->dropDownList($model,'currency',$all_currency); ?>
		<?php echo $form->error($model,'currency'); ?>
            </div>
            <div class="span6">
                <?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6">
                <?php echo $form->labelEx($model,'time_period_unit'); ?>
		<?php echo $form->dropDownList($model,'time_period_unit',  getParam('time_period_unit')); ?>
		<?php echo $form->error($model,'time_period_unit'); ?>
            </div>
            <div class="span6">
                <?php echo $form->labelEx($model,'time_period'); ?>
		<?php echo $form->textField($model,'time_period'); ?>
		<?php echo $form->error($model,'time_period'); ?>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6">
                <?php echo $form->labelEx($model,'listings'); ?>
		<?php echo $form->textField($model,'listings'); ?>
		<?php echo $form->error($model,'listings'); ?>
            </div>
            <div class="span6">
                <?php echo $form->labelEx($model,'featured'); ?>
		<?php echo $form->textField($model,'featured'); ?>
		<?php echo $form->error($model,'featured'); ?>
            </div>
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->