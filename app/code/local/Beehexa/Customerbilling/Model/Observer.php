<?php

class Beehexa_Customerbilling_Model_Observer {

    public function updateCustomerBilling($event) {
        $customer = $event->getCustomer();
        if($customer->getId())
        {
            $address = $customer->getPrimaryBillingAddress();
        } else {
            return;
        }
        
        if ($address)
            return;
        
        $data = [
            'street' => 'default street',
            'company' => 'company',
            'postcode' => '',
            'region' => '',
            'region_id' => '',
            'city' => '',
            'firstname' => $customer->getFirstname(),
            'lastname' => $customer->getLastname(),
            'telephone' => '000000000',
            'country_id' => ''
        ];
        try {
            $address = Mage::getModel('customer/address');
            $address->setCustomer($customer);
            $address->addData($data);
            $address->save();
            $customer->addAddress($address)
                    ->setDefaultBilling($address->getId())
                    ->save();
        } catch (Exception $ex) {
            Mage::logException($ex);
        }
    }

}