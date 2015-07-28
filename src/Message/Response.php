<?php
namespace Omnipay\Beanstream\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    /**
     * Is the transaction successful?
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return isset($this->data['approved']) && (bool)$this->data['approved'] === true;
    }

    /**
     * @return null|string
     */
    public function getMessage()
    {
        return $this->value('message');
    }

    /**
     * @return null|int
     */
    public function getCode()
    {
        return (int)$this->value('code');
    }

    /**
     * @return null|string
     */
    public function getTransactionReference()
    {
        return $this->value('id');
    }

    /**
     * @return bool
     */
    public function isApproved()
    {
        return (bool)$this->value('approved', false);
    }

    /**
     * @return int|null
     */
    public function getMessageId()
    {
        return $this->value('message_id');
    }

    /**
     * @return string|null
     */
    public function getAuthCode()
    {
        return $this->value('auth_code');
    }

    /**
     * @return null|string
     */
    public function getApprovalCode()
    {
        return $this->getAuthCode();
    }

    /**
     * @return int|null
     */
    public function getCreated()
    {
       return $this->$this->value('created');
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->value('type');
    }

    /**
     * @return string|null
     */
    public function getPaymentMethod()
    {
        return $this->value('payment_method');
    }

    /**
     * @return array|null
     */
    public function getCard()
    {
        return $this->value('card');
    }

    /**
     * @return array|null
     */
    public function getLinks()
    {
        return $this->value('links');
    }

    /**
     * @param string $key
     * @param string|null $default
     * @return mixed|null
     */
    protected function value($key, $default = null)
    {
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }
}