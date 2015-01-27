<?php 

class YiiJobsRunnerCommand extends CConsoleCommand
{
	public function run($args)
	{
		Yii::app()->getModule('yiijobs');
		$activeJobs = YiiJobs::model()->findAllByAttributes(array('active_flag' => 1, 'is_running' => 0));
		foreach($activeJobs as $job)
		{
			//check if job should run now
			if ($job->shouldJobRun())
			{
				//set is_running and check again if job was not already started by another process
				if ($job->setIsRunning())
				{
					$last_ran = date('Y-m-d H:i:s');
					ob_start();
					$jobSuccess = $job->run();
					$jobOutput = ob_get_contents();
					ob_end_clean();
					$job->last_ran = $last_ran;
					$job->last_completed = date('Y-m-d H:i:s');
					//save YiiJobsOutput record
					if ($jobOutput)
					{
						$logOutput = new YiiJobsOutput();
						$logOutput->yiiJobs_id = $job->yiiJobs_id;
						$logOutput->is_error = $jobSuccess ? 0 : 1;
						$logOutput->output = $jobOutput;
						$logOutput->start_time = $job->last_ran;
						$logOutput->end_time = $job->last_completed;
						$logOutput->save();
					}
					if ($job->deleteJobAfterRunning())
					{
						$job->active_flag = 0;
					}
					$job->is_running = 0;
					$job->save();
				}
			}
		}
	}
}