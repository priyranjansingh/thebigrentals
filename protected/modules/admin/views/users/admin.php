<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Users', 'url' => array('index')),
    array('label' => 'Create Users', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row-fluid">
    <div class="span12">
        <h1>Manage Users</h1>

        <p>
            You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
            or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
        </p>

        <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
        <div class="search-form" style="display:none">
            <?php
            $this->renderPartial('_search', array(
                'model' => $model,
            ));
            ?>
        </div>
    </div><!-- search-form -->
</div>
<div class="row-fluid">
    <div class="span12">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => "Users List",
        ));
        ?>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'itemsCssClass' => 'table table-bordered',
            'id' => 'users-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'username',
                'first_name',
                'email',
                array(
                    'name' => 'package_id',
                    'type' => 'raw',
                    'value' => array($this, 'gridPackageName')
                 ),
//                 'package_id',
                //'role_id',
                array(
                    'name' => 'role_id',
                    'type' => 'raw',
                    'value' => array($this, 'gridRoleName')
                ),
                //'is_admin',
                array(
                    'class' => 'CButtonColumn',
                ),
            ),
        ));
        ?>
<?php $this->endWidget(); ?>
    </div>
</div>
