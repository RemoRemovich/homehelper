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

	public function auth()
	{
		if (isset($_POST['submit'])) {

			$ul = $_POST['login'];
			$up = $_POST['password'];

			#echo "ul = $ul , up = $up|||\n<br>";

			$uid = $this->model->find_user($ul, $up);
		
		#echo "uid = $uid\n";
		#exit();

			if ($uid == 0) {
				header("Location: http://".$_SERVER['SERVER_NAME']."/Welcome?msg=User not found!");
			} else {
				$this->session->set_userdata(array('userid' => $uid));
				header("Location: http://".$_SERVER['SERVER_NAME']."/user/show_user_dashboard");
			}
		}		
	}

	public function show_user_dashboard()
	{
		$data['site_name'] = "Price Sonar";
		$data['page_name'] = "User dashboard";

		$uid = $this->session->userid;
		#echo "uid = $uid<br>\n<br>";

		if (!isset($uid) || $uid === NULL) {
			$uid = 0;
		}

		$data['user'] = $this->model->getUserById($uid);
	
		if (isset($_POST['search_query'])) {
			$goods = $this->model->getGoodsByNames($_POST['search_query']);
		} else {
			$goods = $this->model->getAllGoods();
		}

		$data['goods'] = $goods;
						
		$this->load->view('user_dashboard_v', $data);		
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

		//echo "userID = $userid<br>";

		$data['user'] = $this->model->getUserById($userid);

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

	public function logout()
	{
		$uid = $this->session->userid;
		session_destroy();
		header("Location: http://".$_SERVER['SERVER_NAME']."/welcome");
	}
}
