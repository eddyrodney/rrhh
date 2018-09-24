<?php
    
    class employee_model extends CI_Model {
        
        public function insert($data){
            $this->db->insert('employees', $data);
            return $this->db->insert_id();
        }

        public function insert_experience($data, $employee_id){
            $query = array(
                        'job_title' => $data['job_title'],
                        'company_name' => $data['company_name'],
                        'startdate' => $data['startdate'],
                        'enddate' => $data['enddate'],
                        'salary' => $data['salary_experience'],
                        'employee_id' => $employee_id
            );

            $this->db->insert('job_experience', $query);
            return $this->db->insert_id();
        }

        public function update($employee_id, $experience){
            $data = array('experience_id' => $experience);
            $this->db->where('id', $employee_id);
            $this->db->update('employees', $data);
        }

        public function get_all(){
            $query = $this->db->query("SELECT
                                            d.id AS id,
                                            d.ssn AS ssn,
                                            CONCAT(d.NAME,' ',d.secondname,' ',d.lastname,' ',d.secondlastname) as fullname,
                                            d.position_id AS position_id,
                                            d.company_id AS company_id,
                                            d.startdate,
                                            d.department_id AS department_id,
                                            d.monthlysalary AS payment,
                                            d.state_id,
                                            b.`NAME` AS company_name,
                                            c.`name` as position_name,
                                            e.`name` as department_name
                                            FROM
                                                employees d
                                                INNER JOIN companies b ON d.company_id = b.id
                                                INNER JOIN positions c ON d.position_id = c.id
                                                INNER JOIN departments e ON d.department_id = e.id ORDER BY d.id ASC");
            $result = $query->result();
            return $result;
        }

        public function edit($data){
            $this->db->set($data);
            $this->db->where('id', $data['id']);
            $this->db->update('employees');
            return $data['id'];
        }

        public function get($data){
            $this->db->select('id, name, state_id');
            $this->db->from('employees');
            $this->db->where('id', $data);
            $result = $this->db->get();
            return $result->result();
        }

        public function change($data){
            $this->db->set('state_id', $data[0]->state_id);
            $this->db->where('id', $data[0]->id);
            $this->db->update('employees');
            return $data[0]->id;
        }
    }
