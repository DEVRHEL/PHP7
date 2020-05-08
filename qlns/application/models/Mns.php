<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mns extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insert($ten, $tuoi, $sdt, $sodonhang, $anhavatar, $linkfb)
	{
		$data = array(
			'ten' => $ten,
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'anhavatar' => $anhavatar,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang
		);
		$this->db->insert('nhan_vien', $data);
		return $this->db->insert_id();
	}
	public function getdata()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$data=$this->db->get('nhan_vien');
		$data=$data->result_array();
		return $data;
	}
	public function getdatabyid($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data= $this->db->get('nhan_vien');
		$data= $data->result_array();
		return $data;
	}
	public function updatebyid($id, $ten, $tuoi, $sdt, $sodonhang, $anhavatar, $linkfb)
	{
		$data = array(
			'ten' => $ten,
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'anhavatar' => $anhavatar,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang
		);
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);
	}
	public function deletebyid($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
	}
}

/* End of file Mns.php */
/* Location: ./application/models/Mns.php */