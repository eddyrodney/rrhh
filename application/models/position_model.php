<?php
    
    class Position_model extends CI_Model {
        
        public function insert($data){
            $query = array(
                        'name' => strtoupper($data['name']),
                        'lowestpayment' => $data['lowestpayment'],
                        'highestpayment' => $data['highestpayment'],
                        'risk_id' => $data['risk_id'],
                        'company_id' => $data['company_id'],
                        'department_id' => $data['department_id'],
                        'state_id' => 1
            );

            $this->db->insert('positions', $query);
            return $this->db->insert_id();
        }

        public function get_dd(){
            $query = $this->db->query('SELECT d.id, d.`name`, d.`lowestpayment`, d.`highestpayment`, d.`state_id`, d.company_id, d.department_id,
                                              a.`name` as company, b.`name` as department, c.`name` as risk
                                       FROM positions as d
                                            INNER JOIN companies a ON d.`company_id` = a.`id` 
                                            INNER JOIN departments b ON d.`department_id` = b.`id`
                                            INNER JOIN risks c ON d.`risk_id` = c.`id`');
            $result = $query->result();
            return $result;
        }

        public function get_dd_d($data){
            $query = $this->db->query('SELECT d.id, d.`name`, d.`lowestpayment`, d.`highestpayment`, d.`state_id`, d.company_id, d.department_id,
                                              a.`name` as company, b.`name` as department, c.`name` as risk
                                       FROM positions as d
                                            INNER JOIN companies a ON d.`company_id` = a.`id` 
                                            INNER JOIN departments b ON d.`department_id` = b.`id`
                                            INNER JOIN risks c ON d.`risk_id` = c.`id`
                                            WHERE d.id = '.$data.'');
            $result = $query->result();
            return $result;
        }

        public function get_all(){
            $query = $this->db->query('SELECT d.id, d.`name`, d.`lowestpayment`, d.`highestpayment`, d.`state_id`,
                                         a.`name` as company, b.`name` as department, c.`name` as risk
                                        FROM positions as d
                                         INNER JOIN companies a ON d.`company_id` = a.`id` 
                                         INNER JOIN departments b ON d.`department_id` = b.`id`
                                         INNER JOIN risks c ON d.`risk_id` = c.`id`');
            $result = $query->result();
            return $result;
        }



        public function get($data){
            $this->db->select('id, name, state_id');
            $this->db->from('positions');
            $this->db->where('id', $data);
            $result = $this->db->get();
            return $result->result();
        }

        public function edit($data){
            $this->db->set($data);
            $this->db->where('id', $data['id']);
            $this->db->update('positions');
            return $data['id'];
        }

        public function change($data){
            $this->db->set('state_id', $data[0]->state_id);
            $this->db->where('id', $data[0]->id);
            $this->db->update('positions');
            return $data[0]->id;
        }
    }
