<?php
    class Companies extends CI_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
        public function add(){

            $data['name'] = $this->input->post('name');

            if($data['name'] != ''){

                $result = $this->company_model->insert($data);
                header("Location: ".base_url()."company");
            }
            else{
                echo "Hubo un problema al insertar los datos.";
                header("Location: ".base_url()."company");
            }

        }
    
        public function select_all(){

            $abilities = $this->company_model->get_all();
            echo json_encode($abilities);
            die();
            
         }
        
         public function select(){
            $data['id'] = '1';
            $company = $this->company_model->get($data);
           
         }

         public function edit($data){
             
             $company = $this->company_model->edit($data);
             $company = $this->company_model->get($data);
             

         }

         public function change_state(){
            
            $data = $this->input->post("id");
            $changer = $this->company_model->get($data); 
            

            if($changer[0]->state_id == 1){
                $changer[0]->state_id = 2; 
                $company = $this->company_model->change($changer); 
            }
            else{
                $changer[0]->state_id = 1; 
                $company = $this->company_model->change($changer);
            }

                     

        }
    }