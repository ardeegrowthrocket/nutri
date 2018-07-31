<?php

class Mind_Pdfmaster_Adminhtml_PdflistController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('pdfmaster/pdflist');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("pdfmaster/pdflist")->_addBreadcrumb(Mage::helper("adminhtml")->__("Pdflist  Manager"),Mage::helper("adminhtml")->__("Pdflist Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Pdfmaster"));
			    $this->_title($this->__("Manager Pdflist"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Pdfmaster"));
				$this->_title($this->__("Pdflist"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("pdfmaster/pdflist")->load($id);
				if ($model->getId()) {
					Mage::register("pdflist_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("pdfmaster/pdflist");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Pdflist Manager"), Mage::helper("adminhtml")->__("Pdflist Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Pdflist Description"), Mage::helper("adminhtml")->__("Pdflist Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("pdfmaster/adminhtml_pdflist_edit"))->_addLeft($this->getLayout()->createBlock("pdfmaster/adminhtml_pdflist_edit_tabs"));
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
		$this->_title($this->__("Pdflist"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("pdfmaster/pdflist")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("pdflist_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("pdfmaster/pdflist");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Pdflist Manager"), Mage::helper("adminhtml")->__("Pdflist Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Pdflist Description"), Mage::helper("adminhtml")->__("Pdflist Description"));


		$this->_addContent($this->getLayout()->createBlock("pdfmaster/adminhtml_pdflist_edit"))->_addLeft($this->getLayout()->createBlock("pdfmaster/adminhtml_pdflist_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						
				 //save image
		try{

if((bool)$post_data['pdf_file']['delete']==1) {

	        $post_data['pdf_file']='';

}
else {

	unset($post_data['pdf_file']);

	if (isset($_FILES)){

		if ($_FILES['pdf_file']['name']) {

			if($this->getRequest()->getParam("id")){
				$model = Mage::getModel("pdfmaster/pdflist")->load($this->getRequest()->getParam("id"));
				if($model->getData('pdf_file')){
						$io = new Varien_Io_File();
						$io->rm(Mage::getBaseDir('media').DS.implode(DS,explode('/',$model->getData('pdf_file'))));	
				}
			}
						$path = Mage::getBaseDir('media') . DS . 'pdfmaster' . DS .'pdflist'.DS;
						$uploader = new Varien_File_Uploader('pdf_file');
						$uploader->setAllowedExtensions(array('pdf'));
						$uploader->setAllowRenameFiles(false);
						$uploader->setFilesDispersion(false);
						$destFile = $path.$_FILES['pdf_file']['name'];
						$filename = $uploader->getNewFileName($destFile);
						$uploader->save($path, $filename);

						$post_data['pdf_file']='pdfmaster/pdflist/'.$filename;
		}
    }
}

        } catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				return;
        }
//save image


						$model = Mage::getModel("pdfmaster/pdflist")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Pdflist was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setPdflistData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setPdflistData($this->getRequest()->getPost());
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
						$model = Mage::getModel("pdfmaster/pdflist");
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
                      $model = Mage::getModel("pdfmaster/pdflist");
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
			$fileName   = 'pdflist.csv';
			$grid       = $this->getLayout()->createBlock('pdfmaster/adminhtml_pdflist_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'pdflist.xml';
			$grid       = $this->getLayout()->createBlock('pdfmaster/adminhtml_pdflist_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
