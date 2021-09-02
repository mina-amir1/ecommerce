<?php 

class file_upload
{
	public $name;
	public $size;
	public $type;
	public $error;
	public $tmp_name;
    private $new_name;
	function __construct($input_name)
	{
		$this->name = $_FILES[$input_name]['name'];
		$this->size =$_FILES[$input_name]['size'];
		$this->type= $_FILES[$input_name]['type'];
		$this->error =$_FILES[$input_name]['error'];
		$this->tmp_name=$_FILES[$input_name]['tmp_name'];
        $this->new_name= md5(rand(0,1000).date('U')).'_'.$this->name;
	}

	public function set_new_name()
	{
		return	$this->new_name;

	}
	public function get_errors()
	{
		$errors= array();
		if($this->error==1){$errors[1]="ERR INI SIZE";}
		if($this->error==2){$errors[2]="ERR FORM SIZE";}
		if($this->error==3){$errors[3]="ERR Partial";}
		if($this->error==4){$errors[4]="ERR NO FILE";}
		if($this->error==6){$errors[6]="ERR NO TMP DIR";}
		if($this->error==7){$errors[7]="ERR CANT Write";}
		if($this->error==8){$errors[8]="ERR Extention";}
		return $errors;
	}

	public function file_move($to_dir)
	{
		if(empty($this->get_errors()))
		{
			if(move_uploaded_file($this->tmp_name,$to_dir.$this->set_new_name())){return $this->set_new_name();}
			else{return "ERR in moving";}

		}
		else 
			return $this->get_errors(); 
	}
}