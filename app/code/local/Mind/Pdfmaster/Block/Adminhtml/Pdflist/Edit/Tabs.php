<?php
class Mind_Pdfmaster_Block_Adminhtml_Pdflist_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("pdflist_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("pdfmaster")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("pdfmaster")->__("Item Information"),
				"title" => Mage::helper("pdfmaster")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("pdfmaster/adminhtml_pdflist_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
