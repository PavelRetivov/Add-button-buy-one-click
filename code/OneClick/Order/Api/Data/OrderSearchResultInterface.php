<?php

declare(strict_types=1);

namespace OneClick\Order\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface OrderSearchResultInterface extends SearchResultsInterface
{

    /**
     * @return OrderInterface[]
     */
    public function getItems();

    /**
     * @param OrderInterface[] $items
     * @return SearchResultsInterface
     */
    public function setItems(array $items);
}
