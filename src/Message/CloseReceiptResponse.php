<?php

namespace Omnipay\SberbankPay\Message;

use Omnipay\Sberbank\Message\AbstractResponse;

class CloseReceiptResponse extends AbstractResponse
{
    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return array_key_exists('ErrorMessage', $this->data) ? $this->data['ErrorMessage'] : null;
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return array_key_exists('ErrorCode', $this->data) ? $this->data['ErrorCode'] : null;
    }

    /**
     * Number (identifier) of the order in the pay system
     *
     * @return mixed
     */
    public function getOrderId()
    {
        return array_key_exists('OrderId', $this->data) ? $this->data['OrderId'] : null;
    }
}