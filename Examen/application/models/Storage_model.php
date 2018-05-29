<?php
class Storage_model extends CI_Model
{







//*************     Insert functions







    public function insertCompany($data)
    {
        $this->db->insert("companies", $data);
    }

    public function insertQuotation($data)
    {
        $this->db->insert("quotes", $data);
    }

    public function insertCompanydata($data2)
    {
        $this->db->insert('companyaddresses', $data2);
    }

    public function insertToggle1($pageNumber, $data)
    {
        $this->db->where('id', $pageNumber);
        $this->db->where('templateid', 8);
        $this->db->update('pages', $data);
    }

    public function insertToggle0($pageNumber, $data)
    {
        $this->db->where('id', $pageNumber);
        $this->db->where('templateid', 8);
        $this->db->update('pages', $data);
    }







//*************     Get functions







    public function getAllQuotes($quotation)
    {
        $this->db->select('*');
        $this->db->from('quotes');
        $this->db->where('id', $quotation);
        $query = $this->db->get();
        return $query;
    }

    public function getAllCost($pageNumber)
    {
        $this->db->select('*');
        $this->db->from('quotescost');
        $this->db->where('pagesid', $pageNumber);
        $query = $this->db->get();
        return $query;
    }

    public function getAllPlanning($pageNumber)
    {
        $this->db->select('*');
        $this->db->from('quoteplanning');
        $this->db->where('pagesid', $pageNumber);
        $query = $this->db->get();
        return $query;
    }


    public function getAllElement($pageNumber){
        $this->db->select('*');
        $this->db->from('quoteselement');
        $this->db->where('pagesid', $pageNumber);
        $query = $this->db->get();
        return $query;
    }

    public function getAllTitleElements() {
        $this->db->select('*');
        $this->db->from('quoteselement');
        $this->db->distinct();
        $query = $this->db->get();
        return $query;
    }

    public function getCompanies()
    {
        $query = $this->db->query('SELECT * FROM companies');
        if ($query->num_rows() > 0)
            return $query->result();
    }

    public function getCompanyId($companyName)
    {
        $this->db->select('id');
        $this->db->from('companies');
        $this->db->where('name', $companyName);
        $query = $this->db->get();
        return $query;
    }

    public function getQuotations($companyName)
    {
        $this->db->select('quotes.id, quotes.quotationName');
        $this->db->from('quotes');
        $this->db->join('companyaddresses', 'quotes.companyaddresesid = companyaddresses.id', 'left');
        $this->db->where('quotes.companyaddresesid', $companyName);
        $query = $this->db->get();
        return $query;
    }

    public function getPagesId($quotation, $companyName)
    {
        $this->db->select('pages.id, pages.templateid ');
        $this->db->from('pages');
        $this->db->join('quotes', 'quotes.id = pages.quotesid');
        $this->db->where('pages.quotesid', $quotation);
        $this->db->where('quotes.companyaddresesid', $companyName);
        $query = $this->db->get();
        return $query;
    }

    public function getPage($pageNumber)
    {
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('id', $pageNumber);
        $this->db->group_by('id');
        $query = $this->db->get();
        return $query;
    }

    public function getPillar($quotation)
    {
        $this->db->select('pillar');
        $this->db->from('quotes');
        $this->db->where('quotes.id', $quotation);
        $query = $this->db->get();
        return $query;
    }

    public function getName($pageNumber)
    {
        $this->db->select('*');
        $this->db->from('quotesentries');
        $this->db->where('pagesid', $pageNumber);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $query = "";
        }
        return $query;
    }

    public function getAddresses($companyName)
    {
        $this->db->select('*');
        $this->db->from('companyaddresses');
        $this->db->where('companyid', $companyName);
        $query = $this->db->get();
        return $query;
    }

    public function getImageElements() {
        $this->db->select('*');
        $this->db->from('quoteselement');
        $this->db->distinct();
        $this->db->group_by('image');
        $query = $this->db->get();
            return $query;
    }

    public function getSpeceficElement($selected){
        $this->db->select('*');
        $this->db->from('quoteselement');
        $this->db->where('quoteselement.id', $selected);
        $query = $this->db->get();
        return $query;
    }

    public function getTotalCost($pageNumber)
    {
        $this->db->select_sum('cost');
        $this->db->from('quotescost');
        $this->db->where('pagesid', $pageNumber);
        $query = $this->db->get();
        return $query->result();
    }

    public function getToggle($pageNumber)
    {
        $this->db->select('toggle');
        $this->db->from('pages');
        $this->db->where('id', $pageNumber);
        $this->db->where('templateid', 8);
        $query = $this->db->get();
        return $query;
    }

    public function getColor($pageNumber)
    {
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('id', $pageNumber);
        $query = $this->db->get();
        return $query;
    }







//*************     Save functions







    public function savePageSuggestion($pageNumber, $data, $data2, $data3, $data4, $data5)
    {
        $this->db->where('pagesid', $pageNumber);
        $query = $this->db->get('quotesentries');
        if ($query->num_rows() > 0) {
            $this->db->where('entryname', 'Name');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data);
            $this->db->where('entryname', 'Title');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data2);
            $this->db->where('entryname', 'Salutation');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data3);
            $this->db->where('entryname', 'Textsuggestion');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data4);
            $this->db->where('entryname', 'Endtextsuggestion');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data5);

        } else if ($query->num_rows() == 0) {
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data2);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data3);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data4);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data5);
        }
    }

    public function savePageImprovement($pageNumber, $data, $data1, $data2, $data3, $data4, $data5, $data6, $data7)
    {
        $this->db->where('pagesid', $pageNumber);
        $query = $this->db->get('quotesentries');
        if ($query->num_rows() > 0) {
            $this->db->where('entryname', 'Improvement');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data);
            $this->db->where('entryname', 'Addimprovement');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data1);
            $this->db->where('entryname', 'Addimprovement1');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data2);
            $this->db->where('entryname', 'Addimprovement2');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data3);
            $this->db->where('entryname', 'Addimprovement3');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data4);
            $this->db->where('entryname', 'Addimprovement4');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data5);
            $this->db->where('entryname', 'Addimprovement5');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data6);
            $this->db->where('entryname', 'Addimprovement6');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data7);
        } else if ($query->num_rows() == 0) {
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data1);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data2);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data3);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data4);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data5);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data6);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data7);
        }
    }

    public function savePagePayment($pageNumber, $data4, $data5, $data7, $data8, $data9, $data14, $data15)
    {
        $this->db->where('pagesid', $pageNumber);
        $query = $this->db->get('quotesentries');
        if ($query->num_rows() > 0) {
            $this->db->where('entryname', 'Date');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data4);
            $this->db->where('entryname', 'Discountprice');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data5);
            $this->db->where('entryname', 'Method');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data7);
            $this->db->where('entryname', 'Methodexplanation');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data8);
            $this->db->where('entryname', 'Enddate');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data9);
            $this->db->where('entryname', 'Hosting');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data14);
            $this->db->where('entryname', 'Hostingcost');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data15);
        } else if ($query->num_rows() == 0) {
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data4);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data5);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data7);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data8);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data9);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data14);
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data15);
        }
    }

    public function savePlanning($pageNumber, $data)
    {
        $this->db->where('pagesid', $pageNumber);
        $query = $this->db->get('quotesentries');
        if ($query->num_rows() > 0) {
            $this->db->where('entryname', 'Planningdescription');
            $this->db->where('pagesid', $pageNumber);
            $this->db->update('quotesentries', $data);
        } else if ($query->num_rows() == 0) {
            $this->db->where('pagesid', $pageNumber);
            $this->db->insert("quotesentries", $data);
        }
    }


    public function saveElement($data)
    {
        $this->db->insert("quoteselement", $data);
    }



    public function saveColor($pageNumber, $Color)
    {
        $this->db->where('id', $pageNumber);
        $this->db->update('pages', $Color);
    }


    public function saveCost($data)
    {
        $this->db->insert("quotescost", $data);
    }



    public function savePlanningPage($pageNumber, $data)
    {
        $this->db->insert("quoteplanning", $data);
    }







//*************        Delete functions







    public function deleteQuotation($quotation)
    {
        $this->db->query("DELETE FROM quotes WHERE quotes.id = $quotation");
    }

    public function deleteCompany($company)
    {
        $this->db->query("DELETE FROM companies WHERE companies.id = $company");
    }

    public function deleteCost($deleteId)
    {
        $this->db->query("DELETE FROM quotescost WHERE id = $deleteId");
    }

    public function deleteElement($deleteId){
        $this->db->query("DELETE FROM quoteselement WHERE id = $deleteId");
    }

    public function deletePlanning($deleteId)
    {
        $this->db->query("DELETE FROM quoteplanning WHERE id = $deleteId");
    }

    public function deletePage($pageid)
    {
        $this->db->query("DELETE FROM pages WHERE pages.id = $pageid;");
    }







//*************        Remaining functions







    public function companyAddress($companyName)
    {
        $this->db->select('*');
        $this->db->from('companies');
        $this->db->join('companyaddresses', 'companies.id = companyaddresses.companyid');
        $this->db->where('companies.id', $companyName);
        $query = $this->db->get();
        return $query;
    }


    public function switchName($companyName)
    {
        $this->db->select('*');
        $this->db->from('companies');
        $this->db->where('id', $companyName);
        $query = $this->db->get();
        return $query;
    }

    public function addPage($data)
    {
        $this->db->insert('pages', $data);
    }

    public function selectPages()
    {
        $this->db->select('*');
        $this->db->from('pages');
        $query = $this->db->get();
        return $query;
    }

    public function pageNumbers($quotation)
    {
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('quotesid', $quotation);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function exactPage($idrow, $quotation)
    {
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('pages.quotesid', $quotation);
        $this->db->where('pages.id <=', $idrow);
        $query = $this->db->get();
        return $query->num_rows();
    }
}