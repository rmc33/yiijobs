<?php 

class JobTestCommand extends CConsoleCommand implements YiiJobsConsoleCommand
{
	public function run($args)
	{
		echo "\nhello we started!";
		return true;
	}
	
	public function shouldJobRun($current_timestamp)
	{
		$day = date('D', $current_timestamp);
		echo "\nday=".$day;
		if ($day == 'Sat')
		{
			return true;
		}
		return false;
	}
	
	public function deleteCommandAfterRunning()
	{
		return false;
	}
}