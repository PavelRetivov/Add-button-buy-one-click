<?php

namespace OneClick\Order\Model\ResourceModel\Collection;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use OneClick\Order\Api\Data\OrderSearchResultInterface;
use OneClick\Order\Model\OrderOneClick;
use OneClick\Order\Model\ResourceModel\OrderOneClick as OrderResource;


class Collection extends  AbstractCollection implements OrderSearchResultInterface
{
    /**
     * @var SearchCriteriaInterface
     */
    private $searchCriteria;

        protected function _construct()
        {
            $this->_init(OrderOneClick::class, OrderResource::class);
        }

    public function setItems(array $items)
    {
       if($items) {
           return $this;
       }
       foreach ($items as $item) {
           $this->addItem($item);
       }
       return $this;
    }

    public function getSearchCriteria()
    {
       return $this->searchCriteria;
    }

    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }

    public function getTotalCount()
    {
        return $this->getSize();
    }

    public function setTotalCount($totalCount)
    {
       return $this;
    }
}
