<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Book_details extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("User");
		$this->load->model("Book");	
		$this->load->model("Review");
		$this->load->model("Loan");
	}
	
	public function view($book_id) {
		$data['title'] = "Book Details";
		$reviews = $this->Review->get_review();
		$data["books"] = $this->Book->get_book();
		$data['reviews'] = array();
		$users = $this->User->get_user();

		if(isset($_SESSION['user'])){
			$user_id = $_SESSION['user']['user_id'];
			$data['is_loan'] = $this->Loan->is_loan($book_id, $user_id);
		}

		foreach ($data['books'] as $book) {
			if($book['book_id'] == $book_id){
				$data['book'] = $book;
			}
		}

		foreach ($reviews as $review) {
			if($review['book_id'] == $book_id){
				foreach ($users as $user) {
					if($user['user_id'] == $review['user_id']) {
						array_push($data['reviews'], array("username" => $user['username'], "review" => $review));
						
					}
				}
			}
		}
		$this->load->view("header", $data);
		$this->load->view('book_details', $data);
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

	public function add_review() {
		$review = $_POST['user-review'];
		$book_id = $_POST['bookid'];
		$date = date('Y-m-d');
		$user_id = $_SESSION['user']['user_id'];
		$user = $this->User->get_user_by_id($user_id);
		$uname = $user->username;
		$array = array('book_id' => $book_id,
				'user_id' => $user_id,
				'date' => $date,
				'content' => $review
				);
		$query = $this->Review->add_review($array);
		$res;
		if($query){
			$res = array('status' => 'ok', 
				'book_id' => $book_id,
				'date' => $date,
				'username' => $uname
				);
		} else {
			$res = array('status' => 'gagal');
		}
		echo json_encode($res);

	}

}