<?php 

class Loan extends CI_Model {

	function  __construct(){
		parent::__construct(); 
		$this->load->database();
	}

	function get_loan() {
		return $this->db->get('loan')->result_array();
	}

	function get_loan_by_user($user_id) {
		return $this->db->select('*')->where('user_id', $user_id)->get('loan')->result_array();
	}

	function delete($loan_id) {
		return $this->db->delete('loan', array('loan_id' =>$loan_id));
	}

	function add_loan($data) {
		return $this->db->insert('loan', $data);
	}

	function is_loan($book_id, $user_id) {
		return $this->db->get_where('loan', array('book_id' => $book_id, 'user_id' => $user_id))->row();
	}
}