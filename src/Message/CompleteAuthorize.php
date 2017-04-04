<?php
namespace Omnipay\Beanstream\Message;

class CompleteAuthorize extends AbstractRequest
{
    /**
     * @return string
     */
    public function getAuthenticationCode()
    {
        return $this->getParameter('authentication_code');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setAuthenticationCode($value)
    {
        return $this->setParameter('authentication_code', $value);
    }

    /**
     * @return string
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $data = array();
        $data['payment_method'] = 'credit_card';
        $data['card_response'] = [
            'pa_res' => $this->getAuthenticationCode(),
        ];

        return json_encode($data);
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint . '/payments/' . $this->getTransactionId() . '/continue';
    }
}
