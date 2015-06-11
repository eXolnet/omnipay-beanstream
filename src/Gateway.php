<?php
namespace Sproutstudioinc\Beanstream;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway {

	public function getName() {
		return 'Beanstream';
	}
	public function getDefaultParameters() {
		return array(
			'merchantId' => '',
			'passcode' => '',
		);
	}

	public function getMerchantId() {
		return $this->getParameter('merchantId');
	}
	public function setMerchantId($value) {
		return $this->setParameter('merchantId', $value);
	}
	public function getPasscode() {
		return $this->getParameter('Passcode');
	}
	public function setPasscode($value) {
		return $this->setParameter('Passcode', $value);
	}

	/**
	 * @param array $parameters
	 * @return \Sproutstudioinc\Beanstream\Message\AuthorizeRequest
	 */
	public function authorize(array $parameters = array()) {
		return $this->createRequest('\Sproutstudioinc\Beanstream\Message\AuthorizeRequest', $parameters);
	}

	/**
	 * @param array $parameters
	 * @return \Sproutstudioinc\Beanstream\Message\CaptureRequest
	 */
	public function capture(array $parameters = array()) {
		return $this->createRequest('\Sproutstudioinc\Beanstream\Message\CaptureRequest', $parameters);
	}

	/**
	 * @param array $parameters
	 * @return \Sproutstudioinc\Beanstream\Message\PurchaseRequest
	 */
	public function purchase(array $parameters = array()) {
		return $this->createRequest('\Sproutstudioinc\Beanstream\Message\PurchaseRequest', $parameters);
	}

	/**
	 * @param array $parameters
	 * @return \Sproutstudioinc\Beanstream\Message\RefundRequest
	 */
	public function refund(array $parameters = array()) {
		return $this->createRequest('\Sproutstudioinc\Beanstream\Message\RefundRequest', $parameters);
	}

	/**
	 * @param array $parameters
	 * @return \Sproutstudioinc\Beanstream\Message\VoidRequest
	 */
	public function void(array $parameters = array()) {
		return $this->createRequest('\Sproutstudioinc\Beanstream\Message\VoidRequest', $parameters);
	}

}
