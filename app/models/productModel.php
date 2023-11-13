<?php

require_once "./app/models/model.php";

class ProductModel extends Model {

    public function getProductById($id) {
        $query = $this->db->prepare('SELECT * FROM products INNER JOIN category ON products.CategoryId = category.CategoryId WHERE products.product_id = ? ');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);   
    }

    public function insertProduct($image, $name, $price, $stock, $categoryId){
        $query = $this->db->prepare('INSERT INTO products ( `image`, `name`, `price`, `stock`, `CategoryId` ) VALUES(:image, :name, :price, :stock, :CategoryId)');
        $params = array(
            'image' => $image,
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
            'CategoryId' => $categoryId
        );
        $query->execute($params);
        return $this->db->lastInsertID();
    }
    
    public function deleteProduct($id){
        $query = $this->db->prepare('DELETE FROM products WHERE id = ?');
        $query->execute([$id]);
    }

    public function updateProduct($id, $name, $price, $stock, $category){
        
        $query = $this->db->prepare('UPDATE products SET name = ? , price = ? , stock = ? , CategoryId = ? WHERE id = ?');
        $query->execute([$name, $price, $stock, $category]);
        
    }

}