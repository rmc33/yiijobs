# yiijobs

Yii module to manage scheduled jobs.

Create just one cronjob entry for YiiJobsRunnerCommand to run every 2 min for example with */2 * * * * /usr/bin/php /project/yiic yiijobsrunner

YiiJobsRunnerCommand will query and loop through active YiiJobs records that are not already currently running. YiiJobsRunnerCommand will run the command file and arguments associated with the YiiJob record if the command should run at the current time.
