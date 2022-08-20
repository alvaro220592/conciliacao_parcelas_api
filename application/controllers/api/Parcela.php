<?php

require APPPATH . 'libraries/REST_Controller.php';     

class Parcela extends REST_Controller {
    public function __construct(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->database();
        $this->load->model('Parcelas_model', 'parcelas');
    }

    public function index_get($id = ''){
        if(!$id){
            $data['parcelas'] = $this->parcelas->all();
        }else{
            $data['parcela'] = $this->parcelas->show($id);
        }
        $this->response($data, 200);
    }

    public function index_post(){
        if(!$this->parcelas->store()){
            $this->response('Erro ao cadastrar parcela');
        }
        $this->response('Parcela cadastrada com sucesso', 200);
    }

    public function index_put($id){
        $this->response($this->parcelas->update($id));
    }

    public function index_delete($id){
        $this->response($this->parcelas->destroy($id));
    }
}