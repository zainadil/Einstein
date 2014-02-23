<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class searchResults_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	function getEndorsement($uid)
	{
		$q = $this->db->get_where('masters', array('uid' => $uid));
		return $q->row_array();
	}

	function setEndorsement($uid, $newEndorsement)
	{
		$data = array(
               'backers' => $newEndorsement
         	);
		
		$this->db->where('uid', $uid);
		$this->db->update('masters', $data); 
		return;

	}

	function getAllMasters() {
		
		$q = $this->db->query("SELECT * FROM masters");
		if ($q->num_rows > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
		}
		return $this->ObjectToArray($data);
	}

	function ObjectToArray($Array){
		for($i = 0; $i < count($Array); $i++){
			$Array[$i] = get_object_vars($Array[$i]);
		}
		return $Array;
	}
}