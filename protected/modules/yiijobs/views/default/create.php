<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */

$this->breadcrumbs=array(
	'Yii Jobs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List YiiJobs', 'url'=>array('index')),
	array('label'=>'Manage YiiJobs', 'url'=>array('admin')),
);
?>

<h1>Create YiiJobs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>