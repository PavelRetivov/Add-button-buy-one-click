<?php

namespace OneClick\Order\Model\ResourceModel\Collection;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use OneClick\Order\Api\Data\OrderSearchResultInterface;
use OneClick\Order\Model\OrderOneClick;
use OneClick\Order\Model\ResourceModel\OrderOneClick as OrderResource;


class Collection extends  AbstractCollection
{

        protected function _construct()
        {
            $this->_init(OrderOneClick::class, OrderResource::class);
        }

}
