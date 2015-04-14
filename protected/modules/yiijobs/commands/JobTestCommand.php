<?php 

class JobTestCommand extends CConsoleCommand implements YiiJobsConsoleCommand
{
	public function run($args)
	{
		echo "\nhello we started!";
		return 0;
	}
	
	//run once a day
	public function shouldJobRun($current_timestamp, $job)
	{	
		if (!$job->last_ran) return true;
		
		$lastRan = new DateTime($job->last_ran);
		$lastRan = $lastRan->format("Y-m-d");
		if ($lastRan != date('Y-m-d'))
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
}