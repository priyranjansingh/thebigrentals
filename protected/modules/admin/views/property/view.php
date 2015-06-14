<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Property', 'url'=>array('index')),
	array('label'=>'Create Property', 'url'=>array('create')),
	array('label'=>'Update Property', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Property', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Property', 'url'=>array('manage')),
);
?>
<div class="row-fluid">
	<div class="span12">
		<h1><?php echo $model->title; ?></h1>
		<?php
			$model->category_id = Category::model()->findByPk($model->category_id)->name;
			$model->listed_in = Listed::model()->findByPk($model->listed_in)->name;
			if($model->video_from == 0){
				$model->video_from = "Youtube";
			} else {
				$model->video_from = "Vimeo";
			}
		?>
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'title',
				'description',
				'address_line_1',
				'address_line_2',
				'city',
				'state',
				'country',
				'zip',
				'latitude',
				'longitude',
				'size',
				'size_unit',
				'lot_size',
				'lot_size_unit',
				'rooms',
				'bedrooms',
				'bathrooms',
				'year_built',
				'garages',
				'garage_size',
				'garaze_size_unit',
				'basement',
				'external_constructions',
				'roofing',
				'date_availability',
				'category_id',
				'listed_in',
				'property_status',
				'video_from',
				'embed_video_id',
			),
		)); ?>
	</div>
</div>
<div class="row-fluid">
	<label><b>Property Amenities</b></label>
	<?php foreach($modelAmenities as $amenities): ?>
		<div class="span4">
			<?php echo AmenitiesFeatures::model()->findByPk($amenities->amenity_id)->name; ?>
		</div>
	<?php endforeach; ?>
</div>
<div class="row-fluid">
	<div class="row-fluid" id="price">
    <label><b>Property Price Table</b></label>
    <div class="span10">
    <table border='1' id="property_price_table">
            <tr>
                <th><label>Season</label></th>
                <th><label>Currency</label></th>
                <th><label>One Night Price</label></th>
                <th><label>One Week Price</label></th>
                <th><label>One Month Price</label></th>
            </tr>
            <?php foreach($modelPrices as $price): ?>

              <tr>
          		<td>
             		<?php foreach(getParam('season') as $k => $v): ?>
                        <?php if($k == $price->season): ?>
                            <?php echo $v; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php foreach($currency as $c): ?>
                          <?php if($c->id == $price->currency): ?>
                            <?php echo $c->symbol; ?> (<?php echo $c->currency; ?>)
                          <?php endif; ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php echo $price->night_price; ?>
                </td>
                <td>
                    <?php echo $price->week_price; ?>
                </td>
                <td>
                  <?php echo $price->month_price; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </table>
        </div>
        <div class="span2"></div>
  </div>
</div>

<div class="row-fluid">
	<label><b>Property Images</b></label>
	<?php foreach($modelGallery as $gallery): ?>
    <div class="span4">
      <img src="../../../images/property/<?php echo $gallery->image; ?>" width="100">
    </div>
    <?php endforeach; ?>
</div>