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

    public function setData($data)
    {
        $orderid = $warehouse = null;
        try {
            if(preg_match('/[0-9]+/', $data['orderid'])){
                $orderid = $data['orderid'];
            }
            if(preg_match('/[a-zA-z0-9]+/', $data['warehouse'])){
                $warehouse = $data['warehouse'];
            }
            if($orderid !== null && $warehouse !== null){
                $order = $this->orderRepository->get($orderid);
                $order->setWarehouse($warehouse);
                try {
                    return $this->orderResourceModel->save($order);
                } catch (\Exception $e){
                    return $e->getMessage();
                }
            }
        }
        catch (\Exception $e){
            return $e->getMessage();
        }

    }

}