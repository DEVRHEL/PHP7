<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once 'UploadHandler.php';
class Cns extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Mns');
		$data=$this->Mns->getdata();
		$data=array('datans'=>$data);
		$this->load->view('Vns', $data, FALSE);
	}
	public function addns()
	{
		//upload file
		//$target_dir = "uploads/";

		

		//$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$file_name=basename($_FILES["anhavatar"]["name"]);
		$div=explode('.',$file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$target_file="uploads/".$unique_image;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        //echo "File is an image - " . $check["mime"] . ".";

		    	

		        $uploadOk = 1;
		    } else {
		        $response['imgerr1']="File is not an image.";
		        $uploadOk = 0;
		    }
		}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["anhavatar"]["size"] > 5000000) {
		    $response['imgerr2']="Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $response['imgerr3']="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    $response['imgerr4']="Sorry, your file was not uploaded.";
		    $response["kq"]="Them vao that bai";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		        $ten=$this->input->post('ten');
				$tuoi=$this->input->post('tuoi');
				$linkfb=$this->input->post('linkfb');
				$sodonhang=$this->input->post('sodonhang');
				$sdt=$this->input->post('sdt');
				$anhavatar=base_url()."uploads/".$unique_image;
				$this->load->model('Mns');
				if($this->Mns->insert($ten, $tuoi, $sdt, $sodonhang, $anhavatar, $linkfb))
				{
					$response["kq"]="Them vao thanh cong";
				}
				
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		        $response["kq"]="Them vao that bai";
		    }
		}
		$this->load->view('Vns', $response, FALSE);
	}
	public function editns($id)
	{
		$this->load->model('Mns');
		$data=$this->Mns->getdatabyid($id);
		$data=array('data' => $data);
		$this->load->view('Veditns', $data, FALSE);
	}
	public function updatens($id)
	{
		$file_name=basename($_FILES["anhavatar"]["name"]);
		$div=explode('.',$file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$target_file="uploads/".$unique_image;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		    }
		}
		if ($_FILES["anhavatar"]["size"] > 5000000) {
		    $uploadOk = 0;
		}	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $uploadOk = 0;
		}
		if ($uploadOk == 0) {
		    $anhavatar=$this->input->post('ava');
		} else {
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {	        
				$anhavatar=base_url()."uploads/".$unique_image;
		    } else {
		        $anhavatar=$this->input->post('ava');
		    }
		}

		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$linkfb=$this->input->post('linkfb');
		$sodonhang=$this->input->post('sodonhang');
		$sdt=$this->input->post('sdt');
		$this->load->model('Mns');

		if($this->Mns->updatebyid($id, $ten, $tuoi, $sdt, $sodonhang, $anhavatar, $linkfb))
		{
			
			$this->load->model('Mns');
			$data=$this->Mns->getdatabyid($id);
			$data=array('data' => $data);
			$data['kq']="Chỉnh sửa thành công";
			$this->load->view('Veditns', $data, FALSE);
		}
		else
		{
			$this->load->model('Mns');
			$data=$this->Mns->getdatabyid($id);
			$data=array('data' => $data);
			$data["kq"]="Chỉnh sửa thất bại";
			$this->load->view('Veditns', $data, FALSE);
		}
		
	}
	public function deletens($id)
	{
		$this->load->model('Mns');
		if($this->Mns->deletebyid($id))
		{
			$this->load->view('Vdel');
		}
	}
	public function ajax_add()
	{
		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$linkfb=$this->input->post('linkfb');
		$sodonhang=$this->input->post('sodonhang');
		$sdt=$this->input->post('sdt');
		$anhavatar=$this->input->post('anhavatar');
		$this->load->model('Mns');
		if(empty($ten) || empty($tuoi) || empty($linkfb) || empty($sodonhang) || empty($sdt) || empty($anhavatar))
		{
			echo "Error data null";
		}
		else if($this->Mns->insert($ten, $tuoi, $sdt, $sodonhang, $anhavatar, $linkfb))
		{
			// $response["kq"]="Them vao thanh cong";
			echo "OK";
		}
	}
	public function uploadfile()
	{
		$uploadfile=new UploadHandler();
	}
}

/* End of file Cns.php */
/* Location: ./application/controllers/Cns.php */