<?php
/**
 * Command job to show an example of running 15 min from last ran time and using command args "init"
 */
class JobTest2Command extends CConsoleCommand implements YiiJobsConsoleCommand
{
	//run every 15 min after last ran
	public function shouldJobRun($current_timestamp, $job)
	{
		
		if ($job->hasRanSuccessfullyToday()) return false;
		
		$lastRan = new DateTime($job->last_ran);
		if (!$lastRan) return true;
		
		$lastRan->modify('+15 minutes');
		$now = new DateTime();
		if ($now >= $lastRan)
		{
			return true;
		}
		return false;
	}
	
	//keep running
	public function deleteJobAfterRunning()
	{
		return false;
	}
	
	/**
	 * default action to update only active and pending status'
	 */
	public function actionInit()
	{
		echo 'running Test2 init';
		return 0;
	}
}