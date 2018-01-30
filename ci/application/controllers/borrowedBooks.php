<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class BorrowedBooks extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("User");
		$this->load->model("Book");
		$this->load->model("Loan");
		$this->load->model("Review");
	}

	public function index()
	{
		if(!isset($_SESSION['user'])){
			$_SESSION['message'] = "Anda harus login untuk mengakses halaman My Books.";
				redirect('home');
		}

		$data["title"] = "Borrowed Book Lists";
		$data["books"] = array();
		$data["review"] = array();
		$data["loans"] = $this->Loan->get_loan_by_user($_SESSION['user']['user_id']);

		for ($i=0; $i < sizeof($data["loans"]); $i++) { 
			$id_book = $data["loans"][$i]['book_id'];
			$res = $this->Book->find($id_book);
			array_push($data['books'], $res[0]);
		}

		$this->load->view('header', $data);
	    $this->load->view("borrowedBooks",$data);
	}

	public function return_book() {
		$loan_id = $_POST['ret_value'];
		$book_id = $_POST['bookid'];
		$this->Loan->delete($loan_id);
		$this->Book->updateQty($book_id, 1);
		
		redirect('borrowedBooks');
	}

	
}
