<?php

require APPPATH . 'libraries/REST_Controller.php';

class Conciliacao extends REST_Controller {
    public function __construct(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        parent::__construct();
        $this->load->model('Boletos_model', 'boletos');
    }

    // Função para conciliação de parcelas
    public function index_post(){
        try{
            $post = json_decode(trim(file_get_contents('php://input')), true);
            
            foreach($post['json'] as $p){
                // Salvando o conteúdo do json na tabela de registros webservice
                $this->db->insert('registros_webservice', [
                    'nosso_numero' => $p['nosso_numero'],
                    'flg_pago' => $p['flg_pago'],
                    'data_pagto' => $p['data_pagto'],
                    'obs' => $p['obs'],
                    'data_registro' => $p['data_registro'],
                ]);

                // Alterando o flg_pago na tabela de parcelas
                if($p['flg_pago'] == 'sim'){
                    $boleto = $this->db->where('nosso_numero', $p['nosso_numero'])->get('boletos')->result()[0];
                    $parcela = $this->db->where('id', $boleto->parcela_id)->get('parcelas')->result()[0];
                    $this->db->where('id', $parcela->id)->update('parcelas', ['flg_pago' => 'sim']);
                }            
            }
            $this->response(['status' => 'ok', 'response' => 'Operação realizada com sucesso']);
        }catch(\Throwable $th){
            $this->response(['status' => 'erro', 'response' => 'Falha: ' . $th->getMessage()]);
        }
    }
}