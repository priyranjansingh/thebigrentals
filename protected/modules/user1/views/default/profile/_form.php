<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<div class="row-fluid">
    <div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'profile-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php //echo $form->errorSummary($model); ?>

        <div class="row-fluid">
            <div class="span4">
                <?php echo $form->labelEx($model, 'title_position'); ?>
                <?php echo $form->textField($model, 'title_position', array('size' => 60, 'maxlength' => 256)); ?>
                <?php echo $form->error($model, 'title_position'); ?>
            </div>
            <div class="span8">
                <?php echo $form->labelEx($model, 'first_name'); ?>
                <?php echo $form->textField($model, 'first_name', array('size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'first_name'); ?>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <?php echo $form->labelEx($model, 'last_name'); ?>
                <?php echo $form->textField($model, 'last_name', array('size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'last_name'); ?>
            </div>
            <div class="span8">
                <?php echo $form->labelEx($model, 'nick_name'); ?>
                <?php echo $form->textField($model, 'nick_name', array('size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'nick_name'); ?>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <?php echo $form->labelEx($model, 'phone'); ?>
                <?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'phone'); ?>
            </div>
            <div class="span8">
                <?php echo $form->labelEx($model, 'mobile'); ?>
                <?php echo $form->textField($model, 'mobile', array('size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'mobile'); ?>
            </div>
        </div>


        <div class="row-fluid">
            <div class="span4">
                <?php echo $form->labelEx($model, 'website'); ?>
                <?php echo $form->textField($model, 'website', array('size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'website'); ?>
            </div>
            <div class="span8">
                <?php echo $form->labelEx($model, 'skype'); ?>
                <?php echo $form->textField($model, 'skype', array('size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'skype'); ?>
            </div>
        </div>


        <div class="row-fluid">
            <div class="span4">
                <?php echo $form->labelEx($model, 'facebook_url'); ?>
                <?php echo $form->textField($model, 'facebook_url', array('size' => 60, 'maxlength' => 256)); ?>
                <?php echo $form->error($model, 'facebook_url'); ?>
            </div>
            <div class="span8">
                <?php echo $form->labelEx($model, 'twitter_url'); ?>
                <?php echo $form->textField($model, 'twitter_url', array('size' => 60, 'maxlength' => 256)); ?>
                <?php echo $form->error($model, 'twitter_url'); ?>
            </div>
        </div>



        <div class="row-fluid">
            <div class="span4">
                <?php echo $form->labelEx($model, 'pinterest_url'); ?>
                <?php echo $form->textField($model, 'pinterest_url', array('size' => 60, 'maxlength' => 256)); ?>
                <?php echo $form->error($model, 'pinterest_url'); ?>
            </div>
            <div class="span8">
                <?php echo $form->labelEx($model, 'about_me'); ?>
                <?php echo $form->textArea($model, 'about_me', array('style'=>'width: 200px; height: 80px;resize: none;')); ?>
                <?php echo $form->error($model, 'about_me'); ?>
            </div>
        </div>


        <div class="row-fluid">
            <div class="span4">
                <?php echo $form->labelEx($model, 'user_image'); ?>
                <?php echo $form->FileField($model, 'user_image', array('size' => 60, 'maxlength' => 256)); ?>
                <?php echo $form->error($model, 'user_image'); ?>
            </div>
            <div class="span8">
                <img src="<?php //echo base_url();  ?>" >
            </div>
        </div>




        <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>