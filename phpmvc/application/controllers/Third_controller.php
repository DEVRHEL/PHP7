<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Third_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$number['ds']=array('8','9','10');
		$this->load->view('Third_view.php',$number);
	}

}

/* End of file Third_controller.php */
/* Location: ./application/controllers/Third_controller.php */