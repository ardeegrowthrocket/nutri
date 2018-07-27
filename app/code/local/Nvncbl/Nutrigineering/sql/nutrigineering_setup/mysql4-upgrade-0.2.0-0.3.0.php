<?php

$installer = $this;

$installer->startSetup();

$this->addAttribute('customer_address', 'contact_person', array(
	'type' => 'varchar',
	'input' => 'text',
	'label' => 'Contact Person',
	'global' => 1,
	'visible' => 1,
	'required' => 0,
	'user_defined' => 1,
	'visible_on_front' => 1
));
Mage::getSingleton('eav/config')
	->getAttribute('customer_address', 'contact_person' )
	->setData('used_in_forms', array('customer_register_address','customer_address_edit','adminhtml_customer_address'))
	->save();

$this->addAttribute('customer_address', 'contact_number', array(
	'type' => 'varchar',
	'input' => 'text',
	'label' => 'Contact Number',
	'global' => 1,
	'visible' => 1,
	'required' => 0,
	'user_defined' => 1,
	'visible_on_front' => 1
));
Mage::getSingleton('eav/config')
	->getAttribute('customer_address', 'contact_number' )
	->setData('used_in_forms', array('customer_register_address','customer_address_edit','adminhtml_customer_address'))
	->save();
$installer->endSetup();