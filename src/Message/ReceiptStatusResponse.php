<?php

namespace Omnipay\SberbankPay\Message;
use \Omnipay\Sberbank\Message\AbstractResponse;

class ReceiptStatusResponse extends AbstractResponse
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
     * Number (identifier) of the order in the store system
     *
     * @return mixed
     */
    public function getOrderNumber()
    {
        return array_key_exists('OrderNumber', $this->data) ? $this->data['OrderNumber'] : null;
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

    /**
     * Server name ver 1.05+
     *
     * @return mixed
     */
    public function getDaemonСode()
    {
        return array_key_exists('daemonСode', $this->data) ? $this->data['daemonСode'] : null;
    }

    /**
     * Registration number of the cash register equipment
     *
     * @return mixed
     */
    public function getEcrRegistrationNumber()
    {
        return array_key_exists('ecr_registration_number', $this->data) ? $this->data['ecr_registration_number'] : null;
    }

    /**
     * Block with receipt parameters
     *
     * @return mixed
     */
    public function getReceipt()
    {
        return array_key_exists('receipt', $this->data) ? $this->data['receipt'] : null;
    }
}