<?php
    
    class Applicant_model extends CI_Model {
        
        public function insert($data){
            $query = array(
                        'name' => strtoupper($data['name']),
                        'second_name' => $data['second_name'],
                        'lastname' => $data['lastname'],
                        'second_lastname' => $data['second_lastname'],
                        'ssn' => $data['ssn'],
                        'position_id' => $data['position_id'],
                        'company_id' => $data['company_id'],
                        'department_id' => $data['department_id'],
                        'salary' => $data['salary'],
                        'ability_id' => $data['ability_id'],
                        'training_id' => $data['training_id'],
                        'referer' => $data['referer'],
                        'date' => date("d-m-Y H:i:s"),
                        'state_id' => 1
            );

            $this->db->insert('applicants', $query);
            return $this->db->insert_id();
        }

        public function insert_experience($data, $applicant_id){
            $query = array(
                        'job_title' => $data['job_title'],
                        'company_name' => $data['company_name'],
                        'startdate' => $data['startdate'],
                        'enddate' => $data['enddate'],
                        'salary' => $data['salary_experience'],
                        'applicant_id' => $applicant_id
            );

            $this->db->insert('job_experience', $query);
            return $this->db->insert_id();
        }

        public function update($applicant_id, $experience){
            $data = array('experience_id' => $experience);
            $this->db->where('id', $applicant_id);
            $this->db->update('applicants', $data);
        }

        public function get_all(){
            $query = $this->db->query("SELECT d.id, concat(d.`name`,' ', d.second_name, ' ', d.lastname, ' ', d.second_lastname) as fullname,
                                              d.salary as wishpayment, d.referer as referer, a.`name` as company_name, d.date,
                                              b.`name` as department_name, c.`name` as training_name, c.institution as training_institution,
                                              c.startdate as training_startdate, c.enddate as training_enddate, 
                                              e.`name` as ability_name, f.job_title, f.startdate as job_startdate, f.enddate as job_enddate, 
                                              f.company_name as job_company, g.`name` as position_name, d.state_id as state_id
                                       FROM applicants as d
                                            INNER JOIN companies a ON d.`company_id` = a.`id` 
                                            INNER JOIN departments b ON d.`department_id` = b.`id`
                                            LEFT JOIN training c ON d.`training_id` = c.`id`
                                        LEFT JOIN abilities e ON d.`ability_id` = e.`id`
                                        LEFT JOIN job_experience f ON d.`experience_id` = f.`id`
                                        INNER JOIN positions g ON d.`position_id` = g.`id` ORDER BY d.id ASC");
            $result = $query->result();
            return $result;
        }

        public function get_all_for_employees(){
            $query = $this->db->query("SELECT d.id, concat(d.`name`,' ', d.second_name, ' ', d.lastname, ' ', d.second_lastname) as fullname,
                                              d.salary as wishpayment, d.referer as referer, a.`name` as company_name, d.date,
                                              b.`name` as department_name, c.`name` as training_name, c.institution as training_institution,
                                              c.startdate as training_startdate, c.enddate as training_enddate, 
                                              e.`name` as ability_name, f.job_title, f.startdate as job_startdate, f.enddate as job_enddate, 
                                              f.company_name as job_company, g.`name` as position_name, d.state_id as state_id
                                       FROM applicants as d
                                            INNER JOIN companies a ON d.`company_id` = a.`id` 
                                            INNER JOIN departments b ON d.`department_id` = b.`id`
                                            LEFT JOIN training c ON d.`training_id` = c.`id`
                                        LEFT JOIN abilities e ON d.`ability_id` = e.`id`
                                        LEFT JOIN job_experience f ON d.`experience_id` = f.`id`
                                        INNER JOIN positions g ON d.`position_id` = g.`id`
                                        WHERE d.state_id = 1 ORDER BY d.id ASC");
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

        public function get_full($data){
            $this->db->select('*');
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
