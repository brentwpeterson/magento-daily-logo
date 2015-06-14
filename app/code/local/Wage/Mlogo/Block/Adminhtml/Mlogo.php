<?php
class Wage_Mlogo_Block_Adminhtml_Mlogo extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_mlogo';
    $this->_blockGroup = 'mlogo';
    $this->_headerText = Mage::helper('mlogo')->__('Logo Manager');
    $this->_addButtonLabel = Mage::helper('mlogo')->__('Add Logo');
    parent::__construct();
  }
}