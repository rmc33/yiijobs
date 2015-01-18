<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */

$this->breadcrumbs=array(
	'Yii Jobs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List YiiJobs', 'url'=>array('index')),
	array('label'=>'Create YiiJobs', 'url'=>array('create')),
	array('label'=>'Update YiiJob', 'url'=>array('update', 'id'=>$model->yiiJobs_id)),
	array('label'=>'Delete YiiJob', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->yiiJobs_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage YiiJobs', 'url'=>array('admin')),
);
?>

<h1>View YiiJobs #<?php echo $model->yiiJobs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'yiiJobs_id',
		'name',
		'command_classname',
		'active_flag',
		'last_ran',
		'dc',
		'command_args',
	),
)); ?>
