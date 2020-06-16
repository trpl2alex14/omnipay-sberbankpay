<?php

namespace Omnipay\SberbankPay\Message;

use Omnipay\Sberbank\Message\CaptureRequest as BaseCaptureRequest;


class CaptureRequest extends BaseCaptureRequest
{
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
