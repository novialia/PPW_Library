<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("User");
		$this->load->model("Book");
		$this->load->model("Loan");
		$this->load->model("Review");
		//$this->load->library('session');		
	}

	public function index()
	{

		$data["title"] = "Library Book Lists";
		$data["books"] = $this->Book->get_book();
		$data["review"] = $this->Review->get_review();

		if(isset($_SESSION['user'])){
			$_SESSION['role'] = $_SESSION['user']['role'];
			if($_SESSION['role'] == "user") {
				redirect('userController');
			} else {
				redirect('admin');
			}
		} else {
			$this->load->view('header', $data);
			$this->load->view('body_home', $data);
		}
	}

	public function login() {
		$uname = $_POST['username'];
		$pass = $_POST['pass'];

		$data = $this->User->get_user();

		foreach ($data as $user) {
			if ($user['username'] == $uname && $user['password'] == $pass) {
				$_SESSION['user'] = $user;
				$_SESSION['role'] = "";
				if($user['role'] == "user") {
					$_SESSION['role'] = "user";
					redirect('userController');
				} else {
					$_SESSION['role'] = "admin";
					redirect('admin');
				} 
			}
		}

		if(!isset($_SESSION['user'])){
			$_SESSION['message'] = "Login gagal. Cek username dan password";
			redirect('home');
		}

	}

	public function view_details($book_id) {
		$data["books"] = $this->Book->get_book();
		foreach ($data['books'] as $book) {
			if($book['book_id'] == $book_id){
				$data['book'] = $book;
			}
		}

		$this->load->view('book_details', $data);
	}

	public function logout() {
		session_unset();
		session_destroy();
		redirect('home');
	}
}
