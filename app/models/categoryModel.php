<?php

require_once "./app/models/model.php";

class CategoryModel extends Model{

	public function getCategoryById($id){
		$query = $this->db->prepare('SELECT * FROM category WHERE CategoryId = ?');
        $query->execute([$id]);

        $category = $query->fetch(PDO::FETCH_OBJ);

        return $category;
	}

	public function insertCategory(){
		$query = $this->db->prepare('INSERT INTO category (type) VALUES(?)');
		$query->execute([$_POST['category']]);
		return $this->db->lastInsertID();
	}

	public function updateCategory($category){
		$query = $this->db->prepare('UPDATE `category` SET `type` = ? WHERE `category`.`CategoryId` = ?');
		$query->execute(array($category->type, $category->CategoryId));
	}	

	public function deleteCategory($id){
		$query = $this->db->prepare('DELETE FROM category WHERE CategoryId = ?');
		$query->execute([$id]);
	}

}