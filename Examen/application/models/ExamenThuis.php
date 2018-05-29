<?php
class Examen extends CI_Model
{

    public function insertGebruiker($data)
    {

        $this->db->insert('gebruiker', $data);
    }


    public function can_login($gebruikersnaam, $wachtwoord){
        $this->db->where('voornaam', $gebruikersnaam);
        $this->db->where('wachtwoord', $wachtwoord);
        $query = $this->db->get('gebruiker');

        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }


    public function getRol($gebruikersnaam, $wachtwoord){
        $this->db->select('*');
        $this->db->from('gebruiker');
        $this->db->where('voornaam', $gebruikersnaam);
        $this->db->where('wachtwoord', $wachtwoord);
        $query = $this->db->get();
        return $query;
    }

    public function getUserData($voornaam){
        $this->db->select('*');
        $this->db->from('gebruiker');
        $this->db->where('voornaam', $voornaam);
        $query = $this->db->get();
        return $query;
    }

    public function updateData($data, $id){
        $this->db->where('id', $id);
        $this->db->update('gebruiker', $data);
    }

    public function getArticles(){
        $this->db->select('*');
        $this->db->from('artikel');
        $query = $this->db->get();
        return $query;
    }

    public function getInvoice(){
        $this->db->select('*');
        $this->db->distinct();
        $this->db->from('factuur');
        $this->db->join('factuurregel', 'Factuur_ID = factuur.ID');
        $this->db->join('gebruiker', 'Gebruiker_ID = gebruiker.ID');
        $this->db->join('winkel', 'Winkel_ID = winkel.ID');
        $this->db->group_by("Factuurnummer");
        $query = $this->db->get();
        return $query;
    }

    public function getOwnInvoice($plaats){
        $this->db->select('*');
        $this->db->from('factuurregel');
        $this->db->join('factuur', 'Factuur_ID = factuur.ID');
        $this->db->join('artikel', 'Artikel_ID = artikel.ID');
        $this->db->join('gebruiker', 'Gebruiker_ID = gebruiker.ID');
        $this->db->where('Vestigingsplaats', $plaats);

        $this->db->join('winkel', 'Winkel_ID = winkel.ID');
        $query = $this->db->get();
        return $query;
    }

    public function getAllInvoice()
    {
        $this->db->select('*');
        $this->db->from('factuur');
        $query = $this->db->get();
        return $query;
    }
    public function delivery($id, $data){
        $this->db->where('id', $id);
        $this->db->update('factuur', $data);
    }

    public function updateDelivery($id, $data2){
        $this->db->where('id', $id);
        $this->db->update('factuur', $data2);

    }

    public function insertInvoice($data){
        $this->db->insert('factuur', $data);
        $InvoiceID = $this->db->insert_id();
        return $InvoiceID;
    }

    public function updateInvoice($invoiceID, $data2){
        $this->db->where('id', $invoiceID);
        $this->db->update('factuur', $data2);
    }

    public function insertInvoiceRow($data1){
        $this->db->insert('factuurregel', $data1);

    }

    public function getAllArticles(){
        $this->db->select('*');
        $this->db->from('artikel');
        $query = $this->db->get();
        return $query;
    }

    public function insertArticle($data){
        $this->db->insert('artikel', $data);
    }

    public function deleteArticle($id){
        $this->db->query("DELETE FROM artikel WHERE id = $id");

    }

    public function getArticle($id){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function updateArticle($id, $data){
        $this->db->where('id', $id);
        $this->db->update('artikel', $data);
    }




//    public function getAmount() {
//        $this->db->select('*');
//        $this->db->from('factuurregel');
//        $this->db->join('factuur', 'Factuur_ID = factuur.ID');
//        $query = $this->db->get();
//        return $query;
//    }

}
