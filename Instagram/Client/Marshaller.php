<?php
/**
 * @category   Instagram
 * @package    Instagram_Client
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Client_Marshaller
{
	public static function marshall($data) {
		
	}
	
	public static function unmarshall($data) {
		return json_decode($data);
	}
}