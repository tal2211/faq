<?php

class Mike_Faq_Block_Adminhtml_Faq_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('mike_faq/faq')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('mike_faq');

        $this->addColumn('entity_id', array(
            'header' => $helper->__('ID'),
            'index' => 'entity_id'
        ));

        $this->addColumn('quetion', array(
            'header' => $helper->__('Quetion'),
            'index' => 'quetion',
            'type' => 'text',
        ));

        $this->addColumn('status', array(
            'header' => $helper->__('Status'),
            'index' => 'status',
            'type' => 'text'
        ));
        if (!Mage::app()->isSingleStoreMode()) {
            $this->addColumn('store_id', array(
                'header'        => Mage::helper('adminhtml')->__('Store View'),
                'index'         => 'store_id',
                'type'          => 'store',
                'store_all'     => true,
                'store_view'    => true,
                'sortable'      => false,
                'filter_condition_callback'
                                => array($this, '_filterStoreCondition'),
            ));
        }
        $this->addColumn('action',
                array(
                    'header'    => Mage::helper('mike_faq')->__('Action'),
                    'width'     => '50px',
                    'type'      => 'action',
                    'getter'     => 'getId',
                    'actions'   => array(
                        array(
                            'caption' => Mage::helper('mike_faq')->__('Edit'),
                            'url'     => array(
                                'base'=>'*/*/edit',
                                'params'=>array('store'=>$this->getRequest()->getParam('store'))
                            ),
                            'field'   => 'id'
                        )
                    ),
                    'filter'    => false,
                    'sortable'  => false,
                    'index'     => 'stores',
            ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
                    'id' => $model->getId(),
                ));
    }


}
