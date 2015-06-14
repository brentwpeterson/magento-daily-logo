<?php

class Wage_Mlogo_Block_Adminhtml_Mlogo_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('mlogoGrid');
      $this->setDefaultSort('mlogo_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('mlogo/mlogo')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('mlogo_id', array(
          'header'    => Mage::helper('mlogo')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'mlogo_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('mlogo')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));


      $this->addColumn('link', array(
          'header'    => Mage::helper('mlogo')->__('Link'),
          'align'     =>'left',
          'index'     => 'link',
      ));

      $this->addColumn('schedule_start', array(
          'header'    => Mage::helper('mlogo')->__('Schedule start date'),
          'align'     =>'left',
          'index'     => 'schedule_start',
      ));


      $this->addColumn('schedule_end', array(
          'header'    => Mage::helper('mlogo')->__('Schedule end date'),
          'align'     =>'left',
          'index'     => 'schedule_end',
      ));

	    $this->addColumn('filename', array(
          'header' => Mage::helper('catalog')->__('Logo'),
          'align' => 'left',
          'index' => 'filename',
          'width'     => '97',
          'renderer' => 'Wage_Mlogo_Block_Adminhtml_Mlogo_Grid_Renderer_Image'
      ));

      $this->addColumn('status', array(
          'header'    => Mage::helper('mlogo')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
      $this->addColumn('action',
          array(
              'header'    =>  Mage::helper('mlogo')->__('Action'),
              'width'     => '100',
              'type'      => 'action',
              'getter'    => 'getId',
              'actions'   => array(
                  array(
                      'caption'   => Mage::helper('mlogo')->__('Edit'),
                      'url'       => array('base'=> '*/*/edit'),
                      'field'     => 'id'
                  )
              ),
              'filter'    => false,
              'sortable'  => false,
              'index'     => 'stores',
              'is_system' => true,
      ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('mlogo')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('mlogo')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('mlogo_id');
        $this->getMassactionBlock()->setFormFieldName('mlogo');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('mlogo')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('mlogo')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('mlogo/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('mlogo')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('mlogo')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}