<?php
/**
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
* @license MIT License (http://www.opensource.org/licenses/mit-license.php)
*/

App::uses('Component', 'Controller');
App::import('Vendor', 'Twilio.Twilio', array('file' => 'Twilio' . DS . 'Services' . DS . 'Twilio.php'));

/**
 * Twilio Component
 *
 * @author Rafael F Queiroz <rafaelfqf@gmail.com>
 */
class TwilioComponent extends Component {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array();

	/**
	 * Settings
	 *
	 * @var array
	 */
	public $settings = array();

	/**
	 * Client
	 *
	 * @var Services_Twilio
	 */
	public $client = null;

	/**
	 * Constructor
	 *
	 * @param ComponentCollection $collection 
	 * @param array $settings
	 * @return TwilioComponent
	 */
	public function __construct(ComponentCollection $collection, $settings) {
		
		$sid = Configure::read('Twilio.sid');
		$token = Configure::read('Twilio.token');

		$this->client = new Services_Twilio($sid, $token);
	}

	/**
	 * Method of send message
	 *
	 * @param string $from
	 * @param string $to
	 * @param string $body
	 * @return mixed
	 */
	public function sendMessage($from, $to, $body = null) {
		return $this->client->account->sms_messages->create($from, $to, $body);
	}

}