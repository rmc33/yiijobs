<?php
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
				'outputs'=>array(self::HAS_MANY, 'YiiJobsOutput', 'yiiJobs_id'),
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
			$this->is_running = 0;
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
		if ($this->cron_expression)
		{
			$cron = Cron\CronExpression::factory($this->cron_expression);
			if ($cron->isDue())
			{
				return $this->_yiijobCommand->shouldJobRun(time(),$this);
			}
			return false;
		}
		return $this->_yiijobCommand->shouldJobRun(time(),$this);
	}
	
	public function deleteJobAfterRunning()
	{
		return $this->_yiijobCommand->deleteJobAfterRunning();
	}
	
	public function run()
	{
		if (($optionsMatches = explode('--', $this->command_args)) and count($optionsMatches) > 1)
		{
			//run with --x=y options
			$options = array();
			foreach($optionsMatches as $m)
			{
				$options[] = count($options) ? '--'.trim($m) : trim($m);
			}
			return $this->_yiijobCommand->run($options);
		}
		//run without options
		return $this->_yiijobCommand->run(array($this->command_args));
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
	
	public function runCaptureYiiOutputLog()
	{
		$this->last_ran = date('Y-m-d H:i:s');
		ob_start();
		$statusCode = $this->run();
		$this->last_completed = date('Y-m-d H:i:s');
		$output = ob_get_contents();
		ob_end_clean();
		//save YiiJobsOutput record
		if ($output)
		{
			$logOutput = new YiiJobsOutput();
			$logOutput->yiiJobs_id = $this->yiiJobs_id;
			$logOutput->is_error = $statusCode ? 1 : 0;
			$logOutput->output = $output;
			$logOutput->start_time = $this->last_ran;
			$logOutput->end_time = $this->last_completed;
			$logOutput->save();
		}
		if ($this->deleteJobAfterRunning())
		{
			$this->active_flag = 0;
		}
		$this->save();
		return $statusCode;
	}
	
	public function getNextCronRun()
	{
		if ($this->cron_expression)
		{
			$cron = Cron\CronExpression::factory($this->cron_expression);
			return $cron->getNextRunDate()->format('Y:m:d H:i:s');
		}
		return '';
	}
}
