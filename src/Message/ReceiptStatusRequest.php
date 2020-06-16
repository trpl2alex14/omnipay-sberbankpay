<?php

namespace Omnipay\SberbankPay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Sberbank\Message\AbstractRequest;

class ReceiptStatusRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        if (!$this->getOrderId() && !$this->getOrderNumber()) {
            throw new InvalidRequestException("You must specify one of the parameters - orderId or orderNumber");
        }

        return $this->specifyAdditionalParameters([], ['orderId', 'orderNumber', 'language', 'uuid']);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'getReceiptStatus.do';
    }

    /**
 * @return mixed
 */
    public function getOrderNumber()
    {
        return $this->getParameter('orderNumber');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setOrderNumber($value)
    {
        return $this->setParameter('orderNumber', $value);
    }

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->getParameter('uuid');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setUuid($value)
    {
        return $this->setParameter('uuid', $value);
    }
}