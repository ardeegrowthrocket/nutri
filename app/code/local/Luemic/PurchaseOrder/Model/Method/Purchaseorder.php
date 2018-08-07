<?php

class Luemic_PurchaseOrder_Model_Method_Purchaseorder extends Mage_Payment_Model_Method_Abstract
{
    // necessary for determining the correct settings
    protected $_code  = 'clinical_quote';

    public function canUseForCountry($country)
    {
        /*
        for specific country, the flag will set up as 1
        */
        if($this->getConfigData('allowspecific')==1){
            $availableCountries = explode(',', $this->getConfigData('specificcountry'));
            if(!in_array($country, $availableCountries)){
                return false;
            }

        }

        if(Mage::getSingleton('adminhtml/session_quote')->getCustomer()){
            if(Mage::getSingleton('adminhtml/session_quote')->getCustomer()->getIsClinic()==1){
                return true;
            }
        }

        if(Mage::getSingleton('customer/session')->isLoggedIn()){
        	$customer_data=Mage::getSingleton('customer/session')->getCustomer();
        	if($customer_data->getIsClinic()==1){
        		return true;
        	}else{
        		return false;
        	}
        }else{
        	return false;
        }
        return true;
    }

    public function getInstructions()
    {
        return trim($this->getConfigData('instructions'));
    }    
}