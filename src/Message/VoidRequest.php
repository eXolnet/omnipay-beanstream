<?php
namespace Omnipay\Beanstream\Message;

class VoidRequest extends AbstractRequest
{
    /**
     * @return string
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('amount');

        $data = array();
        $data['amount'] = $this->getAmount();

        return json_encode($data);
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint . '/payments/' . $this->getTransactionId() . '/void';
    }
}
