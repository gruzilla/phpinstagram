<?php
/**
 * @category   Instagram
 * @package    Instagram_Api
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Api_Feed extends Instagram_Api
{
	/**
	 * Reads the timeline from your feed. you can provide a point of time. (format unknown atm)
	 * @param String $time
	 * @return Instagram_Command_Feed_Timeline
	 */
	public function timeline($time = '?') {
		$cmd = new Instagram_Command_Feed_Timeline();
		
		$cmd->setParameter('time', $time);
		
		$this->_instagram->addCommand($cmd);
		return $cmd;
	}
	
	/**
	 * Reads the timeline from a users feed. you have to know his PK
	 * you can provide a point of time. (format unknown atm)
	 * @param int $pk
	 * @param String $time
	 * @return Instagram_Command_Feed_Timeline
	 */
	public function user($pk, $time = '?') {
		$cmd = new Instagram_Command_Feed_User();
		
		$cmd->setParameter('pk', $pk);
		$cmd->setParameter('time', $time);
		
		$this->_instagram->addCommand($cmd);
		return $cmd;
	}
}