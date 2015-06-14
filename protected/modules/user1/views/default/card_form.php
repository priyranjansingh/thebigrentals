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
                            <li class="active"><a href="#tab-1" data-toggle="tab">Pay Here</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'credit-card-form',
//                                    'enableClientValidation' => true,
                                    //'enableAjaxValidation'=>true,
                                    'clientOptions' => array(
                                        'validateOnSubmit' => true,
                                    ),
                                    'htmlOptions' => array(
                                        'autcomplete' => "off"
                                    ),
                                ));
                                ?>
                                <?php echo $form->hiddenField($model, 'token'); ?>
                                <div class="tab-body">
                                    <dl class="dl-horizontal style-2">
                                        <h3 class="title title-lg">Enter Your Credit Card Details</h3>
                                        <p><span class="required">*</span> Marked Fields Are Required.</p>
                                        <dt><label class="required">Enter Name on card <span class="required">*</span></label></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->dropDownList($model, 'ccTitle', getParam('title_position'),array('empty' => 'Select', 'style' => 'height:24px;')); ?>
                                                <?php echo $form->textField($model, 'ccFname', array("maxlength" => '100','placeholder' => 'First Name')); ?>
                                                <?php echo $form->textField($model, 'ccLname', array("maxlength" => '100','placeholder' => 'Last Name')); ?>
                                                <?php echo $form->error($model, 'ccTitle'); ?>
                                                <?php echo $form->error($model, 'ccFname'); ?>
                                                <?php echo $form->error($model, 'ccLname'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><label class="required">Enter Billing Address <span class="required">*</span></label></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'addressLine1', array("maxlength" => '100','placeholder' => 'Address Line 1')); ?>
                                                <?php echo $form->textField($model, 'city', array("maxlength" => '100','placeholder' => 'City')); ?>
                                                <?php echo $form->error($model, 'addressLine1'); ?>
                                                <?php echo $form->error($model, 'city'); ?>
                                            </span>
                                        </dd>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'state', array("maxlength" => '100','placeholder' => 'State')); ?>
                                                <?php echo $form->textField($model, 'country', array("maxlength" => '100','placeholder' => 'Country')); ?>
                                                <?php echo $form->textField($model, 'zip', array("maxlength" => '6','placeholder' => 'Zip')); ?>
                                                <?php echo $form->error($model, 'state'); ?>
                                                <?php echo $form->error($model, 'country'); ?>
                                                <?php echo $form->error($model, 'zip'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'ccNumber'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'ccNumber', array("maxlength" => '16')); ?>
                                                <?php echo $form->error($model, 'ccNumber'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt>
                                            <label for="CreditCardForm_expMonth" class="required">Card Expiry (MM/YYYY) <span class="required">*</span></label>
                                        </dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'expMonth', array("maxlength" => '2','class' => 'small-input')); ?>
                                                <?php echo $form->textField($model, 'expYear', array("maxlength" => '4','class' => 'small-input')); ?>
                                                <?php echo $form->error($model, 'expMonth'); ?>
                                                <?php echo $form->error($model, 'expYear'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'cvv'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->passwordField($model, 'cvv', array("maxlength" => '4','class' => 'small-input')); ?>
                                                <?php echo $form->error($model, 'cvv'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo CHtml::submitButton('Pay'); ?></dt>
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

