<?php

/**
 * This is the model class for table "yiiJobs".
 *
 * The followings are the available columns in table 'yiiJobs':
 * @property integer $yiiJobs_id
 * @property string $name
 * @property string $command_classname
 * @property string $active_flag
 * @property string $last_ran
 * @property string $dc
 * @property string $command_args
 */
class YiiJobs extends BaseYiiJobs
{
	private $_yiijobCommand;
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'outputs'=>array(self::HAS_MANY, 'YiiJobsOutput', 'YiiJobs_id'),
		);
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return YiiJobs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave()
	{
		if ($this->isNewRecord)
		{
			$this->dc = new CDbExpression('NOW()');
			$this->last_completed = new CDbExpression('NULL');
			$this->last_ran = new CDbExpression('NULL');
		}
		
		return true;
	}
	
	public function createJobCommandInstance()
	{
		if ($this->command_classname and $this->_yiijobCommand == null)
		{
			if (!class_exists($this->command_classname))
			{
				Yii::log('class not found for job id '.$this->yiiJobs_id, 'error', __CLASS__);
				return false;
			}
			$commandPath = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'commands';
    		$runner = new CConsoleCommandRunner();
    		$runner->addCommands($commandPath);
			$this->_yiijobCommand = new $this->command_classname($this->name,$runner);
		}
	}
	
	public function shouldJobRun()
	{
		$this->createJobCommandInstance();
		return $this->_yiijobCommand->shouldJobRun(time(),$this);
	}
	
	public function deleteJobAfterRunning()
	{
		return $this->_yiijobCommand->deleteJobAfterRunning();
	}
	
	public function run()
	{
		$args = array($this->command_args);
		return $this->_yiijobCommand->run($args) ? 1 : 0;
	}
	
	public function setIsRunning()
	{
		$last_ran = date('Y-m-d H:i:s');
		return db()->createCommand()->update('yiiJobs', array('is_running' => 1, 'last_ran' => $last_ran),
				'yiiJobs_id=:id',
				array(':id'=>$this->yiiJobs_id));
	}
	
	public function getApplicationIds()
	{
		return array('1' => 'main site', '2' => 'inp', '3' => 'api', '4' => 'admin');
	}
	
	public function getApplicationNameForId($id)
	{
		$ids = $this->getApplicationIds();
		if (isset($ids[$id]))
		{
			return $ids[$id];
		}
		return '';
	}
}
