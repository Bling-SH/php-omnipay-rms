<?php

namespace Omnipay\Rms\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\ResponseInterface;

abstract class AbstractRmsRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->getParameter('countryCode');
    }

    /**
     * @param $value
     * @return $this
     */
    public function setCountryCode($value)
    {
        return $this->setParameter('countryCode', $value);
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->getParameter('currencyCode');
    }

    /**
     * @param $value
     * @return $this
     */
    public function setCurrencyCode($value)
    {
        return $this->setParameter('currencyCode', $value);
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
     * @param $data
     * @return string
     */
    public function generateSignature($data)
    {
        if (isset($data['signature'])) {
            unset($data['signature']);
        }

        ksort($data);

        $str = http_build_query($data, '', '&');
        $str = str_replace(array('%0D%0A', '%0A%0D', '%0D'), '%0A', $str);
        $str .= $this->getSignatureKey();

        return hash('SHA512', $str);
    }

    /**
     * @param mixed $data
     * @return mixed|ResponseInterface
     */
    public function sendData($data)
    {
        return $this->createResponse($data);
    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    protected function createResponse($data, $headers = array())
    {
        $requestClass = get_class($this);
        $responseClass = substr($requestClass, 0, -7) . 'Response';

        return $this->response = new $responseClass($this, $data, $headers);
    }
}
