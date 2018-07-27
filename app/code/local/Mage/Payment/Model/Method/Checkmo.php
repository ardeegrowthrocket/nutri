<?php

class Mage_Payment_Model_Method_Checkmo extends Mage_Payment_Model_Method_Abstract
{

	protected $_code  = 'checkmo';
	protected $_formBlockType = 'payment/form_checkmo';
	protected $_infoBlockType = 'payment/info_checkmo';

	/**
	 * Assign data to info model instance
	 *
	 * @param   mixed $data
	 * @return  Mage_Payment_Model_Method_Checkmo
	 */
	public function assignData($data)
	{
		$details = array();
		if ($this->getPayableTo()) {
			$details['payable_to'] = $this->getPayableTo();
		}
		if ($this->getMailingAddress()) {
			$details['mailing_address'] = $this->getMailingAddress();
		}
		if (!empty($details)) {
			$this->getInfoInstance()->setAdditionalData(serialize($details));
		}
		return $this;
	}

	public function getPayableTo()
	{
		return $this->getConfigData('payable_to');
	}

	public function getMailingAddress()
	{
		return $this->getConfigData('mailing_address');
	}

	public function isAvailable($quote = null)
	{
		if( !Mage::getSingleton('customer/session')->getClinicId() ){
			return false;
		}

		return parent::isAvailable( $quote );
	}

}
