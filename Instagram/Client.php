<?php
class Instagram_Client extends Zend_Http_Client {
	public function request($method = null) {
		$response = parent::request($method);
		if ($response->getStatus() != 200) {
			throw new Instagram_CommunicationException('HTTP-Code: '.$response->getStatus());
		}
		return $response;
	}
}