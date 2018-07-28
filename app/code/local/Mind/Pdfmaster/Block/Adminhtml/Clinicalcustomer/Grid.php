<?php

class Mind_Pdfmaster_Block_Adminhtml_Clinicalcustomer_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("clinicalcustomerGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("pdfmaster/clinicalcustomer")->getCollection();
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
                
				$this->addColumn("firstname", array(
				"header" => Mage::helper("pdfmaster")->__("firstname"),
				"index" => "firstname",
				));
				$this->addColumn("middlename", array(
				"header" => Mage::helper("pdfmaster")->__("middlename"),
				"index" => "middlename",
				));
				$this->addColumn("lastname", array(
				"header" => Mage::helper("pdfmaster")->__("lastname"),
				"index" => "lastname",
				));
				$this->addColumn("telephone", array(
				"header" => Mage::helper("pdfmaster")->__("telephone"),
				"index" => "telephone",
				));
				$this->addColumn("clinic", array(
				"header" => Mage::helper("pdfmaster")->__("clinic"),
				"index" => "clinic",
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
			$this->getMassactionBlock()->addItem('remove_clinicalcustomer', array(
					 'label'=> Mage::helper('pdfmaster')->__('Remove Clinicalcustomer'),
					 'url'  => $this->getUrl('*/adminhtml_clinicalcustomer/massRemove'),
					 'confirm' => Mage::helper('pdfmaster')->__('Are you sure?')
				));
			return $this;
		}
			

}