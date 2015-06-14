<?php
/* @var $this PropertyController */
/* @var $model Property */
/* @var $form CActiveForm */
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
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
          google.maps.event.addListener(map, 'dblclick', function (e) {
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
                      data: { latlng: location.lat()+","+location.lng(), sensor: false}
                    }).done(function(data){
                      	$("#Property_latitude").val(location.lat());
                      	$("#Property_longitude").val(location.lng());
                      	var address_line_1 = "";
                  		$.each(data.results[0].address_components, function(key,val){
                  			if(val.types[0] === "premise"){
                      			address_line_1 += val.long_name; 
                      		} else if(val.types[0] === "sublocality_level_2"){
                      			address_line_1 += val.long_name;
                      			$("#Property_address_line_1").val(address_line_1);
                      		} else if(val.types[0] === "sublocality_level_1"){
                      			$("#Property_address_line_2").val(val.long_name);
                      		} else if(val.types[0] === "administrative_area_level_2"){
                      			$("#Property_city").val(val.long_name);
                      		} else if(val.types[0] === "administrative_area_level_1"){
                      			$("#Property_state").val(val.long_name);
                      		} else if(val.types[0] === "country"){
                      			$("#Property_country").val(val.long_name);
                      		} else if(val.types[0] === "postal_code"){
                      			$("#Property_zip").val(val.long_name);
                      		}
                  		});
              		});
                google.maps.event.addListener(marker, 'dragend', function() 
                {
                    if(marker !== null){
                      geocodePosition(marker.getPosition());
                    }
                });

                function geocodePosition(location) 
                {
                  // console.log("Latitude: " + location.lat() + "\r\nLongitude: " + location.lng());
                   $.ajax({
                      url: "http://maps.googleapis.com/maps/api/geocode/json",
                      type: "GET",
                      data: { latlng: location.lat()+","+location.lng(), sensor: false}
                    }).done(function(data){
                    	var address_line_1 = "";
                    	$("#Property_latitude").val(location.lat());
                      	$("#Property_longitude").val(location.lng());
                      $.each(data.results[0].address_components, function(key,val){
                  			if(val.types[0] === "premise"){
                      			address_line_1 += val.long_name; 
                      		} else if(val.types[0] === "sublocality_level_2"){
                      			address_line_1 += val.long_name;
                      			$("#Property_address_line_1").val(address_line_1);
                      		} else if(val.types[0] === "sublocality_level_1"){
                      			$("#Property_address_line_2").val(val.long_name);
                      		} else if(val.types[0] === "administrative_area_level_2"){
                      			$("#Property_city").val(val.long_name);
                      		} else if(val.types[0] === "administrative_area_level_1"){
                      			$("#Property_state").val(val.long_name);
                      		} else if(val.types[0] === "country"){
                      			$("#Property_country").val(val.long_name);
                      		} else if(val.types[0] === "postal_code"){
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

$(document).ready(function(){
     $("body").on('click','.add_more',function(){
          var content = $("#first").html();
        $("#property_price_table").append("<tr>"+content+"</tr>");
     });
     $("body").on('click','.delete',function(){
        $(this).parents("tr").remove();
     });
});
    </script>
<div class="row-fluid">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'property-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->labelEx($model,'title'); ?>
			<?php echo $form->textField($model,'title',array('size'=>50)); ?>
			<?php echo $form->error($model,'title'); ?>
		</div>
		<div class="span8">
			<?php echo $form->labelEx($model,'description'); ?>
			<?php echo $form->textArea($model,'description',array('style'=>'width: 616px; height: 80px;resize: none;')); ?>
			<?php echo $form->error($model,'description'); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->labelEx($model,'date_availability'); ?>
			<?php 
				$this->widget('ext.EDateRangePicker.EDateRangePicker',array(
				    'id'=>'date_availability',
				    'name'=>'Property[date_availability]',
				    'value'=>'',
				    'options'=>array('arrows'=>true),
				    'htmlOptions'=>array('class'=>'inputClass'),
				    ));
			?>
			<?php echo $form->error($model,'date_availability'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'category_id'); ?>
			<?php
	        	$all_category = CHtml::listData($categories, 'id', 'name');
                        ?>
			<?php echo $form->dropDownList($model,'category_id',$all_category,array("empty" => "Select Category", )); ?>
			<?php echo $form->error($model,'category_id'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'listed_in'); ?>
			<?php
	        	$all_listed = CHtml::listData($listed, 'id', 'name');
	        ?>
			<?php echo $form->dropDownList($model,'listed_in',$all_listed,array("empty" => "Select Listed IN")); ?>
			<?php echo $form->error($model,'listed_in'); ?>
		</div>
	</div>
	<div class="row-fluid">
		<input id="pac-input" class="controls" type="text" placeholder="Search Box">
		<div class="span12" id="map-canvas"></div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->hiddenField($model,'latitude',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->hiddenField($model,'longitude',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->labelEx($model,'address_line_1'); ?>
			<?php echo $form->textField($model,'address_line_1',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'address_line_1'); ?>		
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'address_line_2'); ?>
			<?php echo $form->textField($model,'address_line_2',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'address_line_2'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'city'); ?>
			<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'city'); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->labelEx($model,'state'); ?>
			<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'state'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'country'); ?>
			<?php echo $form->textField($model,'country',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'country'); ?>		
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'zip'); ?>
			<?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'zip'); ?>
		</div>
		<div class="span8">
		</div>
	</div>
	<div class="row-fluid">
		<label> Features & Amenities </label>
		<?php foreach($amenities as $amenity): ?>
			<div class="span4">
				<input type="checkbox" name="Property[amenities][]" value="<?php echo $amenity->id; ?>"> <?php echo $amenity->name; ?>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->labelEx($model,'size'); ?>
			<?php echo $form->textField($model,'size'); ?>
			<?php echo $form->error($model,'size'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'size_unit'); ?>
			<?php echo $form->dropDownList($model,'size_unit',getParam('size_units'),array("empty" => "Choose Unit")); ?>
                        <?php echo $form->error($model,'size_unit'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'lot_size'); ?>
			<?php echo $form->textField($model,'lot_size'); ?>
			<?php echo $form->error($model,'lot_size'); ?>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->labelEx($model,'lot_size_unit'); ?>
			<?php echo $form->dropDownList($model,'lot_size_unit',getParam('size_units'),array("empty" => "Choose Unit")); ?>
                        <?php echo $form->error($model,'lot_size_unit'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'rooms'); ?>
			<?php echo $form->textField($model,'rooms'); ?>
			<?php echo $form->error($model,'rooms'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'bedrooms'); ?>
			<?php echo $form->textField($model,'bedrooms'); ?>
			<?php echo $form->error($model,'bedrooms'); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->labelEx($model,'bathrooms'); ?>
			<?php echo $form->textField($model,'bathrooms'); ?>
			<?php echo $form->error($model,'bathrooms'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'year_built'); ?>
			<?php echo $form->textField($model,'year_built'); ?>
			<?php echo $form->error($model,'year_built'); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->labelEx($model,'garages'); ?>
			<?php echo $form->textField($model,'garages'); ?>
			<?php echo $form->error($model,'garages'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'garage_size'); ?>
			<?php echo $form->textField($model,'garage_size'); ?>
			<?php echo $form->error($model,'garage_size'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'garaze_size_unit'); ?>
			<?php echo $form->dropDownList($model,'garaze_size_unit',getParam('size_units'),array("empty" => "Choose Unit")); ?>
                        <?php echo $form->error($model,'garaze_size_unit'); ?>
		</div>
	</div>

	<div class="row-fluid">
	    <div class="span4">
	      <?php echo $form->labelEx($model,'basement'); ?>
	      <?php echo $form->dropDownList($model,'basement',getParam('basement'),array("empty" => "Select Basement")); ?>
	      <?php echo $form->error($model,'basement'); ?>
	    </div>
	    <div class="span4">
	      <?php echo $form->labelEx($model,'external_constructions'); ?>
	      <?php echo $form->dropDownList($model,'external_constructions',getParam('external_constructions'),array("empty" => "Select External Construction")); ?>
	      <?php echo $form->error($model,'external_constructions'); ?>
	    </div>
	    <div class="span4">
	      <?php echo $form->labelEx($model,'roofing'); ?>
	      <?php echo $form->dropDownList($model,'roofing',getParam('roofing'),array("empty" => "Select Roofing")); ?>
	      <?php echo $form->error($model,'roofing'); ?>
	    </div>
	  </div>

  	<div class="row-fluid">
	    <div class="span4">
	      <?php echo $form->labelEx($model,'property_status'); ?>
	      <?php echo $form->dropDownList($model,'property_status',getParam('property_status'),array("empty" => "Select Property Status")); ?>
	      <?php echo $form->error($model,'property_status'); ?>
	    </div>
		<div class="span4">
			<?php echo $form->labelEx($model,'video_from'); ?>
                        <?php echo $form->dropDownList($model,'video_from',getParam('video_from'),array("empty" => "Choose Video From")); ?>
			<?php echo $form->error($model,'video_from'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'embed_video_id'); ?>
			<?php echo $form->textField($model,'embed_video_id',array('size'=>60,'maxlength'=>256)); ?>
			<?php echo $form->error($model,'embed_video_id'); ?>
		</div>
	</div>
	<div class="row-fluid" id="price">
		<div class="span10">
		<table border='1' id="property_price_table">
            <tr>
                <th><label>Choose Season</label></th>
                <th><label>Choose Currency</label></th>
                <th><label>One Night Price</label></th>
                <th><label>One Week Price</label></th>
                <th><label>One Month Price</label></th>
                <th><label>Action</label></th>
            </tr>
            <tr id="first">
                <td>
                     <select name="Property[Price][season][]">
                            <option value="">Season</option>
                            <?php foreach(getParam('season') as $k => $v): ?>
                                    <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                            <?php endforeach; ?>
                    </select>
                </td>
                <td>
                   <select name="Property[Price][currency][]">
                            <?php foreach($currency as $c): ?>
                                    <option value="<?php echo $c->id; ?>"><?php echo $c->symbol; ?> (<?php echo $c->currency; ?>)</option>
                            <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input type="text" name="Property[Price][night_price][]" />
                </td>
                <td>
                    <input type="text" name="Property[Price][week_price][]" />
                </td>
                <td>
                  <input type="text" name="Property[Price][month_price][]" />
                </td>
                <td>
                  <a class="add_more" href="javascript:void(0);">Add More</a> | <a class="delete" href="javascript:void(0);">Delete</a>
                </td>
            </tr>
            
        </table>
        </div>
        <div class="span2"></div>
	</div>
       
        
       
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->labelEx($model,'main_image'); ?>
			<?php echo $form->fileField($model,'main_image'); ?>
			<?php echo $form->error($model,'main_image'); ?>
		</div>
		<div class="span4">
			<?php echo $form->labelEx($model,'gallery_image'); ?>
			<?php 
				$this->widget('CMultiFileUpload', array(
                	// 'model' => $model,
                	'name' => 'Property[gallery_image]',
                	'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                	'duplicate' => 'Duplicate file!', // useful, i think
                	'denied' => 'Invalid file type', // useful, i think
            	));
			?>
			<?php echo $form->error($model,'gallery_image'); ?>
		</div>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>