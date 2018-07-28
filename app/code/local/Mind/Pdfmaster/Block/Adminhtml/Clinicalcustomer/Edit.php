<?php
	
class Mind_Pdfmaster_Block_Adminhtml_Clinicalcustomer_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "id";
				$this->_blockGroup = "pdfmaster";
				$this->_controller = "adminhtml_clinicalcustomer";
				$this->_updateButton("save", "label", Mage::helper("pdfmaster")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("pdfmaster")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("pdfmaster")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("clinicalcustomer_data") && Mage::registry("clinicalcustomer_data")->getId() ){

				    return Mage::helper("pdfmaster")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("clinicalcustomer_data")->getId()));

				} 
				else{

				     return Mage::helper("pdfmaster")->__("Add Item");

				}
		}
}