<?php

require_once "./app/models/model.php";

class ProductModel extends Model {

    public function getProductById($id) {
        $query = $this->db->prepare('SELECT * FROM products INNER JOIN category ON products.CategoryId = category.CategoryId WHERE products.product_id = ? ');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);   
    }

     public function insertProduct($name, $price, $stock, $category){
        $query = $this->db->prepare('INSERT INTO products (name, price, stock, CategoryId) VALUES (?,?,?,?)');
        $query->execute([$name, $price, $stock, $category]);

        return $this->db->lastInsertId();
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