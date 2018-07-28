<?php

class Mind_Pdfmaster_Block_Adminhtml_Pdflist_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("pdflistGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("pdfmaster/pdflist")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("pdfmaster")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
				$this->addColumn("title", array(
				"header" => Mage::helper("pdfmaster")->__("title"),
				"index" => "title",
				));
				$this->addColumn("position", array(
				"header" => Mage::helper("pdfmaster")->__("position"),
				"index" => "position",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_pdflist', array(
					 'label'=> Mage::helper('pdfmaster')->__('Remove Pdflist'),
					 'url'  => $this->getUrl('*/adminhtml_pdflist/massRemove'),
					 'confirm' => Mage::helper('pdfmaster')->__('Are you sure?')
				));
			return $this;
		}
			

}