<?php

namespace OneClick\Order\Api\Data;

/**
 * @api
 */
interface OrderInterface
{
    /**
     * @return int
     */
    public function getOrderId(): int;

    /**
     * @return string
     */
    public function getSKU(): string;

    /**
     * @return string
     */
    public function getPhone(): string;


    /**
     * @return string
     */
    public function getDate(): string;

    /**
     * @return string
     */
    public function getSampleTime(): string;
}
