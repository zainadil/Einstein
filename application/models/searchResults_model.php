<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class searchResults_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	function getEndorsement($id)
	{
		$q = $this->db->get_where('masters', array('id' => $id));
		return $q->row_array();
	}

	function setEndorsement($id, $newEndorsement)
	{
		$data = array(
               'backers' => $newEndorsement
         	);
		
		$this->db->where('id', $id);
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


	function getAllMastersBySkill($skill) {
		
		$q = $this->db->query("SELECT * FROM masters WHERE skill = '" . $skill . "'");
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