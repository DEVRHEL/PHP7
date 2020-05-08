<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
/**
 *
 */
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function insert_product($data,$files)
    {
        $productName=mysqli_real_escape_string($this->db->link,$data['productName']);
        $brand=mysqli_real_escape_string($this->db->link,$data['brand']);
        $category=mysqli_real_escape_string($this->db->link,$data['category']);
        $product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);
        $price=mysqli_real_escape_string($this->db->link,$data['price']);
        $type=mysqli_real_escape_string($this->db->link,$data['type']);
        $permited=array('jpg','jpeg','png','gif');

        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_temp=$_FILES['image']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image="uploads/".$unique_image;

        if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name=="")
        {
            $alert="<span class='error'> fields must be not empty</span>";
            return $alert;
        }
        else
        {
            move_uploaded_file($file_temp,$uploaded_image);
            $querry="insert into tbl_product(productName,catId,brandId,product_desc,type,price,image) values ('$productName','$category','$brand','$product_desc','$type','$price','$unique_image')";
            $result=$this->db->insert($querry);
            if($result)
            {
                $alert="<span class='success'>Insert product successfully</span>";
                return $alert;
            }
            else {
                $alert="<span class='error'>Insert product not successfully</span>";
                return $alert;
            }
        }
    }
    public function show_product()
    {
        $query="select * from tbl_product order by productId desc";
        $result=$this->db->select($query);
        return $result;
    }
    // public function getcatbyId($id)
    // {
    //     $query="select * from tbl_category where catId ='$id'";
    //     $result=$this->db->select($query);
    //     return $result;
    // }
    // public function update_category($catName,$id)
    // {
    //     $catName=$this->fm->validation($catName);
    //     $catName=mysqli_real_escape_string($this->db->link,$catName);
    //     $id=mysqli_real_escape_string($this->db->link,$id);
    //     if(empty($catName))
    //     {
    //         $alert="<span class='error'> category name must be not empty</span>";
    //         return $alert;
    //     }
    //     else
    //     {
    //         $querry="update tbl_category set catName='$catName' where catId='$id'";
    //         $result=$this->db->update($querry);
    //         if($result)
    //         {
    //             $alert="<span class='success'>Updated category successfully</span>";
    //             return $alert;
    //         }
    //         else {
    //             $alert="<span class='error'>Updated category not successfully</span>";
    //             return $alert;
    //         }
    //     }
    // }
    // public function del_category($id)
    // {
    //     $query="delete from tbl_category where catId='$id'";
    //     $result=$this->db->delete($query);
    //     if($result)
    //     {
    //         $alert="<span class='success'>deleted category successfully</span>";
    //         return $alert;
    //     }
    //     else {
    //         $alert="<span class='error'>deleted category not successfully</span>";
    //         return $alert;
    //     }
    // }
}


?>