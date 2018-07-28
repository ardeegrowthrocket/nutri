<?php

class Mind_Pdfmaster_Adminhtml_ClinicalcustomerController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('pdfmaster/clinicalcustomer');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("pdfmaster/clinicalcustomer")->_addBreadcrumb(Mage::helper("adminhtml")->__("Clinicalcustomer  Manager"),Mage::helper("adminhtml")->__("Clinicalcustomer Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Pdfmaster"));
			    $this->_title($this->__("Manager Clinicalcustomer"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Pdfmaster"));
				$this->_title($this->__("Clinicalcustomer"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("pdfmaster/clinicalcustomer")->load($id);
				if ($model->getId()) {
					Mage::register("clinicalcustomer_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("pdfmaster/clinicalcustomer");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Clinicalcustomer Manager"), Mage::helper("adminhtml")->__("Clinicalcustomer Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Clinicalcustomer Description"), Mage::helper("adminhtml")->__("Clinicalcustomer Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("pdfmaster/adminhtml_clinicalcustomer_edit"))->_addLeft($this->getLayout()->createBlock("pdfmaster/adminhtml_clinicalcustomer_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("pdfmaster")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Pdfmaster"));
		$this->_title($this->__("Clinicalcustomer"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("pdfmaster/clinicalcustomer")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("clinicalcustomer_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("pdfmaster/clinicalcustomer");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Clinicalcustomer Manager"), Mage::helper("adminhtml")->__("Clinicalcustomer Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Clinicalcustomer Description"), Mage::helper("adminhtml")->__("Clinicalcustomer Description"));


		$this->_addContent($this->getLayout()->createBlock("pdfmaster/adminhtml_clinicalcustomer_edit"))->_addLeft($this->getLayout()->createBlock("pdfmaster/adminhtml_clinicalcustomer_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("pdfmaster/clinicalcustomer")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Clinicalcustomer was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setClinicalcustomerData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setClinicalcustomerData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("pdfmaster/clinicalcustomer");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("pdfmaster/clinicalcustomer");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'clinicalcustomer.csv';
			$grid       = $this->getLayout()->createBlock('pdfmaster/adminhtml_clinicalcustomer_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'clinicalcustomer.xml';
			$grid       = $this->getLayout()->createBlock('pdfmaster/adminhtml_clinicalcustomer_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
