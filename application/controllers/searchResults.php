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
			'the guitar' => 'guitar',
			'play the guitar' => 'guitar',
			'to play the guitar' => 'guitar',
			'play the piano' => 'piano',
			'the piano' => 'piano',
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
			'tennis' => 'tennis',
			'play tennis' => 'tennis',
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
			'baseball' => 'baseball',
			'hack' => 'hack',
			'to hack' => 'hack',
			'how to hack' => 'hack',
			'paint' => 'paint',
			'to paint' => 'paint',
			'how to paint' => 'paint',
			'photography' => 'photography',
			'to photography' => 'photography',
			'photo' => 'photo',
			'a photo' => 'photo',
			'take a photo' => 'photo',
			'paint a picture' => 'paint',
			'take a picture' => 'photography',
			'swim' => 'swim',
			'to swim' => 'swim',
			'run' => 'run',
			'to run' => 'run',
			'to make music' => 'music',
			'make music' => 'music',
			'how to make music' => 'music',
			'to ride a bicycle' => 'ride bicycle',
			'ride a bicycle' => 'ride bicycle',
			'ride the bicycle' => 'ride bicycle',
			'ride bicycle' => 'ride bicycle',
			'a bicycle' => 'ride bicycle',
			'the bicycle' => 'ride bicycle',
			'bicycle' => 'ride bicycle',
			'speak french' => 'french',
			'french' => 'french',
			'write french' => 'french'
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
		$searchLocation = ucwords($this->input->post('searchLocation'));

		$data['long'] = $lng;
		$data['lat'] = $lat;
		$data['searchLocation'] = $searchLocation;

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
		$dbResults = $this->searchResults_model->getAllMastersBySkill($data['topic']);
		
	
		$curatedResults = $this->curateResults($lng, $lat, $dbResults);

		//merge sorted currated results with dbresults acquired from db in raw unsorted form
		$array_for_view = array();
		for ($i = 0; $i < count($curatedResults); $i++)
		{
			$current_id = $curatedResults[$i][0];
			for ($j = 0; $j < count($dbResults); $j++)
			{
				if (strcmp($current_id, $dbResults[$j]['id']) == 0)
				{
					$array_for_view[$i] = $dbResults[$j];
					// $array_for_view[$i]['lat'] = $curatedResults[$i][2];
					$array_for_view[$i]['dist'] = $curatedResults[$i][2];
				}
			}	
		}
		$data['results'] = $array_for_view;
		// $data['results'] = $dbResults;

		$this->load->view("searchResults_view", $data);
	}

	public function curateResults($long, $lat, $dbResults){


		/*ONLY USING LOCATION AND REVIEWS AT THIS POINT*/

		//Sort By Location
		$numberOfElements = count($dbResults);
		$resultsLocation = array();

		for($i = 0; $i < $numberOfElements; $i++)
			$resultsLocation[$dbResults[$i]['id']] = $this->calculateDistance($lat, $long, $dbResults[$i]['lat'], $dbResults[$i]['long']);

		//temp array to store kilometres from you
		$kilos = array();
		for($i = 0; $i < $numberOfElements; $i++)
		// for($i = 0; $i < 0; $i++)
		{
			$kilos[$i][0] = $dbResults[$i]['id']; //id
			$kilos[$i][1] = $resultsLocation[$dbResults[$i]['id']]; //distance in kilos
		}

		$resultsLocation = $this->locationSort($dbResults, $resultsLocation);

		// print_r($resultsLocation);

		// usort($resultsLocation, array('searchResults', 'revCmp'));

		$maxRateCount = $this->getHighestReviewNumber($dbResults);

		// Sort By Reviews
		$resultsReviews = array();
		for($i = 0; $i < $numberOfElements; $i++)
			$resultsReviews[$dbResults[$i]['id']] = $this->calculateReviewsScore($dbResults[$i]['rateCount'], $dbResults[$i]['rating'], $maxRateCount);	

		// usort($resultsReviews, array('searchResults', 'cmp'));
		$resultsReviews = $this->reviewSort($dbResults, $resultsReviews);

		$curatedResults = $this->sortByBothlocationAndReview($resultsLocation, $resultsReviews);
		
		// print_r($curatedResults);
		// die();

		//add the distance to the results before returning it
		//i.e. merge curratedResults with Kilos
		for ($i = 0; $i < count($curatedResults); $i++)
		{
			$current_id = $curatedResults[$i][0];
			for ($j = 0; $j < count($kilos); $j++)
			{
				if (strcmp($current_id, $kilos[$j][0]) == 0)
				{
					$curatedResults[$i][2] = $this->getDistanceString($kilos[$j][1]); //store kilos string in 2
				}
			}	
		}
	
		return $curatedResults;
		// return $merge_array;

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

    	return $new_array;
	}

	public function final_curated_sort($array)
	{

		$new_array = array();
		for($i = 0; $i < count($array); $i++)
		{
			$temp = array();
			array_push($temp, $array[$i][0]); //i.e. herman singh badwall
			array_push($temp, $array[$i][1]); //i.e. final rating
			array_push($new_array, $temp);
		}

		//final currated sort
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

	public function getDistanceString($km){
		$toScale = $km/0.1;

		if($toScale > 20){
			$mins = 5 + (($toScale - 20)/5);
			$mins = floor($mins);

			return $mins . " min drive from you";
		} else{
			return floor($toScale) . " min walk from you";
		}
	}

	public function sortByBothlocationAndReview($resultsLocation, $resultsReviews)
	{

		$min_dist = 999999;
		$max_dist = 0;

		//find min and max
		for($i = 0; $i < count($resultsLocation); $i++)
		{
			$current_dist = $resultsLocation[$i][1];
			if ($current_dist < $min_dist)
			{
				$min_dist = $current_dist;
			}

			if ($current_dist > $max_dist)
			{
				$max_dist = $current_dist;
			}
		}

		//for the score, max is 50, min is 30, get the score
		$final_scores = array();
		for($i = 0; $i < count($resultsLocation); $i++)
		{
			$current_dist = $resultsLocation[$i][1];
			//out of 50 it is:
			$current_dist = $current_dist - $min_dist; //502-402
			$highest_dist = $max_dist - $min_dist; //602 - 402
			
			//now get the value between 30 and 50
			$current_distance_rating = 20*($current_dist/$highest_dist);
			//except lowest distance is better
			//so reverse the 20, if its 18 -> make it 2, if its 5, 15, 10 10 so on
			$current_distance_rating = 20 - $current_distance_rating;
			$current_distance_rating = 30 + $current_distance_rating;
			//double value between 30 and 50


			$final_scores[$i][0] = $current_distance_rating;
		}

		//get the other number out of 50 (i.e. the rating and number of ratings)
		for($i = 0; $i < count($resultsLocation); $i++)
		{
			$final_scores[$i][1] = $resultsReviews[$i][1] * 50;
		}

		//now simply add the [0] and [1] indexes for total review out of 100 (30 to 100)
		for($i = 0; $i < count($resultsLocation); $i++)
		{
			$final_scores[$i][2] = $final_scores[$i][0] + $final_scores[$i][1];
		}


		//now that we have the final score, create the new array with [id, final_score] pairs, and sort it
		$result_array = array();
		for($i = 0; $i < count($resultsLocation); $i++)
		{
			$result_array[$i][0] = $resultsLocation[$i][0]; // id
			$result_array[$i][1] = $final_scores[$i][2];
		}

		$result_array = $this->final_curated_sort($result_array);

		// Only return top 10 results.

		// In the Future, page the result. Also fix the styling and so on.
		$finaResults = array();
		for($i = 0; $i < 10; $i++)
			$finaResults[$i] = $result_array[$i];

    	return $finaResults;
	}
}