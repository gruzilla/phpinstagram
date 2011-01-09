<?php
/**
 * @category   Instagram
 * @package    Instagram_Command_Feed
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Command_Feed_Timeline extends Instagram_Command_AbstractCommand
{
	protected $_dependsOn = array(
		'Login'
	);
	
	protected $_requires = array(
		'time'
	);
	
	public function exec() {
		$client = $this->_communication->getClient();
		
		$client->setUri('http://instagr.am/api/v1/feed/timeline/'.$this->_parameters['time']);
		$response = $client->request(Zend_Http_Client::GET);
		
		$body = $response->getBody();
		$this->getResponse()->setData(
			self::parseResponse(
				Instagram_Client_Marshaller::unmarshall($body)
			)
		);
	}
	
	/**
	 * @param stdClass $response
	 * @return array<Instagram_Feed_Entry>
	 */
	protected static function parseResponse($response) {
		$entries = array();
		// items, status, num_results
		foreach ($response->items as $entryData) {
			if (!is_object($entryData)) {
				continue;
			}
			$entries[] = Instagram_Feed_Entry::factory($entryData);
		}
		return $entries;
	}
}