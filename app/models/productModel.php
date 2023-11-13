<?php

require_once "./app/models/model.php";

class ProductModel extends Model {

    function getProducts(){
        $query = $this->db->prepare('SELECT * FROM products');
        $query->execute();

        $prods = $query->fetchAll(PDO::FETCH_OBJ);

        return $prods;
    }
    public function getProduct($id) {
        $query = $this->db->prepare('SELECT * FROM products WHERE product_id = ? ');
        $query->execute([$id]);
        $prod = $query->fetch(PDO::FETCH_OBJ);

        return $prod;
    }
    function getProductsOrderBy($sort, $order){
        $query = $this->db->prepare("SELECT * FROM `products` ORDER BY $sort $order");

        $query->execute();

        $prodOrd = $query->fetchAll(PDO::FETCH_OBJ);

        return $prodOrd;
    }

    public function insertProduct( $name, $price, $stock, $categoryId){
        $query = $this->db->prepare('INSERT INTO products ( `name`, `price`, `stock`, `CategoryId` ) VALUES(:name, :price, :stock, :CategoryId)');
        $params = array(
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
            'CategoryId' => $categoryId
        );
        $query->execute($params);
        return $this->db->lastInsertID();
    }
    
    public function deleteProduct($id){
        $query = $this->db->prepare('DELETE FROM products WHERE product_id = ?');
        $query->execute([$id]);
    }

    public function updateProduct($id, $name, $price, $stock, $category){
        
        $query = $this->db->prepare('UPDATE products SET name = ? , price = ? , stock = ? , CategoryId = ? WHERE product_id = ?');
        $query->execute([$name, $price, $stock, $category, $id]);
        
    }

}