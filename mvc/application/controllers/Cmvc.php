<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cmvc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Vmvc');
	}
	public function insert()
	{
		$so=$this->input->post('so');
		$gia=$this->input->post('gia');
		$this->load->model('Mmvc');
		if($this->Mmvc->insert_data($so,$gia))
		{
			$this->load->view('Response');
		}
		else
		{
			echo 'Loi';
		}
	}
	public function show()
	{
		$this->load->model('Mmvc');
		$dulieu=$this->Mmvc->get_data();
		$dulieu=array('data' => $dulieu); // bien du lieu thanh mang voi key la data
		$this->load->view('Show',$dulieu,FALSE);
	}
	public function delete($id) //Cmvc/delete/3 o day 3 la gia tri nhan vao nen phai co bien $id
	{
		$this->load->model('Mmvc');
		$this->Mmvc->delete_data($id);
	}
	public function edit($id)
	{
		$this->load->model('Mmvc');
		$dulieu=$this->Mmvc->get_data_byid($id);
		$dulieu=array('data' => $dulieu); // bien du lieu thanh mang voi key la data
		$this->load->view('Edit',$dulieu,FALSE);
	}
	public function update($id)
	{
		//$id=$this->input->post('id');
		$so=$this->input->post('so');
		$gia=$this->input->post('gia');
		$this->load->model('Mmvc');
		if($this->Mmvc->update_data_byid($id,$so,$gia))
		{
			echo 'OK';
		}
	}
}

/* End of file Cmvc.php */
/* Location: ./application/controllers/Cmvc.php */