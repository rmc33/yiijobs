<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */

$this->breadcrumbs=array(
	'Yii Jobs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List YiiJobs', 'url'=>array('index')),
	array('label'=>'Create YiiJobs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#yii-jobs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Yii Jobs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'yii-jobs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'yiiJobs_id',
		'name',
		'application_id',
		'description',
		'command_classname',
		'command_args',
		'active_flag',
		/*
		'is_running',
		'dc',
		'last_ran',
		'last_completed',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
