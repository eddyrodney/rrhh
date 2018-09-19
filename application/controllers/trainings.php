<?php
    class Trainings extends CI_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
        public function add(){

            $data = array(
                'title' => $this->input->post("title"),
                'details' => $this->input->post("details"),
                'startdate' => $this->input->post("startdate"),
                'enddate' => $this->input->post("enddate"),
                'institution' => $this->input->post("institution"),
                'skill_lvl_id' => $this->input->post("skill_lvl_id"),
                'state_id' => 1
            );
            if($data['title'] != ''){

                $result = $this->training_model->insert($data);
                header("Location: ".base_url()."training");
            }
            else{
                echo "Hubo un problema al insertar los datos.";
                header("Location: ".base_url()."training");
            }

        }
    
        public function select_all(){

            $abilities = $this->training_model->get_all();
            
         }

         public function select_dd(){

            $trainings = $this->training_model->get_dd();
            echo json_encode($trainings);
            die();
            
         }
        
         public function select(){
            $data['id'] = '1';
            $training = $this->training_model->get($data);
           
         }

         public function edit($data){
             
             $training = $this->training_model->edit($data);
             $training = $this->training_model->get($data);
             

         }

         public function change_state(){
            
            $data = $this->input->post("id");
            $changer = $this->training_model->get($data); 
            

            if($changer[0]->state_id == 1){
                $changer[0]->state_id = 2; 
                $training = $this->training_model->change($changer); 
            }
            else{
                $changer[0]->state_id = 1; 
                $training = $this->training_model->change($changer);
            }

                     

        }
    }