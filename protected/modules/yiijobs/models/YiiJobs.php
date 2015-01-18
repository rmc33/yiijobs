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
		if ($this->getIsNewRecord())
			$this->dc = new CDbExpression('NOW()');
		return true;
	}
	
	public function createJobCommandInstance()
	{
		if ($this->command_classname and $this->_yiijobCommand == null)
		{
			$commandPath = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'commands';
			$runner = new CConsoleCommandRunner();
			$runner->addCommands($commandPath);
			$commandPath = Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';
			$runner->addCommands($commandPath);
			$this->_yiijobCommand = new $this->command_classname($this->name,$runner);
		}
	}
	
	public function shouldJobRun()
	{
		$this->createJobCommandInstance();
		return $this->_yiijobCommand->shouldJobRun(time());
	}
	
	public function run()
	{
		$args = array('yiic', $this->name, $this->command_args);
		return $this->_yiijobCommand->run($args);
	}
}
