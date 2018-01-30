<?php 

class User extends CI_Model {

	function  __construct(){
		parent::__construct(); 
		$this->load->database();
	}

	function get_user() {
		return $this->db->get('user')->result_array();
	}

	function get_user_by_id($user_id) {
		return $this->db->get_where('user', array('user_id' => $user_id))->row();
	}
}