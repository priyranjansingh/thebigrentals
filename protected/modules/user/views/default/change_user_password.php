<section class="slice bg-white">
    <div class="wp-section user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-profile-img">
                        <?php if(empty($model->user_image)): ?>
                        <img src="<?php echo base_url(); ?>/assets/images/default_user.png" alt="">
                        <?php else : 
                          $fname = $model->user_image;
                          $furl = "http://tbrs3.s3.amazonaws.com/".$fname;  
                        ?>
                        <img src="<?php echo $furl; ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <ul class="categories mt-20">
                        <li><a href="<?php echo base_url() . '/user/myaccount' ?>">Personal informations</a></li>
                        <li><a href="<?php echo base_url() . '/user/editprofile' ?>">Edit Profile</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
                <div class="col-md-9">                     
                    <div class="tabs-framed">
                        <ul class="tabs clearfix">
                            <li class="active"><a href="#tab-1" data-toggle="tab">Change Password</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
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
                                <div class="tab-body">
                                    <dl class="dl-horizontal style-2">
                                        <h3 class="title title-lg">Change Password</h3>
                                        <p><span class="required">*</span> Marked Fields Are Required.</p>
                                        <dt><?php echo $form->labelEx($model, 'current_password'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->passwordField($model, 'current_password'); ?>
                                                <?php echo $form->error($model, 'current_password'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'password'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->passwordField($model, 'password'); ?>
                                                <?php echo $form->error($model, 'password'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'confirm_password'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->passwordField($model, 'confirm_password'); ?>
                                                <?php echo $form->error($model, 'confirm_password'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo CHtml::submitButton('Change Password'); ?></dt>
                                        <dd>
                                            <span class="pull-left"></span>
                                        </dd>
                                    </dl>
                                </div>
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

