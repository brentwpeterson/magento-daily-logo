<?php

class Wage_Mlogo_Model_Observer
{
    public function coreBlockAbstractToHtmlAfter($event)
    {
        $mlogoEnable = Mage::getStoreConfig('mlogo/general/enable');
        $mlogoLabelEnable = Mage::getStoreConfig('mlogo/general/enablelabel');
        $mlogoData = Mage::Helper('mlogo')->getLogo();
        if($mlogoEnable && $mlogoLabelEnable && !empty($mlogoData))
        {
            /* @var $block Mage_Core_Block_Abstract */
            $block = $event->getBlock();
            if ($block instanceof Mage_Page_Block_Html_Header && 'page/html/header.phtml' === $block->getTemplate()) {

                $html = $event->getTransport()->getHtml();
                $dom = new DOMDocument();
                $dom->loadHTML($html);
                $xml = simplexml_import_dom($dom);  

                $logoclass = Mage::getStoreConfig('mlogo/general/logoclass');
                $class = Mage::getStoreConfig('mlogo/general/class');
                $style = Mage::getStoreConfig('mlogo/general/style');
                /*if(Mage::app()->getRequest()->getParam('error_description') != '')
                {
                    $formError = current($xml->xpath('//form[@id=\'loginForm\']//div[@id=\'messages\']'));
                    $ul = $formError->addChild('ul');
                    $ul->addAttribute('class', 'messages');
                    $li = $ul->addChild('li');
                    $li->addAttribute('class', 'error-msg');
                    $ul2 = $li->addChild('ul');
                    $li2 = $ul2->addChild('li');

                    $li2->addChild('span', Mage::app()->getRequest()->getParam('error_description'));
                }*/
                $path = "//header[@id='header']//div[@class='content']//a[@class='".$logoclass."']";
                $formButtons = current($xml->xpath($path));

                if($formButtons)
                {
                    $dated = date('Y-m-d H:i:s');
                    
                    $mlogoLabel = $formButtons->addChild('span', $mlogoData['title']);
                    $mlogoLabel->addAttribute('class', $class);
                    $mlogoLabel->addAttribute('style', $style);
                    $html = $xml->saveXML();
                    $event->getTransport()->setHtml($html);
                }
            }
        }
    }
}