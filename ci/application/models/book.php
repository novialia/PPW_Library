<?php 

class Book extends CI_Model {

	function  __construct(){
		parent::__construct(); 
		$this->load->database();
	}

	function get_book() {
		return $this->db->get('book')->result_array();
	}

	function find($id_book) {
		return $this->db->select("*")->where('book_id', $id_book)->get('book')->result_array();
	}

	function updateQty($book_id, $new_qty) {
		$book = $this->db->get_where('book', array('book_id'=>$book_id))->row();
		$qty = ($book->quantity) + $new_qty;
		$this->db->where('book_id', ($book->book_id));
		return $this->db->update('book', array('quantity' => $qty ));
	}

	function insert_book($data) {
		return $this->db->insert('book', $data);
	}

}