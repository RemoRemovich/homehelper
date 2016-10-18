<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

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
		$data['site_name'] = "Price Sonar";
	}

	public function index()
	{
		#$this->load->view('welcome_message', $data);
	}

	public function find_user($ul, $up)
	{
		$query = "SELECT id FROM users WHERE email = '".$ul."' AND password = '".$up."' AND active = 'Y' ";
		#echo "query = ___".$query."___\n<br>";

		$r = $this->db->query($query);
		 
		if ($r->num_rows()){
			$row = $r->row_array();
			return $row['id'];
		} else {
			return 0;
		}
	}

	public function getUserById($id)
	{
		$r = $this->db->query("SELECT * FROM users WHERE id = '".$id."' ");
		if ($r->num_rows())	{
			return $r->row_array();
		} else {
			return array('name' => 'Anonymous', 'id' => 0);
		}
	}

	public function getGoodsByNames($search_query)
	{
		$goods_names = explode(' ', $search_query);

		$list = '';

		foreach ($goods_names as $name) {
			$list .= "'".$name."', ";
		}

		$q = "SELECT * FROM goods WHERE name IN (".$list." '') ";
		#echo "q = ".var_dump($q)."<br>";
		$r = $this->db->query($q);

		if ($r->num_rows()) {
			return $r->result_array();
		} else {
			return NULL;
		}
	}

	public function getAllGoods()
	{
		return $this->getAllFrom('goods');
	}

	public function getAllFrom($tablename)
	{
		$r = $this->db->query("SELECT * FROM $tablename");
		if ($r->num_rows())	{
			return $r->result_array();
		} else {
			return NULL;
		}
	}
}
