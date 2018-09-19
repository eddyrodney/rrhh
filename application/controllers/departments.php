<?php
    class Departments extends CI_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
        public function add(){

            $data['name'] = $this->input->post('name');
            $data['company_id'] = $this->input->post('company_id');

            if($data['name'] != ''){

                $result = $this->department_model->insert($data);
                header("Location: ".base_url()."department");
            }
            else{
                echo "Hubo un problema al insertar los datos.";
                header("Location: ".base_url()."department");
            }

        }
    
        public function select_all(){

            $departments = $this->department_model->get_all();
            echo json_encode($departments);
            die();
            
         }
        
         public function select(){
            $data = $this->input->post('id');
            $departments = $this->department_model->get_dd($data);
            echo json_encode($departments);
            die();
         }

         public function edit($data){
             
             $department = $this->department_model->edit($data);
             $department = $this->department_model->get($data);
             

         }

         public function change_state(){
            
            $data = $this->input->post("id");
            $changer = $this->department_model->get($data); 
            

            if($changer[0]->state_id == 1){
                $changer[0]->state_id = 2; 
                $department = $this->department_model->change($changer); 
            }
            else{
                $changer[0]->state_id = 1; 
                $department = $this->department_model->change($changer);
            }

                     

        }
    }