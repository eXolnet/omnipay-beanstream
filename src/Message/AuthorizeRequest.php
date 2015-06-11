<?php
namespace Sproutstudioinc\Beanstream\Message;

class AuthorizeRequest extends AbstractRequest
{

    public function getOrderNumber()
    {
        return $this->getParameter('order_number');
    }

    public function setOrderNumber($value)
    {
        return $this->setParameter('order_number', $value);
    }

    public function getPaymentMethod()
    {
        return $this->getParameter('payment_method');
    }

    public function setPaymentMethod($value)
    {
        return $this->setParameter('payment_method', $value);
    }

    public function getComplete()
    {
        return false;
    }

    public function getData()
    {

        $this->validate('amount');

        $data = array();
        $data['order_number'] = $this->getOrderNumber();
        $data['amount'] = $this->getAmount();
        $data['payment_method'] = $this->getPaymentMethod();
        $data['card'] = $this->getCardData();
        $data['card']['complete'] = $this->getComplete();

        return json_encode($data);
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payments';
    }

}
