<?php
    
    class Training_model extends CI_Model {
        
        public function insert($data){
            $query = array(
                        'title' => strtoupper($data['title']),
                        'details' => strtoupper($data['details']),
                        'startdate' => $data['startdate'],
                        'enddate' => $data['enddate'],
                        'institution' => strtoupper($data['institution']),
                        'skill_lvl_id' => $data['skill_lvl_id'],
                        'state_id' => 1
            );

            $this->db->insert('training', $query);
            return $this->db->insert_id();
        }

        public function get_all(){
            $query = $this->db->get('training');
            $result = $query->result();
            return $result;
        }

        public function get_dd(){
            $this->db->select('id, name, state_id');
            $this->db->from('training');
            $this->db->where('state_id', 1);
            $result = $this->db->get();
            return $result->result();
        }

        public function get($data){
            $this->db->select('id, name, state_id');
            $this->db->from('training');
            $this->db->where('id', $data);
            $result = $this->db->get();
            return $result->result();
        }

        public function edit($data){
            $this->db->set($data);
            $this->db->where('id', $data['id']);
            $this->db->update('training');
            return $data['id'];
        }

        public function change($data){
            $this->db->set('state_id', $data[0]->state_id);
            $this->db->where('id', $data[0]->id);
            $this->db->update('training');
            return $data[0]->id;
        }
    }
