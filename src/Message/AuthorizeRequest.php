<?php
namespace Omnipay\Beanstream\Message;

class AuthorizeRequest extends AbstractRequest
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
     */
    public function getPaymentMethod()
    {
        return $this->getParameter('payment_method');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPaymentMethod($value)
    {
        return $this->setParameter('payment_method', $value);
    }

    /**
     * @return bool
     */
    public function getComplete()
    {
        return false;
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
        $data['payment_method'] = $this->getPaymentMethod();
        $data['card'] = $this->getCardData();
        $data['card']['complete'] = $this->getComplete();

        return json_encode($data);
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint . '/payments';
    }
}
