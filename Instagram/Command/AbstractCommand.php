<?php
/**
 * @category   Instagram
 * @package    Instagram_Command
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
abstract class Instagram_Command_AbstractCommand implements Instagram_Command_ICommand
{
	/*
	 * @var Instagram_Client_Communication
	 */
	protected $_communication;
	
	/*
	 * @var array
	 */
	protected $_parameters = array();
	
	/*
	 * @var array
	 */
	protected $_requires = array();
	
	/*
	 * @var array
	 */
	protected $_dependsOn = array();
	
	/*
	 * @var Instagram_Client_Response
	 */
	protected $_response;
	
	public function exec() {}
	
	/**
	 * standard behaviour for setting the _communication attribute
	 * @see Instagram_Command_ICommand::setCommunication()
	 */
	public function setCommunication(Instagram_Client_Communication $communication) {
		$this->_communication = $communication;
		$this->_response = new Instagram_Client_Response($this);
	}
	
	/**
	 * standard behaviour for setting the parameter in the _parameters attribute
	 * @see Instagram_Command_ICommand::setParameter()
	 */
	public function setParameter($name, $value) {
		$this->_parameters[$name] = $value;
	}
	
	/**
	 * @return Instagram_Client_Response
	 */
	public function getResponse() {
		return $this->_response;
	}
	
	public function validate() {
		if (is_null($this->_communication)) throw new Instagram_Command_InvalidException('No communication instance!', 1);
		if (isset($this->_requires)) foreach ($this->_requires as $required) {
			if (!isset($this->_parameters[$required])) throw new Instagram_Command_InvalidException('You forgot to set required parameter '.$required.' for '.get_class($this), 2);
		}
	}
	
	public function dependsOn() {
		return $this->_dependsOn;
	}
}