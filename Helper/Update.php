<?php

namespace Ws\Warehouse\Helper;

class Update extends \Magento\Framework\App\Helper\AbstractHelper{

    public function __construct(
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Sales\Model\ResourceModel\Order $orderResourceModel
    ) {
        $this->orderResourceModel = $orderResourceModel;
        $this->orderRepository = $orderRepository;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        echo "<pre>";
        print_r($data);
        exit;
        $order = $this->orderRepository->get(1);
        $order->setWarehouse('new@amasty.com');
        $this->orderResourceModel->save($order);
    }

}