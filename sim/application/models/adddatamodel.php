<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adddatamodel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insert($s,$g)
	{
		$dulieu=array('so'=>$s,'gia'=>$g);
		$this->db->insert('db_sosim', $dulieu);
		return $this->db->insert_id();
	}

}

/* End of file addDataModel.php */
/* Location: ./application/models/addDataModel.php */