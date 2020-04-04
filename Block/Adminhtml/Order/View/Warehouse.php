<?php
namespace Ws\Warehouse\Block\Adminhtml\Order\View;

use Ws\Warehouse\Helper\Data;
use Magento\Sales\Model\OrderRepository;

class Warehouse extends \Magento\Backend\Block\Template
{

    /**
     * @var Data
     */
    protected $_mydata;

    /**
     * @var OrderRepository
     */
    private $_orderRepository;

    /**
     * @var
     */
    public $order;

    /**
     * Warehouse constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param Data $mydata
     * @param OrderRepository $orderRepository
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        Data $mydata,
        OrderRepository $orderRepository,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->_mydata = $mydata;
        $this->_orderRepository = $orderRepository;
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getWarehouse(){
        return $this->_mydata->getAllOptions();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOrderById($id) {
        return $this->_orderRepository->get($id);
    }

    /**
     * @param $incrementId
     * @return mixed
     */
    public function getOrderByIncrementId($incrementId) {
        $this->searchCriteriaBuilder->addFilter('increment_id', $incrementId);

        $this->order = $this->_orderRepository->getList(
            $this->searchCriteriaBuilder->create()
        )->getItems();

        return $this->order;
    }

    /**
     * @return mixed
     */
    public function getOrderId(){
        return $this->getRequest()->getParam('order_id');
    }

    /**
     * @return mixed
     */
    private function getOrder(){
        $orderId = $this->getOrderId();
        return $this->getOrderById($orderId);
    }

    /**
     * @return string
     */
    public function getOrderWarehouseByGetOrderId(): string {
        $order = $this->getOrder();
        return $order->getWarehouse();
    }

    /**
     * @return string
     */
    public function getOrderStatus(): string {
        return $this->getOrder()->getStatus();
    }

}