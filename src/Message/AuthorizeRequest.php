<?php

namespace Omnipay\SberbankPay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Exception\RuntimeException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Sberbank\Message\AuthorizeRequest as BaseAuthorizeRequest;
use RFAct54\OrderBundle;

/**
 * Class AuthorizeRequest
 * @package Omnipay\Sberbank\Message
 */
class AuthorizeRequest extends BaseAuthorizeRequest
{
    /**
     * @return array|mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('orderNumber', 'amount', 'returnUrl');

        $data = [
            'orderNumber' => $this->getOrderNumber(),
            'amount' => $this->getAmount(),
            'returnUrl' => $this->getReturnUrl()
        ];

        $additionalParams = [
            'currency',
            'failUrl',
            'description',
            'language',
            'pageView',
            'clientId',
            'merchantLogin',
            'jsonParams',
            'sessionTimeoutSecs',
            'expirationDate',
            'bindingId',
            'taxSystem',
            'orderBundle',
            'additionalOfdParams'
        ];

        return $this->specifyAdditionalParameters($data, $additionalParams);
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
     * @return string|null
     */
    public function getAdditionalOfdParams()
    {
        $params = $this->getParameter('additionalOfdParams');
        return $params ? json_encode($params) : null;
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
     * @return string|null
     */
    public function getOrderBundle()
    {
        $bundle = $this->getParameter('orderBundle');
        return $bundle ? json_encode($bundle) : null;
    }

    /**
     * Used tax system
     *
     * @return int|null
     */
    public function getTaxSystem(): ?int
    {
        return $this->getParameter('taxSystem');
    }

    /**
     * Set tax system
     *
     * @param $taxSystem
     * @return AbstractRequest|$this
     * @throws RuntimeException
     */
    public function setTaxSystem($taxSystem): self
    {
        return $this->setParameter('taxSystem', $taxSystem);
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
     * Validates and returns the formatted amount.
     * Paymentgate requires to send amount in kopeck instead of just rubles
     *
     * @return int
     */
    public function getAmountInteger(): int
    {
        return (int) $this->getParameter('amount');
    }

}
