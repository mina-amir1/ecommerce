<?php


class product
{
    private $conn;
    public function __construct()
    {   $this->conn=new mysqli(db_server,db_username,db_password,db_name);
    }
    public function get_error(){return $this->conn->error;}

    public function add_product($title,$desc,$image_url,$price,$available,$userId)
    {
        $this->conn->query("INSERT INTO `products` (`title`,`description`,`image`,`price`,`available`,`userid`)values ('$title','$desc','$image_url','$price','$available','$userId')");
        if($this->conn->affected_rows>0)
        {
            return true;
        }
        return false;
    }
    public function update_product($id,$title,$desc,$image_url,$price,$available,$userid)
    {
        $this->conn->query("UPDATE `products` SET `title`='$title',`description`='$desc',`image`='$image_url',`price`='$price',`available`='$available',`userid`='$userid' WHERE `id`='$id'");
        if($this->conn->affected_rows>0)
        {
            return true;
        }
        return false;
    }
    public function delete_product($id)
    {
        $this->conn->query("DELETE FROM `products` WHERE `id`='$id'");
        if ($this->conn->affected_rows>0)
        {
            return true;
        }
        return false;
    }
    public function get_all_products($query='')
    {
        $res=$this->conn->query("SELECT * FROM `products` $query");
        if($res->num_rows>0)
        {
            $all_data=array();
            while ($row=$res->fetch_assoc()){$all_data[]=$row;}
            return $all_data;
        }
        return null;
    }
    public function get_product($id)
    {
        $res=$this->conn->query("SELECT * FROM `products` WHERE `id`='$id'");
        if($res->num_rows>0)
        {
            $all_data=array();
            while ($row=$res->fetch_assoc()){$all_data[]=$row;}
            return $all_data;
        }
        return null;
    }
    public function search_product($keyword)
    {
        $res=$this->conn->query("SELECT * FROM `products` WHERE `title` LIKE '%$keyword%'");
        if($res->num_rows >0)
        {
            $products=array();
            while ($row=$res->fetch_assoc())
            {
             $products[]=$row;
            }
            return $products;
        }
        echo $this->conn->error;
        return null;
    }
    public function __destruct()
    {
        $this->conn->close();
    }
}