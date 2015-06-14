<?php $baseUrl = Yii::app()->theme->baseUrl; ?>

 <?php
        $login_display = "block";
        $change_password_display = "none";
        $login_errors = $model->errors;
        $change_password_errors = $change_password_model->errors;
        if (!empty($login_errors)) {
            $login_display = "block";
            $change_password_display = "none";
        } else if (!empty($change_password_errors)) {
            $change_password_display = "block";
            $login_display = "none";
        }
        ?>
<section class="slice slice-lg bg-image" style="background-image:url(<?php echo $baseUrl; ?>/images/backgrounds/full-bg-1.jpg);">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <?php
if (!empty($mail_sent_message)) {
    ?>           
    <div class="success_msg">
        <?php
        echo $mail_sent_message;
        ?>
    </div>
    <?php
}
?>
                    <div class="wp-block default user-form no-margin" id="login_frm" style="display:<?php echo $login_display; ?>"> 
                        <div class="form-header">
                            <h2>Sign in to your account</h2>
                        </div>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'login-form',
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
                                        <label class="label"><?php echo $form->labelEx($model, 'username'); ?></label>
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($model, 'username'); ?>
                                            <?php echo $form->error($model, 'username'); ?>
                                        </label>
                                    </div>     
                                </section>
                                <section>
                                    <div class="form-group">
                                        <label class="label"><?php echo $form->labelEx($model, 'password'); ?></label>
                                        <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                            <?php echo $form->passwordField($model, 'password'); ?>
                                            <?php echo $form->error($model, 'password'); ?>
                                        </label>
                                    </div>     
                                </section> 
                                <section>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="checkbox"><input type="checkbox" name="remember" checked><i></i>Keep me logged in</label>
                                        </div>
                                    </div>
                                </section>

                                <section>
                                    <?php echo CHtml::submitButton('Login', array("class" => "btn btn-base btn-icon btn-icon-right btn-sign-in pull-right")); ?>
                                </section>
                            </fieldset>  
                        </div>
                        <?php $this->endWidget(); ?>
                        <div class="form-footer">
                            <p>Lost your password? <a href="#" id="forgot_pass">Click here to recover.</a></p>
                            <p>New User ? <a href="<?php echo base_url() ?>/user/register" >Click here to Sign Up.</a></p>
                        </div>
                    </div>
                    <div class="wp-block default user-form no-margin" style="display:<?php echo $change_password_display; ?>" id="forgot_pass_frm"> 
                        <div class="form-header">
                            <h2>Password Recovery</h2>
                        </div>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'change-password-form',
                            'enableClientValidation' => true,
                            'htmlOptions' => array(
                                'autcomplete' => "off",
                                 'class' => "sky-form",
                            ),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                        ));
                        ?>
                        <div class="form-body">
                            <fieldset>                  
                                <section>
                                    <div class="form-group">
                                        <label class="label"> <?php echo $form->labelEx($change_password_model, 'username'); ?></label>
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                          <?php echo $form->textField($change_password_model, 'username'); ?>
                                         <?php echo $form->error($change_password_model, 'username'); ?>
                                        </label>
                                    </div>     
                                </section>

                                <section>
                                    <?php echo CHtml::submitButton('Submit', array("class" => "btn btn-base btn-icon btn-icon-right btn-sign-in pull-right")); ?>
                                </section>
                            </fieldset>  
                        </div>
                        <?php $this->endWidget(); ?>
                        <div class="form-footer">
                            <p><a href="#" id="login_back">Back to login.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("#forgot_pass").click(function() {
            $("#forgot_pass_frm").show();
            $("#login_frm").hide();
        });
        $("#login_back").click(function() {
            $("#forgot_pass_frm").hide();
            $("#login_frm").show();
        });

    });
</script>    