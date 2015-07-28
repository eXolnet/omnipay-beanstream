<?php
namespace Omnipay\Beanstream\Message;

class PurchaseRequest extends AuthorizeRequest
{
    /**
     * @return bool
     */
    public function getComplete()
    {
        return true;
    }
}
