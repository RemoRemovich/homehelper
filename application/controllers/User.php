<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		#$this->load->view('welcome_message', $data);
	}

	public function login()
	{
		if (isset($_POST['submit'])) {

			$ul = $_POST['login'];
			$up = $_POST['password'];

			$r = $this->model->try_login_user($ul, $up);

			$userinfo = $this->model->getUserInfo($r['id']);

			#echo "r = ".var_dump($r)."<br>";

			if ($r == NULL) {
				$msg = 'User not found!';
				header("Location: http://".$_SERVER['SERVER_NAME']."/Welcome?msg=$msg");
				#redirect('/Welcome', 'location', 301);
			} else {
				$data['user'] = $userinfo;
				set_cookie('userid', $userinfo['id']);
				$data['site_name'] = "Price Sonar";
				$data['page_name'] = "User dashboard";
				$this->load->view('user_dashboard_v', $data);
			}
		}		
	}

	public function dashboard()
	{
		$data['site_name'] = "Price Sonar";
		$data['page_name'] = "User dashboard";

		if (isset($_POST['userid'])) {
		
			$data['user'] = $this->model->getUserInfo($_POST['userid']);
		
			$goods = $this->model->search_goods($_POST['search_query']);

			if ($goods !== NULL) {
				$data['goods'] = $goods;
			} 

			#$data['user_prices'] = 'user_prices';
				
			$this->load->view('user_dashboard_v', $data);
		}
	}

	public function edit($item)
	{
		$data['site_name'] = "Price Sonar";
		$data['page_name'] = "Products";

		# Предусмотреть хранение userID в данных сессии и вынимание userID из данных сессии для использования в функциях!

		if (isset($_POST['userid'])) {
			$userid = $_POST['userid'];
		} else {
			$userid = get_cookie('userid');
		}

		echo "userID = $userid<br>";

		$data['user'] = $this->model->getUserInfo($userid);

		switch ($item) {
				case 'products':
					if (isset($_POST['search_query'])) {
						$goods = $this->model->search_goods($_POST['search_query']);
					} else {
						$goods = $this->model->getAllGoods();
					}

					if ($goods !== NULL) {
						$data['goods'] = $goods;
					} 
					break;
				
				default:
					# code...
					break;
			}	

			

		#$data['user_prices'] = 'user_prices';
	
		$this->load->view('user_dashboard_v', $data);
		
	}
}
