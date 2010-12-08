<?php
/**
 * @category   Instagram
 * @package    Instagram_Api
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Api_Auth extends Instagram_Api
{
	/**
	 * Logs you in
	 * @param String $username
	 * @param String $password
	 * @param String $deviceId
	 * @return Instagram_Command_Login
	 */
	public function login($username, $password, $deviceId) {
		$cmd = new Instagram_Command_Login();
		
		$cmd->setParameter('username', $username);
		$cmd->setParameter('password', $password);
		$cmd->setParameter('device_id', $deviceId);
		
		$this->_instagram->addCommand($cmd);
		
		return $cmd;
	}
}