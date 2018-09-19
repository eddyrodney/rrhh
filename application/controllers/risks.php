<?php
    class Risks extends CI_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
        public function add(){

            $data['name'] = $this->input->post('name');

            if($data['name'] != ''){

                $result = $this->risk_model->insert($data);
                header("Location: ".base_url()."risk");
            }
            else{
                echo "Hubo un problema al insertar los datos.";
                header("Location: ".base_url()."risk");
            }

        }
    
        public function select_all(){

            $risks = $this->risk_model->get_all();
            echo json_encode($risks);
            die();
            
         }
        
         public function select(){
            $data['id'] = '1';
            $risk = $this->risk_model->get($data);
           
         }

         public function edit($data){
             
             $risk = $this->risk_model->edit($data);
             $risk = $this->risk_model->get($data);
             

         }

         public function change_state(){
            
            $data = $this->input->post("id");
            $changer = $this->risk_model->get($data); 
            

            if($changer[0]->state_id == 1){
                $changer[0]->state_id = 2; 
                $risk = $this->risk_model->change($changer); 
            }
            else{
                $changer[0]->state_id = 1; 
                $risk = $this->risk_model->change($changer);
            }

                     

        }
    }