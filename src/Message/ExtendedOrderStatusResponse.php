<?php

namespace Omnipay\SberbankPay\Message;

use Omnipay\Sberbank\Message\ExtendedOrderStatusResponse as BaseExtendedOrderStatusResponse;

class ExtendedOrderStatusResponse extends BaseExtendedOrderStatusResponse
{
    /**
     * The amount of payment in kopecks (or cents)
     *
     * @return int
     */
    public function getAmount()
    {
        return array_key_exists('amount', $this->data) ? $this->data['amount'] : null;
    }
}
