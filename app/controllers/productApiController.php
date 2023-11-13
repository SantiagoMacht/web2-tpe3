<?php

require_once './app/controllers/apiController.php';
require_once './app/models/productModel.php';

class ProductApiController extends ApiController{
    private $modelProd;
    private $authHelper;
    

    public function __construct(){
        parent::__construct();
        $this->modelProd = new ProductModel();      
    }

    public function showProducts(){

    }

     public function agregarProd($params = []){

        $body = $this->getData();

        $image = $body->image
        $name = $body->name;
        $price = $body->price;
        $stock= $body->stock;
        $category = $body->CategoryId;

        $id = $this->modelProd->insertProduct($name, $price, $stock, $category);

        $this->view->response('El producto fue insertado con el id= ' .$id, 201);
    }

    public function borrarProd($params = []){
        $id = $params[':ID'];
        $product = $this->modelProd->getProductById($id);

        if($product){
            $this->modelProd->deleteProduct($id);
            $this->view->response('El producto con id= ' .$id.' ha sido borrado.', 200);
        } else {
            $this->view->response('El producto con id= ' .$id.' no existe.', 404);
        }
    }

    public function updateProd($params = []){

        $id = $params[':ID'];
        $product = $this->modelProd->getProductById($id);

        if($product){
            $body = $this->getData();

	        $name = $body->name;
	        $price = $body->price;
	        $stock= $body->stock;
	        $category = $body->CategoryId;

            $this->modelProd->updateProduct($id, $name, $price, $stock, $category);

            $this->view->response('El producto con id= ' .$id.' ha sido modificado.', 200);
        } else {
            $this->view->response('El producto con id= ' .$id.' no existe.', 404);
        }
    }

}