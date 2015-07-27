<?php
namespace Omnipay\Beanstream\Message;

class PurchaseRequest extends AuthorizeRequest
{
    /**
     * Prevents Purchase from being seen as just an authorization
     */
    public function getComplete()
    {
        return true;
    }
}
