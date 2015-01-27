<?php 

class JobTestCommand extends CConsoleCommand implements YiiJobsConsoleCommand
{
	public function run($args)
	{
		echo "\nhello we started!";
		return 1;
	}
	
	//run once a day
	public function shouldJobRun($current_timestamp, $job)
	{
		$lastRan = new DateTime($job->last_ran);
		if (!lastRan) return true;
		
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