<?php

namespace Omnipay\Rms\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseRmsResponse extends AbstractRmsResponse implements RedirectResponseInterface
{
    /**
     * @return bool
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * @return mixed
     */
    public function getRedirectData()
    {
        return $this->getData();
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return 'https://gateway.retailmerchantservices.co.uk/paymentform/';
    }
}
