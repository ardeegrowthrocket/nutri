<?php
class Mind_Pdfmaster_Model_Observer
{

			public function Setcookie(Varien_Event_Observer $observer)
			{

					$cookie = Mage::getSingleton('core/cookie');
					$cookie->set('customerid',Mage::getSingleton("customer/session")->getCustomer()->getId(),time()+86400,'/');			

			}

			public function Setcookie2(Varien_Event_Observer $observer)
			{
					$cookie = Mage::getSingleton('core/cookie');		
					$cookie->set('customerid', '0' ,time()+86400,'/');

			}		

			public function saveAfter(Varien_Event_Observer $observer)
			{
				$order = $observer->getEvent()->getOrder();

				if($_REQUEST['patient']){
					$order->setClinicalCustomer($_REQUEST['patient']);
				}

			}			
		
}
