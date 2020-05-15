<?php

include_once 'db.php';

class User{
	
	private $db;
	private $db_table_student = "student";
	private $db_table_category = "category";
	
	public function __construct(){
		$this->db = new DbConnect();
	}
	
	public function isLoginExist($username, $password){		
				
		$query = "select * from " . $this->db_table_student . " where username = '$username' AND password = '$password' AND enabled = '1' Limit 1";
		$result = mysqli_query($this->db->getDb(), $query);
		if(mysqli_num_rows($result) > 0){
			mysqli_close($this->db->getDb());
			return true;
		}		
		mysqli_close($this->db->getDb());
		return false;		
	}
	

	
	public function createNewRegisterStudent($username, $password, $email, $real_name, $year, $gender){
		
			$query = "insert into student (username, password, email, real_name, etos, gender_male, enabled) values ('$username', '$password', '$email', '$real_name', '$year' , '$gender' ,'0')";
			$inserted = mysqli_query($this->db->getDb(), $query);
			if($inserted == 1){
				$json['success'] = 1;									
			}else{
				$json['success'] = 0;
			}
			mysqli_close($this->db->getDb());

		return $json;
		
	}
	
	
	public function createNewCategory($category_name){

		
			$query = "insert into category (category_name) values ('$category_name')";
			
			$inserted = mysqli_query($this->db->getDb(), $query);
			if($inserted == 1){
				$json['success'] = 1;									
			}else{
				$json['success'] = 0;
			}
			mysqli_close($this->db->getDb());
		return $json;
		
	}
	
	
	
	public function loginstudent($username, $password){
			
		$json = array();
		$canUserLogin = $this->isLoginExist($username, $password);
		if($canUserLogin){
			$json['success'] = 1;
		}else{
			$json['success'] = 0;
		}
		return $json;
	}

	
	public function loginteacher($username, $password){
			
		$json = array();
		$canUserLogin = $this->isLoginExist($username, $password);
		if($canUserLogin){
			$json['success'] = 1;
		}else{
			$json['success'] = 0;
		}
		return $json;
	}
	
}


?>