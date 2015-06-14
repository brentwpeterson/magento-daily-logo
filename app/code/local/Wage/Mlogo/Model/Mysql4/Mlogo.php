<?php

class Wage_Mlogo_Model_Mysql4_Mlogo extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the mlogo_id refers to the key field in your database table.
        $this->_init('mlogo/mlogo', 'mlogo_id');
    }
}