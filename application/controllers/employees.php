<?php
    class Employees extends CI_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
        public function add(){

            
            $data = array(
                'name' => $this->input->post("name"),
                'second_name' => $this->input->post("second_name"),
                'lastname' => $this->input->post("lastname"),
                'second_lastname' => $this->input->post("second_lastname"),
                'ssn' => $this->input->post("ssn"),
                'position_id' => $this->input->post("position_id"),
                'company_id' => $this->input->post("company_id"),
                'department_id' => $this->input->post("department_id"),
                'payment' => $this->input->post("payment"),
                'salary' => $this->input->post("salary"),
                'ability_id' => $this->input->post("ability_id"),
                'training_id' => $this->input->post("training_id"),
                'job_title' => $this->input->post("job_title"),
                'startdate' => $this->input->post("startdate"),
                'enddate' => $this->input->post("enddate"),
                'salary_experience' => $this->input->post("salary_experience"),
                'company_name' => $this->input->post("company_name"),
                'referer' => $this->input->post("referer"),
                'employe_id' => $this->input->post("employe_id"),
                'state_id' => 1
            );

            if($data['name'] != ''){

                $employee_id = $this->employee_model->insert($data);
                if($employee_id){
                    $experience = $this->employee_model->insert_experience($data, $employee_id);
                }
                
                if($experience){
                  $query =  $this->employee_model->update($employee_id, $experience);
                }
                header("Location: ".base_url()."employee");
            }
            else{
                echo "Hubo un problema al insertar los datos.";
                header("Location: ".base_url()."employee");
            }

        }
    
        public function select_all(){

            $abilities = $this->employee_model->get_all();
            
         }
        
         public function select(){
            $data['id'] = '1';
            $employee = $this->employee_model->get($data);
           
         }

         public function edit($data){
             
             $employee = $this->employee_model->edit($data);
             $employee = $this->employee_model->get($data);
             

         }

         public function change_state(){
            
            $data = $this->input->post("id");
            $changer = $this->employee_model->get($data); 
            

            if($changer[0]->state_id == 1){
                $changer[0]->state_id = 2; 
                $employee = $this->employee_model->change($changer); 
            }
            else{
                $changer[0]->state_id = 1; 
                $employee = $this->employee_model->change($changer);
            }

                     

        }

        public function converter(){

            $data = $this->input->post("id");
            $changer = $this->applicant_model->get_full($data); 
            $employee = array(
                            'ssn' => $changer[0]->ssn,
                            'name' => $changer[0]->name,
                            'secondname' => $changer[0]->second_name,
                            'lastname' => $changer[0]->lastname,
                            'secondlastname' => $changer[0]->second_lastname,
                            'department_id' => $changer[0]->department_id,
                            'startdate' => date('Y-m-d H:i:s'),
                            'position_id' => $changer[0]->position_id,
                            'monthlysalary' => $changer[0]->salary,
                            'date' => date('Y-m-d H:i:s'),
                            'company_id' => $changer[0]->company_id,
                            'state_id' => 1,
            );

            $insert_done = $this->employee_model->insert($employee);

            if($insert_done){

                if($changer[0]->state_id == 1){
                    $changer[0]->state_id = 2; 
                    $applicant = $this->applicant_model->change($changer); 
                }
                else{
                    $changer[0]->state_id = 1; 
                    $applicant = $this->applicant_model->change($changer);
                }

            }

        }
    }