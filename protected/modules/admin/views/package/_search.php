<?php
/* @var $this PackageController */
/* @var $model Package */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->label($model,'package_name'); ?>
            <?php echo $form->textField($model,'package_name',array('size'=>60,'maxlength'=>100)); ?>
        </div>
        <div class="span6">
            <?php echo $form->label($model,'properties_no'); ?>
            <?php echo $form->textField($model,'properties_no'); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->label($model,'amount'); ?>
            <?php echo $form->textField($model,'amount'); ?>
        </div>
        <div class="span6">
            <?php echo $form->label($model,'currency'); ?>
            <?php 
                $currencies = Currency::model()->findAll();
                $all_currency = CHtml::listData($currencies, 'id', 'currency'); 
            ?>
            <?php echo $form->dropDownList($model,'currency',$all_currency,array('empty' => 'Select')); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->label($model,'time_period'); ?>
            <?php echo $form->textField($model,'time_period'); ?>
        </div>
        <div class="span6">
            <?php echo $form->label($model,'time_period_unit'); ?>
            <?php echo $form->dropDownList($model,'time_period_unit',  getParam('time_period_unit')); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->label($model,'listings'); ?>
            <?php echo $form->textField($model,'listings'); ?>
        </div>
        <div class="span6">
            <?php echo $form->label($model,'featured'); ?>
            <?php echo $form->textField($model,'featured'); ?>
        </div>
    </div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->