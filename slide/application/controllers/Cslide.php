<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cslide extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Vslide');
	}
	public function add()
	{
		$this->load->model('Mslide');
		$data=$this->Mslide->getdata();
		$data=json_decode($data,true); // no la mang chu khong phai la object vi co true\
		if($data==null)
		{
			$data=array();
		}

		$title=$this->input->post('title');
		$description=$this->input->post('description');
		$button_link=$this->input->post('button_link');
		$button_text=$this->input->post('button_text');

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["slide_image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["slide_image"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["slide_image"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["slide_image"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$slide_image =base_url().'uploads/'.basename($_FILES["slide_image"]["name"]);

		//tao mang la mot phan tu json
		$tmpjson = array(
			'title' => $title,
			'description' => $description,
			'button_link' => $button_link,
			'button_text' => $button_text,
			'slide_image' => $slide_image
		);
		array_push($data, $tmpjson);
		$data=json_encode($data);
		echo $this->Mslide->updatedata($data);
	}
	public function edit()
	{
		$this->load->model('Mslide');
		$data=$this->Mslide->getdata();
		$data=json_decode($data,true);
		$dl=array(
			'mangdl'=>$data
		);
		$this->load->view('Vedit', $dl, FALSE);
	}
	public function update()
	{
		$title=$this->input->post('title'); //day la arr
		$description=$this->input->post('description'); // arr
		$button_link=$this->input->post('button_link'); // arr
		$button_text=$this->input->post('button_text'); // arr
		// xu ly upload cac anh
		$images=$_FILES['slide_image']['name']; // lay arr chua ten cac image
		$imgtmp=$_FILES['slide_image']['tmp_name']; // lay duong dan cac img duoc luu tam thoi
		$slide_image_old=$this->input->post('slide_image_old'); // arr anh cu
		$imgs=array();
		for($i=0; $i< count($images); $i++)
		{
			if(empty($images[$i]))
			{
				$imgs[$i]=$slide_image_old[$i];
			}
			else
			{
				$url='uploads/'.$images[$i];
				move_uploaded_file($imgtmp[$i],$url);
				$imgs[$i]=base_url().$url;
			}
		}
		// them vao arr de chuan bi insert vao db
		$data=array();
		for ($i = 0; $i < count($title); $i++) {
			$tmp=array();
			$tmp['title']=$title[$i];
			$tmp['description']=$description[$i];
			$tmp['button_link']=$button_link[$i];
			$tmp['button_text']=$button_text[$i];
			$tmp['slide_image']=$imgs[$i];
			array_push($data,$tmp);
		}
		$data=json_encode($data);
		$this->load->model('Mslide');
		if($this->Mslide->updatedata($data))
		{
			echo "thanh cong";
		}
	}
}

/* End of file Cslide.php */
/* Location: ./application/controllers/Cslide.php */