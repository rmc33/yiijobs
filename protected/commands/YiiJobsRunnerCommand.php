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
					$job->last_ran = date('Y-m-d H:i:s');
					$start_time = time();
					ob_start();
					$jobSuccess = $job->run();
					$job->last_completed = date('Y-m-d H:i:s');
					$end_time = time();
					$output = ob_get_contents();
					ob_end_clean();
					
					//save YiiJobsOutput record
					if ($output)
					{
						$logOutput = new YiiJobsOutput();
						$logOutput->yiiJobs_id = $job->yiiJobs_id;
						$logOutput->is_error = !$jobSuccess;
						$logOutput->output = $output;
						$logOutput->start_time = $start_time;
						$logOutput->end_time = $end_time;
						$logOutput->save();
					}
					if ($job->deleteAfterRunning())
					{
						$job->active_flag = 0;
					}
					$job->save();
				}
			}
		}
	}
}