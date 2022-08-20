<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parcelas_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function all(){
        $model = $this->db->get('parcelas');
        return $model->result();
    }

    public function show($id){
        $model = $this->db->where('id', $id)->get('parcelas');
        if(!$model->result()){
            return 'Não encontrado';
        }
        return $model->result()[0];
    }

    public function store(){
        $data = json_decode(trim(file_get_contents('php://input')), true);
        $campos = [
            'flg_pago' => $data['flg_pago']
        ];
        $this->db->insert('parcelas', $campos);
    }

    public function update($id){
        $model = $this->db->where('id', $id);

        if(!$model->get('parcelas')->result()){
            return 'Não encontrado';
        }

        $data = json_decode(trim(file_get_contents('php://input')), true);
        $campos = [
            'flg_pago' => $data['flg_pago']
        ];
        $model->update('parcelas', $campos);
        return "Parcela nº {$model->get('parcelas')->result()[0]->id} alterada com sucesso.";
    }

    public function destroy($id){
        $model = $this->db->where('id', $id);
        
        if(!$model->get('parcelas')->result()){
            return 'Não encontrado';
        }
        $num_parcela = $model->get('parcelas')->result()[0]->id;
        
        $model->delete('parcelas', ['id' => $id]);
        return "Parcela nº {$num_parcela} excluída com sucesso.";
    }
}