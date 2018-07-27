<?php

class Nvncbl_Nutrigineering_Model_Observer {

	public function setClinicSession( $observer ){

		$customer = $observer->getEvent()->getCustomer();
		$customer_group = Mage::getModel('customer/group')->load( $customer->getGroupId() );

		if( $customer_group->getCustomerGroupCode() == 'Clinic' ){
			Mage::getSingleton('customer/session')->setClinicId( $customer->getId() );
		}

	}

}