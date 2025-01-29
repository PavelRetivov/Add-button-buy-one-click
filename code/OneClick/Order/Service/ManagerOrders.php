<?php

namespace OneClick\Order\Service;

use OneClick\Order\Api\ManagerOrderInterface;
use OneClick\Order\Model\OrderOneClickFactory;
use OneClick\Order\Model\ResourceModel\OrderOneClick as Resource;

class ManagerOrders implements ManagerOrderInterface
{
    /**
     * @var OrderOneClick
     */
    private  $resource;

    /**
     * @var OrderOneClickFactory
     */
    private $orderFactory;

    public function __construct(
        Resource $resource,
        OrderOneClickFactory $orderFactory
    )
    {
        $this->resource = $resource;
        $this->orderFactory = $orderFactory;
    }

    public function save(string $sku, string $phone): int
    {
        try {

            $order = $this->orderFactory->create();
            $order->setData([
                'sku' => $sku,
                'phone' => $phone
            ]);

            $this->resource->save($order);
            return true;
        } catch (\Exception $e){
            return false;
        }
    }
}
