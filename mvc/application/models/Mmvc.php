<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmvc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insert_data($s,$g)
	{
		$data=array('so'=>$s,'gia'=>$g);
		$this->db->insert('db_sosim', $data);
		return $this->db->insert_id();
	}
	public function get_data()
	{
		$this->db->select('*'); //lay het du lieu
		$ketqua=$this->db->get('db_sosim');  //lay tu table
		$ketqua=$ketqua->result_array(); // bien doi ket qua thanh mot mang vi khi vardump ta thay rat nhieu gia tri du thua
		return $ketqua;
	}
	public function get_data_byid($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$ketqua=$this->db->get('db_sosim');
		$ketqua=$ketqua->result_array();
		return $ketqua;
	}
	public function delete_data($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete('db_sosim'))
		{
			echo 'Xoa thanh cong';
		}
		else
		{
			echo 'Loi';
		}
	}
	public function update_data_byid($id,$so,$gia)
	{
		$data=array(
			'id'=>$id,
			'so'=>$gia,
			'gia'=>$gia);
		$this->db->where('id', $id);
		return $this->db->update('db_sosim', $data);
	}
}

/* End of file Mmvc.php */
/* Location: ./application/models/Mmvc.php */