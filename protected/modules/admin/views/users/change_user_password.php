<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<h1>Change Password</h1>
<div class="row-fluid">
    <div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
             'id' => 'change-password-form',
                        'enableClientValidation' => true,
                        //'enableAjaxValidation'=>true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                        'htmlOptions' => array(
                            'autcomplete' => "off"
                        ),
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <div class="row-fluid">
            <div class="span4">
              <?php echo $form->labelEx($model, 'current_password'); ?>
                            <?php echo $form->passwordField($model, 'current_password'); ?>
                            <?php echo $form->error($model, 'current_password'); ?>
            </div>
            <div class="span8">
               
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">
              <?php echo $form->labelEx($model, 'password'); ?>
                            <?php echo $form->passwordField($model, 'password'); ?>
                            <?php echo $form->error($model, 'password'); ?>
            </div>
            <div class="span8">
               
            </div>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <?php echo $form->labelEx($model, 'confirm_password'); ?>
                            <?php echo $form->passwordField($model, 'confirm_password'); ?>
                            <?php echo $form->error($model, 'confirm_password'); ?>
            </div>
            <div class="span8">
            </div>
        </div>

       




        <div class="row buttons">
            <?php echo CHtml::submitButton('Create'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>