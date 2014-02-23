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
		$lng = $this->input->post('long');
		$lat = $this->input->post('lat');
		$topic = $this->input->post('ulearnTopic');

		// Facebook Login Check
		$user = $this -> facebook -> getUser();

		if ($user) {
			try {
				$data['user_profile'] = $this -> facebook -> api('/me');
			} catch (FacebookApiException $e) {
				$user = null;
			}
		}

		if ($user) {
			$data['login'] = 1;			
		} else {
			$data['login'] = 0;
			$data['login_url'] = $this -> facebook -> getLoginUrl();
		}
		
		// Send results to the results to the SearchResults View

		// Query the database
		$this->load->model("searchResults_model");
		$dbResults = $this->searchResults_model->getAllMasters();

		// print_r($dbResults);
		// die();

		$data['results'] = $this->curateResults($long, $lat, $topic, $dbResults)

		$this->load->view("searchResults_view", $data);
	}

	public function curateResults($long, $lat, $topic, $dbResults){


	}
}