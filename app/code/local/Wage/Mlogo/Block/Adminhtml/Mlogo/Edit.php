<?php

class Wage_Mlogo_Block_Adminhtml_Mlogo_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'mlogo';
        $this->_controller = 'adminhtml_mlogo';
        
        $this->_updateButton('save', 'label', Mage::helper('mlogo')->__('Save Logo'));
        $this->_updateButton('delete', 'label', Mage::helper('mlogo')->__('Delete Logo'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('mlogo_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'mlogo_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'mlogo_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('mlogo_data') && Mage::registry('mlogo_data')->getId() ) {
            return Mage::helper('mlogo')->__("Edit Logo '%s'", $this->htmlEscape(Mage::registry('mlogo_data')->getTitle()));
        } else {
            return Mage::helper('mlogo')->__('Add Logo');
        }
    }
}