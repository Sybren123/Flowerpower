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
        $password = $this->input->post('password');
        $hashed_string  = password_hash($password, PASSWORD_BCRYPT, array(
            'cost' => 11
        ));
        $hashed_name = $hashed_string;



        if($this->input->post('register')){
            $receivegebruikersnaam = $this->Examentest->receiveUsername($this->input->post('username'));
            $data                      = [
                "gebruikersnaam"             => $this->input->post('username'),
                "wachtwoord"                => $hashed_name,
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




               if ($this->Examentest->can_login($username)) {
                   $getpassword = $this->Examentest->getPassword($username);

                   foreach($getpassword->result() as $row){
                       $hash_pass = $row->Wachtwoord;
                   }

                   $result = password_verify($password, $hash_pass);

                   if($result == TRUE) {

                       $gebruiker = $this->Examentest->getUserLevel($username, $password);

                       foreach ($gebruiker->result() as $row) {

                           $session_data = array(
                               "user" => $row->rol
                           );
                       }
                       $this->session->set_userdata($session_data);
                        redirect('http://localhost/codeigniter/index.php/cornerstones/login');
                   } else {
                       echo 'wachtwoord niet goed';
                   }
               }  else{
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
        redirect('http://localhost/codeigniter/index.php/cornerstones/');
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
    redirect('cornerstones');
    }



}
