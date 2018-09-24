<?php
    
    class dashboard_model extends CI_Model {
        

        public function get_all(){
            $query = $this->db->query("SELECT CONCAT(a.name, ' ', a.secondname, ' ', a.lastname, ' ', a.secondlastname) as fullname,
                                              a.id, a.date, b.name
                                       FROM employees a
                                        INNER JOIN companies b ON a.company_id = b.id
                                        ORDER BY a.date DESC");
            return $query->result();

        }
        public function get_all_languages_counted(){
            $query = $this->db->query("SELECT COUNT(*) as conteo FROM languages");
            $query = $this->db->query("SELECT COUNT(*) as conteo FROM languages");
            return $query->result();
        }

        public function get_all_trainings_counted(){
            $query = $this->db->query("SELECT COUNT(*) as conteo FROM training");
            return $query->result();
        }

        public function get_all_companies_counted(){
            $query = $this->db->query("SELECT COUNT(*) as conteo FROM companies");
            return $query->result();
        }

        public function get_applicants_counted(){
            $query = $this->db->query("SELECT COUNT(*) as conteo FROM applicants");
            return $query->result();
        }

        public function get_employees_counted(){
            $query = $this->db->query("SELECT COUNT(*) as conteo FROM employees");
            return $query->result();
        }

        public function get_by($data, $criterio){
            switch($criterio){
                CASE 1:
                        $query = $this->db->query("SELECT
                        d.id,
                        concat( d.`name`, ' ', d.second_name, ' ', d.lastname, ' ', d.second_lastname ) AS fullname,
                        a.`name` AS company_name,
                        d.date,
                        f.job_title,
                        f.company_name AS job_company,
                        d.state_id AS state_id 
                    FROM
                        applicants AS d
                        INNER JOIN companies a ON d.`company_id` = a.`id`
                        INNER JOIN departments b ON d.`department_id` = b.`id`
                        LEFT JOIN training c ON d.`training_id` = c.`id`
                        LEFT JOIN abilities e ON d.`ability_id` = e.`id`
                        LEFT JOIN job_experience f ON d.`experience_id` = f.`id`
                        INNER JOIN positions g ON d.`position_id` = g.`id` 
                    WHERE
                        d.state_id = 1 AND d.`name` like '%".$data."%' ORDER BY d.id ASC");
                        return $query->result();
                break;
                CASE 2:
                        $query = $this->db->query("SELECT
                        d.id,
                        concat( d.`name`, ' ', d.second_name, ' ', d.lastname, ' ', d.second_lastname ) AS fullname,
                        a.`name` AS company_name,
                        d.date,
                        f.job_title,
                        f.company_name AS job_company,
                        d.state_id AS state_id 
                    FROM
                        applicants AS d
                        INNER JOIN companies a ON d.`company_id` = a.`id`
                        INNER JOIN departments b ON d.`department_id` = b.`id`
                        LEFT JOIN training c ON d.`training_id` = c.`id`
                        LEFT JOIN abilities e ON d.`ability_id` = e.`id`
                        LEFT JOIN job_experience f ON d.`experience_id` = f.`id`
                        INNER JOIN positions g ON d.`position_id` = g.`id` 
                    WHERE
                        d.state_id = 1 AND f.`job_title` like '%".$data."%' ORDER BY d.id ASC");
                        return $query->result();
                        break;
                CASE 3:
                        $query = $this->db->query("SELECT
                        d.id,
                        concat( d.`name`, ' ', d.second_name, ' ', d.lastname, ' ', d.second_lastname ) AS fullname,
                        a.`name` AS company_name,
                        d.date,
                        f.job_title,
                        f.company_name AS job_company,
                        d.state_id AS state_id 
                    FROM
                        applicants AS d
                        INNER JOIN companies a ON d.`company_id` = a.`id`
                        INNER JOIN departments b ON d.`department_id` = b.`id`
                        LEFT JOIN training c ON d.`training_id` = c.`id`
                        LEFT JOIN abilities e ON d.`ability_id` = e.`id`
                        LEFT JOIN job_experience f ON d.`experience_id` = f.`id`
                        INNER JOIN positions g ON d.`position_id` = g.`id` 
                    WHERE
                        d.state_id = 1 AND a.`name` like '%".$data."%' ORDER BY d.id ASC");
                        return $query->result();
                        break;
                CASE 4:

                        $query = $this->db->query("SELECT
                        d.id,
                        concat( d.`name`, ' ', d.second_name, ' ', d.lastname, ' ', d.second_lastname ) AS fullname,
                        a.`name` AS company_name,
                        d.date,
                        f.job_title,
                        f.company_name AS job_company,
                        d.state_id AS state_id 
                    FROM
                        applicants AS d
                        INNER JOIN companies a ON d.`company_id` = a.`id`
                        INNER JOIN departments b ON d.`department_id` = b.`id`
                        LEFT JOIN training c ON d.`training_id` = c.`id`
                        LEFT JOIN abilities e ON d.`ability_id` = e.`id`
                        LEFT JOIN job_experience f ON d.`experience_id` = f.`id`
                        INNER JOIN positions g ON d.`position_id` = g.`id` 
                    WHERE
                        d.state_id = 1 AND d.`date` like '%".$data."%' ORDER BY d.id ASC");
                        return $query->result();
                        break;
            }
            
        }
        

        
    }
