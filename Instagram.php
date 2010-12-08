<?php
/**
 * @category   Instagram
 * @package    Instagram
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram {
	
	/*
	 * @var array
	 */
	protected $_commands = array();
	
	/*
	 * @var Instagram_Client_Communication
	 */
	protected $_communication;
	
	/*
	 * @var Instagram_Api_Feed
	 */
	public $feed;
	
	/*
	 * @var Instagram_Api_Auth
	 */
	public $auth;
	
	public function __construct() {
		$this->feed = new Instagram_Api_Feed();
		$this->feed->setInstagram($this);
		$this->auth = new Instagram_Api_Auth();
		$this->auth->setInstagram($this);
		$this->_communication = new Instagram_Client_Communication();
	}
	
	public function addCommand(Instagram_Command_ICommand $cmd) {
		$this->_commands[] = $cmd;
	}
	
	public function run() {
		$executed = array();
		//$cookieJar = null;
		foreach ($this->_commands as $utcmd) {
			if ($utcmd instanceof Instagram_Command_ICommand) {
				/*
				 * @var Instagram_Command_ICommand
				 */
				$cmd = $utcmd;
				
				//if (!is_null($cookieJar))
				//	$this->_communication->getClient()->setCookieJar($cookieJar);
				
				foreach ($cmd->dependsOn() as $dependency) {
					foreach ($executed as $previous) {
						if (get_class($previous) == 'Instagram_Command_'.$dependency) {
							break 2;
						}
					}
					throw new Instagram_Command_DependencyException(
						'Command '.get_class($cmd)." depends on $dependency but it never was executed!\n\n"
					);
				}
				$cmd->setCommunication($this->_communication);
				
				$cmd->validate();
				
				//echo get_class($cmd)." is valid. executing...\n\n";
				$cmd->exec();
				
				$executed[] = $cmd;
				
				// reset parameters
				$this->_communication->getClient()->resetParameters();
				//$cookieJar = $this->_communication->getClient()->getCookieJar();
			} 
		}
		
		// reset commands
		$this->_commands = array();
	}
}