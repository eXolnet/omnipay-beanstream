<?php
namespace Sproutstudioinc\Beanstream\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    protected $endpoint = 'https://www.beanstream.com/api/v1';

    abstract public function getEndpoint();

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getPasscode()
    {
        return $this->getParameter('passcode');
    }

    public function setPasscode($value)
    {
        return $this->setParameter('passcode', $value);
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function sendData($data)
    {
        // don't throw exceptions for 4xx errors
        $this->httpClient->getEventDispatcher()->addListener(
            'request.error',
            function ($event) {
                if ($event['response']->isClientError()) {
                    $event->stopPropagation();
                }
            }
        );

        $httpRequest = $this->httpClient->createRequest(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            null,
            $data
        );

        $httpResponse = $httpRequest
            ->setHeader('Content-Type', 'application/json')
            ->setHeader('Authorization', 'Passcode ' . base64_encode($this->getMerchantId() . ':' . $this->getPasscode()))
            ->send();

        return $this->response = new Response($this, $httpResponse->json());
    }

    /**
     * Get the card data.
     *
     * This is the format that Beanstream expects for the cards to be formatted in.
     *
     * @return array
     */
    protected function getCardData()
    {
        $this->getCard()->validate();

        $card = array();
        $card['name'] = $this->getCard()->getName();
        $card['number'] = $this->getCard()->getNumber();
        $card['expiry_month'] = $this->getCard()->getExpiryDate('m');
        $card['expiry_year'] = $this->getCard()->getExpiryDate('y');
        $card['cvd'] = $this->getCard()->getCvv();

        return $card;
    }

}
