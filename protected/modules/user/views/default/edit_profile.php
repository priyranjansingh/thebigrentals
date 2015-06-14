<?php $baseUrl = Yii::app()->theme->baseUrl; ?>  
    
    <script src="<?php echo $baseUrl;?>/js/jquery.Jcrop.js"></script>
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/css/jquery.Jcrop.css" type="text/css" />
    <script src="<?php echo $baseUrl;?>/js/upload.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/upload1.css" media="screen" />
    <script type="text/javascript" src="<?php echo $baseUrl;?>/js/jquery.fancybox.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/jquery.fancybox.css" media="screen" />
    <script language="Javascript">
           $(document).ready(function(){
               $('.fancybox').fancybox();
               
               $('#crop_submit').click(function(){
                   $('#crop_form').submit();
                   $.fancybox.close(true); 
               });
           });

            function updateCoords(c)
            {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            }
            ;

            function checkCoords()
            {
                if (parseInt($('#w').val()))
                    return true;
                alert('Please select a crop region then press submit.');
                return false;
            }
            ;
           
        </script>
    
<section class="slice bg-white">
    <div class="wp-section user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-profile-img" id="user_photo">
                        <div id="edit">&nbsp;</div>
                        <?php if (empty($model->user_image)): ?>
                            <img src="<?php echo base_url(); ?>/assets/images/default_user.png" alt="">
                        <?php
                        else :
                            $fname = $model->user_image;
                            $furl = "http://tbrs3.s3.amazonaws.com/".$fname;  
                            ?>
                            <img id="user_image" src="<?php echo $furl; ?>" alt="">
                         <?php endif; ?>
                        <div class="form_container">
                            <form method="POST" name="myform" id="myform" enctype="multipart/form-data">
                                <input type="file" name ="myfile" id="myfile"><br>
                            </form>    
                        </div>  
                        <div id="myimage" class="fancybox" style="width:auto;height:auto;display: none;">
                            <h1>Crop The Image</h1>
                                <p>
                                <!-- This is the image we're attaching Jcrop to -->
                                    <img src="" id="cropbox" />
                                    <!-- This is the form that our event handler fills -->
                                    <form action="<?php echo base_url()."/user/CropImage" ?>" name="crop_form" id="crop_form" method="post" onsubmit="return checkCoords();">
                                        <input type="hidden" id="x" name="x" />
                                        <input type="hidden" id="y" name="y" />
                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                        <input type="button" id="crop_submit" name="crop_submit" value="Crop Image" />
                                        <input type="hidden" id="hid_image_name" name="hid_name" value="" />
                                    </form>
                                </p>
                        </div>    
                            
                    </div>
                    <ul class="categories mt-20">
                        <li><a href="<?php echo base_url() . '/user/myaccount' ?>">Personal informations</a></li>
                        <li><a href="<?php echo base_url() . '/user/changepassword' ?>">Change Password</a></li>
                        <li><a href="<?php echo base_url() . '/properties/add' ?>">Add Property</a></li>
                    </ul>
                </div>
                <div class="col-md-9">                     
                    <div class="tabs-framed">
                        <ul class="tabs clearfix">
                            <li class="active"><a href="#tab-1" data-toggle="tab">Edit Profile</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'profile-form',
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                    // See class documentation of CActiveForm for details on this.
                                    'enableAjaxValidation' => false,
                                    'htmlOptions' => array(
                                        'autcomplete' => "off",
                                        'class' => "edit-profile-form",
                                        'enctype' => 'multipart/form-data'
                                    ),
                                ));
                                ?>
                                <div class="tab-body">
                                    <dl class="dl-horizontal style-2">
                                        <h3 class="title title-lg">Edit Your Personal information</h3>
                                        <p><span class="required">*</span> Marked Fields Are Required.</p>
                                        <dt><?php echo $form->labelEx($model, 'first_name'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'first_name', array('size' => 50, 'maxlength' => 100)); ?>
                                                <?php echo $form->error($model, 'first_name'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'last_name'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'last_name', array('size' => 50, 'maxlength' => 100)); ?>
                                                <?php echo $form->error($model, 'last_name'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'email'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 100)); ?>
                                                <?php echo $form->error($model, 'email'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'phone'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'phone', array('size' => 50, 'maxlength' => 12)); ?>
                                                <?php echo $form->error($model, 'phone'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'mobile'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'mobile', array('size' => 50, 'maxlength' => 12)); ?>
                                                <?php echo $form->error($model, 'mobile'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'skype'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'skype', array('size' => 50, 'maxlength' => 100)); ?>
                                                <?php echo $form->error($model, 'skype'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'website'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'website', array('size' => 50, 'maxlength' => 100)); ?>
                                                <?php echo $form->error($model, 'website'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'facebook_url'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'facebook_url', array('size' => 50, 'maxlength' => 100)); ?>
                                                <?php echo $form->error($model, 'facebook_url'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'twitter_url'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'twitter_url', array('size' => 50, 'maxlength' => 100)); ?>
                                                <?php echo $form->error($model, 'twitter_url'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo $form->labelEx($model, 'pinterest_url'); ?></dt>
                                        <dd>
                                            <span class="pull-left">
                                                <?php echo $form->textField($model, 'pinterest_url', array('size' => 50, 'maxlength' => 100)); ?>
                                                <?php echo $form->error($model, 'pinterest_url'); ?>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></dt>
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