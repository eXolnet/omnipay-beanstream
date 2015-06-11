<?php
namespace Sproutstudioinc\Beanstream\Message;

class RefundRequest extends AuthorizeRequest
{

    public function getTransId()
    {
        return $this->getParameter('trans_id');
    }

    public function setTransId($value)
    {
        return $this->setParameter('trans_id', $value);
    }

    public function getData()
    {
        $this->validate('amount');
        $data = array();
        $data['order_number'] = $this->getOrderNumber();
        $data['amount'] = $this->getAmount();

        return json_encode($data);
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payments/' . $this->getTransId() . '/returns';
    }

}
