<?php
/**
 * @category   Instagram
 * @package    Instagram
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Exception extends Exception
{
	protected $_response;
	
	public function setResponse($response) {
		$this->_response = $response;
	}
	
	public function getResponse() {
		return $this->_response;
	}
}