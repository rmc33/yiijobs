<?php 
interface YiiJobsConsoleCommand 
{
	/**
	 * When implemented by a CConsoleCommand class it is used to tell YiiJobsRunnerCommand
	 * if this specific command should run at this time.
	 * 
	 * @param int $current_timestamp current unix time offset
	 * @param object of YiiJobs $job YiiJobs object which is running the command
	 * @return boolean true if command should run now
	 */
	public function shouldJobRun($current_timestamp, $job);
	/**
	 * When implemented by a CConsoleCommand class it is used to tell YiiJobsRunnerCommand
	 * to keep this job active for the next time YiiJobsRunnerCommand runs or
	 * set it in-active after running.
	 * 
	 * @return boolean true if command should be deactivated after running
	 */
	public function deleteJobAfterRunning();
}