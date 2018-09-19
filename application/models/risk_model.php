<?php
    
    class Risk_model extends CI_Model {
        
        public function insert($data){
            $query = array(
                        'name' => strtoupper($data['name']),
                        'state_id' => 1
            );

            $this->db->insert('risks', $query);
            return $this->db->insert_id();
        }

        public function get_all(){
            $query = $this->db->get('risks');
            $result = $query->result();
            return $result;
        }

        public function get($data){
            $this->db->select('id, name, state_id');
            $this->db->from('risks');
            $this->db->where('id', $data);
            $result = $this->db->get();
            return $result->result();
        }

        public function edit($data){
            $this->db->set($data);
            $this->db->where('id', $data['id']);
            $this->db->update('risks');
            return $data['id'];
        }

        public function change($data){
            $this->db->set('state_id', $data[0]->state_id);
            $this->db->where('id', $data[0]->id);
            $this->db->update('risks');
            return $data[0]->id;
        }
    }
