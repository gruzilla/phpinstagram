<?php
/**
 * @category   Instagram
 * @package    Instagram_Command
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
interface Instagram_Command_ICommand
{
	public function exec();
	public function setCommunication(Instagram_Client_Communication $communication);
	public function setParameter($name, $value);
	public function validate();
	public function dependsOn();
}