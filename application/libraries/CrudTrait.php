<?php

defined('BASEPATH') OR exit('No direct script access allowed');

trait CrudTrait {
    
    public function traitAll($tabela){
        return $this->db->get($tabela)->result();
    }

    public function traitShow($id, $tabela){
        $model = $this->db->where('id', $id)->get($tabela);
        if(!$model->result()){
            return 'Não encontrado';
        }
        return $model->result()[0];        
    }

    public function traitStore($campos, $tabela){
        return $this->db->insert($tabela, $campos) ? true : false;        
    }

    public function traitUpdate($id, $tabela, $campos){        
        $model = $this->db->where('id', $id);
        if(!$model->get($tabela)->result()){
            echo 'Não encontrado';
            exit;
        }
        return $model->update($tabela, $campos) ? true : false;
    }

    public function traitDestroy($id, $tabela){        
        $model = $this->db->where('id', $id);
        if(!$model->get($tabela)->result()){
            echo 'Não encontrado';
            exit;
        }
        return $model->delete($tabela, ['id' => $id]) ? true : false;
    }
}