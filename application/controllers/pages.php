<?php
    class Pages extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->database();    
        }

        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views\\pages\\'.$page.'.php')){
               show_404();
            }

            $usemodel = $page."_model";
            
            $data['data'] = $this->$usemodel->get_all();
            if($page == "employee"){
                $data['applicants'] = $this->applicant_model->get_all_for_employees();
            }

            $this->load->view('templantes/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templantes/footer');

        }
    }