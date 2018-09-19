<?php
    class Languages extends CI_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
        public function add(){

            $data['name'] = $this->input->post('name');

            if($data['name'] != ''){

                $result = $this->language_model->insert($data);
                header("Location: ".base_url()."language");
            }
            else{
                echo "Hubo un problema al insertar los datos.";
                header("Location: ".base_url()."language");
            }

        }
    
        public function select_all(){

            $abilities = $this->language_model->get_all();
            
         }
        
         public function select(){
            $data['id'] = '1';
            $language = $this->language_model->get($data);
           
         }

         public function edit($data){
             
             $language = $this->language_model->edit($data);
             $language = $this->language_model->get($data);
             

         }

         public function change_state(){
            
            $data = $this->input->post("id");
            $changer = $this->language_model->get($data); 
            

            if($changer[0]->state_id == 1){
                $changer[0]->state_id = 2; 
                $language = $this->language_model->change($changer); 
            }
            else{
                $changer[0]->state_id = 1; 
                $language = $this->language_model->change($changer);
            }

                     

        }
    }