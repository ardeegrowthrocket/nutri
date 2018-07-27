<?php

class Nvncbl_Nutrigineering_IndexController extends Mage_Core_Controller_Front_Action {

	public function loginAsAction(){
		$customer_id = Mage::app()->getRequest()->getParam( 'customer_id' );
		Mage::getSingleton('customer/session')->loginById( $customer_id );
		$this->_redirect( '' );
	}

	public function logoutAction(){
		Mage::getSingleton('customer/session')->unsClinicId();
		$this->_redirect( 'customer/account/logout' );
	}

}