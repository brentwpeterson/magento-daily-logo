<?php

class Wage_Mlogo_Helper_Data extends Mage_Core_Helper_Abstract
{

	public function getLogo()
    {
    	$mlogoEnable = Mage::getStoreConfig('mlogo/general/enable');
        if($mlogoEnable)
        {
        	$mlogoData = array();
            $dated = date('Y-m-d H:i:s');
            $mlogo = Mage::getModel('mlogo/mlogo')->getCollection()
                ->addfieldtofilter('status', array('eq' => '1'))
                ->addfieldtofilter('schedule_start', array('lteq' => $dated))
                ->addfieldtofilter('schedule_end', array('gteq' => $dated));
            $mlogoData = $mlogo->getFirstItem()->getData();

            return $mlogoData;
        }
    }

}