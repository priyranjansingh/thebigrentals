<?php
$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	$template->subject => array('view','id' => $template->id),
	'Send This Template'
);
?>
<div class="row-fluid">
  	<div class="span6">
	  	<?php
	        $this->beginWidget('zii.widgets.CPortlet', array(
	            'title'=>$template->subject,
	        ));
	        
	    ?>
	    <div class="row-fluid">
	    	<div class="span3">&nbsp;</div>
	    	<div class="span6"><?php echo $template->email_body; ?></div>
	    	<div class="span3">&nbsp;</div>
	    </div>
	    <?php $this->endWidget(); ?>
    </div>
    <div class="span6">
	<?php
	        $this->beginWidget('zii.widgets.CPortlet', array(
	            'title'=>'Send This Template',
	        ));
	        
	    ?>
	<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'send-template-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
		)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>
		<div class="row-fluid">
			<div class="span2">&nbsp;</div>
			<div class="span8">
				<?php echo $form->labelEx($model,'to'); ?>
				<?php echo $form->textArea($model,'to',array('rows'=>8, 'cols'=>100)); ?>
				<?php echo $form->error($model,'to'); ?>
			</div>
			<div class="span2">&nbsp;</div>
		</div>
		<div class="row-fluid">
			<div class="span4">&nbsp;</div>
			<div class="span4 buttons">
				<?php echo CHtml::submitButton('Send'); ?>
			</div>
			<div class="span4">&nbsp;</div>
		</div>
		<?php $this->endWidget(); ?>

	</div>
	<?php $this->endWidget(); ?>
</div>
</div>