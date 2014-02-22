<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class masterProfile extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{

		$user = $this -> facebook -> getUser();

		if ($user) {
			try {
				$data['user_profile'] = $this -> facebook -> api('/me');
				// $friends = $this -> facebook -> api('/me/friends');
				// $friends = $friends['data'];

				// $jsonData = json_encode($friends);
				// $data['user_friends'] = $jsonData;
				
			} catch (FacebookApiException $e) {
				$user = null;
			}
		}

		if ($user) {
			$data['login'] = 1;			
			//echo ($data['user_profile']['id']); 
		} else {
			$data['login'] = 0;
			$data['login_url'] = $this -> facebook -> getLoginUrl();
		}

		$this->load->view("masterProfile_view", $data);
	}
}