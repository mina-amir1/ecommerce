<?php


class message
{
     private $conn;
     public function __construct()
     {$this->conn= new mysqli(db_server,db_username,db_password,db_name);
     }

     public function get_errors(){return $this->conn->error;}

     public function add_messg($title,$content,$name,$email)
     {
        $this->conn->query("INSERT INTO `messages`(`title`, `content`, `name`, `email`) VALUES('$title','$content','$name','$email')");
        if ($this->conn->affected_rows>0)
        {
            return true;
        }
        return false;
     }
     public function update_messg($id,$title,$content,$name,$email)
     {
         $this->conn->query("UPDATE `messages` SET `title`='$title', `content`='$content', `name`='$name', `email`='$email' WHERE `id`='$id'");
         if ($this->conn->affected_rows>0)
         {
             return true;
         }

         return false;
     }
     public function delete_messg($id)
     {
         $this->conn->query("DELETE FROM `messages` WHERE `id`='$id'");
         if ($this->conn->affected_rows>0)
         {
             return true;
         }
         return false;
     }
     public function get_all_messgs()
     {
         $res=$this->conn->query("SELECT * FROM `messages` ");
         if($res->num_rows>0)
         {
             $data=array();
             while ($row=$res->fetch_assoc())
             {
                 $data[]=$row;
             }
             return $data;
         }
         return null;
     }
    public function get_messg($id)
    {
        $res=$this->conn->query("SELECT * FROM `messages` WHERE `id`='$id'");
        if($res->num_rows>0)
        {
            $all_data=array();
            while ($row=$res->fetch_assoc()){$all_data[]=$row;}
            return $all_data;
        }
        return null;
    }
    public function __destruct()
    {
       $this->conn->close();
    }
}