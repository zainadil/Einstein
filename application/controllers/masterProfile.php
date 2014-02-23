<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class masterProfile extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('searchResults_model');
	}
	
	public function index()
	{

		$endorsementPost = $this->input->post('backersCount');
		if($endorsementPost != null)
		{
			$id = $this->input->post('userid');
			// endorsement for submission, update endorsement count
			$newValue = intval($endorsementPost) + 1;
			$this->searchResults_model->setEndorsement($id, $newValue);
		}

		if($this->input->get('id') == null)
		{
			redirect('../../Einstien');
		}

		$user = $this -> facebook -> getUser();
		$id = $this->input->get('id') ? $this->input->get('id') : $this->input->post('userid');
		$data['endorsement'] = $this->searchResults_model->getEndorsement($id);

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