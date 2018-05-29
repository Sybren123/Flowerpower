<?php
class Examen extends CI_Model
{

    public function insertGebruiker($data)
    {

        $this->db->insert('gebruiker', $data);
    }

    public function getPassword($gebruikersnaam){
        $this->db->select('*');
        $this->db->from('gebruiker');
        $this->db->where('Emailadres', $gebruikersnaam);
        $query = $this->db->get();
        return $query;
    }


    public function receiveName($gebruikersnaam){
        $this->db->select('*');
        $this->db->where('Emailadres', $gebruikersnaam);
        $query = $this->db->get('gebruiker');
        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }



    public function can_login($gebruikersnaam){
        $this->db->where('Emailadres', $gebruikersnaam);
        $query = $this->db->get('gebruiker');

        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }


    public function getRol($gebruikersnaam){
        $this->db->select('*');
        $this->db->from('gebruiker');
        $this->db->where('Emailadres', $gebruikersnaam);
        $query = $this->db->get();
        return $query;
    }

    public function getUserData($emailadres){
        $this->db->select('*');
        $this->db->from('gebruiker');
        $this->db->where('Emailadres', $emailadres);
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
        $this->db->distinct();
        $this->db->from('factuur');
        $this->db->join('factuurregel', 'Factuur_ID = factuur.ID');
        $this->db->join('gebruiker', 'Gebruiker_ID = gebruiker.ID');
        $this->db->join('winkel', 'Winkel_ID = winkel.ID');
        $this->db->where('Vestigingsplaats', $plaats);
        $this->db->group_by("Factuurnummer");
        $query = $this->db->get();
        return $query;
    }

    public function delivery($id, $data){
        $this->db->where('id', $id);
        $this->db->update('factuur', $data);
    }

    public function  getAllInvoice(){
        $this->db->select('*');
        $this->db->from('factuur');
        $query = $this->db->get();
        return $query;
    }


    public function insertInvoice($data){
        $this->db->insert('factuur', $data);
        $invoiceID = $this->db->insert_id();
        return $invoiceID;
    }

    public function updateInvoice($invoiceID, $data2){
        $this->db->where("id", $invoiceID);
        $this->db->update('factuur', $data2);
    }

    public function insertInvoiceRow($data1){
        $this->db->insert('factuurregel', $data1);
    }

    public function updateDelivery($id, $data2){
        $this->db->where('id', $id);
        $this->db->update('factuur', $data2);
    }

    public function deleteArticle($id){
        $this->db->query("DELETE FROM artikel WHERE id = $id");
    }

    public function updateArticle($id, $data){
        $this->db->where('id', $id);
        $this->db->update('artikel', $data);
    }

    public function getArticle($id){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function insertArticle($data){
        $this->db->insert('artikel', $data);
    }

    public function getWorkers(){
        $this->db->select('*');
        $this->db->from('gebruiker');
        $this->db->where('Rol', 3);
        $query = $this->db->get();
        return $query;
    }

    public function insertWorker($data){
        $this->db->insert('gebruiker', $data);
    }

    public function getWinkels(){
        $this->db->select('*');
        $this->db->from('winkel');
        $query = $this->db->get();
        return $query;
    }


    public function getWorker($id){
        $this->db->select('*');
        $this->db->from('gebruiker');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function updateWorker($id, $data){
        $this->db->where('id', $id);
        $this->db->update('gebruiker', $data);
    }

    public function deleteWorker($id){
        $this->db->query("DELETE FROM gebruiker WHERE id = $id");
    }

    public function invoiceData($id){
        $this->db->select('*');
        $this->db->from('factuur');
        $this->db->join('gebruiker', 'Gebruiker_ID = gebruiker.ID');
        $this->db->join('winkel', 'Winkel_ID = winkel.ID');
        $this->db->where('factuur.id', $id);

        $query = $this->db->get();
        return $query;
    }

    public function totalPrice($id){
        $this->db->select('*');
        $this->db->from('factuurregel');
        $this->db->join('artikel', 'artikel.id = Artikel_ID');
        $this->db->where('Factuur_ID', $id);
        $query = $this->db->get();
        return $query;
    }

    public function getBirthday(){
        $this->db->select('*');
        $this->db->from('gebruiker');
        $this->db->where('Rol', 2);
        $query = $this->db->get();
        return $query;
    }

    public function getInvoiceLines($id){
        $this->db->select('*');
        $this->db->from('factuur');
        $this->db->join('factuurregel', 'Factuur_ID = factuur.ID');
        $this->db->join('artikel', 'Artikel_ID = artikel.ID');
        $this->db->where('Factuur_ID', $id);
        $query = $this->db->get();
        return $query;
    }

    public function editName($id){
        $this->db->select('*');
        $this->db->from('gebruiker');
        $this->db->where('ID', $id);
        $query = $this->db->get();
        return $query;
    }

    public function Accessdata($id){
        $this->db->select('*');
        $this->db->from('factuur');
        $this->db->join('gebruiker', 'Gebruiker_ID = gebruiker.ID');
        $this->db->where('factuur.ID', $id);
        $query = $this->db->get();
        return $query;
    }

}
