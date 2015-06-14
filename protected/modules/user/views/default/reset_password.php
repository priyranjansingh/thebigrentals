<?php $baseUrl = Yii::app()->theme->baseUrl; ?>  
<section class="slice slice-lg bg-image" style="background-image:url(<?php echo $baseUrl; ?>/images/backgrounds/full-bg-1.jpg);">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="wp-block default user-form no-margin" id="login_frm" style="display:block"> 
                        <div class="form-header">
                            <h2>Reset Password</h2>
                        </div>
                        <?php
                         $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'reset-password-form',
                        'enableClientValidation' => true,
                        //'enableAjaxValidation'=>true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                        'htmlOptions' => array(
                            'autcomplete' => "off",
                             'class' => "sky-form",
                        ),
                    ));
                    ?>
                        <div class="form-body">
                            <fieldset>                  
                                <section>
                                    <div class="form-group">
                                        <label class="label"> <?php echo $form->labelEx($model, 'password'); ?></label>
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->passwordField($model, 'password'); ?>
                                            <?php echo $form->error($model, 'password'); ?>
                                        </label>
                                    </div>     
                                </section>
                                <section>
                                    <div class="form-group">
                                        <label class="label"> <?php echo $form->labelEx($model, 'confirm_password'); ?></label>
                                        <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                            <?php echo $form->passwordField($model, 'confirm_password'); ?>
                                           <?php echo $form->error($model, 'confirm_password'); ?>
                                        </label>
                                    </div>     
                                </section> 
                                <section>
                                    <?php echo CHtml::submitButton('Change Password', array("class" => "btn btn-base btn-icon btn-icon-right btn-sign-in pull-right")); ?>
                                </section>
                            </fieldset>  
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
