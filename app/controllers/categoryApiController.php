<?php

require_once './app/controllers/apiController.php';
require_once './app/models/categoryModel.php';


class CategoryApiController extends ApiController{
    
    private $modelCategory;

    public function __construct(){
        parent::__construct();
        $this->modelCategory = new CategoryModel();
    }

    public function agregarCategory(){

        $body = $this->getData();

        $nombre = $body->type;

        $id = $this->modelCategory->insertCategory($nombre);

        $this->view->response('El marca fue insertado con el id= ' .$id, 201);

    }

    public function updateCategory($params = []){
        $id = $params[':ID'];
        $marca = $this->modelCategory->getCategoryById($id);

        if($marca){
            $body = $this->getData();

            $nombre = $body->type;
            
            $this->modelMarca->updateMarca($id, $nombre);

            $this->view->response('La marca con id= '.$id.' ha sido modificada.', 200);
        } else {
            $this->view->response('La marca con id= '.$id.' no existe.', 404);
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