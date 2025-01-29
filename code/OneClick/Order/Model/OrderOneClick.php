<?php

namespace OneClick\Order\Model;

use Magento\Framework\Model\AbstractModel;
use OneClick\Order\Model\ResourceModel\OrderOneClick as OrderResource;

class OrderOneClick extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(OrderResource::class);
    }
}
