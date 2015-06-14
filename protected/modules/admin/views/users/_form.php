<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'confirm_password'); ?>
		<?php echo $form->passwordField($model,'confirm_password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'confirm_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_position'); ?>
		<?php echo $form->textField($model,'title_position',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title_position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nick_name'); ?>
		<?php echo $form->textField($model,'nick_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nick_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skype'); ?>
		<?php echo $form->textField($model,'skype',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'skype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook_url'); ?>
		<?php echo $form->textField($model,'facebook_url',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'facebook_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'twitter_url'); ?>
		<?php echo $form->textField($model,'twitter_url',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'twitter_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pinterest_url'); ?>
		<?php echo $form->textField($model,'pinterest_url',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'pinterest_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about_me'); ?>
		<?php echo $form->textArea($model,'about_me',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_me'); ?>
	</div>

	<div class="row">
                <?php echo $form->labelEx($model,'package_id'); ?>
		<?php $package_list = CHtml::listData($package, 'id', 'package_name'); ?>
		<?php echo $form->dropDownList($model,'package_id',$package_list,array('empty' => 'Select Package')); ?>
		<?php echo $form->error($model,'package_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php $roles_list = CHtml::listData($roles, 'id', 'role'); ?>
		<?php echo $form->dropDownList($model,'role_id',$roles_list,array('empty' => 'Select Role')); ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_status'); ?>
		<?php echo $form->textField($model,'payment_status'); ?>
		<?php echo $form->error($model,'payment_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_image'); ?>
		<?php echo $form->FileField($model,'user_image',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'user_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_admin'); ?>
		<?php echo $form->dropDownList($model,'is_admin',getParam('is_admin')); ?>
		<?php echo $form->error($model,'is_admin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->