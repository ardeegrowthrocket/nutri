<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute("order", "clinical_customer", array("type"=>"varchar"));
$installer->addAttribute("quote", "clinical_customer", array("type"=>"varchar"));
$installer->endSetup();
	 