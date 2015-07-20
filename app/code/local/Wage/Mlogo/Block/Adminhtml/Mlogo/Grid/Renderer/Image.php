<?php
class Wage_Mlogo_Block_Adminhtml_Mlogo_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $val = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).$row->getFilename();
        $out = "<img src=". $val ." width='97px'/>";
        return $out;
    }
}
