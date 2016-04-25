<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	// private $firstname;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Login');
		// $this->load->model('admin/Firstname');
		date_default_timezone_set('Asia/Dhaka');
	}
	public function index($page_id = 'dashboard', $page = 'mainpage')
	{
		if($this->Login->isAdminLogin())
		{
			$this->dashboard();
		}
		else
		{
			$this->login();
		}
	}
	public function login($page_id = 'login', $page = 'mainpage')
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['username']) && !empty($_POST['password']))
		{
			if($this->Login->loginAdmin($_POST['username'],$_POST['password']))
			{
				$this->dashboard();
			}
			else
			{
				echo "<script>alert('Details are wrong or Your Account is locked.')</script>";
				// die($page_id);
				$data['page_id'] = $page_id;
				$this->load->view('templates/'.$page,$data);
			}
		}
		else
		{
			if($this->Login->isAdminLogin())
			{
				$this->dashboard();
			}
			else
			{
				$data['page_id'] = $page_id;
				$this->load->view('templates/'.$page,$data);
			}			
		}
	}
	public function dashboard($page_id = 'dashboard', $page = 'mainpage')
	{
		if($this->Login->isLogedIn())
		{
			$data['page_id'] = 'dashboard';
			$this->load->view('templates/'.$page,$data);
		}
		else
		{
			$this->login();
		}
	}
}
