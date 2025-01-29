<?php

declare(strict_types=1);

namespace OneClick\Order\Api;

/**
 * @api
 */
interface ManagerOrderInterface
{
    /**
     * @param string $sku
     * @param string $phone
     * @return int
     */
    public function save(string $sku, string $phone): int;
}
