<?php
/**
 * @category   Instagram
 * @package    Instagram
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Api
{
	/*
	 * @var Instagram
	 */
	protected $_instagram;
	
	public function setInstagram(Instagram $instagram) {
		$this->_instagram = $instagram;
	}
}