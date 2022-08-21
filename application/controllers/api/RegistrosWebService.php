<?php

require APPPATH . 'libraries/REST_Controller.php';     

class RegistrosWebService extends REST_Controller {
    public function __construct(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('RegistrosWebService_model', 'registros_webservice');
    }

    public function index_get($id = ''){
        if(!$id){
            $model['registros_webservice'] = $this->registros_webservice->all();
        }else{
            $model['registro_webservice'] = $this->registros_webservice->show($id);
        }
        $this->response($model, 200);
    }

    public function index_post(){
        if(!$this->registros_webservice->store()){
            $this->response('Erro ao registrar');
        }else{
            $this->response('Registrado com sucesso', 200);
        }
    }

    public function index_put($id){
        $this->response($this->registros_webservice->update($id));
    }

    public function index_delete($id){
        $this->response($this->registros_webservice->destroy($id));
    }
}