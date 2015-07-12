<?php
namespace Omnipay\Beanstream;

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
	 * @return \Omnipay\Beanstream\Message\AuthorizeRequest
	 */
	public function authorize(array $parameters = array()) {
		return $this->createRequest('\Omnipay\Beanstream\Message\AuthorizeRequest', $parameters);
	}

	/**
	 * @param array $parameters
	 * @return \Omnipay\Beanstream\Message\CaptureRequest
	 */
	public function capture(array $parameters = array()) {
		return $this->createRequest('\Omnipay\Beanstream\Message\CaptureRequest', $parameters);
	}

	/**
	 * @param array $parameters
	 * @return \Omnipay\Beanstream\Message\PurchaseRequest
	 */
	public function purchase(array $parameters = array()) {
		return $this->createRequest('\Omnipay\Beanstream\Message\PurchaseRequest', $parameters);
	}

	/**
	 * @param array $parameters
	 * @return \Omnipay\Beanstream\Message\RefundRequest
	 */
	public function refund(array $parameters = array()) {
		return $this->createRequest('\Omnipay\Beanstream\Message\RefundRequest', $parameters);
	}

	/**
	 * @param array $parameters
	 * @return \Omnipay\Beanstream\Message\VoidRequest
	 */
	public function void(array $parameters = array()) {
		return $this->createRequest('\Omnipay\Beanstream\Message\VoidRequest', $parameters);
	}

}
