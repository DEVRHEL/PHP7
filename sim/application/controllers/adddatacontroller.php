<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adddatacontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo 'OK';
		//$this->load->view('adddataview');
	}
	public function insert_data()
	{
		$sdt=$this->input->post('so');
		$giatien=$this->input->post('gia');
		$this->load->model('adddatamodel');
		if($this->adddatamodel->insert($sdt,$giatien))
		{
			echo "Da them vao csdl";
		}
		else {
			echo 'Loi insert_data';
		}
	}
}

/* End of file AddData.php */
/* Location: ./application/controllers/AddData.php */