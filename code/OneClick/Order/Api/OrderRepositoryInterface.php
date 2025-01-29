<?php

namespace OneClick\Order\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use OneClick\Order\Api\Data\OrderSearchResultInterface;

interface OrderRepositoryInterface
{
    public function getList(SearchCriteriaInterface $searchCriteria): OrderSearchResultInterface;
    public function get(int $orderId);
}
