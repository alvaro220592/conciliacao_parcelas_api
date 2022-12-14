<?php

require APPPATH . 'libraries/REST_Controller.php';

class Boleto extends REST_Controller {
    public function __construct(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");

        // header("X-API-KEY: 1");
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
        $this->response($this->boletos->update($id));
    }

    public function index_delete($id){
        $this->response($this->boletos->destroy($id));
    }

    public function conciliarParcelas(){
        echo json_encode('a');
    }
}