<?php

namespace Omnipay\Rms\Message;

use Omnipay\Common\Message\AbstractResponse;

abstract class AbstractRmsResponse extends AbstractResponse
{
    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return false;
    }
}
