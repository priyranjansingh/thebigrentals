<?php $baseUrl = Yii::app()->theme->baseUrl; ?>  
<section class="slice bg-white">
    <div class="wp-section user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-profile-img">
                        <?php if (empty($model->user_image)): ?>
                            <img src="<?php echo base_url(); ?>/assets/images/default_user.png" alt="">
                            <?php
                        else :
                            $fname = $model->user_image;
                            $furl = Yii::app()->params['s3_base_url'] . $fname;
                            ?>
                            <img src="<?php echo $furl; ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <ul class="categories mt-20">
                        <li><a href="<?php echo base_url() . '/user/editprofile' ?>">Edit Profile</a></li>
                        <li><a href="<?php echo base_url() . '/user/changepassword' ?>">Change Password</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="<?php echo base_url() . '/properties/add' ?>">Add Property</a></li>
                    </ul>
                </div>
                <div class="col-md-9">                     
                    <div class="tabs-framed">
                        <ul class="tabs clearfix">
                            <?php if (empty($msg)): ?>
                                <li class="active"><a href="#tab-1" data-toggle="tab">About me</a></li>
                                <li><a href="#tab-2" data-toggle="tab">Subscription</a></li>
                            <?php else: ?>
                                <li><a href="#tab-1" data-toggle="tab">About me</a></li>
                                <li class="active"><a href="#tab-2" data-toggle="tab">Subscription</a></li>
                            <?php endif; ?>
                            <li><a href="#tab-3" data-toggle="tab">My Properties</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in <?php if (empty($msg)): ?>active<?php endif; ?>" id="tab-1">
                                <div class="tab-body">
                                    <dl class="dl-horizontal style-2">
                                        <h3 class="title title-lg">Personal information <a href="#" class="btn btn-xs btn-base btn-icon fa-edit pull-right"><span>Edit</span></a></h3>

                                        <dt>Your name</dt>
                                        <dd>
                                            <span class="pull-left"><?php echo $model->first_name . ' ' . $model->last_name; ?></span>
                                        </dd>
                                        <hr>
                                        <dt>Email</dt>
                                        <dd>
                                            <span class="pull-left"><?php echo $model->email; ?></span>
                                        </dd>
                                        <hr>
                                        <dt>Phone</dt>
                                        <dd>
                                            <span class="pull-left"><?php echo $model->phone; ?></span>
                                        </dd>
                                        <hr>
                                        <dt>Mobile</dt>
                                        <dd>
                                            <span class="pull-left"><?php echo $model->mobile; ?></span>
                                        </dd>
                                        <hr>
                                        <dt>Skype</dt>
                                        <dd>
                                            <span class="pull-left"><?php echo $model->skype; ?></span>
                                        </dd>
                                        <hr>
                                        <dt>Website</dt>
                                        <dd>
                                            <span class="pull-left"><a href="<?php echo $model->website; ?>"><?php echo $model->website; ?></a></span>
                                        </dd>
                                        <hr>
                                        <dt>Facebook</dt>
                                        <dd>
                                            <span class="pull-left"><a href="<?php echo $model->facebook_url; ?>"><?php echo $model->facebook_url; ?></a></span>
                                        </dd>
                                        <hr>
                                        <dt>Twitter</dt>
                                        <dd>
                                            <span class="pull-left"><a href="<?php echo $model->twitter_url; ?>"><?php echo $model->twitter_url; ?></a></span>
                                        </dd>
                                        <hr>
                                        <dt>Pinterest</dt>
                                        <dd>
                                            <span class="pull-left"><a href="<?php echo $model->pinterest_url; ?>"><?php echo $model->pinterest_url; ?></a></span>
                                        </dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="tab-pane fade in <?php if (!empty($msg)): ?>active<?php endif; ?>" id="tab-2">
                                <div style="float:left;width:350px;" class="tab-body" style="padding-bottom: 0;">
                                    <h3 class="title title-lg">You Subscribed for</h3>
                                    <h4><?php if (!empty($msg)): echo $msg;
                            endif;
                            ?></h4>
                                    <?php if (!empty($model->package_id)): ?>
                                        <p class="mb-20">You have active subscription package of <?php echo Package::model()->findByPk($model->package_id)->package_name; ?> Package.</p>
                                    <?php else : ?>
                                        <p class="mb-20">You don't have any active subscription please choose from below packages</p>
<?php endif; ?>
                                    <section class="slice bg-white">
                                        <div class="wp-section pricing-plans">
                                            <div class="container">
                                                <?php foreach ($packages as $package): ?> 
                                                    <?php if (!empty($model->package_id)): ?>
        <?php if ($package->id == $model->package_id): ?>
                                                            <div class="col-md-3">
                                                                <div class="wp-block default">
                                                                    <div class="plan-header base">
                                                                        <h2 class="plan-title"><?php echo $package->package_name; ?></h2>
                                                                        <h3 class="price-tag"><span>$</span><?php echo $package->amount; ?></h3>
                                                                        <?php if ($package->time_period_unit == 'y'): ?>
                                                                            <small class="plan-info">Subscription for <?php echo $package->time_period; ?> complete year.</small>
                                                                        <?php elseif ($package->time_period_unit == 'm'): ?>
                                                                            <small class="plan-info">Subscription for <?php echo $package->time_period; ?> complete month.</small>
                                                                        <?php elseif ($package->time_period_unit == 'd'): ?>
                                                                            <small class="plan-info">Subscription for <?php echo $package->time_period; ?> complete day(s).</small>
            <?php endif; ?>
                                                                    </div>
                                                                    <ul>
                                                                        <li><i class="fa fa-cloud-download"></i> <?php echo $package->properties_no; ?> Properties Listing</li>
                                                                        <li><i class="fa fa-book"></i> Unlimited access</li>
                                                                        <li><i class="fa fa-coffee"></i> <?php echo $package->featured; ?> Featured Property Listing</li>
                                                                        <li><i class="fa fa-envelope"></i> E-mail support</li>
                                                                    </ul>          
                                                                    <p class="plan-select text-center">
                                                                        <a href="#" class="btn btn-base btn-icon btn-check" hidefocus="true">
                                                                            <span>Selected</span>
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
    <?php else : ?>
                                                        <div class="col-md-3">
                                                            <div class="wp-block default">
                                                                <div class="plan-header base">
                                                                    <h2 class="plan-title"><?php echo $package->package_name; ?></h2>
                                                                    <h3 class="price-tag"><span>$</span><?php echo $package->amount; ?></h3>
                                                                    <?php if ($package->time_period_unit == 'y'): ?>
                                                                        <small class="plan-info">Subscription for <?php echo $package->time_period; ?> complete year.</small>
                                                                    <?php elseif ($package->time_period_unit == 'm'): ?>
                                                                        <small class="plan-info">Subscription for <?php echo $package->time_period; ?> complete month.</small>
                                                                    <?php elseif ($package->time_period_unit == 'd'): ?>
                                                                        <small class="plan-info">Subscription for <?php echo $package->time_period; ?> complete day(s).</small>
        <?php endif; ?>
                                                                </div>
                                                                <ul>
                                                                    <li><i class="fa fa-cloud-download"></i> <?php echo $package->properties_no; ?> Properties Listing</li>
                                                                    <li><i class="fa fa-book"></i> Unlimited access</li>
                                                                    <li><i class="fa fa-coffee"></i> <?php echo $package->featured; ?> Featured Property Listing</li>
                                                                    <li><i class="fa fa-envelope"></i> E-mail support</li>
                                                                </ul>          
                                                                <p class="plan-select text-center">
                                                                    <a href="<?php echo base_url() . '/user/checkout/?package=' . $package->package_name; ?>" class="btn btn-base btn-icon btn-check" hidefocus="true">
                                                                        <span>Choose</span>
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
<?php endforeach; ?>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                                <div style="float:left;width:350px;" class="tab-body" style="padding-bottom: 0;">
                                    <h3 class="title title-lg">You are left with</h3>
                                    <h4><?php if (!empty($msg)): echo $msg;
endif;
?></h4>
                                    <?php if (!empty($model->package_id)): ?>
                                        <p class="mb-20">You have active subscription package of <?php echo Package::model()->findByPk($model->package_id)->package_name; ?> Package.</p>
                                    <?php else : ?>
                                        <p class="mb-20">You don't have any active subscription please choose from below packages</p>
<?php endif; ?>
                                    <section class="slice bg-white">
                                        <div class="wp-section pricing-plans">
                                            <div class="container">
                                                <div class="col-md-3">
                                                    <div class="wp-block default">
                                                        <div class="plan-header base">
                                                            <h2 class="plan-title"><?php echo $membership_model->package->package_name; ?></h2>
                                                            <h3 class="price-tag"><span>$</span><?php echo $membership_model->package->amount; ?></h3>
                                                            <?php if ($membership_model->package->time_period_unit == 'y'): ?>
                                                                <small class="plan-info">Subscription for <?php echo $membership_model->package->time_period; ?> complete year.</small>
                                                            <?php elseif ($membership_model->package->time_period_unit == 'm'): ?>
                                                                <small class="plan-info">Subscription for <?php echo $membership_model->package->time_period; ?> complete month.</small>
                                                            <?php elseif ($membership_model->package->time_period_unit == 'd'): ?>
                                                                <small class="plan-info">Subscription for <?php echo $membership_model->package->time_period; ?> complete day(s).</small>
<?php endif; ?>
                                                        </div>
                                                        <ul>
                                                            <li><i class="fa fa-cloud-download"></i> <?php echo $membership_model->remaining_listing; ?> Properties Listing</li>
                                                            <li><i class="fa fa-book"></i> Unlimited access</li>
                                                            <li><i class="fa fa-coffee"></i> <?php echo $membership_model->remaining_featured_listing; ?> Featured Property Listing</li>
                                                            <li><i class="fa fa-envelope"></i> E-mail support</li>
                                                            <li><i class="fa fa-cloud-download"></i>Expires on <b><?php echo date("d-m-Y", strtotime($model->next_payment_date)); ?></b> </li>
                                                        </ul>          
                                                        <p class="plan-select text-center">
                                                            <a href="#" class="btn btn-base btn-icon btn-check" hidefocus="true">
                                                                <span>Selected</span>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab-3">
                                <div class="tab-body">
                                    <h3 class="title title-lg">My wishlist</h3>
                                    <p class="mb-20"></p>

                                    <div class="row">
                                        <!-- Product list -->
                                        <?php
                                        foreach ($property_model as $key => $val) {
                                            ?>     
                                            <div class="col-md-4">
                                                <div class="wp-block product">
                                                    <figure>
                                                        <?php
                                                        if (!empty($val->gallery)) {
                                                            $object_info = get_object_info($val->gallery[0]->image);
                                                            if (!empty($object_info)) {
                                                                ?>
                                                                <img alt="" src="<?php echo Yii::app()->params['s3_base_url'] . $val->gallery[0]->image; ?>" class="img-responsive img-center"> 
                                                                <?php
                                                            } else {
                                                                ?>    
                                                                <img alt="" src="<?php echo base_url() . "/assets/images/property_no_img.jpg" ?>" > 
                                                                <?Php
                                                            }
                                                        } else {
                                                            ?>
                                                            <img alt="" src="<?php echo base_url() . "/assets/images/property_no_img.jpg" ?>" > 
                                                            <?php
                                                        }
                                                        ?>
                                                    </figure>
                                                    <h2 class="product-title"><a href="#"><?php echo $val->title; ?></a></h2>
                                                    <p>
    <?php echo getSubStr($val->description); ?>
                                                    </p>
                                                    <div class="wp-block-footer">
                                                        <a href="<?php echo base_url()."/properties/view?property=".$val->slug ?>" class="btn btn-primary btn-sm">
                                                            <span>View More</span>
                                                        </a>
                                                        <a href="<?php echo base_url()."/properties/edit?property=".$val->slug ?>" class="btn btn-primary btn-sm" style="width:80px;">
                                                            <span>Edit</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
    <?php
}
?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>