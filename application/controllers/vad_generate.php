<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vad_generate extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index()
    {

        // Get some initial picture to display on the front-page
        // $this->load->view("vad_generate_images");

        // $this->load->view("vad_generate_images");
        $this->load->model("database_model");
        $results = $this->database_model->getAllMasters();
        print_r($results);
        die();


    }

}