<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class searchResults extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{

		// Get some initial picture to display on the front-page
		$this->load->view("landingPage_view");
	}

	public function processSearch(){

		// Get the Search Query	
		$searchQuery = $this->input->post('query');
		
		// Get the Longitude and Latiude
		$data['lng'] = $this->input->post('long');
		$data['lat'] = $this->input->post('lat');
		$data['ulearnTopic'] = $this->input->post('ulearnTopic');
		// Query the database

		// Process the Search Results (Curate them)

		// Send results to the results to the SearchResults View
		

		//IMPORTANT - FIX UP THE CSS LINKS AND EVEYTHING ELSE IN THE VIEWS

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
		
		$this->load->view("searchResults_view", $data);

	}
}