<?php


class Mind_Pdfmaster_Block_Adminhtml_Clinicalcustomer extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_clinicalcustomer";
	$this->_blockGroup = "pdfmaster";
	$this->_headerText = Mage::helper("pdfmaster")->__("Clinicalcustomer Manager");
	$this->_addButtonLabel = Mage::helper("pdfmaster")->__("Add New Item");
	parent::__construct();
	
	}

}