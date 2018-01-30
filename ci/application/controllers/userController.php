<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class UserController extends CI_Controller {

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
			$_SESSION['message'] = "Anda harus login untuk mengakses halaman Home.";
				redirect('home');
		}

		$data["title"] = "Book Lists";
		$data["books"] = $this->Book->get_book();
		$data["review"] = $this->Review->get_review();
		$data['is_loans'] = array();
		$user_id = $_SESSION['user']['user_id'];

		foreach ($data['books'] as $book) {
			$loan = $this->Loan->is_loan($book['book_id'], $_SESSION['user']['user_id']);
			if(sizeof($loan) > 0){
				array_push($data['is_loans'], $loan->loan_id);
			} else {
				array_push($data['is_loans'], -1);
			}
		}

		$this->load->view("header", $data);
		$this->load->view("body_user", $data);

	}

	public function borrow() {
		$book_id = $_POST['bookid'];
		$this->Book->updateQty($book_id, -1);
		$loan = array('book_id' => $book_id, 
				'user_id' => $_SESSION['user']['user_id']);

		$this->Loan->add_loan($loan);

		if($_SESSION['user']['role'] == 'user'){
			redirect('userController');
		} else {
			redirect('admin');
		}
		
	}
}