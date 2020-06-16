# Sberbank acquiring for PHP (add FL54 ffd ver 1.05+)

This library implements the work with [Sberbank acquiring api](https://securepayments.sberbank.ru/wiki/doku.php/start) via [theleague Omnipay](https://omnipay.thephpleague.com/) processing library for PHP. 

It is an extension of the original package [omnipay-sberbank](https://github.com/AndrewNovikof/omnipay-sberbank)

#The modification includes

1. Add orderBundle 

```php
use RFAct54\Factory as FactoryOrderBundle;
use Omnipay\Omnipay;

// Setup payment gateway
$gateway = Omnipay::create('SberbankPay'); 

// Set params for authorize request
$gateway->authorize(
...
);

$order = Order::find($id);  //oder entity

$orderBundle = FactoryOrderBundle::create('SberbankPay', $order);

// You can set parameters via setters, for example:
$gateway->setUserName('merchant_login')
        ->setPassword('merchant_password')
...
        ->setTaxSystem(...);
        ->setOrderBundle($orderBundle)
        ->setAdditionalOfdParams($orderBundle->ofdParamsToArray())
```

2. Get Receipts

```php
$request = $this->gateway->receiptStatus(
[
    'orderId' => $orderId,
]
);

$response = $request->send();

if ($response->isSuccessful()) {
    $receipts = $response->getReceipt();
    ...
}
``` 

3. Close Receipts

```php
$request = $this->gateway->closeReceipt(
[
    'mdOrder' => $orderId,
]
);

$request->setOrderBundle($orderBundle)
        ->setAdditionalOfdParams($orderBundle->ofdParamsToArray())

$response = $request->send();

if ($response->isSuccessful()) {
    $receipts = $response->getReceipt();
    ...
}
``` 