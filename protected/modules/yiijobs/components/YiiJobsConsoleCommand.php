<?php 
interface YiiJobsConsoleCommand 
{
	public function shouldJobRun($current_timestamp);
	public function deleteCommandAfterRunning();
}