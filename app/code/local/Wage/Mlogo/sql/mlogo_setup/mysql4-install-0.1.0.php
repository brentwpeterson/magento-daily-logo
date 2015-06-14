<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('mlogo')};
CREATE TABLE {$this->getTable('mlogo')} (
  `mlogo_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `filename` varchar(255) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `schedule_start` datetime NULL,
  `schedule_end` datetime NULL,
  PRIMARY KEY (`mlogo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 