<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
/**
 *
 */
class category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function insert_category($catName)
    {
        $catName=$this->fm->validation($catName);
        $catName=mysqli_real_escape_string($this->db->link,$catName);
        if(empty($catName))
        {
            $alert="<span class='error'> category name must be not empty</span>";
            return $alert;
        }
        else
        {
            $querry="insert into tbl_category(catName) values ('$catName')";
            $result=$this->db->insert($querry);
            if($result)
            {
                $alert="<span class='success'>Insert category successfully</span>";
                return $alert;
            }
            else {
                $alert="<span class='error'>Insert category not successfully</span>";
                return $alert;
            }
        }
    }
    public function show_category()
    {
        $query="select * from tbl_category order by catId desc";
        $result=$this->db->select($query);
        return $result;
    }
    public function getcatbyId($id)
    {
        $query="select * from tbl_category where catId ='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function update_category($catName,$id)
    {
        $catName=$this->fm->validation($catName);
        $catName=mysqli_real_escape_string($this->db->link,$catName);
        $id=mysqli_real_escape_string($this->db->link,$id);
        if(empty($catName))
        {
            $alert="<span class='error'> category name must be not empty</span>";
            return $alert;
        }
        else
        {
            $querry="update tbl_category set catName='$catName' where catId='$id'";
            $result=$this->db->update($querry);
            if($result)
            {
                $alert="<span class='success'>Updated category successfully</span>";
                return $alert;
            }
            else {
                $alert="<span class='error'>Updated category not successfully</span>";
                return $alert;
            }
        }
    }
    public function del_category($id)
    {
        $query="delete from tbl_category where catId='$id'";
        $result=$this->db->delete($query);
        if($result)
        {
            $alert="<span class='success'>deleted category successfully</span>";
            return $alert;
        }
        else {
            $alert="<span class='error'>deleted category not successfully</span>";
            return $alert;
        }
    }
}


?>