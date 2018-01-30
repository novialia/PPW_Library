<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Form extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("User");
		$this->load->model("Book");
	}

	public function index() {
		if(!isset($_SESSION['user']) || ($_SESSION['role'] != 'admin')){
			$_SESSION['message'] = "Anda harus login sebagai admin.";
			if($_SESSION['role'] == 'user') {
				redirect('userController');
			} else {
				redirect('home');
			}
		}

		$user_id = $_SESSION['user']['user_id'];

		$data["title"] = "Book Lists";
		$data["books"] = $this->Book->get_book();

		// $data['is_loans'] = array();
		// $user_id = $_SESSION['user']['user_id'];

		// foreach ($data['books'] as $book) {
		// 	$loan = $this->Loan->is_loan($book['book_id'], $_SESSION['user']['user_id']);
		// 	if(sizeof($loan) > 0){
		// 		array_push($data['is_loans'], $loan->loan_id);
		// 	} else {
		// 		array_push($data['is_loans'], -1);
		// 	}
		// }

		$this->load->view("header", $data);
		$this->load->view("form", $data);

	}

	public function add() {
		$img_path = $_POST['img-path'];
		
		$title = $_POST['title'];
		$author = $_POST['author'];
		$publisher = $_POST['publisher'];
		$quantity = $_POST['quantity'];
		$description = $_POST['description'];
		$books = $this->book->get_book();
		$exist = false;

		foreach ($books as $v) {
			if ($v['title'] == $title) {
				$exist = true;
				$this->book->updateQty($v['book_id'], $quantity);
				break;
			} 
		}

		if(!$exist) {
			$data = array(
				'img_path' => $img_path,
				'title' => $title,
				'author' => $author,
				'publisher' => $publisher,
				'quantity' => $quantity,
				'description' => $description
				);
				$this->book->insert_book($data);
		}

		$book_id = -1;
		$books = $this->book->get_book();
		foreach ($books as $v) {
			if($v['title'] == $title) {
				$book_id = $v['book_id'];
			}
		}

		redirect('book_details/view/'.$book_id);
	}
}