<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class NotificationsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('system_send_email');
	}

	public function system_send_email() {
		$output = '<success>Output is</success><br><br>';
		// Class EmailQueue
		$emailQueue = ClassRegistry::init('EmailQueue.EmailQueue');

		// Get list of emails (20 is limit of the number of emails)
		$emails = $emailQueue->getBatch(20);
				
		foreach ($emails as $e) {
			try {
				$email = new CakeEmail('default');;

				$sent = $email
					->from(array(Company::EMAIL => Company::NAME))
					->to($e['EmailQueue']['to'])
					->subject($e['EmailQueue']['subject'])
					->template($e['EmailQueue']['template'])
					->emailFormat($e['EmailQueue']['format'])
					->viewVars($e['EmailQueue']['template_vars'])
					->send();
			} catch (SocketException $exception) {
				//$this->err($exception->getMessage());
				$sent = false;
			}

			// Update records accordingly
			if ($sent) {
				$emailQueue->success($e['EmailQueue']['id']);
				$output .= '<success>Email ' . $e['EmailQueue']['id'] . ' was sent</success><br>';
			} else {
				$emailQueue->fail($e['EmailQueue']['id']);
				$output .= '<error>Email ' . $e['EmailQueue']['id'] . ' was not sent</error><br>';
			}
		}
		$emailQueue->releaseLocks(Set::extract('{n}.EmailQueue.id', $emails));
		echo $output;
		exit;
	}
}
