<?php
    
    class Department_model extends CI_Model {
        
        public function insert($data){
            $query = array(
                        'name' => strtoupper($data['name']),
                        'company_id' => $data['company_id'],
                        'state_id' => 1
            );

            $this->db->insert('departments', $query);
            return $this->db->insert_id();
        }

        public function get_all(){
            $query = $this->db->query('SELECT departments.id, departments.name, companies.name as company, departments.state_id FROM departments INNER JOIN companies ON departments.company_id = companies.id');
            $result = $query->result();
            return $result;
        }

        public function get($data){
            $this->db->select('id, name, state_id');
            $this->db->from('departments');
            $this->db->where('id', $data);
            $this->db->where('state_id', 1);
            $result = $this->db->get();
            return $result->result();
        }

        public function get_dd($data){
            $this->db->select('id, name, state_id');
            $this->db->from('departments');
            $this->db->where('company_id', $data);
            $this->db->where('state_id', 1);
            $result = $this->db->get();
            return $result->result();
        }

        public function edit($data){
            $this->db->set($data);
            $this->db->where('id', $data['id']);
            $this->db->update('departments');
            return $data['id'];
        }

        public function change($data){
            $this->db->set('state_id', $data[0]->state_id);
            $this->db->where('id', $data[0]->id);
            $this->db->update('departments');
            return $data[0]->id;
        }
    }
