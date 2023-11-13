<?php

require_once './app/controllers/apiController.php';
require_once './app/models/categoryModel.php';


class CategoryApiController extends ApiController{
    
    private $modelCategory;

    public function __construct(){
        parent::__construct();
        $this->modelCategory = new CategoryModel();
    }
    public function showCategorys($params = []){
        if (isset($_GET['sort']) && isset($_GET['order'])){
            $sort = $_GET['sort'];
            $order = $_GET['order'];

            $validSortOptions = ['CategoryId', 'type'];
            $validOrderOptions = ['asc', 'desc'];
            
            if(in_array($sort, $validSortOptions) && in_array($order, $validOrderOptions)){
                $catOrd = $this->modelCategory->getCategorysOrderBy($sort, $order);
                $this->view->response($catOrd, 200);
                return;
            } else {
                $this->view->response('Los parametros no son validos', 400);
                return;
            }
        }
        if(empty($params)){
            $categorys = $this->modelCategory->getCategorys();
            $this ->view ->response($categorys, 200);
        } else {
            $category = $this->modelCategory->getCategory($params[":ID"]);
            if(!empty($category)){
                return $this->view->response($category, 200);
            } else {
                $this->view->response('No existe el producto con el ID seleccionado', 404);
            }
        }
    }
    public function agregarCategory(){

        if (isset($body->type)) {
        	$nombre = $body->type;

        	$id = $this->modelCategory->insertCategory($nombre);

        	$this->view->response('La categoría fue insertada con el id= ' . $id, 201);
   		 } else {
       		 $this->view->response('El campo necesario no esta presente en la solicitud.', 400);
   		 }
    }

    public function updateCategory($params = []){
        $id = $params[':ID'];
        $category = $this->modelCategory->getCategory($id);

		if ($category) {
        $body = $this->getData();

	        if (isset($body->type)) {
	            $nombre = $body->type;

	            $category->type = $nombre;
	            $this->modelCategory->updateCategory($category);

	            $this->view->response('La categoria con id= ' . $id . ' ha sido modificada.', 200);
	        } else {
	            $this->view->response('El campo necesario no esta presente en la solicitud.', 400);
	        }
    	} else {
        $this->view->response('La categoria con id= ' . $id . ' no existe.', 404);
    	}
    }

    public function borrarCategory($params = []){
        $id = $params[':ID'];
        $marca = $this->modelCategory->getCategoryById($id);

        if($marca){
            $this->modelCategory->deleteCategory($id);
            $this->view->response('La marca con el id= '.$id. ' ha sido borrada.', 200);
        } else {
            $this->view->response('La marca con el id= '.$id.' no existe.', 404);
        }
    }
}