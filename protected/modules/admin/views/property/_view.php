<?php
/* @var $this PropertyController */
/* @var $data Property */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
	<?php echo CHtml::encode($data->slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('after_price_label')); ?>:</b>
	<?php echo CHtml::encode($data->after_price_label); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('camera_angle')); ?>:</b>
	<?php echo CHtml::encode($data->camera_angle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitude')); ?>:</b>
	<?php echo CHtml::encode($data->latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitude')); ?>:</b>
	<?php echo CHtml::encode($data->longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enable_google_street_view')); ?>:</b>
	<?php echo CHtml::encode($data->enable_google_street_view); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size_unit')); ?>:</b>
	<?php echo CHtml::encode($data->size_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lot_size')); ?>:</b>
	<?php echo CHtml::encode($data->lot_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lot_size_unit')); ?>:</b>
	<?php echo CHtml::encode($data->lot_size_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rooms')); ?>:</b>
	<?php echo CHtml::encode($data->rooms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bedrooms')); ?>:</b>
	<?php echo CHtml::encode($data->bedrooms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bathrooms')); ?>:</b>
	<?php echo CHtml::encode($data->bathrooms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_built')); ?>:</b>
	<?php echo CHtml::encode($data->year_built); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garages')); ?>:</b>
	<?php echo CHtml::encode($data->garages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garage_size')); ?>:</b>
	<?php echo CHtml::encode($data->garage_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garaze_size_unit')); ?>:</b>
	<?php echo CHtml::encode($data->garaze_size_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('basement')); ?>:</b>
	<?php echo CHtml::encode($data->basement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('external_constructions')); ?>:</b>
	<?php echo CHtml::encode($data->external_constructions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roofing')); ?>:</b>
	<?php echo CHtml::encode($data->roofing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_availability')); ?>:</b>
	<?php echo CHtml::encode($data->date_availability); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('listed_in')); ?>:</b>
	<?php echo CHtml::encode($data->listed_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_status')); ?>:</b>
	<?php echo CHtml::encode($data->property_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted')); ?>:</b>
	<?php echo CHtml::encode($data->deleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?>:</b>
	<?php echo CHtml::encode($data->modified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_from')); ?>:</b>
	<?php echo CHtml::encode($data->video_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('embed_video_id')); ?>:</b>
	<?php echo CHtml::encode($data->embed_video_id); ?>
	<br />

	*/ ?>

</div>