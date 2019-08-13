<?php
$installer = $this;
$installer->startSetup();
$tablename = $this->getTable('review/review_detail');
$installer->run("ALTER TABLE `$tablename` ADD `reviewimage` VARCHAR( 255 ) NOT NULL AFTER `detail` ;");

$installer->endSetup(); 
?>