<?php

$installer = $this;
$installer->startSetup();
$installer->run("

CREATE TABLE IF NOT EXISTS {$this->getTable('faq_faqitems')} (
  `entity_id` int(11) unsigned NOT NULL auto_increment,
  `store_id` SMALLINT(5) UNSIGNED NOT NULL,
  `itemsortorder` smallint(5) DEFAULT '0',
  `status` smallint(6) NOT NULL default '0',
  `quetion` text  NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
$installer->endSetup();
