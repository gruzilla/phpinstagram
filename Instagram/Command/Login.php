<?php
/**
 * @category   Instagram
 * @package    Instagram_Command
 * @copyright  Copyright (c) 2010-2011 Matthias Steinböck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Command_Login extends Instagram_Command_AbstractCommand
{
	protected $_requires = array(
		'username',
		'device_id',
		'password'
	);
	
	public function exec() {
		$postdata = array(
			'username'=> $this->_parameters['username'],
			'device_id' => $this->_parameters['device_id'],
			'password' => $this->_parameters['password']
		);
		
		$client = $this->_communication->getClient();
		
		$client->setUri('http://instagr.am/api/v1/accounts/login/');
		$client->setHeaders(array(
			'User-Agent' => 'Instagram 1.9.4 (iPhone; iPhone OS 4.0.1; de_AT)',
			'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
			'Accept-Encoding' => 'gzip'
//			'Connection' => 'keep-alive'
		));
		$client->setParameterPost($postdata);
		
		$response = $client->request(Zend_Http_Client::POST);
		
		$success = Instagram_Client_Marshaller::unmarshall($response->getBody(), true);
		
		if ($success->status != 'ok') {
			$ex = new Instagram_Command_LoginFailedException($success->message);
			$ex->setResponse($response);
			throw $ex;
		}
		
		$this->getResponse()->setData($success);
		
	}
}