CREATE TABLE `yiiJobs` (
  `yiiJobs_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `command_classname` varchar(100) DEFAULT NULL,
  `active_flag` varchar(45) DEFAULT NULL,
  `last_ran` varchar(45) DEFAULT NULL,
  `dc` datetime DEFAULT NULL,
  `command_args` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`yiiJobs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE `yiiJobsOutput` (
  `yiiJobsOutput_id` int(11) NOT NULL AUTO_INCREMENT,
  `is_error` tinyint(4) DEFAULT NULL,
  `output` text,
  `yiiJobs_id` int(11) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`yiiJobsOutput_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1