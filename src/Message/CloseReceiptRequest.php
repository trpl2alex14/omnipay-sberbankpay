<?php

namespace Omnipay\SberbankPay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Sberbank\Message\AbstractRequest;
use RFAct54\OrderBundle;

class CloseReceiptRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        if (!$this->getMdOrder() && !$this->getOrderNumber()) {
            throw new InvalidRequestException("You must specify one of the parameters - mdOrder or orderNumber");
        }

        $additionalParams = [
            'mdOrder',
            'orderNumber',
            'amount',
            'jsonParams',
            'orderBundle',
            'additionalOfdParams'
        ];

        return $this->specifyAdditionalParameters([], $additionalParams);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'closeOfdReceipt.do';
    }

    /**
     * @return mixed
     */
    public function getMdOrder()
    {
        return $this->getParameter('mdOrder');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setMdOrder($value)
    {
        return $this->setParameter('mdOrder', $value);
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
     * Validates and returns the formatted amount.
     * Paymentgate requires to send amount in kopeck instead of just rubles
     *
     * @return int
     */
    public function getAmount(): int
    {
        return (int) $this->getParameter('amount');
    }

    /**
     * Set OrderBundle.
     *
     * @param array $params
     * @return $this
     */
    public function setAdditionalOfdParams($params): self
    {
        return $this->setParameter('additionalOfdParams', $params);
    }

    /**
     * Order Bundle.
     *
     * @return array|null
     */
    public function getAdditionalOfdParams(): ?array
    {
        return $this->getParameter('additionalOfdParams');
    }

    /**
     * Set OrderBundle.
     *
     * @param OrderBundle $bundle
     * @return $this
     */
    public function setOrderBundle(OrderBundle $bundle): self
    {
        return $this->setParameter('orderBundle', $bundle->toArray());
    }

    /**
     * Order Bundle.
     *
     * @return array|null
     */
    public function getOrderBundle(): array
    {
        return $this->getParameter('orderBundle');
    }
}