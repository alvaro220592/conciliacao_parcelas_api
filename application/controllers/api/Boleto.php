<?php

require APPPATH . 'libraries/REST_Controller.php';

class Boleto extends REST_Controller {
    public function __construct(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        parent::__construct();
        $this->load->model('Boletos_model', 'boletos');
    }

    public function index_get($id = ''){
        if(!$id){
            $model['boletos'] = $this->boletos->all();
        }else{
            $model['boleto'] = $this->boletos->show($id);
        }
        $this->response($model, 200);
    }

    public function index_post(){
        if(!$this->boletos->store()){
            $this->response('Erro ao cadastrar boleto');
        }else{
            $this->response('Boleto cadastrado com sucesso', 200);
        }
    }

    public function index_put($id){
        $this->boletos->update($id) ? 
        $this->response('Editado com sucesso') :
        $this->response('Erro ao editar boleto');
    }

    public function index_delete($id){
        $this->boletos->destroy($id) ?
        $this->response('Excluído com sucesso') :
        $this->response('Erro ao excluir boleto');        
    }
}