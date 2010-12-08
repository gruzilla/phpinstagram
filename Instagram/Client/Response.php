<?php
/**
 * @category   Instagram
 * @package    Instagram_Client
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Client_Response {
	/**
	 * @var Instagram_Command_ICommand
	 */
	protected $_command;
	
	/**
	 * @var mixed
	 */
	protected $_response;
	
	public function __construct(Instagram_Command_ICommand $command) {
		$this->_command = $command;
	}
	
	public function setData($response) {
		$this->_response = $response;
	}
	
	public function getData() {
		return $this->_response;
	}
}