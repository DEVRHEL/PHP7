<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
/**
 *
 */
class brand
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function insert_brand($brandName)
    {
        $brandName=$this->fm->validation($brandName);
        $brandName=mysqli_real_escape_string($this->db->link,$brandName);
        if(empty($brandName))
        {
            $alert="<span class='error'> Brand name must be not empty</span>";
            return $alert;
        }
        else
        {
            $querry="insert into tbl_brand(brandName) values ('$brandName')";
            $result=$this->db->insert($querry);
            if($result)
            {
                $alert="<span class='success'>Insert brand successfully</span>";
                return $alert;
            }
            else {
                $alert="<span class='error'>Insert brand not successfully</span>";
                return $alert;
            }
        }
    }
    public function show_brand()
    {
        $query="select * from tbl_brand order by brandId desc";
        $result=$this->db->select($query);
        return $result;
    }
    public function getbrandbyId($id)
    {
        $query="select * from tbl_brand where brandId ='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function update_brand($brandName,$id)
    {
        $brandName=$this->fm->validation($brandName);
        $brandName=mysqli_real_escape_string($this->db->link,$brandName);
        $id=mysqli_real_escape_string($this->db->link,$id);
        if(empty($brandName))
        {
            $alert="<span class='error'> Brand name must be not empty</span>";
            return $alert;
        }
        else
        {
            $querry="update tbl_brand set brandName='$brandName' where brandId='$id'";
            $result=$this->db->update($querry);
            if($result)
            {
                $alert="<span class='success'>Updated brand successfully</span>";
                return $alert;
            }
            else {
                $alert="<span class='error'>Updated brand not successfully</span>";
                return $alert;
            }
        }
    }
    public function del_brand($id)
    {
        $query="delete from tbl_brand where brandId='$id'";
        $result=$this->db->delete($query);
        if($result)
        {
            $alert="<span class='success'>deleted brand successfully</span>";
            return $alert;
        }
        else {
            $alert="<span class='error'>deleted brand not successfully</span>";
            return $alert;
        }
    }
}


?>