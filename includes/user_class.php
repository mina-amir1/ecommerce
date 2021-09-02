<?php 

class user
{
	private $conn;
	private $data_user;

	public function __construct()
	{
		$this->conn= new mysqli(db_server,db_username,db_password,db_name);
	}
	public function login($username,$password)
	{	
		$password=md5($password);
		$result =$this->conn->query("SELECT * From `users` WHERE `username`='$username' AND `password`='$password'");
		if($result->num_rows>0)
		{
			$this->data_user=$result->fetch_assoc();

			return true;
		}
		return false;

	}
    public function get_login_user_data(){return $this->data_user;}
	public function register($username,$password,$email)
	{
		if($username==''||$password==''||$email==''){return false;}
		$password=md5($password);
		$this->conn->query("INSERT INTO `users` (`username`,`password`,`email`)VALUES('$username','$password','$email')");
		if($this->conn->affected_rows >0)
		{
			return true;
		}
		return false;
	}

    public function get_errors(){return $this->conn->error;}
	public function edit($id,$username,$password,$email)
	{	
		$password=md5($password);
		$id=(int)$id;
		$this->conn->query("UPDATE `users` SET `username`='$username',`password`='$password',`email`='$email' WHERE `id`='$id'");
		if($this->conn->affected_rows>0)
		{
			return true;
		}
		return false;
	}
	public function get_user_data($id)
    {
        $res=$this->conn->query("SELECT * FROM `users` WHERE `id`='$id'");
        if($res->num_rows>0)
        {
            $all_data=array();
            while ($row=$res->fetch_assoc()){$all_data[]=$row;}
            return $all_data;
        }
        return null;
    }

	public function get_all_users()
    {
        $res=$this->conn->query("SELECT * FROM `users`");
        if($res->num_rows>0)
        {
            $all_data=array();
            while ($row=$res->fetch_assoc()){$all_data[]=$row;}
            return $all_data;
        }
        return null;
    }
    public function delete_user($id)
    {
	 $this->conn->query("DELETE FROM `users` WHERE `id`='$id'");
	 if ($this->conn->affected_rows>0)
	 {
	     return true;
     }
	 return false;
    }

	public function __destruct()
	{
		$this->conn->close();
	}
}