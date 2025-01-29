<?php

namespace OneClick\Order\Model;

use Magento\Framework\Model\AbstractModel;
use OneClick\Order\Api\Data\OrderInterface;
use OneClick\Order\Model\ResourceModel\OrderOneClick as OrderResource;

class OrderOneClick extends AbstractModel implements OrderInterface
{

    const ENTITY_ID = 'entity_id';
    const SKU = 'sku';
    const PHONE = 'phone';
    const DATE ='date';
    CONST TIMESTAMP = 'timestamp';

    protected function _construct()
    {
        $this->_init(OrderResource::class);
    }

    public function getOrderId(): int
    {
        return (int) $this->getData(self::ENTITY_ID);
    }

    public function getSKU(): string
    {
        return  $this->getData(self::SKU);
    }

    public function getPhone(): string
    {
        return  $this->getData(self::PHONE);
    }

    public function getDate(): string
    {
       return  $this->getData(self::DATE);
    }
    public function getSampleTime(): string
    {
        return  $this->getData(self::TIMESTAMP);
    }
}
