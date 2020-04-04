<?php
namespace Ws\Warehouse\Block\Adminhtml\Order\View;

use Ws\Warehouse\Helper\Data;

class Warehouse extends \Magento\Backend\Block\Template
{

    protected $_mydata;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        Data $mydata,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->_mydata = $mydata;
        parent::__construct($context, $data);
    }

    public function getWarehouse(){
        $data = $this->_mydata->getAllOptions();
    }

    public function ciao(){
        return 'ciao';
    }

}