<?php $baseUrl = Yii::app()->theme->baseUrl; ?>   
<section class="slice slice-lg bg-image" style="background-image:url(<?php echo $baseUrl; ?>/images/backgrounds/full-bg-1.jpg);">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">                   
                    <div class="wp-block default user-form no-margin">
                        <div class="form-header">
                            <h2>Create your own account</h2>
                        </div>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'registration-form',
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
                            <fieldset class="no-padding">           
                                <section class=""> 
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-envelope-o"></i>
                                                         <?php echo $form->textField($model, 'email',array("placeholder"=>"Email *")); ?>
                                                        <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                                         <?php echo $form->error($model, 'email'); ?>
                                                    </label>
                                                </div>  
                                            </div>               
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="input">
                                                    <i class="icon-append fa fa-lock"></i>
                                                    <?php echo $form->passwordField($model, 'password',array("placeholder"=>"Password *")); ?>
                                                    <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                                    <?php echo $form->error($model, 'password'); ?>
                                                </label>
                                            </div>               
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="input">
                                                    <i class="icon-append fa fa-lock"></i>
                                                     <?php echo $form->passwordField($model, 'confirm_password',array("placeholder"=>"Confirm Password *")); ?>
                                                    <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                                    <?php echo $form->error($model, 'confirm_password'); ?>
                                                </label>
                                            </div>               
                                        </div>
                                    </div>   
                                </section>

                                <section class="no-margin">
                                    <div class="row">
                                        <section class="col-xs-6">
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <?php echo $form->textField($model, 'first_name',array("placeholder"=>"First Name *")); ?>
                                                <?php echo $form->error($model, 'first_name'); ?>
                                            </label>
                                        </section>
                                        <section class="col-xs-6">
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <?php echo $form->textField($model, 'last_name',array("placeholder"=>"Last Name *")); ?>
                                                <?php echo $form->error($model, 'last_name'); ?>
                                            </label>
                                        </section>
                                    </div> 
                                </section>
                            </fieldset>  

                            <fieldset>
                                <section>
                                    <div class="row">
                                        <div class="col-md-8">
<!--                                            <label class="checkbox">-->
                                                <!--<input type="checkbox" name="subscription" id="subscription">-->
                                                 <?php echo $form->checkBox($model, 'terms'); ?>
                                                <i></i> I accept the <a href="#">terms and conditions</a> of this website.
                                                 <?php echo $form->error($model, 'terms'); ?>
<!--                                            </label>-->
                                        </div>
                                        <div class="col-md-4">
                                             <?php echo CHtml::submitButton('Register now', array("class" => "btn btn-alt btn-icon btn-icon-right btn-icon-go pull-right")); ?>
                                        </div>
                                </section>
                            </fieldset>
                        </div>
                        <?php $this->endWidget(); ?>                
                        <div class="form-footer">
                            <p>Already have an account? <a href="<?php echo base_url(); ?>/user/login">Click here to sign in.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>