<?php
class Wage_Mlogo_Block_Page_Html_Header extends Mage_Page_Block_Html_Header
{
    public function getLogoSrc()
    {
        $dated = date('Y-m-d H:i:s');
        $mlogo = Mage::getModel('mlogo/mlogo')->getCollection()
            ->addfieldtofilter('status', array('eq' => '1'))
            ->addfieldtofilter('schedule_start', array('lteq' => $dated))
            ->addfieldtofilter('schedule_end', array('gteq' => $dated));
        $mlogoData = $mlogo->getFirstItem()->getData();

        if(!empty($mlogoData)){
            return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).$mlogoData['filename'];
        }

        if (empty($this->_data['logo_src'])) {
            $this->_data['logo_src'] = Mage::getStoreConfig('design/header/logo_src');
        }
        return $this->getSkinUrl($this->_data['logo_src']);
    }

    public function getLogoSrcSmall()
    {
        $dated = date('Y-m-d H:i:s');
        $mlogo = Mage::getModel('mlogo/mlogo')->getCollection()
            ->addfieldtofilter('status', array('eq' => '1'))
            ->addfieldtofilter('schedule_start', array('lteq' => $dated))
            ->addfieldtofilter('schedule_end', array('gteq' => $dated));
        $mlogoData = $mlogo->getFirstItem()->getData();

        if(!empty($mlogoData)){
            return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).$mlogoData['filename'];
        }

        if (empty($this->_data['logo_src_small'])) {
            $this->_data['logo_src_small'] = Mage::getStoreConfig('design/header/logo_src_small');
        }
        return $this->getSkinUrl($this->_data['logo_src_small']);
    }

    public function getLogoAlt()
    {
        $dated = date('Y-m-d H:i:s');
        $mlogo = Mage::getModel('mlogo/mlogo')->getCollection()
            ->addfieldtofilter('status', array('eq' => '1'))
            ->addfieldtofilter('schedule_start', array('lteq' => $dated))
            ->addfieldtofilter('schedule_end', array('gteq' => $dated));
        $mlogoData = $mlogo->getFirstItem()->getData();

        if(!empty($mlogoData)){
            return $mlogoData['title'];
        }

        if (empty($this->_data['logo_alt'])) {
            $this->_data['logo_alt'] = Mage::getStoreConfig('design/header/logo_alt');
        }
        return $this->_data['logo_alt'];
    }
}
