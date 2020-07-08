<?php

namespace Omnipay\Rms;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Rms\Message\PurchaseRmsRequest;

/**
 * @method RequestInterface authorize(array $options = array())
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface capture(array $options = array())
 * @method RequestInterface completePurchase(array $options = array())
 * @method RequestInterface refund(array $options = array())
 * @method RequestInterface void(array $options = array())
 * @method RequestInterface createCard(array $options = array())
 * @method RequestInterface updateCard(array $options = array())
 * @method RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'RMS';
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * @param $value
     * @return $this
     */
    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * @return mixed
     */
    public function getSignatureKey()
    {
        return $this->getParameter('signatureKey');
    }

    /**
     * @param $value
     * @return $this
     */
    public function setSignatureKey($value)
    {
        return $this->setParameter('signatureKey', $value);
    }

    /**
     * @param array $options
     * @return AbstractRequest|RequestInterface
     */
    public function purchase(array $options = array())
    {
        return $this->createRequest(PurchaseRmsRequest::class, $options);
    }
}
