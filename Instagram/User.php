<?php
/**
 * @category   Instagram
 * @package    Instagram
 * @copyright  Copyright (c) 2010-2011 Matthias Steinb�ck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_User
{
	/*
	 * @var array<Instagram_User>
	 */
	private static $__users = array();
	
	/*
	 * @var string
	 */
	public $username;
	
	/*
	 * primary key
	 * @var int
	 */
	public $pk;
	
	/*
	 * absolute url
	 * @var string
	 */
	public $profile_pic_url;
	
	/*
	 * @var string
	 */
	public $full_name;
	
	// TODO: incomplete - see user info
	
	/**
	 * fetches a user from the repository according to its primary key
	 * @param stdClass $userData
	 * @return Instagram_User
	 */
	public static function factory($userData) {
		if (!isset(self::$__users[$userData->pk])) {
			self::$__users[$userData->pk] = new Instagram_User();
			self::$__users[$userData->pk]->pk = $userData->pk;
			self::$__users[$userData->pk]->username = $userData->username;
			self::$__users[$userData->pk]->full_name = $userData->full_name;
			self::$__users[$userData->pk]->profile_pic_url = $userData->profile_pic_url;
		}
		
		return self::$__users[$userData->pk];
	}
}