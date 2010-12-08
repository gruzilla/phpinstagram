<?php
/**
 * @category   Instagram
 * @package    Instagram
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Comment
{
	/*
	 * @var int
	 */
	public $media_id;
	
	/*
	 * @var string
	 */
	public $text;
	
	/*
	 * @var int
	 */
	public $created_at;
	
	/*
	 * @var Instagram_User
	 */
	public $user;
	
	/*
	 * usually "comment"
	 * @var string
	 */
	public $content_type;
	
	/*
	 * @var int
	 */
	public $type;
}