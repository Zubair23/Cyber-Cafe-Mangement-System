<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Login extends CI_Model {
	
	private $userID = '';
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		@session_start();
		$this->userID = isset($_SESSION['user']['id'])?$_SESSION['user']['id']:'guest';
	}
	public function isLogedIn(){
		if(!empty($_SESSION['user']['id'])){
			return true;
		}else{
			return false;
		}
	}
	public function isAdminLogin(){
		if(!empty($_SESSION['user']['id']) && $_SESSION['user']['id']!=='guest' && isset($_SESSION['user']['loginType']) && $_SESSION['user']['loginType']=='admin'){
			return true;
		}else{
			return false;
		}
	}
	public function login($email,$password){
		if(!empty($email) && !empty($password)){
			$db_email = $this->db->escape($email);
			$db_pass = $this->db->escape($password);
			$_SESSION['email'] = $email;
			$sql = "SELECT * FROM tbl_user WHERE email_id = $db_email AND password = $db_pass AND is_active ='y';";
			$qry = $this->db->query($sql);
			if($qry->num_rows()==1){
				$updatequery = $this->db->query("UPDATE tbl_user SET last_logged_in = '".date("Y-m-d H:i:s")."' WHERE email_id='$email' AND password='$pwd'");
				$result = $qry->result_array();
				$_SESSION['user']['id'] = $result[0]['id'];
				$_SESSION['user']['islogin'] = 'true';
				$_SESSION['user']['user_data'] = $result[0];
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	public function loginAdmin($username,$password){
		if(!empty($username) && !empty($password)){
			$db_username = $this->db->escape($username);
			$password = md5($password);
			$db_pass = $this->db->escape($password);
			$_SESSION['username'] = $username;
			$sql = "SELECT * FROM admin_info WHERE username = ".$db_username." AND password = ".$db_pass;
			$qry = $this->db->query($sql);
			if($qry->num_rows()==1){
				$_SESSION['user']['id'] = $result[0]['id'];
				$_SESSION['user']['islogin'] = 'true';
				$_SESSION['user']['loginType'] = 'admin';
				$_SESSION['user']['user_data'] = $result[0];
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
}