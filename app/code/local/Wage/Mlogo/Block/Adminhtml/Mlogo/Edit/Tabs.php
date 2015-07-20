<?php

class Wage_Mlogo_Block_Adminhtml_Mlogo_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('mlogo_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('mlogo')->__('Logo Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('mlogo')->__('Logo Information'),
          'title'     => Mage::helper('mlogo')->__('Logo Information'),
          'content'   => $this->getLayout()->createBlock('mlogo/adminhtml_mlogo_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}