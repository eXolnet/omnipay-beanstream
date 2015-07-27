<?php
namespace Omnipay\Beanstream\Message;

class RefundRequest extends AuthorizeRequest
{
    /**
     * @return string
     */
    public function getTransId()
    {
        return $this->getParameter('trans_id');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTransId($value)
    {
        return $this->setParameter('trans_id', $value);
    }

    /**
     * @return string
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('amount');
        $data = array();
        $data['order_number'] = $this->getOrderNumber();
        $data['amount'] = $this->getAmount();

        return json_encode($data);
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint . '/payments/' . $this->getTransId() . '/returns';
    }
}
