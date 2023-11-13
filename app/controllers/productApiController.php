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

    public function showProducts($params = []){
        if (isset($_GET['sort']) && isset($_GET['order'])){
            $sort = $_GET['sort'];
            $order = $_GET['order'];

            $validSortOptions = ['product_id', 'name', 'price', 'stock', 'CategoryId'];
            $validOrderOptions = ['asc', 'desc'];
            
            if(in_array($sort, $validSortOptions) && in_array($order, $validOrderOptions)){
                $prodOrd = $this->modelProd->getProductsOrderBy($sort, $order);
                $this->view->response($prodOrd, 200);
                return;
            } else {
                $this->view->response('Los parametros no son validos', 400);
                return;
            }
        }
        if(empty($params)){
            $prods = $this->modelProd->getProducts();
            $this ->view ->response($prods, 200);
        } else {
            $prod = $this->modelProd->getProduct($params[":ID"]);
            if(!empty($prod)){
                return $this->view->response($prod, 200);
            } else {
                $this->view->response('No existe el producto con el ID seleccionado', 404);
            }
        }
    }
     public function agregarProd($params = []){

        
        $body = $this->getData();

        $name = $body->name;
        $price = $body->price;
        $stock= $body->stock;
        $category = $body->CategoryId;

        if(isset($body->name, $body->price, $body->stock, $body->CategoryId)){
 			$id = $this->modelProd->insertProduct($name, $price, $stock, $category);

 	    	$this->view->response('El producto fue insertado con el id= ' .$id, 201);
        } else {
        	 $this->view->response('Los campos necesarios no estan presentes en la solicitud.', 400);
        }
    }

    public function borrarProd($params = []){
        $id = $params[':ID'];
        $product = $this->modelProd->getProduct($id);

        if($product){
            $this->modelProd->deleteProduct($id);
            $this->view->response('El producto con id= ' .$id.' ha sido borrado.', 200);
        } else {
            $this->view->response('El producto con id= ' .$id.' no existe.', 404);
        }
    }

    public function updateProd($params = []){

        $id = $params[':ID'];
        $product = $this->modelProd->getProduct($id);

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