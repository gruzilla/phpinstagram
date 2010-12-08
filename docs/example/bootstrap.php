<?php
/**
 * @category   Instagram
 * @package    Instagram
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 *
 * bootstraping file, puts zend framework in the include path and registers Instagram
 * as autoloader namespace
 */
// only for debuging:
error_reporting(E_ALL);
ini_set('display_errors', true);

// define path to application directory
defined('APPLICATION_PATH')
	|| define('APPLICATION_PATH', realpath(dirname(__FILE__).'/../..'));

// define application environment
defined('APPLICATION_ENV')
	|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') :
		'development' // 'production'
	));


// ensure, zendfw and missredak can be found
set_include_path(implode(PATH_SEPARATOR, array(
	realpath(APPLICATION_PATH.'/../zendfw/library'),
	get_include_path(),
)));

// initialize autoloader, register MissRedak-namespace
require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance()->registerNamespace('Instagram');
