<?php

namespace OneClick\Order\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class OrderOneClick extends AbstractDB
{

    protected function _construct()
    {
        $this->_init('customer_quick_buy', 'entity_id');
    }
}
