<?php

namespace Omnipay\SberbankPay;

use Omnipay\SberbankPay\Message\AuthorizeRequest;
use Omnipay\SberbankPay\Message\CaptureRequest;
use Omnipay\SberbankPay\Message\CloseReceiptRequest;
use Omnipay\SberbankPay\Message\ExtendedOrderStatusRequest;
use Omnipay\SberbankPay\Message\ReceiptStatusRequest;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Sberbank\Gateway as SberbankGateway;


class Gateway extends SberbankGateway
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'SberbankPay';
    }


    /**
     * Request for order registration with pre-authorization
     *
     * @param array $options array of options
     * @return RequestInterface
     */
    public function authorize(array $options = []): RequestInterface
    {
        return $this->createRequest(AuthorizeRequest::class, $options);
    }

    /**
     * Order completion payment request
     *
     * @param array $options
     * @return RequestInterface
     */
    public function capture(array $options = []): RequestInterface
    {
        return $this->createRequest(CaptureRequest::class, $options);
    }

    /**
     * Extended order status request
     *
     * @param array $options
     * @return RequestInterface
     */
    public function extendedOrderStatus(array $options = []): RequestInterface
    {
        return $this->createRequest(ExtendedOrderStatusRequest::class, $options);
    }

    /**
     * Request information about a cash receipt
     *
     * @param array $options
     * @return RequestInterface
     */
    public function receiptStatus(array $options = []): RequestInterface
    {
        return $this->createRequest(ReceiptStatusRequest::class, $options);
    }

    /**
     * Request to close a receipt
     *
     * @param array $options
     * @return RequestInterface
     */
    public function closeReceipt(array $options = []): RequestInterface
    {
        return $this->createRequest(CloseReceiptRequest::class, $options);
    }

}
