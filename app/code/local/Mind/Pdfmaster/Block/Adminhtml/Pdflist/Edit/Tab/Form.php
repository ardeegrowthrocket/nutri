<?php
class Mind_Pdfmaster_Block_Adminhtml_Pdflist_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("pdfmaster_form", array("legend"=>Mage::helper("pdfmaster")->__("Item information")));

				
						$fieldset->addField("title", "text", array(
						"label" => Mage::helper("pdfmaster")->__("Title"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "title",
						));
					
						$fieldset->addField("position", "text", array(
						"label" => Mage::helper("pdfmaster")->__("Position"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "position",
						));
									
						$fieldset->addField('pdf_file', 'file', array(
						'label' => Mage::helper('pdfmaster')->__('PDF'),
						'name' => 'pdf_file',
						'note' => '(pdf only)',
						));

				if (Mage::getSingleton("adminhtml/session")->getPdflistData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getPdflistData());
					Mage::getSingleton("adminhtml/session")->setPdflistData(null);
				} 
				elseif(Mage::registry("pdflist_data")) {
				    $form->setValues(Mage::registry("pdflist_data")->getData());
				}
				return parent::_prepareForm();
		}
}
