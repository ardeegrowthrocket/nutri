<?php
require_once "Mage/Customer/controllers/AccountController.php";  
class Mind_Account_Customer_AccountController extends Mage_Customer_AccountController{

    public function postDispatch()
    {
        parent::postDispatch();
        Mage::dispatchEvent('controller_action_postdispatch_adminhtml', array('controller_action' => $this));
    }

    public function Clinicalaction(){
		$this->loadLayout();
		$this->_initLayoutMessages('customer/session');
		$this->_initLayoutMessages('catalog/session');

		$this->getLayout()->getBlock('content')->append(
			$this->getLayout()->createBlock('customer/account_dashboard')
		);
		$this->getLayout()->getBlock('head')->setTitle($this->__('My Clinical Accounts'));
		$this->renderLayout();
    }

    public function Clinicaleditaction(){
		$this->loadLayout();
		$this->_initLayoutMessages('customer/session');
		$this->_initLayoutMessages('catalog/session');

		$this->getLayout()->getBlock('content')->append(
			$this->getLayout()->createBlock('customer/account_dashboard')
		);
		$this->getLayout()->getBlock('head')->setTitle($this->__('Edit/Add Clinic Account'));
		$this->renderLayout();
    }

    public function Clinicaldeleteaction(){
		$this->loadLayout();
		$this->_initLayoutMessages('customer/session');
		$this->_initLayoutMessages('catalog/session');

		$this->getLayout()->getBlock('content')->append(
			$this->getLayout()->createBlock('customer/account_dashboard')
		);
		$this->getLayout()->getBlock('head')->setTitle($this->__('Edit/Add Clinic Account'));
		$this->renderLayout();
    }

    public function Clinicalsaveaction(){
    	if(empty($_POST['id'])){
    		$data = Mage::getModel('pdfmaster/clinicalcustomer')->setData($_POST)->save(); 
    	}else{
    		$data = Mage::getModel('pdfmaster/clinicalcustomer')->load($_POST['id'])->setData($_POST)->save();
    	}
    	$session = $this->_getSession();
    	Mage::getSingleton('core/session')->addSuccess("Customer is successfully saved."); 
    	$this->_redirect('customer/account/clinical/'); // NVNCBL CUSTOM
    }

    public function Clinicalsavedeleteaction(){
    	if(!empty($_POST['id'])){
    		$data = Mage::getModel('pdfmaster/clinicalcustomer')->load($_POST['id'])->delete();
    	}
    	$session = $this->_getSession();
    	Mage::getSingleton('core/session')->addSuccess("Customer is successfully deleted."); 
    	$this->_redirect('customer/account/clinical/'); // NVNCBL CUSTOM
    }

}
				