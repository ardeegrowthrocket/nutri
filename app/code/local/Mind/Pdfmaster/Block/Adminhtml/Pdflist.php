<?php


class Mind_Pdfmaster_Block_Adminhtml_Pdflist extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_pdflist";
	$this->_blockGroup = "pdfmaster";
	$this->_headerText = Mage::helper("pdfmaster")->__("Pdflist Manager");
	$this->_addButtonLabel = Mage::helper("pdfmaster")->__("Add New Item");
	parent::__construct();
	
	}

}