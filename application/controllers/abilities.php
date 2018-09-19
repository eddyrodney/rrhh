<?php
    class Abilities extends CI_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('ability_model');

    }
        public function add(){

            $data['name'] = $this->input->post('name');

            if($data['name'] != ''){

                $result = $this->ability_model->insert($data);
                header("Location: ".base_url()."ability");
            }
            else{
                echo "Hubo un problema al insertar los datos.";
                header("Location: ".base_url()."ability");
            }

        }
    
        public function select_all(){

            $abilities = $this->ability_model->get_all();
            
         }

        public function select_dd(){

            $abilities= $this->ability_model->get_dd();
            echo json_encode($abilities);
            die();
            
         }
        
         public function select(){
            $data['id'] = '1';
            $ability = $this->ability_model->get($data);
           
         }

         public function edit($data){
             
             $ability = $this->ability_model->edit($data);
             $ability = $this->ability_model->get($data);
             

         }

         public function change_state(){
            
            $data = $this->input->post("id");
            $changer = $this->ability_model->get($data); 
            

            if($changer[0]->state_id == 1){
                $changer[0]->state_id = 2; 
                $ability = $this->ability_model->change($changer); 
            }
            else{
                $changer[0]->state_id = 1; 
                $ability = $this->ability_model->change($changer);
            }
            

                     

        }
    }