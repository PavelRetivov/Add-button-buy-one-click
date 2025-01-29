<?php

namespace OneClick\Order\Api;

use Magento\Backend\Model\Search\Order;
use OneClick\Order\Api\Data\OrderInterface;

/**
 * api
 */
interface CustomerOrdersListInterface
{
    /**
     * @return OrderInterface[];
     */
    public function getList();

    /**
     * @param int $entity_id
     * @return OrderInterface
     */

    public function getOrder(int $entity_id);
    /**
     * @param int $entity_id
     * @return OrderInterface
     */
    public function getItem(int $entity_id);
}
