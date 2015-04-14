<?php

class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout;
	//can be set to either http or https
	public $http = "http";

	public function init()
	{
		$layoutPath = Yii::getPathOfAlias('yiijobs.views.layouts');
		$this->layout = 'column2';
		return parent::init();
	}
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{

		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=> array('index','view','create','update','viewOutput','admin','delete','test'),
				'users'=>array('*'),
			),
			array('allow',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function createUrl($route,$params=array(),$ampersand='&')
	{
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		elseif(strpos($route,'/')===false)
		$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
		return $this->http.'://'.$_SERVER['HTTP_HOST'].Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new YiiJobs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['YiiJobs']))
		{
			$model->attributes=$_POST['YiiJobs'];
			if (isset($_POST['test']))
				$this->redirect(array('test','id'=>$model->yiiJobs_id));
			if($model->save())
				$this->redirect(array('view','id'=>$model->yiiJobs_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['YiiJobs']))
		{
			$model->attributes=$_POST['YiiJobs'];
			if (isset($_POST['test']))
				$this->redirect(array('test','id'=>$model->yiiJobs_id));
			if($model->save())
				$this->redirect(array('view','id'=>$model->yiiJobs_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('YiiJobs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new YiiJobs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['YiiJobs']))
			$model->attributes=$_GET['YiiJobs'];
		if (!isset($_GET['YiiJobs']['active_flag']))
			$model->active_flag = 1;

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionTest($id)
	{
		$model=YiiJobs::model()->findByPk($id);
		if (is_object($model))
		{
			$model->createJobCommandInstance();
			$statusCode = $model->runCaptureYiiOutputLog();
			if ($statusCode > 0)
				Yii::app()->user->setFlash('error', "Job ran but returned error exit status code {$statusCode}");
			else
				Yii::app()->user->setFlash('success', "Job completed check output logs");
		}
		else 
		{
			Yii::app()->user->setFlash('error', "Job not found with id $id");
		}
		$this->render('view',array(
				'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return YiiJobs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=YiiJobs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionViewOutput()
	{
		$model=new YiiJobsOutput('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['YiiJobsOutput']))
			$model->attributes=$_GET['YiiJobsOutput'];
		$this->render('adminYiiJobsOutput',array(
				'model'=>$model,
		));
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param YiiJobs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='yii-jobs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
