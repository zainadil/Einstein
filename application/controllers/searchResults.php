<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class searchResults extends CI_Controller {


private $dictionary;

	function __construct() {

		parent::__construct();
		
		$this->dictionary = array(
			
			'bake cake' => 'bake',
			'bake a cake' => 'bake',
			'cake' => 'bake',
			'bake cookie' => 'bake',
			'bake a cookie' => 'bake',
			'bake cookies' => 'bake',
			'cookie' => 'bake',
			'cookies' => 'bake',
			'bake' => 'bake',
			'to cook' => 'cook',
			'cook' => 'cook',
			'cook rice' => 'cook',
			'cook potato' => 'cook',
			'play guitar' => 'guitar',
			'a guitar' => 'guitar',
			'guitar' => 'guitar',
			'playing guitar' => 'guitar',
			'drive' => 'drive',
			'driving' => 'drive',
			'to drive' => 'drive',
			'dance' => 'dance',
			'dancing' => 'dance',
			'to dance' => 'dance',
			'code' => 'code',
			'write code' => 'code',
			'to write code' => 'code',
			'to code' => 'code',
			'coding' => 'code',
			'singing' => 'sing',
			'sing' => 'sing',
			'to sing' => 'sing',
			'to dance' => 'dance',
			'to code' => 'code',
			'to bake' => 'bake',
			'skii' => 'skii',
			'play pool' => 'pool',
			'pool' => 'pool',
			'play billiard' => 'billiard',
			'billiard' => 'billiard',
			'play basketball' => 'basketball',
			'basketball' => 'basketball',
			'soccer' => 'soccer',
			'play soccer' => 'soccer',
			'play ping pong' => 'ping pong',
			'ping pong' => 'ping pong',
			'play table tennis' => 'table tennis',
			'table tennis' => 'table tennis',
			'play hockey' => 'hockey',
			'hockey' => 'hockey',
			'play football' => 'football',
			'football' => 'football',
			'wrestle' => 'wrestle',
			'karate' => 'karate',
			'drive bike' => 'bike',
			'to drive a bike' => 'bike',
			'to ride a bike' => 'bike',
			'ride bike' => 'bike',
			'ride a bike' => 'bike',
			'bike' => 'bike',
			'drive a motorcycle' => 'bike',
			'drive motorcycle' => 'bike',
			'to motorbike' => 'bike',
			'to motor bike' => 'bike',
			'drive a car' => 'car',
			'drive car' => 'car',
			'play piano' => 'piano',
			'piano' => 'piano',
			'a piano' => 'piano',
			'to play drum' => 'drum',
			'play drum' => 'drum',
			'a drum' => 'drum',
			'drum' => 'drum',
			'to play violin' => 'violin',
			'play violin' => 'violin',
			'violin' => 'violin',
			'a violin' => 'violin',
			'bass' => 'bass',
			'bass guitar' => 'bass',
			'to play bass guitar' => 'bass',
			'play bass guitar' => 'bass',
			'trumpet' => 'trumpet',
			'play trumpet' => 'trumpet',
			'to bowl' => 'bowling',
			'bowling' => 'bowling',
			'play bowling' => 'bowling',
			'play baseball' => 'baseball',
			'baseball' => 'baseball'

		);

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
		$topicTemp = $this->input->post('ulearnTopic');

		if($topicTemp != null)
		{
			// check if the index is a defined index in our dictionary
			// if not then redirect to home page with an error message
			if(!array_key_exists($topicTemp,$this->dictionary))
				redirect("../../Einstien?error=true");

			$topic = $this->dictionary[$topicTemp];
			$data['topic'] = $topic;
		}
		else
			redirect('../../Einstien');


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

		// Query the database for people that fit best.
		$this->load->model("searchResults_model");
		$dbResults = $this->searchResults_model->getAllMastersBySkill("code");
		
	
		// $curatedResults = $this->curateResults($lng, $lat, $dbResults);
		$data['results'] = $dbResults;

		$this->load->view("searchResults_view", $data);
	}

	public function curateResults($long, $lat, $dbResults){


		/*ONLY USING LOCATION AND REVIEWS AT THIS POINT*/

		//Sort By Location
		$numberOfElements = count($dbResults);
		$resultsLocation = array();

		for($i = 0; $i < $numberOfElements; $i++)
			$resultsLocation[$dbResults[$i]['id']] = $this->calculateDistance($lat, $long, $dbResults[$i]['lat'], $dbResults[$i]['long']);

		$resultsLocation = $this->locationSort($dbResults, $resultsLocation);

		print_r($resultsLocation);

		// usort($resultsLocation, array('searchResults', 'revCmp'));

		$maxRateCount = $this->getHighestReviewNumber($dbResults);

		// Sort By Reviews
		$resultsReviews = array();
		for($i = 0; $i < $numberOfElements; $i++)
			$resultsReviews[$dbResults[$i]['id']] = $this->calculateReviewsScore($dbResults[$i]['rateCount'], $dbResults[$i]['rating'], $maxRateCount);	

		// usort($resultsReviews, array('searchResults', 'cmp'));
		$resultsReviews = $this->reviewSort($dbResults, $resultsReviews);

		die();

		// Creating table with details about the master.

	}

	public function locationSort($dbResults, $resultsLocation)
	{

		$new_array = array();
		for($i = 0; $i < count($dbResults); $i++)
		{
			$temp = array();
			array_push($temp, $dbResults[$i]['id']); //i.e. herman singh badwall
			array_push($temp, $resultsLocation[$dbResults[$i]['id']]); //i.e. rating by lat/lon
			array_push($new_array, $temp);
		}

		//created the new_array[i][0-2];
		//sort it now
	    $size = count($new_array);
    	for ($i=0; $i<$size; $i++) {
        	for ($j=0; $j<$size-1-$i; $j++) {
            	
            	if ($new_array[$j+1][1] < $new_array[$j][1]) {
                	
	                //swap($arr, $j, $j+1);
            		$tmp = $new_array[$j];
    				$new_array[$j] = $new_array[$j+1];
    				$new_array[$j+1] = $tmp;

            	}
        	}
    	}

    	return $new_array;
	}

	public function reviewSort($dbResults, $resultsLocation)
	{

		$new_array = array();
		for($i = 0; $i < count($dbResults); $i++)
		{
			$temp = array();
			array_push($temp, $dbResults[$i]['id']); //i.e. herman singh badwall
			array_push($temp, $resultsLocation[$dbResults[$i]['id']]); //i.e. rating by lat/lon
			array_push($new_array, $temp);
		}

		//created the new_array[i][0-2];
		//sort it now
	    $size = count($new_array);
    	for ($i=0; $i<$size; $i++) {
        	for ($j=0; $j<$size-1-$i; $j++) {
            	
            	if ($new_array[$j+1][1] > $new_array[$j][1]) {
                	
	                //swap($arr, $j, $j+1);
            		$tmp = $new_array[$j];
    				$new_array[$j] = $new_array[$j+1];
    				$new_array[$j+1] = $tmp;

            	}
        	}
    	}


    // 	  	for ($i=0; $i<$size; $i++) {
				// //other way
    //         		$tmp = $new_array[$i];
    // 				$new_array[$size-1-$i] = $new_array[i];
    // 				$new_array[$j+1] = $tmp;
        		
    // 		}



    	return $new_array;
	}



	public function revCmp($a, $b){
		if($a == $b) 
			return 0;
		return ($a < $b) ? 1 : -1;
	}

	public function cmp($a, $b){
		if($a == $b) 
			return 0;
		return ($a < $b) ? 1 : -1;
	}

	public function calculateDistance($lat1, $lon1, $lat2, $lon2, $unit='K') 
	{ 
	  $theta = $lon1 - $lon2; 
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
	  $dist = acos($dist); 
	  $dist = rad2deg($dist); 
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);

	  if ($unit == "K") {
	    return ($miles * 1.609344); 
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}

	public function getHighestReviewNumber($dbResults){
		$count = count($dbResults);
		$max = $dbResults[0]['rateCount'];
		for($i = 1; $i < $count; $i++){
			if($dbResults[$i]['rateCount'] > $max)
				$max = $dbResults[$i]['rateCount'];
		}
		return $max;	
	}

	public function calculateReviewsScore($reviews, $rating, $highest){
		 return ( 0.7 * ($rating / 5) + $reviews/$highest * 0.3 );
	}
}