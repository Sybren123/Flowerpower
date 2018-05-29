<?php

class storagecontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model("Storage_model");
        $data['companies'] = $this->Storage_model->getCompanies();
        if ($this->input->post('aanmaken')) {
            redirect('insertCompany/' . $this->input->post('company') . '/' . $this->input->post('street') . '/' . $this->input->post('zipcode') . '/' . $this->input->post('city'));
        }
        if ($this->input->post('ophalen')) {
            redirect('getCompany/' . $this->input->post('section'));
        }
        if ($this->input->post('delete')) {
            $company                        = $this->input->post('section');
            $this->Storage_model->deleteCompany($company);
            redirect('index');
        }
        $this->load->view('keuze', $data);
    }

    public function insertCompany($companyName, $street, $zipcode, $city)
    {
        $this->load->model("Storage_model");
        $data                               = [
            "name"                          => $companyName
        ];
        $this->Storage_model->insertCompany($data);
        $companyId = $this->Storage_model->getCompanyId($companyName);
        foreach ($companyId->result() as $row) {
            $id = $row->id;
        }

        $data2                              = [
            "companyid"                     => $id,
            "street"                        => urldecode($street),
            "city"                          => urldecode($city),
            "zip_code"                      => urldecode($zipcode)
        ];

        $this->Storage_model->insertCompanydata($data2);
        redirect('index');
    }

    public function getCompany($companyName)
    {
        $this->load->model("Storage_model");
        $data['address']                    = $this->Storage_model->companyAddress($companyName);
        $data['quotation']                  = $this->Storage_model->getQuotations($companyName);
        $pillar = $this->Storage_model->getPillar($this->input->post('receiveQuotation'));
        foreach ($pillar->result() as $row) {
            $pillarId                       = $row->pillar;
        }
        if ($this->input->post('aanmaken')) {
            redirect('insertQuotation/' . $this->input->post('pillars') . '/' . $companyName . '/' . $this->input->post('quotation') . '/' . $this->input->post('enddate'));
        }
        if ($this->input->post('ophalen')) {
            redirect('getQuotation/' . $pillarId . '/' . $companyName . '/' . $this->input->post('receiveQuotation') . '/1');
        }
        if ($this->input->post('delete')) {
            $quotation = $this->input->post('receiveQuotation');
            $this->Storage_model->deleteQuotation($quotation);
            redirect('getCompany/' . $companyName);
        }
        if ($this->input->post('terug')) {
            redirect('index');
        }
        $this->load->view('menu', $data);
    }


    public function insertQuotation($pillar, $companyName, $quotation, $enddate)
    {
        $this->load->model("Storage_model");
        $convertdate                        = date('Y-m-d', strtotime($enddate));
        $data                               = [
            'companyaddresesid'             => $companyName,
            'quotationName'                 => $quotation,
            'pillar'                        => $pillar,
            'enddate'                       => $convertdate
        ];
        $this->Storage_model->insertQuotation($data);
        redirect('getcompany/' . $companyName);
    }

    public function getQuotation($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        $toggleInput                        = $this->Storage_model->getToggle($pageNumber);
        foreach ($toggleInput->result() as $rows) {
            $toggle                         = $rows->toggle;
        }
        if ($this->input->post('back')) {
            redirect('getCompany/' . $companyName);
        }
        if ($this->input->post('add')) {
            redirect('addPage/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $this->input->post('pages'));
        }
        if ($this->input->post('delete')) {
            redirect('deletePage/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        if ($this->input->post('homepage')) {
            redirect('getQuotation/' . $pillar . '/' . $companyName . '/' . $quotation . '/1');
        }
        if ($this->input->post('cost')) {
            redirect('getCost/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        if ($this->input->post('element')) {
            redirect('getElement/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        if ($this->input->post('planning')) {
            redirect('getPlanning/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        if ($this->input->post('toggle')) {
            if ($toggle == 1) {
                $data                       = [
                    'toggle'                => 0
                ];
                $this->Storage_model->insertToggle0($pageNumber, $data);

            } elseif ($toggle == 0) {
                $data                       = [
                    'toggle'                => 1
                ];
                $this->Storage_model->insertToggle1($pageNumber, $data);
            }
            redirect('getQuotation/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }

        $Pagesdata                          = $this->Storage_model->getPagesId($quotation, $companyName);
        $i                                  = 0;
        if ($this->input->post('pdf')) {

        } else {
            foreach ($Pagesdata->result() as $rows) {
                $i++;
            }
        }
        $getPage = $this->Storage_model->getPage($pageNumber);
        foreach ($getPage->result() as $rows) {
            if($rows->id == null){

            } else {
                $idPage                    = $rows->templateid;
                $idrow                     = $rows->id;
                $data['pageCount']         = $this->Storage_model->exactPage($idrow, $quotation);

            }
        }
        if ($this->input->post('save')) {
            if ($idPage == 6) {
                $data  = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Name',
                    'entryvalue' => $this->input->post('name')
                ];
                $data2 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Title',
                    'entryvalue' => $this->input->post('title')
                ];
                $data3 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Salutation',
                    'entryvalue' => $this->input->post('salutation')
                ];
                $data4 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Textsuggestion',
                    'entryvalue' => $this->input->post('textSuggestion')
                ];
                $data5 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Endtextsuggestion',
                    'entryvalue' => $this->input->post('endtextSuggestion')
                ];
                $this->Storage_model->savePageSuggestion($pageNumber, $data, $data2, $data3, $data4, $data5);
            }
            if ($idPage == 7) {
                $data  = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Improvement',
                    'entryvalue' => $this->input->post('textImprovement')
                ];
                $data1 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Addimprovement',
                    'entryvalue' => $this->input->post('addImprovement')
                ];
                $data2 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Addimprovement1',
                    'entryvalue' => $this->input->post('addImprovement1')
                ];
                $data3 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Addimprovement2',
                    'entryvalue' => $this->input->post('addImprovement2')
                ];
                $data4 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Addimprovement3',
                    'entryvalue' => $this->input->post('addImprovement3')
                ];
                $data5 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Addimprovement4',
                    'entryvalue' => $this->input->post('addImprovement4')
                ];
                $data6 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Addimprovement5',
                    'entryvalue' => $this->input->post('addImprovement5')
                ];
                $data7 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Addimprovement6',
                    'entryvalue' => $this->input->post('addImprovement6')
                ];
                $this->Storage_model->savePageImprovement($pageNumber, $data, $data1, $data2, $data3, $data4, $data5, $data6, $data7);
            }
            if ($idPage == 8) {
                $data4 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Date',
                    'entryvalue' => $this->input->post('date')
                ];
                $data5 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Discountprice',
                    'entryvalue' => $this->input->post('discountPrice')
                ];
                $data7 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Method',
                    'entryvalue' => $this->input->post('method')
                ];
                $data8 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Methodexplanation',
                    'entryvalue' => $this->input->post('methodExplanation')
                ];
                $data9 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Enddate',
                    'entryvalue' => $this->input->post('endDate')
                ];
                $data14 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Hosting',
                    'entryvalue' => $this->input->post('hosting')
                ];
                $data15 = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Hostingcost',
                    'entryvalue' => $this->input->post('hostingCost')
                ];
                $this->Storage_model->savePagePayment($pageNumber, $data4, $data5, $data7, $data8, $data9, $data14, $data15);
            }
            if ($idPage == 9) {
                $data = [
                    'pagesid' => $pageNumber,
                    'entryname' => 'Planningdescription',
                    'entryvalue' => $this->input->post('planningDescription')
                ];
                $this->Storage_model->savePlanning($pageNumber, $data);
            }
            $Color = [
                'color' => $this->input->post('color')
            ];
            $data['pageCount']             = $this->Storage_model->exactPage($idrow, $quotation);
            $this->Storage_model->saveColor($pageNumber, $Color);
        }
        foreach ($toggleInput->result() as $rows) {
            $data['toggle']                = $rows->toggle;
        }
        $data['pagesdata']                 = $this->Storage_model->getPagesId($quotation, $companyName);
        $data['companyName']               = $this->Storage_model->switchName($companyName);
        $data['quotation']                 = $this->Storage_model->getAllQuotes($quotation);
        $data['pageNumbers']               = $this->Storage_model->pageNumbers($quotation);
        $data['pillar']                    = $pillar;
        $data['pageId']                    = $pageNumber;
        $data['element']                   = $this->Storage_model->getAllElement($pageNumber);
        $data['name']                      = $this->Storage_model->getName($pageNumber);
        $data['color']                     = $this->Storage_model->getColor($pageNumber);
        $data['cost']                      = $this->Storage_model->getAllCost($pageNumber);
        $data['totalcost']                 = $this->Storage_model->getTotalCost($pageNumber);
        $data['planning']                  = $this->Storage_model->getAllPlanning($pageNumber);
        $data['companyAddress']            = $this->Storage_model->getAddresses($companyName);

            if(!isset($idPage)){
                $idPage = 1;
            }
            $this->load->view('pages/' . $idPage, $data);
        }

    public function getElement($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        if ($this->input->post('addElement')) {
            redirect('addElement/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        if ($this->input->post('back')) {
            redirect('getQuotation/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }

        $data['pillar']                   = $pillar;
        $data['companyName']              = $companyName;
        $data['quotation']                = $quotation;
        $data['pageNumber']               = $pageNumber;
        $data['element']                  = $this->Storage_model->getAllElement($pageNumber);

        $this->load->view('allElement', $data);
    }

    public function addElement($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        $this->load->helper(array('form', 'url'));

        if ($this->input->post('back')) {
            redirect('getElement/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        if ($this->input->post('get')) {
            $selected                   = $this->input->post('selectElement');
            $element                    = $this->Storage_model->getSpeceficElement($selected);
            foreach ($element->result() as $row) {
                $data                   = [
                    'title'             => $row->title,
                    'description'       => $row->description,
                    'image'             => $row->image,
                    'pagesid'           => $pageNumber
                ];
            }
            $this->Storage_model->saveElement($data);
        }
        if ($this->input->post('save')) {
            $element = $this->Storage_model->getAllTitleElements();
            foreach ($element->result() as $row) {
                $fileName                   = $row->image + 1;
            }

            if(!isset($fileName)){
                $fileName                   = 1;
            }
            $this->load->library('upload');
            $config['upload_path']      = 'elements';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = 100;
            $config['max_width']        = 1024;
            $config['max_height']       = 768;
            $config['overwrite']        = TRUE;
            $config['file_name']        = $fileName;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload() && $this->input->post('itemelement2') == ' ') {
                $error = array('error'  => $this->upload->display_errors());
                $this->load->view('error', $error);

            }
            $data1 = array('upload_data'=> $this->upload->data());

            if (!$this->upload->do_upload('userfile')) {
                $error                  = array('error' => $this->upload->display_errors());
            }
            $data                       = [
                'title'                 => $this->input->post('title'),
                'description'           => $this->input->post('description'),
                'image'                 => $this->input->post('image'),
                'pagesid'               => $pageNumber
            ];
            $this->Storage_model->saveElement($data);
        }
        $data['element']                = $this->Storage_model->getAllTitleElements();
        $data['pillar']                 = $pillar;
        $data['companyName']            = $companyName;
        $data['quotation']              = $quotation;
        $data['pageNumber']             = $pageNumber;
        $data['imageElement']           = $this->Storage_model->getImageElements();
        $this->load->view('formElement', $data);
    }

    public function deleteElement($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        $deleteId                       = $this->uri->segment(7);
        $this->Storage_model->deleteElement($deleteId);
        redirect('getElement/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
    }

    public function getCost($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        if ($this->input->post('addCost')) {
            redirect('addCost/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        if ($this->input->post('back')) {
            redirect('getQuotation/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }

        if ($this->input->post('delete')) {
            echo 'sdfdsf' . $this->uri->segment(2);
        }

        $data['pillar']                 = $pillar;
        $data['companyName']            = $companyName;
        $data['quotation']              = $quotation;
        $data['pageNumber']             = $pageNumber;
        $data['cost']                   = $this->Storage_model->getAllCost($pageNumber);
        $this->load->view('allCost', $data);
    }

    public function addCost($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        if ($this->input->post('save')) {
            $data                       = [
                'title'                 => $this->input->post('title'),
                'cost'                  => str_replace(',', '.', $this->input->post('cost')),
                'pagesid'               => $pageNumber
            ];
            $this->Storage_model->saveCost($data);
        }
        if ($this->input->post('back')) {
            redirect('getCost/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        $this->load->view('formCost');
    }

    public function deleteCost($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        $deleteId                      = $this->uri->segment(7);
        $this->Storage_model->deleteCost($deleteId);
        redirect('getCost/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
    }

    public function getPlanning($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");

        if ($this->input->post('back')) {
            redirect('getQuotation/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        if ($this->input->post('addPlanning')) {
            redirect('addPlanning/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        $data['planning']             = $this->Storage_model->getAllPlanning($pageNumber);
        $data['pillar']               = $pillar;
        $data['companyName']          = $companyName;
        $data['quotation']            = $quotation;
        $data['pageNumber']           = $pageNumber;
        $this->load->view('allPlanning', $data);
    }

    public function addPlanning($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        $data['companyName'] = $this->Storage_model->switchName($companyName);

        if ($this->input->post('save')) {
            $data                     = [
                'phase'               => $this->input->post('phase'),
                'activities'          => $this->input->post('activities'),
                'responsible'         => $this->input->post('responsible'),
                'week'                => $this->input->post('week'),
                'pagesid'             => $pageNumber
            ];
            $this->Storage_model->savePlanningPage($pageNumber, $data);
            redirect('addPlanning/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        if ($this->input->post('back')) {
            redirect('getPlanning/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
        }
        $this->load->view('formPlanning', $data);
    }

    public function deletePlanning($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        $deleteId = $this->uri->segment(7);
        $this->Storage_model->deletePlanning($deleteId);
        redirect('getPlanning/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . $pageNumber);
    }

    public function convertPdf($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        $getAll                       = $this->Storage_model->getAllPages($quotation);
    }

    public function addPage($pillar, $companyName, $quotation, $page)
    {
        $this->load->model("Storage_model");
        $data                         = [
            "templateid"              => $page,
            "quotesid"                => $quotation
        ];
        $this->Storage_model->addPage($data);
        redirect('getQuotation/' . $pillar . '/' . $companyName . '/' . $quotation . '/1');
    }

    public function deletePage($pillar, $companyName, $quotation, $pageNumber)
    {
        $this->load->model("Storage_model");
        $this->Storage_model->deletePage($pageNumber);
        redirect('getQuotation/' . $pillar . '/' . $companyName . '/' . $quotation . '/' . '1');
    }
}



