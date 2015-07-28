<?php
namespace Omnipay\Beanstream\Message;

class RefundRequest extends AbstractRequest
{
    /**
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->getParameter('order_number');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setOrderNumber($value)
    {
        return $this->setParameter('order_number', $value);
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
        return $this->endpoint . '/payments/' . $this->getTransactionId() . '/returns';
    }
}
