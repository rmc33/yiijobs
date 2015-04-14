<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */

$this->breadcrumbs=array(
	'Yii Jobs'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Manage YiiJobs', 'url'=>array('admin')),
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

<h1>Manage YiiOutput Jobs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchYiiJobsOutput',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'yii-jobs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager'=>array('class'=>'CLinkPager'),
	'columns'=>array(
		'yiiJobsOutput_id',
		'yiiJobs_id',
		'is_error',
		'output',
		'start_time',
		'end_time',
	),
)); ?>
