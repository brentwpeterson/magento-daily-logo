<?php

class Wage_Mlogo_Block_Adminhtml_Mlogo_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('mlogo_form', array('legend'=>Mage::helper('mlogo')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('mlogo')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));


      $fieldset->addField('link', 'text', array(
          'name'      => 'link',
          'label'     => Mage::helper('mlogo')->__('Link Url'),
          'title'     => Mage::helper('mlogo')->__('Link Url'),
          'required'  => true,
      ));

      $fieldset->addField('filename', 'image', array(
          'label'     => Mage::helper('mlogo')->__('Logo image'),
          'required'  => false,
          'name'      => 'filename',
	    ));

      $dateFormatIso = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
      $fieldset->addField('schedule_start', 'date', array(
        'name'      => 'schedule_start',
        'label'     => Mage::helper('mlogo')->__('Schedule start date'),
        'image'     => $this->getSkinUrl('images/grid-cal.gif'),
        'format'    => $dateFormatIso,
        'class'     => 'validate-date validate-date-range date-range-date-from',
        'required'  => true
      ));

      $dateFormatIso = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
      $fieldset->addField('schedule_end', 'date', array(
        'name'      => 'schedule_end',
        'label'     => Mage::helper('mlogo')->__('Schedule end date'),
        'image'     => $this->getSkinUrl('images/grid-cal.gif'),
        'format'    => $dateFormatIso,
        'class'     => 'validate-date validate-date-range date-range-date-from',
        'required'  => true
      ));


      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('mlogo')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('mlogo')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('mlogo')->__('Disabled'),
              ),
          ),
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getMlogoData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getMlogoData());
          Mage::getSingleton('adminhtml/session')->setMlogoData(null);
      } elseif ( Mage::registry('mlogo_data') ) {
          $form->setValues(Mage::registry('mlogo_data')->getData());
      }
      return parent::_prepareForm();
  }
}