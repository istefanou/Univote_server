<?php

include_once 'db.php';


	
	

	function createNewCategory($category_name){
			$query = "insert into category (category_name) values ('$category_name')";
			$inserted = mysqli_query(new DbConnect()->getDb(), $query);
			if($inserted == 1){
				$json['success'] = 1;									
			}else{
				$json['success'] = 0;
			}
			mysqli_close(db->getDb());
		}
		return $json;
		
	}

createNewCategory("test")
?>