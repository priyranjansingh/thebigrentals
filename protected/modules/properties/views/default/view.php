<div class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Real Estate Listings</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Property</a></li>
                    <li class="active"><?php echo $property->title; ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="slice bg-white bb">
    <div class="wp-section estate">
        <div class="container">
            <div class="row">        
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="product-gallery">
                                 <?php  
                                    if(!empty($property->embed_video_id))
                                    {  
                                  ?>      
                                <div class="primary-image">
                                     
                                     <?php    echo $property->embed_video_id; ?>
                                
                                </div>
                                <?php 
                                    }   
                                ?>
                                <div class="primary-image">
                                    <?php
                                    foreach ($gallery as $g):
                                        if ($g->type == "m"):
                                            ?>
                                            <a href="<?php echo base_url(); ?>/images/property/<?php echo $property->id; ?>/<?php echo $g->image; ?>" class="theater" rel="group" hidefocus="true">
                                                <img src="<?php echo Yii::app()->params['s3_base_url'].$g->image; ?>" class="img-responsive" alt="">
                                            </a>
                                            <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </div>
                                <div class="thumbnail-images">
                                    <?php
                                    $i = 1;
                                    foreach ($gallery as $g):
                                        if ($i > 5) {
                                            break;
                                        }
                                        if ($g->type != "m"):
                                            ?>
                                            <a href="<?php echo base_url(); ?>/images/property/<?php echo $property->id; ?>/<?php echo $g->image; ?>" class="theater" rel="group" hidefocus="true">
                                                <img src="<?php echo Yii::app()->params['s3_base_url']. $g->image; ?>" class="img-responsive" alt="">
                                            </a>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="product-info">
                                <h3><?php echo $property->title; ?></h3>
                                <div class="wp-block property list no-border">
                                    <div class="wp-block-content clearfix">
                                        <span class="pull-left">
                                            <span class="price">$230</span> 
                                            <span class="period">per month</span>
                                        </span>
                                        <span class="pull-right">
                                            <span class="capacity">
                                                <i class="fa fa-user"></i>
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="wp-block-footer style2 mt-15">
                                        <ul class="aux-info">
                                            <li><i class="fa fa-user"></i> <?php echo $property->bedrooms; ?> Bedrooms</li>
                                            <li><i class="fa fa-tint"></i> <?php echo $property->bathrooms; ?> Bathrooms</li>
                                            <li>
                                                <?php if (empty($property->garage)): ?>
                                                    <i class="fa fa-car"></i> N/A
                                                <?php else : ?>
                                                    <i class="fa fa-car"></i> <?php echo $property->garage; ?> Garages
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="clearfix"></span> 
                                <p>
                                    <?php echo trimString($property->description,500); ?>
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- PROPERTY DESCRIPTION -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabs-framed boxed">
                                <ul class="tabs clearfix">
                                    <li class="active"><a href="#tab-1" data-toggle="tab">Additional details</a></li>
                                    <li><a href="#tab-map" data-toggle="tab">Map</a></li>
                                    <li><a href="#tab-available" data-toggle="tab">Property Availability</a></li>
                                    <li><a href="#tab-owner" data-toggle="tab">Contact Owner</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-1">
                                        <div class="tab-body">
                                            <div class="section-title-wr">
                                                <h3 class="section-title left">Property description</h3>
                                            </div>
                                            <p>
                                                <?php echo $property->description; ?>
                                            </p>

                                            <div class="section-title-wr">
                                                <h3 class="section-title left">Additional details</h3>
                                            </div>
                                            <table class="table table-bordered table-striped table-hover table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Property Size:</strong> N/A</td>
                                                        <td><strong>Lot size:</strong> <?php echo $property->lot_size; ?></td>
                                                        <td><strong>Price:</strong> $23000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Rooms:</strong> <?php echo $property->bedrooms + $property->bathrooms; ?></td>
                                                        <td><strong>Bedrooms:</strong> <?php echo $property->bedrooms; ?></td>
                                                        <td><strong>Bathrooms:</strong> <?php echo $property->bathrooms; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Garages:</strong> <?php echo $property->garages; ?></td>
                                                        <td><strong>Roofing:</strong> <?php echo $property->roofing; ?></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Year built:</strong> <?php echo $property->year_built; ?></td>
                                                        <td>&nbsp;</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="section-title-wr">
                                                <h3 class="section-title left">Location details</h3>
                                            </div>
                                            <table class="table table-bordered table-striped table-hover table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <td><strong><strong>Address:</strong> <?php echo $property->address_line_1 .' '.$property->address_line_2; ?></strong></td>
                                                        <td><strong>City:</strong> <?php echo $property->city; ?></td>
                                                        <td><strong>State:</strong> <?php echo $property->state; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Country:</strong> <?php echo $property->country; ?></td>
                                                        <td><strong>Zip:</strong> <?php echo $property->zip; ?></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab-map">
                                        <div class="tab-body">
                                            <div id="mapCanvas" class="map-canvas no-margin"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-available">
                                        <div class="tab-body">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-owner">
                                        <div class="tab-body">
                                            <div class="owner-profile">
                                                <div class="owner-left-profile">
                                                    <div class="owner-image">
                                                        <?php if (empty($owner->user_image)): ?>
                                                        <img src="<?php echo base_url(); ?>/assets/images/default_user.png" width="150px" height="200px">
                                                        <?php
                                                            else :
                                                                $fname = $owner->user_image;
                                                                $furl = Yii::app()->params['s3_base_url'] . $fname;
                                                                ?>
                                                        <img src="<?php echo $furl; ?>" width="150px" height="200px">
                                                            <?php endif; ?>
                                                    </div>
                                                    <div class="owner-social">
                                                        <a href="<?php echo $owner->facebook_url; ?>" target="_blank" class="owner-fb"><i class="fa fa-facebook"></i></a>
                                                        <a href="<?php echo $owner->skype; ?>" target="_blank" class="owner-skype"><i class="fa fa-skype"></i></a>
                                                        <a href="<?php echo $owner->twitter_url; ?>" target="_blank" class="owner-twitter"><i class="fa fa-twitter"></i></a>
                                                        <a href="<?php echo $owner->pinterest_url; ?>" target="_blank" class="owner-pinterest"><i class="fa fa-pinterest"></i></a>
                                                    </div>        
                                                </div>
                                                <div class="owner-right-profile">
                                                    <div class="owner-desc">
                                                        Contact Owner With below given description: <br />
                                                        Call Owner : <i class="fa fa-mobile"></i><?php echo $owner->mobile; ?>,<i class="fa fa-phone"></i><?php echo $owner->mobile; ?>
                                                    </div>
                                                    <div class="owner-contact">
                                                        <button class="btn-warning" id="contact_owner">Contact Owner</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar">
                        <!-- FILTERS -->
                        <div class="panel panel-default panel-sidebar-1">
                            <div class="panel-heading"><h2>Filter by</h2></div>
                            <div class="panel-body">
                                <form class="form-light" role="form">
                                    <div class="form-group">
                                        <label>Search for properties</label>
                                        <input type="text" class="form-control" placeholder="I want to find..." hidefocus="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control">
                                            <option>Phones</option>
                                            <option>Laptops</option>
                                            <option>Cameras</option>
                                            <option>Tablets</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <select class="form-control">
                                            <option>Phones</option>
                                            <option>Laptops</option>
                                            <option>Cameras</option>
                                            <option>Tablets</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control">
                                            <option>Phones</option>
                                            <option>Laptops</option>
                                            <option>Cameras</option>
                                            <option>Tablets</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Min Rooms</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Max Rooms</label>
                                                <select class="form-control">
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Min area</label>
                                                <input type="text" class="form-control" placeholder="" hidefocus="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Max area</label>
                                                <input type="text" class="form-control" placeholder="" hidefocus="true">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-block btn-base btn-icon btn-icon-right btn-search">
                                                <span>Search</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- RECENTLY VIEWED -->
                        <div class="panel panel-default panel-sidebar-1">
                            <div class="panel-heading"><h2>Recently viewed</h2></div>
                            <div class="panel-body">
                                <ul class="featured featured-vertical">
                                    <li>
                                        <img src="images/prv/estate/item-1.jpg" alt="">
                                        <div class="featured-content">
                                            <h3 class="title">
                                                <a href="#" hidefocus="true">3015 Grand Avenue, CocoWalk</a>
                                            </h3>
                                            <span class="star-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-full"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <div class="table no-margin">
                                                <div class="price-wr width-50">
                                                    <span class="price">$2300</span>
                                                    <span class="period">per month</span>
                                                </div>
                                                <div class="">
                                                    <span class="capacity">
                                                        <i class="fa fa-user"></i>
                                                        <i class="fa fa-user"></i>
                                                        <i class="fa fa-user"></i>
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </li>
                                    <li>
                                        <img src="images/prv/estate/item-2.jpg" alt="">
                                        <div class="featured-content">
                                            <h3 class="title">
                                                <a href="#" hidefocus="true">3015 Grand Avenue, CocoWalk</a>
                                            </h3>
                                            <span class="star-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-full"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <div class="table no-margin">
                                                <div class="price-wr width-50">
                                                    <span class="price">$2300</span>
                                                    <span class="period">per month</span>
                                                </div>
                                                <div class="">
                                                    <span class="capacity">
                                                        <i class="fa fa-user"></i>
                                                        <i class="fa fa-user"></i>
                                                        <i class="fa fa-user"></i>
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </li>
                                    <li>
                                        <img src="images/prv/estate/item-3.jpg" alt="">
                                        <div class="featured-content">
                                            <h3 class="title">
                                                <a href="#" hidefocus="true">3015 Grand Avenue, CocoWalk</a>
                                            </h3>
                                            <span class="star-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-full"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <div class="table no-margin">
                                                <div class="price-wr width-50">
                                                    <span class="price">$2300</span>
                                                    <span class="period">per month</span>
                                                </div>
                                                <div class="">
                                                    <span class="capacity">
                                                        <i class="fa fa-user"></i>
                                                        <i class="fa fa-user"></i>
                                                        <i class="fa fa-user"></i>
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="row" id="toggle-owner-contact">
	<div class="col-md-12 popup-holder">
	<div class="pop-up-container">
			<div class="col-md-2">&nbsp;</div>
			<div class="col-md-8 pop-up">
				<div class="col-md-12 header">
					Contact The Owner
					<div class="right">
						<a href="#" class="close_popup">X</a> 
					 </div>
				</div>
				<div class="col-md-12">
					Tell the owner when you would like to travel.
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
						<input type="text" id="arrival" disabled="disabled" placeholder="Arrival" name="arrival_date">
					</div>
					<div class="col-md-6">
						<input type="text" id="departure" disabled="disabled" placeholder="Departure" name="departure_date">
					</div>
				</div>
				<div class="col-md-12 input_check">
					<input type="checkbox" id="flexible" value="true" name="flexible">My Dates Are Flexible
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
						<input type="text" id="first_name" placeholder="First Name*" name="first_name">
						<div class="error"> First Name is Required. </div>
					</div>
					<div class="col-md-6">
						<input type="text" id="last_name" placeholder="Last Name*" name="last_name">
						<div class="error"> Last Name is Required. </div>						
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
						<select name="country" id="country">
							<option value="">Select Country*</option>
							<option value="">India</option>
							<option value="">United States</option>
							<option value="">United Kingdom</option>
						</select>
						<div class="error"> Country is Required. </div>						
					</div>
					<div class="col-md-6">
						<input type="text" id="phone" placeholder="Phone Number" name="phone">
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
						<input type="email" id="email" placeholder="Email Address*" name="email">
						<div class="error"> Email is Required. </div>
					</div>
					<div class="col-md-3 with-label">
						<label for="adults">Adults</label>
						<input id="adults" type="text" name="adults" value="1" class="small">
					</div>
					<div class="col-md-3 with-label">
						<label for="childs">Childs</label>
						<input id="childs" type="text" name="childs" value="0" class="small">
					</div>
				</div>
				<div class="col-md-12 message">
					<textarea name="message" id="message" placeholder="Message to owner"></textarea>
				</div>
				<div class="col-md-12 message border-bottom">
					By Clicking 'Send Email' you are agreeing to our <a href="#">Terms &amp; Conditions</a>  &amp; <a href="#">Privacy Policy</a>
				</div>
				<div class="col-md-12">
					 <div class="right">
						<a href="#" class="close_popup">Close</a> 
						<button id="send_mail" class="btn-warning">Send Mail</button>
					 </div>
				</div>
			</div>
			<div class="col-md-2">&nbsp;</div>
	</div>
</div>
</div>
<script>
    var longitude = <?php echo $property->longitude; ?>;
    var latitude = <?php echo $property->latitude; ?>;
    
</script>