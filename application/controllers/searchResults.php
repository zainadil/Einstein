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
		// Query the database

		// Process the Search Results (Curate them)

		// Send results to the results to the SearchResults View
		

		//IMPORTANT - FIX UP THE CSS LINKS AND EVEYTHING ELSE IN THE VIEWS
		
		$this->load->view("searchResults_view", $data);

	}
}