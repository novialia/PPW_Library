<?php 

class Review extends CI_Model {

	function  __construct(){
		parent::__construct(); 
		$this->load->database();
	}

	function get_review() {
		return $this->db->get('review')->result_array();
	}

	function add_review($data) {
		return $this->db->insert('review', $data);
	}

	function get_review_by_book($bookid) {
		return $this->db->select('*')->where('book_id', $book_id)->get('book')->result_array();
	}
}