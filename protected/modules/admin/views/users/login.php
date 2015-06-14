<div class="row-fluid">
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
    <div class="span4"></div>
    <div class="span4">
        <?php
        /* @var $this BackendUserController */
        /* @var $model LoginForm */
        /* @var $form CActiveForm  */

        $this->pageTitle = Yii::app()->name . ' - Login';
        ?>
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

        <div class="portlet" id="yw0">
            <div class="portlet-decoration">
                <div class="portlet-title">Admin Login</div>
            </div>
            <div class="portlet-content">

                <div class="form" id="login_frm" style="display:<?php echo $login_display; ?>">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
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
                    <?php echo $form->labelEx($model, 'username'); ?>
<?php echo $form->textField($model, 'username'); ?>
<?php echo $form->error($model, 'username'); ?>
                        </div>

                    </div>

                    <div class="row-fluid">
                        <div class="span2"></div>
                        <div class="span10">
<?php echo $form->labelEx($model, 'password'); ?>
<?php echo $form->passwordField($model, 'password'); ?>
<?php echo $form->error($model, 'password'); ?>
                        </div>

                    </div>

                    <div class="row-fluid rememberMe">
                        <div class="span2"></div>
                        <div class="span10">
<?php echo $form->checkBox($model, 'rememberMe', array("style" => "float:left;")); ?>
<?php echo $form->label($model, 'rememberMe', array("style" => "float:left;width:80%;")); ?>
<?php echo $form->error($model, 'rememberMe'); ?>

                        </div>

                    </div>

                    <div class="row-fluid buttons">
                        <div class="span2"></div>
                        <div class="span10">
<?php echo CHtml::submitButton('Login'); ?>
                            <span style="margin-left:10px;"><a id="forgot_pass" href="#">Forgot Password ?</a></span>    
                        </div>

                    </div>

<?php $this->endWidget(); ?>
                </div><!-- form -->

                <!-- change password form-->

                <div class="form" style="display:<?php echo $change_password_display; ?>" id="forgot_pass_frm">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'change-password-form',
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'autcomplete' => "off"
    ),
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

                    <div class="row-fluid">
                        <div class="span2"></div>
                        <div class="span10">
                    <?php echo $form->labelEx($change_password_model, 'username'); ?>
<?php echo $form->textField($change_password_model, 'username'); ?>
<?php echo $form->error($change_password_model, 'username'); ?>
                        </div>

                    </div>


                    <div class="row-fluid buttons">
                        <div class="span2"></div>
                        <div class="span10">
<?php echo CHtml::submitButton('Submit'); ?>
                            <span style="margin-left:10px;"><a id="login_back" href="#">Back to Login</a></span> 
                        </div>

                    </div>

<?php $this->endWidget(); ?>
                </div><!-- form -->


                <!-- end of change password form -->





            </div>
        </div>


    </div>
    <div class="span4"></div>
</div>

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
