<?php
    class Positions extends CI_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
        public function add(){

            
            $data = array(
                'name' => $this->input->post("name"),
                'lowestpayment' => $this->input->post("lowestpayment"),
                'highestpayment' => $this->input->post("highestpayment"),
                'risk_id' => $this->input->post("risk_id"),
                'company_id' => $this->input->post("company_id"),
                'department_id' => $this->input->post("department_id"),
                'state_id' => 1
            );

            if($data['name'] != ''){

                $result = $this->position_model->insert($data);
                header("Location: ".base_url()."position");
            }
            else{
                echo "Hubo un problema al insertar los datos.";
                header("Location: ".base_url()."position");
            }

        }
    
        public function select_all(){

            $abilities = $this->position_model->get_all();
            
         }
        
         public function select_dd(){

            $positions = $this->position_model->get_dd();
            echo json_encode($positions);
            die();
            
         }

         public function select_dd_d(){
            $data = $this->input->post("id");
            $positions = $this->position_model->get_dd_d($data);
            echo json_encode($positions);
            die();
            
         }
         public function select(){
            $data['id'] = '1';
            $position = $this->position_model->get($data);
           
         }

         public function edit($data){
             
             $position = $this->position_model->edit($data);
             $position = $this->position_model->get($data);
             

         }

         public function change_state(){
            
            $data = $this->input->post("id");
            $changer = $this->position_model->get($data); 
            

            if($changer[0]->state_id == 1){
                $changer[0]->state_id = 2; 
                $position = $this->position_model->change($changer); 
            }
            else{
                $changer[0]->state_id = 1; 
                $position = $this->position_model->change($changer);
            }

                     

        }
    }