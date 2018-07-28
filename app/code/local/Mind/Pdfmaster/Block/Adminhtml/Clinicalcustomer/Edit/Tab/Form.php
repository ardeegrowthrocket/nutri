<?php
class Mind_Pdfmaster_Block_Adminhtml_Clinicalcustomer_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("pdfmaster_form", array("legend"=>Mage::helper("pdfmaster")->__("Item information")));

				
						$fieldset->addField("firstname", "text", array(
						"label" => Mage::helper("pdfmaster")->__("firstname"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "firstname",
						));
					
						$fieldset->addField("middlename", "text", array(
						"label" => Mage::helper("pdfmaster")->__("middlename"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "middlename",
						));
					
						$fieldset->addField("lastname", "text", array(
						"label" => Mage::helper("pdfmaster")->__("lastname"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "lastname",
						));
					
						$fieldset->addField("address", "textarea", array(
						"label" => Mage::helper("pdfmaster")->__("address"),
						"name" => "address",
						));
					
						$fieldset->addField("telephone", "text", array(
						"label" => Mage::helper("pdfmaster")->__("telephone"),
						"name" => "telephone",
						));
					
						$fieldset->addField("clinic", "text", array(
						"label" => Mage::helper("pdfmaster")->__("clinic"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "clinic",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getClinicalcustomerData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getClinicalcustomerData());
					Mage::getSingleton("adminhtml/session")->setClinicalcustomerData(null);
				} 
				elseif(Mage::registry("clinicalcustomer_data")) {
				    $form->setValues(Mage::registry("clinicalcustomer_data")->getData());
				}
				return parent::_prepareForm();
		}
}
