<?php 
class YiiJobsRunnerCommand extends CConsoleCommand
{
	public function run($args)
	{
		Yii::app()->getModule('yiijobs');
		$activeJobs = YiiJobs::model()->findAllByAttributes(array('active_flag' => 1));
		foreach($activeJobs as $job)
		{
			if ($job->shouldJobRun())
			{
				$job->last_ran = date('Y-m-d H:i:s');
				$job->run();
				$job->last_completed = date('Y-m-d H:i:s');
				if ($job->deleteAfterRunning())
				{
					$job->active_flag = 0;
				}
				$job->save();
			}
		}
	}
}