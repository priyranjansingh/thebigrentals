<div class="row-fluid">

    <div class="span4"></div>
    <div class="span4">
        <div class="portlet" id="yw0">
            <div class="portlet-decoration">
                <div class="portlet-title"> Reset Password</div>
            </div>
            <div class="portlet-content">

                <div class="form" id="login_frm" style="display:block">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'reset-password-form',
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

                    <div class="row-fluid">
                        <div class="span2"></div>
                        <div class="span10">
                            <?php echo $form->labelEx($model, 'password'); ?>
                            <?php echo $form->passwordField($model, 'password'); ?>
                            <?php echo $form->error($model, 'password'); ?>
                        </div>

                    </div>

                    <div class="row-fluid">
                        <div class="span2"></div>
                        <div class="span10">
                            <?php echo $form->labelEx($model, 'confirm_password'); ?>
                            <?php echo $form->passwordField($model, 'confirm_password'); ?>
                            <?php echo $form->error($model, 'confirm_password'); ?>
                        </div>

                    </div>
                    <div class="row-fluid buttons">
                        <div class="span2"></div>
                        <div class="span10">
                            <?php echo CHtml::submitButton('Login'); ?>
                        </div>

                    </div>

                    <?php $this->endWidget(); ?>
                </div><!-- form -->
            </div>
        </div>
    </div>
    <div class="span4"></div>
</div>

