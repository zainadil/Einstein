<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class masterProfile extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view("masterProfile_view");
	}
}