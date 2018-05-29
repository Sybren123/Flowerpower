<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cornerstones extends CI_Controller {
public function __construct()
{
	parent::__construct();
    $this->load->helper('url');

}
	
	public function index()
	{
        $this->load->model("Examentest");

        if($this->input->post('register')){

            $receivegebruikersnaam = $this->Examentest->receiveUsername($this->input->post('username'));
            $data                      = [
                "gebruikersnaam"             => $this->input->post('username'),
                "wachtwoord"                => $this->input->post('password'),
                "rol"                  => 1
            ];

            if(!$receivegebruikersnaam) {
                $this->Examentest->insert($data);
            } else {
                echo 'Gebruikersnaam bestaat al';
            }
            }

       if($this->input->post('login')){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if($this->Examentest->can_login($username, $password)) {
            $gebruiker = $this->Examentest->getUserLevel($username, $password);

                foreach($gebruiker->result() as $row) {

                    $session_data = array(
                        "user" => $row->rol
                    );
                }
                $this->session->set_userdata($session_data);
                redirect('http://localhost:81/Examen/cornerstones/login');
            }
            else{
                echo 'Verkeerde login gegevens!';
            }


           }





        $this->load->view('cornerstones');
	}

	public function login(){
    if($this->session->userdata('user') == 1 && $this->session->userdata('user') !== '') {
       $data['level'] = $this->session->userdata('user');
        $this->load->view('login', $data);

    }

    if($this->session->userdata('user') == 2 && $this->session->userdata('user') !== ''){
        $data['level'] = $this->session->userdata('user');
        $this->load->view('login', $data);
    }

         if($this->session->userdata('user') == '') {
        redirect('http://localhost:81/Examen/cornerstones/');
    }
    }

    public function homepage(){
        $data["level"] = $this->session->userdata('user');
        $this->load->view('Homepage', $data);

    }


    public function users(){
        $this->load->model("Examentest");

        $data["level"] = $this->session->userdata('user');
        $data["users"] = $this->Examentest->getUsers();

        $this->load->view('users', $data);

    }

    public function logout(){
    $this->session->unset_userdata('user');
    redirect('');
    }



}
