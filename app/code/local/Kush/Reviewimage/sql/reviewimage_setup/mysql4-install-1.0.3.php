<?php
$installer = $this;
$installer->startSetup();
$installer->run("ALTER TABLE `review_detail` ADD `reviewimage` VARCHAR( 255 ) NOT NULL AFTER `detail` ;");

$installer->endSetup(); 
?>