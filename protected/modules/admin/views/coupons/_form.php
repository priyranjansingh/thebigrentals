<?php
/* @var $this CouponsController */
/* @var $model Coupons */
/* @var $form CActiveForm */
?>

<div class="row-fluid">
	<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coupons-form',
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
			<?php echo $form->labelEx($model,'coupon_code'); ?>
			<?php echo $form->textField($model,'coupon_code',array('size'=>16,'maxlength'=>16)); ?><a href="javascript:void(0);" id="generate">Generate Coupon</a>
			<?php echo $form->error($model,'coupon_code'); ?>
		</div>

		<div class="span6">
			<?php echo $form->labelEx($model,'type'); ?>
			<?php echo $form->dropDownList($model,'type',Yii::app()->params['coupon_type'],array("empty" => "Select Coupon Type", )); ?>
			<?php echo $form->error($model,'type'); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6">
			<?php echo $form->labelEx($model,'value'); ?>
			<?php echo $form->textField($model,'value',array('size'=>16,'maxlength'=>16)); ?>
			<?php echo $form->error($model,'value'); ?>
		</div>

		<div class="span6">
			<?php echo $form->labelEx($model,'valid_till'); ?>
			<?php // echo $form->textField($model,'valid_till'); ?>
			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'name'=>'Coupons[valid_till]',
				    // additional javascript options for the date picker plugin
				    'options'=>array(
				        'showAnim' => 'fold',
				        'changeMonth' => true,
      					'changeYear' => true,
      					'dateFormat' => 'yy-mm-dd'
				    ),
				    'htmlOptions'=>array(
				        'style'=>'height:20px;'
				    ),
				));
			?>
			<?php echo $form->error($model,'valid_till'); ?>
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
<script>

$(document).ready(function(){
	$("#generate").click(function(){
    	var text = "";
    	var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	    for( var i=0; i < 8; i++ ){
	        text += possible.charAt(Math.floor(Math.random() * possible.length));
	    }

	    $("#Coupons_coupon_code").val(text);

		});
})

</script>