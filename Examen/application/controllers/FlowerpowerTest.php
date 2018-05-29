<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FlowerpowerTest extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {

        if($this->session->userdata('user')) {
            $data['level'] = $this->session->userdata('user');
            $data['name'] = $this->session->userdata('naam');
            $this->load->view('homepagina', $data);

        } else {
            $this->load->view('homepagina');
        }
    }

    public function contact()
    {
        if($this->session->userdata('user')) {
            $data['level'] = $this->session->userdata('user');
            $data['name'] = $this->session->userdata('naam');

            $this->load->view('contact', $data);

        } else {
            $this->load->view('contact');
        }
    }

    public function register()
    {

        $this->load->model('Examen');
        if ($this->input->post('register')) {
            $data = [
                "Voornaam" => $this->input->post('voornaam'),
                "Wachtwoord" => $this->input->post('wachtwoord'),
                "Rol" => 2,
            ];

            $this->Examen->insertGebruiker($data);
        }
        $this->load->view('registreren');

    }

    public function inloggen()
    {
        $this->load->model('Examen');
        if($this->input->post('inloggen')) {
            $gebruikersnaam = $this->input->post('gebruikersnaam');
            $wachtwoord = $this->input->post('wachtwoord');

            if ($this->Examen->can_login($gebruikersnaam, $wachtwoord)) {
                $gebruiker = $this->Examen->getRol($gebruikersnaam, $wachtwoord);

                foreach($gebruiker->result() as $row) {

                    $session_data = array(
                        "id"   => $row->ID,
                        "user" => $row->Rol,
                        "naam" => $row->Voornaam,
                        "tussenvoegsel" => $row->Tussenvoegsels,
                        "achternaam" => $row->Achternaam,
                        "plaats" => $row->Woonplaats

                    );
                }
                $this->session->set_userdata($session_data);
                redirect(Base_url());


            } else {
                echo 'Verkeerde login gegevens!';
            }
        }

        $this->load->view('inloggen');


    }


    public function logout(){
        $this->session->unset_userdata('user');
        redirect(base_url());
    }

    public function klantgegevens(){
        $this->load->model('Examen');
        $voornaam = $this->session->userdata('naam');
        $id = $this->session->userdata('id');
        if($this->input->post('update')){
            $data = [
                "Voorletters" => $this->input->post('voorletter'),
                "Tussenvoegsels" => $this->input->post('tussenvoegsel'),
                "Achternaam" => $this->input->post('achternaam'),
                "Voornaam" => $this->input->post('voornaam'),
                "Adres" => $this->input->post('adres'),
                "Postcode" => $this->input->post('postcode'),
                "Woonplaats" => $this->input->post('woonplaats'),
                "Geboortedatum" => $this->input->post('geboortedatum'),
                "Emailadres" => $this->input->post('emailadres')
            ];
            $this->Examen->updateData($data, $id);
        }
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $data['data'] = $this->Examen->getUserData($voornaam);
        $this->load->view('klantgegevens' ,$data);
    }

    public function bestellen()
    {
        $this->load->model('Examen');

        $id = $this->session->userdata('id');

        if ($this->input->post('toevoegen')) {
            $factuur = $this->Examen->getAllInvoice();

            foreach ($factuur->result() as $rows) {
                $factuurID = $rows->ID + 1;
            }
            echo $factuurID;
            $artikelen = $this->Examen->getArticles();

            for ($i = 0; $i < 10000; $i++) {

                if (!$this->input->post('artikel' . $i)) {
                } else {
                    $i = 10000;

                    $Date = date("Y-m-d");
                    $data = [
                        "Gebruiker_ID" => $id,
                        "Winkel_ID" => 1,
                        "Factuurdatum" => $Date,
                        'Afgehaald' => 0,
                        'Datum' => date("Y-m-d", strtotime($Date. ' + 2 days')),
                        'Tijd' => strftime(' %H:%M:%S',time())
                    ];
                    $invoiceID = $this->Examen->insertInvoice($data);

                    $data2 = [
                        "Factuurnummer" => Date("Ymd").$invoiceID
                    ];

                    $this->Examen->updateInvoice($invoiceID, $data2);



                    foreach ($artikelen->result() as $row) {

                        if ($this->input->post('artikel' . $row->ID)) {

                            if ($this->input->post('artikel' . $row->ID) == '') {
                                continue;
                            } else {

                                $data1 = [
                                    "Artikel_ID" => $row->ID,
                                    "Aantal" => ($this->input->post('artikel' . $row->ID)),
                                    "Verkoopprijs" => $row->Prijs,
                                    "Factuur_ID" => $factuurID
                                ];
                             $this->Examen->insertInvoiceRow($data1);

                            }
                        }
                    }


                }
            }
        }
            $data['articles'] = $this->Examen->getArticles();
           $data['level'] = $this->session->userdata('user');
         $data['name'] = $this->session->userdata('naam');
                $this->load->view('bestellen', $data);



    }


    public function bestellingen(){
        $this->load->model('Examen');
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');

        $plaats = $this->session->userdata('plaats');
        if($this->input->post('shop')){
            $data['invoice'] = $this->Examen->getOwnInvoice($plaats);
        } else {
            $data['invoice'] = $this->Examen->getInvoice();
        }

       // $data['amount'] = $this->Examen->getAmount();
        $this->load->view('bestellingen' ,$data);

    }

    public function afgehaald($id){
        $this->load->model('Examen');
        $name = $this->session->userdata('naam');
        $middlename = $this->session->userdata('tussenvoegsel');
        $surname = $this->session->userdata('achternaam');
        $data = [
            "Afgehaald" => 1
        ];
        $this->Examen->delivery($id, $data);


        $data2 = [
            "Afgehandeld_door" => $name.' '.$middlename.$surname
        ];

        $this->Examen->updateDelivery($id, $data2);

        redirect(base_url()."bestellingen");
    }

    public function artikelen(){
        $this->load->model('Examen');

        if($this->input->post('add')){
            $data = [
                "Artikelnaam" => $this->input->post('artikelnaam'),
                "Prijs" => $this->input->post('prijs')
            ];

            $this->Examen->insertArticle($data);
        }
        $data['articles'] = $this->Examen->getAllArticles();
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');

        $this->load->view("artikelen", $data);
    }

    public function verwijderarikelen($id)
    {
        $this->load->model('Examen');
        $this->Examen->deleteArticle($id);
        redirect(base_url() . "artikelen");
    }


        public function editarikelen($id){
            $this->load->model('Examen');

            if($this->input->post('update')){
                $data = [
                    "Artikelnaam" => $this->input->post('artikelnaam'),
                    "Prijs" => $this->input->post('prijs')
                ];
                    $this->Examen->updateArticle($id, $data);
                    redirect(base_url()."artikelen");
            }
            $data['currentArticle'] = $this->Examen->getArticle($id);
            $data['level'] = $this->session->userdata('user');
            $data['name'] = $this->session->userdata('naam');
            $this->load->view("editartikelen", $data);


        }


    }




