<?php
/**
 * @category   Instagram
 * @package    Instagram_Client
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Client_Communication
{
	/**
	 * @var Zend_Http_Client
	 */
	protected $_client;
	
	/**
	 * @var array
	 */
	protected $_cookies;
	
	
	public function __construct() {
		$this->_client = new Instagram_Client('http://instagr.am/api', array(
			'keepalive' => true
		));
		$this->_client->setHeaders('Accept', 'application/xml');
		$this->_client->setCookieJar();
	}
	
	public function getClient() {
		return $this->_client;
	}
}