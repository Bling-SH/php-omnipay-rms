<?php

namespace Omnipay\Rms\Message;

use Omnipay\Common\Exception\InvalidRequestException;

class PurchaseRmsRequest extends AbstractRmsRequest
{
    /**
     * @return array|mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('amount', 'countryCode', 'currencyCode');
        $amount = $this->getAmount();

        if (stripos($amount, '.') !== false) {
            $amount = (int)$amount * 100;
        } else {
            $amount = (int)$amount . '00';
        }

        $data = [
            'merchantID' => $this->getMerchantId(),
            'action' => 'SALE',
            'amount' => $amount,
            'countryCode' => $this->getCountryCode(),
            'currencyCode' => $this->getCurrencyCode(),
            'redirectURL' => $this->getReturnUrl(),
        ];
        $data['signature'] = $this->generateSignature($data);

        return $data;
    }
}
