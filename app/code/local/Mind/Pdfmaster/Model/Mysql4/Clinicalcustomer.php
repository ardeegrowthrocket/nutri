<?php
class Mind_Pdfmaster_Model_Mysql4_Clinicalcustomer extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("pdfmaster/clinicalcustomer", "id");
    }
}