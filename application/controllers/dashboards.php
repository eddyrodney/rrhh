<?php
    class Dashboards extends CI_Controller{

        public function __construct()
        {
        parent::__construct();
        $this->load->database();

        }
    
        public function select_counted_languages(){

            $stadistics = $this->dashboard_model->get_all_languages_counted();
            echo json_encode($stadistics);
            die();
            
         }

         public function select_counted_trainings(){

            $stadistics = $this->dashboard_model->get_all_trainings_counted();
            echo json_encode($stadistics);
            die();
            
         }

         public function select_counted_companies(){

            $stadistics = $this->dashboard_model->get_all_companies_counted();
            echo json_encode($stadistics);
            die();
            
         }

         public function select_counted_applicants(){

            $stadistics = $this->dashboard_model->get_applicants_counted();
            echo json_encode($stadistics);
            die();
            
         }

         public function select_counted_employees(){
            $stadistics = $this->dashboard_model->get_employees_counted();
            echo json_encode($stadistics);
            die();
         }

         public function select_by(){
            $data = $this->input->post("data");
            $criterio = $this->input->post("criterio");
            $result = $this->dashboard_model->get_by($data, $criterio);
            echo json_encode($result);
            die();
         }

    }