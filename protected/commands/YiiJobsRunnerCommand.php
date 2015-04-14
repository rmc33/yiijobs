<?php 

class YiiJobsRunnerCommand extends CConsoleCommand
{
	public function run($args)
	{
		Yii::app()->getModule('yiijobs');
		$activeJobs = YiiJobs::getActiveJobsNotRunning();
		foreach($activeJobs as $job)
		{
			//check if job should run now
			if ($job->shouldJobRun())
			{
				//set is_running and check again if job was not already started by another process
				if ($job->setIsRunning())
				{
					$job->runCaptureYiiOutputLog();
				}
			}
		}
	}
}