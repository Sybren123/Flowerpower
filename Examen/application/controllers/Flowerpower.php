<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flowerpower extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
//               ************************* HOMEPAGINA ************************* //
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
//               ************************* CONTACTPAGINA ************************* //
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
//               ************************* REGISTREERPAGINA ************************* //

        $this->load->model('Examen');

        if ($this->input->post('register')) {

            $receivegebruikersnaam = $this->Examen->receiveName($this->input->post('emailadres'));

            $password = $this->input->post('wachtwoord');
            $hashed_string  = password_hash($password, PASSWORD_BCRYPT, array(
                'cost' => 11
            ));
            $hashed_name = $hashed_string;

//               ************************* VALIDATIES ************************* //
            $this->load->library('form_validation');
            $this->form_validation->set_rules('voorletter', 'Voorletter', 'required');
            $this->form_validation->set_rules('voornaam', 'Voornaam', 'required');
            $this->form_validation->set_rules('achternaam', 'Achternaam', 'required');
            $this->form_validation->set_rules('adres', 'Adres', 'required');
            $this->form_validation->set_rules('postcode', 'Postcode', 'required');
            $this->form_validation->set_rules('woonplaats', 'Woonplaats', 'required');
            $this->form_validation->set_rules('geboortedatum', 'Geboortedatum', 'required');
            $this->form_validation->set_rules('emailadres', 'Emailadres', 'required|valid_email');
            $this->form_validation->set_rules('wachtwoord', 'Wachtwoord', 'required');



            if($this->form_validation->run()){
                $convertdate = date('Y-m-d', strtotime($this->input->post('geboortedatum')));


            $data = [
                "Voorletters" => $this->input->post('voorletter'),
                "Tussenvoegsels" => $this->input->post('tussenvoegsel'),
                "Achternaam" => $this->input->post('achternaam'),
                "Voornaam" => $this->input->post('voornaam'),
                "Adres" => $this->input->post('adres'),
                "Postcode" => $this->input->post('postcode'),
                "Woonplaats" => $this->input->post('woonplaats'),
                "Geboortedatum" => $convertdate,
                "Emailadres" => $this->input->post('emailadres'),
                "Wachtwoord" => $hashed_name,
                "Rol" => 2

            ];
                if(!$receivegebruikersnaam) {
                    $this->Examen->insertGebruiker($data);
                } else{
                    $data['error'] = "Gebruikersnaam bestaat al";
                }
        }
        }
        $data[''] = '';
        $this->load->view('registreren', $data);

    }

    public function inloggen()
    {
//               ************************* INLOGPAGINA ************************* //

        $wachtwoord = $this->input->post('wachtwoord');
        $gebruikersnaam = $this->input->post('gebruikersnaam');
        $this->load->model('Examen');
        if($this->input->post('inloggen')) {

           if ($this->Examen->can_login($gebruikersnaam)) {
                $getpassword = $this->Examen->getPassword($gebruikersnaam);
                foreach($getpassword->result() as $row){
                    $hash_pass = $row->Wachtwoord;
                }

                $result = password_verify($wachtwoord, $hash_pass);
//               ************************* HASH CHECK ************************* //

                if($result == TRUE) {
                    $gebruiker = $this->Examen->getRol($gebruikersnaam);

                    foreach ($gebruiker->result() as $row) {

                        $session_data = array(
                            "id" => $row->ID,
                            "user" => $row->Rol,
                            "naam" => $row->Voornaam,
                            "plaats" => $row->Woonplaats,
                            "tussenvoegsel" => $row->Tussenvoegsels,
                            "achternaam" => $row->Achternaam,
                            "emailadres" => $row->Emailadres,


                        );
                    }
                    $this->session->set_userdata($session_data);
                    redirect(base_url());

                    $data['error'] = '';
                } else{
                    $data['error'] = 'Wachtwoord is niet goed';
                }
           }



           else {
               $data['error'] = 'Verkeerde login gegevens!';
           }
        }
        $data[''] = '';
        $this->load->view('inloggen', $data);


    }


    public function logout(){
//               ************************* UITLOG FUNCTIE ************************* //
        $this->session->unset_userdata('user');
        redirect(base_url());
    }

    public function klantgegevens(){
//               ************************* KLANTGEGEVENSPAGINA ************************* //
        $this->load->model('Examen');
        $emailadres = $this->session->userdata('emailadres');
        $receivegebruikersnaam = $this->Examen->receiveName($this->input->post('emailadres'));
        $id = $this->session->userdata('id');
        if($this->input->post('update')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('voorletter', 'Voorletter', 'required');
            $this->form_validation->set_rules('voornaam', 'Voornaam', 'required');
            $this->form_validation->set_rules('achternaam', 'Achternaam', 'required');
            $this->form_validation->set_rules('adres', 'Adres', 'required');
            $this->form_validation->set_rules('postcode', 'Postcode', 'required');
            $this->form_validation->set_rules('woonplaats', 'Woonplaats', 'required');
            $this->form_validation->set_rules('geboortedatum', 'Geboortedatum', 'required');
            $this->form_validation->set_rules('emailadres', 'Emailadres', 'required|valid_email');
            if($this->form_validation->run()) {

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
                if(!$receivegebruikersnaam || $this->input->post('emailadres') == $emailadres) {
                    $this->Examen->updateData($data, $id);
                    if($this->input->post('emailadres') == $emailadres){
                    redirect(base_url() . "klantgegevens");
                        } else{
                     redirect(base_url()."logout");
                    }
                }
            else{
                    $data['error'] = 'Emailadres bestaat al!';
                }
            }
        }
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $data['data'] = $this->Examen->getUserData($emailadres);
        $this->load->view('klantgegevens' ,$data);
    }

    public function bestellen(){
//               ************************* BESTELPAGINA ************************* //

        $this->load->model('Examen');
        $id = $this->session->userdata('id');
        if($this->input->post('bestellen')) {
            $this->load->library('form_validation');
            $artikelen = $this->Examen->getArticles();

            foreach ($artikelen->result() as $row) {

                $this->form_validation->set_rules('artikel' . $row->ID, 'Artikel', 'numeric');
            }
            if($this->form_validation->run()){
            for ($i = 0; $i < 10000; $i++) {  // **** ER KUNNEN NIET MEER DAN 10000 ARTIKELEN AANWEZIG ZIJN! **** //
                if (!$this->input->post('artikel' . $i)) {
                    if ($i == 9999) {
                        $data['error'] = 'Er is geen artikel dat toegevoegd kan worden';
                    }
                } else {
                    $i = 10000;
                    $Date = date("Y-m-d");
//               ************************* FACTUUR AANMAKEN ************************* //
                    $data = [
                        "Gebruiker_ID" => $id,
                        "Winkel_ID" => $this->input->post('winkel'),
                        "Factuurdatum" => $Date,
                        'Afgehaald' => 0,
                        'Datum' => date("Y-m-d", strtotime($Date . ' + 2 days')),
                        'Tijd' => strftime(' %H:%M:%S', time())
                    ];
                    echo 'asd';

                    $invoiceID = $this->Examen->insertInvoice($data);
                    $data2 = [
                        "Factuurnummer" => Date("Ymd") . $invoiceID
                    ];
                    $this->Examen->updateInvoice($invoiceID, $data2);

                    foreach ($artikelen->result() as $row) {
                        if ($this->input->post('artikel' . $row->ID)) {
                            if ($this->input->post('artikel' . $row->ID) == '') {
                                continue;
                            } else {

                                $factuur = $this->Examen->getAllInvoice();

                                foreach ($factuur->result() as $rows) {
                                    $factuurID = $rows->ID;
                                }


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

                    redirect(Base_url() . "Factuur/$invoiceID");
                }
                }
            }
        }

        $data['winkel'] = $this->Examen->getWinkels();
        $data['articles'] = $this->Examen->getArticles();
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $this->load->view('bestellen' ,$data);
    }


    public function bestellingen(){
//               ************************* BESTELOVERZICHTPAGINA ************************* //
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
//               ************************* AFHAALFUNCTIE ************************* //
        $this->load->model('Examen');
        $name = $this->session->userdata('naam');
        $middlename = $this->session->userdata('tussenvoegsel');
        $surname = $this->session->userdata('achternaam');
        $data = [
            "Afgehaald" => 1
        ];
        $this->Examen->delivery($id, $data);

        $data2 = [
            "Afgehandeld_door" => $name.' '.$middlename.' '. $surname
        ];
        $this->Examen->updateDelivery($id, $data2);
        redirect(base_url()."bestellingen");
    }

    public function artikelen(){
//               ************************* ARTIKELPAGINA ************************* //
        $this->load->model('Examen');
        if($this->input->post('toevoegen')) {
            redirect(base_url() . "artikeltoevoegen");
        }

        $data['articles'] = $this->Examen->getArticles();
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $this->load->view('artikelen', $data);
    }

    public function artikeltoevoegen(){
//               ************************* ARTIKEL TOEVOEGEN PAGINA ************************* //
        $this->load->model('Examen');
        if($this->input->post('toevoegen')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('artikelnaam', 'Artikelnaam', 'required');
            $this->form_validation->set_rules('prijs', 'Prijs', 'required');
            if ($this->form_validation->run()) {

                $data = [
                    "Artikelnaam" => $this->input->post('artikelnaam'),
                    "Prijs" => $this->input->post('prijs')
                ];
                $this->Examen->insertArticle($data);

                redirect(base_url() . "artikelen");
            }
        }
            $data['level'] = $this->session->userdata('user');
            $data['name'] = $this->session->userdata('naam');
            $this->load->view('artikeltoevoegen', $data);
        }

    public function verwijderartikel($id){
//               ************************* VERWIJDER FUNCTIE ************************* //
        $this->load->model('Examen');
        $this->Examen->deleteArticle($id);
        redirect(base_url()."artikelen");
    }

    public function editartikel($id){
//               ************************* AANPASSEN ARTIKEL PAGINA ************************* //
        $this->load->model("Examen");
        if($this->input->post('update')){
            $data   = [
                "Artikelnaam" => $this->input->post('artikelnaam'),
                "Prijs"  => $this->input->post('prijs')
            ];
            $this->Examen->updateArticle($id, $data);
            redirect(base_url(). "artikelen");
        }
        $data['currentarticle'] = $this->Examen->getArticle($id);
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $this->load->view('editartikel', $data);
    }

    public function medewerkers(){
//               ************************* MEDEWERKERS OVERZICHT PAGINA ************************* //
        $this->load->model("Examen");

        if($this->input->post('add')){
            redirect(base_url()."toevoegenmedewerker");

        }
        $data['winkel'] = $this->Examen->getWinkels();
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $data['data'] = $this->Examen->getWorkers();
        $this->load->view('medewerkers', $data);

    }

    public function toevoegenmedewerker(){
//               ************************* TOEVOEGEN MEDEWERKER PAGINA ************************* //
        $this->load->model("Examen");
        $receivegebruikersnaam = $this->Examen->receiveName($this->input->post('emailadres'));
        if($this->input->post('add')) {


            $password = $this->input->post('wachtwoord');
            $hashed_string  = password_hash($password, PASSWORD_BCRYPT, array(
                'cost' => 11
            ));
            $hashed_name = $hashed_string;

            $convertdate = date('Y-m-d', strtotime($this->input->post('geboortedatum')));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('voorletter', 'Voorletter', 'required');
            $this->form_validation->set_rules('voornaam', 'Voornaam', 'required');
            $this->form_validation->set_rules('achternaam', 'Achternaam', 'required');
            $this->form_validation->set_rules('adres', 'Adres', 'required');
            $this->form_validation->set_rules('postcode', 'Postcode', 'required');
            $this->form_validation->set_rules('geboortedatum', 'Geboortedatum', 'required');
            $this->form_validation->set_rules('emailadres', 'Emailadres', 'required|valid_email');
            $this->form_validation->set_rules('wachtwoord', 'Wachtwoord', 'required');



            if($this->form_validation->run()){


            $data = [
                "Voornaam" => $this->input->post('voornaam'),
                "Voorletters" => $this->input->post('voorletter'),
                "Tussenvoegsels" => $this->input->post('tussenvoegsel'),
                "Achternaam" => $this->input->post('achternaam'),
                "Voornaam" => $this->input->post('voornaam'),
                "Adres" => $this->input->post('adres'),
                "Postcode" => $this->input->post('postcode'),
                "Woonplaats" => $this->input->post('woonplaats'),
                "Geboortedatum" => $convertdate,
                "Emailadres" => $this->input->post('emailadres'),
                "Wachtwoord" => $hashed_name,
                "Rol" => 3
            ];

                if(!$receivegebruikersnaam) {
                    $this->Examen->insertWorker($data);
                    redirect(base_url()."medewerkers");

                } else{
                    $data['error'] = 'Gebruikersnaam bestaat al';
                }
        }
        }
        $data['winkel'] = $this->Examen->getWinkels();
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $this->load->view('medewerkertoevoegen', $data);

        }

    public function editmedewerker($id){
//               ************************* AANPASSEN MEDEWERKER PAGINA ************************* //
        $this->load->model("Examen");
        $receivegebruikersnaam = $this->Examen->receiveName($this->input->post('emailadres'));
        $currentgebruikersnaam = $this->Examen->editName($id);

        foreach($currentgebruikersnaam->result() as $row){
            $email = $row->Emailadres;
        }
        if($this->input->post('update')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('voorletter', 'Voorletter', 'required');
            $this->form_validation->set_rules('voornaam', 'Voornaam', 'required');
            $this->form_validation->set_rules('achternaam', 'Achternaam', 'required');
            $this->form_validation->set_rules('adres', 'Adres', 'required');
            $this->form_validation->set_rules('postcode', 'Postcode', 'required');
            $this->form_validation->set_rules('woonplaats', 'Woonplaats', 'required');
            $this->form_validation->set_rules('geboortedatum', 'Geboortedatum', 'required');
            $this->form_validation->set_rules('emailadres', 'Emailadres', 'required|valid_email');
            if($this->form_validation->run()) {
                $data = [
                    "Voorletters" => $this->input->post('voorletter'),
                    "Tussenvoegsels" => $this->input->post('tussenvoegsel'),
                    "Achternaam" => $this->input->post('achternaam'),
                    "Voornaam" => $this->input->post('voornaam'),
                    "Adres" => $this->input->post('adres'),
                    "Postcode" => $this->input->post('postcode'),
                    "Woonplaats" => $this->input->post('woonplaats'),
                    "Geboortedatum" => $this->input->post('geboortedatum'),
                    "Emailadres" => $this->input->post('emailadres'),
                    "Rol" => 3
                ];
                if (!$receivegebruikersnaam || $email == $this->input->post('emailadres')) {
                    $this->Examen->updateWorker($id, $data);
                    redirect(base_url() . "medewerkers");
                } else {
                    $data['error'] = 'Emailadres bestaat al';
                }
            }
        }
        $data['winkel'] = $this->Examen->getWinkels();
        $data['currentworker'] = $this->Examen->getWorker($id);
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $this->load->view('editmedewerker', $data);
    }

    public function verwijdermedewerker($id){
//               ************************* VERWIJDER FUNCTIE MEDEWERKER ************************* //
        $this->load->model('Examen');
        $this->Examen->deleteWorker($id);
        redirect(base_url()."medewerkers");
    }


    public function factuur($id){
//               ************************* FACTUURPAGINA ************************* //
        $this->load->model('Examen');
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $data['id'] = $this->session->userdata('id');
        $data['access'] = $this->Examen->Accessdata($id);
        $data['invoicedata'] = $this->Examen->invoiceData($id);
        $data['totalprice'] = $this->Examen->totalPrice($id);
        $this->load->view('factuur', $data);

    }

    public function gebruikers(){
//               ************************* GEBRUIKERS OVER 2 DAGEN JARIG PAGINA ************************* //
        $this->load->model('Examen');
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $data['data'] = $this->Examen->getBirthday();
        $this->load->view("gebruikers", $data);
    }

    public function bekijken($id){
//               ************************* FACTUREN BEKIJKEN GEBRUIKERS ************************* //
        $this->load->model('Examen');
        $data['level'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('naam');
        $data['data'] = $this->Examen->getInvoiceLines($id);
        $this->load->view("factuurmedewerker", $data);

    }

}
