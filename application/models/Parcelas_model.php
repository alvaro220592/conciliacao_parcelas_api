<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . '/libraries/CrudTrait.php';

class Parcelas_model extends CI_Model {

    use CrudTrait;
    
    private $tabela = 'parcelas';
    private $camposCrud;
    private $data;
    
    public function __construct(){
        $this->load->database();
        $this->data = json_decode(trim(file_get_contents('php://input')), true);
        $this->camposCrud = $this->data ? ['flg_pago' => $this->data['flg_pago']] : '';
    }

    public function all(){
        return $this->traitAll($this->tabela);
    }

    public function show($id){
        return $this->traitShow($id, $this->tabela);
    }

    public function store(){
        return $this->traitStore($this->camposCrud, $this->tabela) ?
        json_encode('Cadastrado com sucesso', 200) : json_encode('Erro ao cadastrar', 500);
    }

    public function update($id){
        echo $this->traitUpdate($id, $this->tabela, $this->camposCrud) ?
        json_encode('Alterado com sucesso', 200) : json_encode('Erro ao alterar', 500);
    }

    public function destroy($id){
        echo $this->traitDestroy($id, $this->tabela) ?
        json_encode('Excluído com sucesso', 200) : json_encode('Erro ao excluir', 500);
    }
}