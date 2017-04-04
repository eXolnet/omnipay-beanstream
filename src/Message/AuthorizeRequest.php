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
     * @return string
     */
    public function getTermUrl()
    {
        return $this->getParameter('term_url');
    }

    /**
     * @param string $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setTermUrl($value)
    {
        return $this->setParameter('term_url', $value);
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
        $data['term_url'] = $this->getTermUrl();

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
