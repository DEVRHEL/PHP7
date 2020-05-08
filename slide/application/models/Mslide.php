<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mslide extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getdata()
	{
		$this->db->select('*');
		$this->db->where('tenthuoctinh', 'slides_topbanner');
		$data=$this->db->get('homepage');
		$data=$data->result_array();
		foreach ($data as $value) {
			$temp=$value['giatrithuoctinh'];
		}
		return $temp;
	}
	public function updatedata($dl)
	{
		$data=array(
			'tenthuoctinh' => 'slides_topbanner',
			'giatrithuoctinh' => $dl
		);
		$this->db->where('tenthuoctinh','slides_topbanner');
		return $this->db->update('homepage', $data);
	}
}

/* End of file Mslide.php */
/* Location: ./application/models/Mslide.php */