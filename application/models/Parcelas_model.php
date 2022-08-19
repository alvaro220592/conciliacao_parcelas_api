<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parcelas_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function all(){
        $data = $this->db->get('parcelas');
        return $data->result();
    }

    public function show($id){
        $data = $this->db->where('id', $id)->get('parcelas');
        if(count($data->result()) == 0){
            return 'Não encontrado';
        }
        return $data->result()[0];
    }

    public function store(){
        $data = json_decode(trim(file_get_contents('php://input')), true);
        $campos = [
            'flg_pago' => $data['flg_pago']
        ];
        $this->db->insert('parcelas', $campos);
    }

    public function update($id){        
        $data = json_decode(trim(file_get_contents('php://input')), true);
        $campos = [
            'flg_pago' => $data['flg_pago']
        ];
        $this->db->where('id', $id)->update('parcelas', $campos);
    }

    public function destroy($id){
        $parcela = $this->db->where('id', $id)->get('parcelas');
        if(count($parcela->result()) == 0){
            return false;
        }else{            
            $this->db->delete('parcelas', ['id' => $id]);
            return true;
        }
    }
}