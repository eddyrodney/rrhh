<?php
    
    class Applicant_model extends CI_Model {
        
        public function insert($data){
            $query = array(
                        'name' => strtoupper($data['name']),
                        'secondname' => $data['secondname'],
                        'lastname' => $data['lastname'],
                        'second_lastname' => $data['second_lastname'],
                        'ssn' => $data['ssn'],
                        'position_id' => $data['position_id'],
                        'company_id' => $data['company_id'],
                        'department_id' => $data['department_id'],
                        'payment' => $data['payment'],
                        'salary' => $data['salary'],
                        'ability_id' => $data['ability_id'],
                        'training_id' => $data['training_id'],
                        'job_title' => $data['job_title'],
                        'company_name' => $data['company_name'],
                        'stardate' => $data['stardate'],
                        'enddate' => $data['enddate'],
                        'salary' => $data['salary'],
                        'employe_id' => $data['employe_id'],
                        'state_id' => 1
            );

            $this->db->insert('applicants', $query);
            return $this->db->insert_id();
        }

        public function get_all(){
            $query = $this->db->get('applicants');
            $result = $query->result();
            return $result;
        }

        public function get($data){
            $this->db->select('id, name, state_id');
            $this->db->from('applicants');
            $this->db->where('id', $data);
            $result = $this->db->get();
            return $result->result();
        }

        public function edit($data){
            $this->db->set($data);
            $this->db->where('id', $data['id']);
            $this->db->update('applicants');
            return $data['id'];
        }

        public function change($data){
            $this->db->set('state_id', $data[0]->state_id);
            $this->db->where('id', $data[0]->id);
            $this->db->update('applicants');
            return $data[0]->id;
        }
    }
