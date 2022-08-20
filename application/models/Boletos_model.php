<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Boletos_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function all(){
        return $this->db->get('boletos')->result();
    }

    public function show($id){
        $model = $this->db->where('id', $id)->get('boletos');
        if(!$model->result()){
            return 'Não encontrado';
        }
        return $model->result()[0];        
    }

    public function store(){
        $data = json_decode(trim(file_get_contents('php://input')), true);
        $campos = [
            'nosso_numero' => $data['nosso_numero'],
            'parcela_id' => $data['parcela_id'],
        ];
        return $this->db->insert('boletos', $campos) ? true : false;        
    }

    public function update($id){
        $model = $this->db->where('id', $id);

        if(!$model->get('boletos')->result()){
            return 'Não encontrado';
        }

        $dados = json_decode(trim(file_get_contents('php://input')), true);

        $campos = [
            'nosso_numero' => $dados['nosso_numero'],
            'parcela_id' => $dados['parcela_id']
        ];
        return $this->db->update('boletos', $campos) ? true : false;
    }

    public function destroy($id){
        $model = $this->db->where('id', $id);

        if(!$model->get('boletos')->result()){
            return 'Não encontrado';
        }
        return $model->delete('boletos', ['id' => $id]) ? true : false;
    }
}