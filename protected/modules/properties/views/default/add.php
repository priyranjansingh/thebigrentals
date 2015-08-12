
<script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

    function initialize() {

        // var markers = [];
        var marker = null;
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 11,
            center: {lat: 28.61300733365442, lng: 77.2305178642273}
        });

        // var defaultBounds = new google.maps.LatLngBounds(
        //     new google.maps.LatLng(28.61300733365442, 77.2305178642273),
        //     new google.maps.LatLng(28.61300733365442, 77.2305178642273));
        //     map.fitBounds(defaultBounds);

        // Create the search box and link it to the UI element.
        var input = /** @type {HTMLInputElement} */(
                document.getElementById('pac-input'));
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var searchBox = new google.maps.places.SearchBox(
                /** @type {HTMLInputElement} */(input));

        // [START region_getplaces]
        // Listen for the event fired when the user selects an item from the
        // pick list. Retrieve the matching places for that item.
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            var bounds = new google.maps.LatLngBounds();
            for (var i = 0, place; place = places[i]; i++) {
                var image = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                bounds.extend(place.geometry.location);
            }

            map.fitBounds(bounds);
        });
        // [END region_getplaces]
        // [Place Marker]
        google.maps.event.addListener(map, 'dblclick', function(e) {
            if (marker != null) {
                marker.setMap(null);
            }
            placeMarker(e.latLng);
        });

        function placeMarker(location) {
            marker = new google.maps.Marker({
                map: map,
                icon: "<?php echo base_url(); ?>/images/spotlight.png",
                // title: place.name,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: location
            });
            //console.log("Latitude: " + location.lat() + "\r\nLongitude: " + location.lng());
            $.ajax({
                url: "http://maps.googleapis.com/maps/api/geocode/json",
                type: "GET",
                data: {latlng: location.lat() + "," + location.lng(), sensor: false}
            }).done(function(data) {
                $("#Property_latitude").val(location.lat());
                $("#Property_longitude").val(location.lng());
                var address_line_1 = "";
                $.each(data.results[0].address_components, function(key, val) {
                    if (val.types[0] === "premise") {
                        address_line_1 += val.long_name;
                    } else if (val.types[0] === "sublocality_level_2") {
                        address_line_1 += val.long_name;
                        $("#Property_address_line_1").val(address_line_1);
                    } else if (val.types[0] === "sublocality_level_1") {
                        $("#Property_address_line_2").val(val.long_name);
                    } else if (val.types[0] === "administrative_area_level_2") {
                        $("#Property_city").val(val.long_name);
                    } else if (val.types[0] === "administrative_area_level_1") {
                        $("#Property_state").val(val.long_name);
                    } else if (val.types[0] === "country") {
                        $("#Property_country").val(val.long_name);
                    } else if (val.types[0] === "postal_code") {
                        $("#Property_zip").val(val.long_name);
                    }
                });
            });
            google.maps.event.addListener(marker, 'dragend', function()
            {
                if (marker !== null) {
                    geocodePosition(marker.getPosition());
                }
            });

            function geocodePosition(location)
            {
                // console.log("Latitude: " + location.lat() + "\r\nLongitude: " + location.lng());
                $.ajax({
                    url: "http://maps.googleapis.com/maps/api/geocode/json",
                    type: "GET",
                    data: {latlng: location.lat() + "," + location.lng(), sensor: false}
                }).done(function(data) {
                    var address_line_1 = "";
                    $("#Property_latitude").val(location.lat());
                    $("#Property_longitude").val(location.lng());
                    $.each(data.results[0].address_components, function(key, val) {
                        if (val.types[0] === "premise") {
                            address_line_1 += val.long_name;
                        } else if (val.types[0] === "sublocality_level_2") {
                            address_line_1 += val.long_name;
                            $("#Property_address_line_1").val(address_line_1);
                        } else if (val.types[0] === "sublocality_level_1") {
                            $("#Property_address_line_2").val(val.long_name);
                        } else if (val.types[0] === "administrative_area_level_2") {
                            $("#Property_city").val(val.long_name);
                        } else if (val.types[0] === "administrative_area_level_1") {
                            $("#Property_state").val(val.long_name);
                        } else if (val.types[0] === "country") {
                            $("#Property_country").val(val.long_name);
                        } else if (val.types[0] === "postal_code") {
                            $("#Property_zip").val(val.long_name);
                        }
                    });
                });
            }
        }

        // [END Place Marker]
        // Bias the SearchBox results towards places that are within the bounds of the
        // current map's viewport.
        google.maps.event.addListener(map, 'bounds_changed', function() {
            var bounds = map.getBounds();
            searchBox.setBounds(bounds);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    $(document).ready(function() {
        $('input[name="Property[Price][start_date][]"]').Zebra_DatePicker();
        $('input[name="Property[Price][end_date][]"]').Zebra_DatePicker();
        $("body").on('click', '.add_more', function() {
            var content = $("#first").clone();
            content.find("td:last").remove();
            content.find("div.errorMessage").hide();
            $("#property_price_table").append("<tr>" + content.html() + "<td><a class='add_more' href='javascript:void(0);'><i class='fa fa-plus'></i></a> | <a class='delete' href='javascript:void(0);'><i class='fa fa-minus'></i></a></td></tr>");
            $('input[name="Property[Price][start_date][]"]').Zebra_DatePicker();
            $('input[name="Property[Price][end_date][]"]').Zebra_DatePicker();
        });
        $("body").on('click', '.delete', function() {
            $(this).parents("tr").remove();
        });
    });
</script>

<?php $baseUrl = Yii::app()->theme->baseUrl; ?>  
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/calendar/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/calendar/dateTimePicker.css">
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/calendar/components/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/calendar/dateTimePicker.js"></script>   


<section class="slice bg-white">
    <div class="wp-section user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-profile-img">
                        <?php if (empty($user->user_image)): ?>
                            <img src="<?php echo base_url(); ?>/assets/images/default_user.png" alt="">
                            <?php
                        else :
                            $fname = $user->user_image;
                            $furl = "http://tbrs3.s3.amazonaws.com/" . $fname;
                            ?>
                            <img src="<?php echo $furl; ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <ul class="categories mt-20">
                        <li><a href="<?php echo base_url() . '/user/myaccount' ?>">Personal informations</a></li>
                        <li><a href="<?php echo base_url() . '/user/changepassword' ?>">Change Password</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
                <div class="col-md-9">                     
                    <div class="tabs-framed">
                        <ul class="tabs clearfix">
                            <li class="active"><a href="#tab-1" data-toggle="tab">Add Property</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <div class="col-md-12 pad-top-10">

                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'property-form',
                                        'htmlOptions' => array(
                                            'autcomplete' => "off",
                                            'class' => "add-property-form",
                                            'enctype' => 'multipart/form-data'
                                        ),
                                    ));
                                    ?>

                                    <div class="block-heading" id="details">
                                        <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i><i class="fa fa-home"></i></span>Property Details</h4>
                                    </div>
                                    <div class="padding-as25 margin-30 lgray-bg">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('title'); ?></div>   
                                                <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'placeholder' => 'Property Name')); ?>
                                                <div class="errorMessage" id="Property_title_em" style="display: none;">Property name cannot be blank.</div>    
                                            </div>
                                            <div class="col-md-8 col-sm-8 submit-description">
                                                  <div class="prop_label"><?php echo $model->getAttributeLabel('description'); ?></div>   
                                                <?php echo $form->textArea($model, 'description', array('col' => 10, 'row' => 1, 'class' => 'form-control margin-0', 'placeholder' => 'Property Description')); ?>
                                                <div class="errorMessage" id="Property_description_em" style="display: none;">Property description cannot be blank.</div>  
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div style="margin-bottom:20px;font-size:15px;font-weight:bold;" class="col-md-12 col-sm-12">
                                                Do you want to make this property a featured property ? 
                                                <?php echo $form->checkBox($model, 'is_featured', array('value' => 'Y')); ?>  
                                                <div class="errorMessage" id="Property_is_featured_em" style="display: none;">Sorry, you don't have sufficient featured listing.</div>  
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('category_id'); ?></div>  
                                                <?php $all_category = CHtml::listData($categories, 'id', 'name'); ?>
                                                <?php echo $form->dropDownList($model, 'category_id', $all_category, array('class' => 'form-control selectpicker', "empty" => "Property Type",)); ?>
                                                <div class="errorMessage" id="Property_category_id_em" style="display: none;">Property category cannot be blank.</div>  

                                            </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div style="height: 400px;">
                                                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                                    <div class="span12" id="map-canvas"></div>
                                                </div>
                                                <div class="errorMessage" id="Property_map_em" style="display: none;">Please select a location on the map.</div>  
                                            </div>
                                        </div>
                                        <div class="row pad-top-10">
                                            <div class="col-md-4 col-sm-4">
                                                <?php echo $form->hiddenField($model, 'latitude', array('size' => 60, 'maxlength' => 100)); ?>
                                                <?php echo $form->hiddenField($model, 'longitude', array('size' => 60, 'maxlength' => 100)); ?>
                                                 <div class="prop_label"><?php echo $model->getAttributeLabel('address_line_1'); ?></div> 
                                                <?php echo $form->textField($model, 'address_line_1', array('class' => 'form-control', 'placeholder' => 'Address Line 1', 'readonly' => 'true')); ?>
                                                <?php echo $form->error($model, 'address_line_1'); ?>
                                                <div class="errorMessage" id="Property_address_line_1_em" style="display: none;">Address Line 1  cannot be blank.</div>   
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                  <div class="prop_label"><?php echo $model->getAttributeLabel('address_line_2'); ?></div> 
                                                <?php echo $form->textField($model, 'address_line_2', array('class' => 'form-control', 'placeholder' => 'Address Line 2')); ?>
                                                <?php echo $form->error($model, 'address_line_2'); ?>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('city'); ?></div> 
                                                <?php echo $form->textField($model, 'city', array('class' => 'form-control', 'placeholder' => 'City', 'readonly' => 'true')); ?>
                                                <div class="errorMessage" id="Property_city_em" style="display: none;">City cannot be blank.</div>   
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                 <div class="prop_label"><?php echo $model->getAttributeLabel('state'); ?></div> 
                                                <?php echo $form->textField($model, 'state', array('class' => 'form-control', 'placeholder' => 'State', 'readonly' => 'true')); ?>
                                                <div class="errorMessage" id="Property_state_em" style="display: none;">State cannot be blank.</div>   
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('country'); ?></div> 
                                                <?php echo $form->textField($model, 'country', array('class' => 'form-control', 'placeholder' => 'Country', 'readonly' => 'true')); ?>
                                                <div class="errorMessage" id="Property_country_em" style="display: none;">Country cannot be blank.</div>   
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('zip'); ?></div> 
                                                <?php echo $form->textField($model, 'zip', array('class' => 'form-control', 'placeholder' => 'Zip Code', 'readonly' => 'true')); ?>
                                                <div class="errorMessage" id="Property_zip_em" style="display: none;">Zip cannot be blank.</div>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-heading" id="availability_calendar">
                                        <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i><i class="fa fa-plus"></i></span>Availability Calendar</h4>
                                    </div>
                                    <div class="padding-as25 margin-30 lgray-bg">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div id="basic" data-toggle="calendar" ></div>
                                            </div>

                                        </div>

                                    </div>     
                                    <div class="block-heading" id="additionalinfo">
                                        <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i><i class="fa fa-plus"></i></span>Additional Info</h4>
                                    </div>
                                    <div class="padding-as25 margin-30 lgray-bg">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('rooms'); ?></div> 
                                                <?php echo $form->textField($model, 'rooms', array('class' => 'form-control', 'placeholder' => 'Number Of Rooms')); ?>
                                                <div class="errorMessage" id="Property_rooms_em" style="display: none;">Rooms cannot be blank.</div>  
                                            </div>
                                            <div class="col-md-4 col-sm-4 submit-property-type">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('bedrooms'); ?></div> 
                                                <?php echo $form->textField($model, 'bedrooms', array('class' => 'form-control', 'placeholder' => 'Number Of Bedrooms')); ?>
                                                <div class="errorMessage" id="Property_bedrooms_em" style="display: none;">Bedrooms cannot be blank.</div>  
                                            </div>
                                            <div class="col-md-4 col-sm-4 submit-contract-type">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('bathrooms'); ?></div> 
                                                <?php echo $form->textField($model, 'bathrooms', array('class' => 'form-control', 'placeholder' => 'Number Of Bathrooms')); ?>
                                                <div class="errorMessage" id="Property_bathrooms_em" style="display: none;">Bathrooms cannot be blank.</div>  
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('video_from'); ?></div> 
                                                <?php echo $form->dropDownList($model, 'video_from', getParam('video_from'), array('class' => 'form-control selectpicker', "empty" => "Select Video From")); ?>
                                                <?php echo $form->error($model, 'video_from'); ?>
                                            </div>
                                            <div class="col-md-8 col-sm-8 submit-description">
                                                <div class="prop_label"><?php echo $model->getAttributeLabel('embed_video_id'); ?></div> 
                                                <?php echo $form->textArea($model, 'embed_video_id', array('col' => 10, 'row' => 1, 'class' => 'form-control margin-0', 'placeholder' => 'Enbedded Code for video')); ?>
                                                <?php echo $form->error($model, 'embed_video_id'); ?>
                                            </div>
                                        </div>
                                    </div>      


                                    <div class="block-heading" id="amenities">
                                        <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i><i class="fa fa-star"></i></span>Amenities</h4>
                                    </div>
                                    <div class="padding-as25 margin-30 lgray-bg">
                                        <div class="row">
                                            <?php foreach ($amenities as $amenity): ?>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="Property[amenities][]" value="<?php echo $amenity->id; ?>"> <?php echo $amenity->name; ?>
                                                    </label>  
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="errorMessage" id="amenities_em" style="display:none;">Select At least One Amenity.</div>  

                                    <div class="block-heading" id="details">
                                        <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i><i class="fa fa-home"></i></span>Property Price</h4>
                                    </div>
                                    <div class="padding-as25 margin-30 lgray-bg">
                                        <div class="properties-table">
                                            <table class="table table-striped" id="property_price_table">
                                                <thead>
                                                    <tr>
                                                        <th>Season</th>
                                                        <th>Currency</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Night Price</th>
                                                        <th>Week Price</th>
                                                        <th>Month Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="first">
                                                        <td>
                                                            <select  name="Property[Price][season][]" class="form-control selectpicker">
                                                                <option value="">Season</option>
                                                                <?php foreach (getParam('season') as $k => $v): ?>
                                                                    <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <div class="errorMessage"  style="display: none;">Season cannot be blank.</div> 
                                                        </td>
                                                        <td>
                                                            <select  name="Property[Price][currency][]" class="form-control selectpicker">
                                                                <?php foreach ($currency as $c): ?>
                                                                    <option value="<?php echo $c->id; ?>"><?php echo $c->symbol; ?> (<?php echo $c->currency; ?>)</option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <div class="errorMessage"  style="display: none;">Currency cannot be blank.</div> 
                                                        </td>
                                                        <td>
                                                            <input id="price_start_date_1" type="text" name="Property[Price][start_date][]" class="form-control" />
                                                            <div class="errorMessage"  style="display: none;">Start Date cannot be blank.</div> 
                                                        </td>
                                                        <td>
                                                            <input  type="text" name="Property[Price][end_date][]" class="form-control" />
                                                            <div class="errorMessage"  style="display: none;">End Date cannot be blank.</div> 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="Property[Price][night_price][]" class="form-control" />
                                                            <div class="errorMessage"  style="display: none;">Night Price cannot be blank.</div> 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="Property[Price][week_price][]" class="form-control" />
                                                            <div class="errorMessage"  style="display: none;">Week Price cannot be blank.</div> 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="Property[Price][month_price][]" class="form-control" />
                                                            <div class="errorMessage"  style="display: none;">Month Price cannot be blank.</div> 
                                                        </td>
                                                        <td>
                                                            <a class="add_more" href="javascript:void(0);"><i class="fa fa-plus"></i></a> 
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="padding-as25 margin-30 lgray-bg">
                                        <div class="text-align-center" id="submit-property">
                                            <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-check"></i> Submit Now</button>
                                        </div>
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
<script src="<?php echo base_url(); ?>/assets/js/property/property_add.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#basic').calendar({
        onSelectDate: function(date, month, year) {
            var date_string = year+"-"+month+"-"+date;
            $.ajax({
                url: base_url + "/properties/StoreDate",
                type: 'POST',
                data: {'date': date_string},
                success: function(data) {
                },
            });
        },
        num_next_month: 2,
    });
    $('body').on('click','#basic td',function(){
        if($(this).hasClass("available"))
        {
             $(this).removeClass("available"); 
             $(this).addClass("unavailable");
        }   
        else if($(this).hasClass("unavailable"))
        {
             $(this).removeClass("unavailable"); 
             $(this).addClass("available");
        }   
    });
    
});

</script>
