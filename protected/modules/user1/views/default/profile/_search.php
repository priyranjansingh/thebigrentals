<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet" id="yw1">
			<div class="portlet-decoration">
				<div class="portlet-title">Search Here</div>
			</div>
			<div class="portlet-content">
				<div class="grid-view">
					<div class="summary"></div>
						<?php $form=$this->beginWidget('CActiveForm', array(
							'action'=>Yii::app()->createUrl($this->route),
							'method'=>'get',
						)); ?>
						<table class="table table-bordered">
	
							<tbody>
								<tr class="odd">
									<td>
										<?php echo $form->label($model,'username'); ?>
										<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'title_position'); ?>
										<?php echo $form->textField($model,'title_position',array('size'=>60,'maxlength'=>256)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'first_name'); ?>
										<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'last_name'); ?>
										<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
									</td>
								</tr>
								<tr class="even">
									<td>
										<?php echo $form->label($model,'nick_name'); ?>
										<?php echo $form->textField($model,'nick_name',array('size'=>50,'maxlength'=>50)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'phone'); ?>
										<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>12)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'mobile'); ?>
										<?php echo $form->textField($model,'mobile',array('size'=>50,'maxlength'=>12)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'email'); ?>
										<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
									</td>
								</tr>
								<tr class="odd">
									<td>
										<?php echo $form->label($model,'website'); ?>
										<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>100)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'about_me'); ?>
										<?php echo $form->textField($model,'about_me',array('size'=>60)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'skype'); ?>
										<?php echo $form->textField($model,'skype',array('size'=>60,'maxlength'=>100)); ?>
									</td>
									<td>
										
									</td>
								</tr>
								<tr class="even">
									<td>
										<?php echo $form->label($model,'facebook_url'); ?>
										<?php echo $form->textField($model,'facebook_url',array('size'=>60,'maxlength'=>256)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'twitter_url'); ?>
										<?php echo $form->textField($model,'twitter_url',array('size'=>60,'maxlength'=>256)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'pinterest_url'); ?>
										<?php echo $form->textField($model,'pinterest_url',array('size'=>60,'maxlength'=>256)); ?>
									</td>
									<td>

									</td>
								</tr>
								<tr class="odd">
									<td>
										<?php echo $form->label($model,'package_id'); ?>
										<?php echo $form->textField($model,'package_id',array('size'=>36,'maxlength'=>36)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'role_id'); ?>
										<?php echo $form->textField($model,'role_id',array('size'=>36,'maxlength'=>36)); ?>
									</td>
									<td>
										<?php echo $form->label($model,'payment_status'); ?>
										<?php echo $form->textField($model,'payment_status'); ?>
									</td>
									<td>
										
									</td>
								</tr>
								<tr class="even">
									<td>
										<?php echo CHtml::submitButton('Search'); ?>
									</td>
									<td>
									
									</td>
									<td>
									
									</td>
									<td>
										
									</td>
									<td>
										
									</td>
								</tr>
							</tbody>
						</table>
						<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
