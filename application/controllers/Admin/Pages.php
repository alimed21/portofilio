<?php

class Pages extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Pages_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
        if($this->session->userdata('logged_in') != TRUE)
        {
            redirect('Admin/Login');
        }
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d H:i:s');
    }

    public function index(){
        $data['title'] = 'Liste des pages';

        /** Liste des pages */
        $pages = $this->Pages_model->getAllPages();
        $data['pages'] = $pages;

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/listePages_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function ajoutPage(){
        $data['title'] = 'Ajoute d\'une page';

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/ajoutPage_view');
        $this->load->view('admin/templates/footer_view');
    }

   public function verificationAjout()
   {
        $this->form_validation->set_rules('titre', "titre", 'trim|required');
        $this->form_validation->set_rules('description', 'contenu', 'trim|required');

        if ($this->form_validation->run() == true) {

            //Config image
            $config['upload_path'] = './uploads/pages';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size'] = 3000;
            $config['max_width'] = 2300;
            $config['max_height'] = 2000;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                //True
                $titre = $this->input->post('titre');
                $titre_lien = str_replace(' ', '-', $titre);
                $description = $this->input->post('description');
                $id_user = $this->session->userdata('id_admin');
                $date_add = $this->getDatetimeNow();

                $data = array(
                    'PageTitre'   => $titre,
                    'page_lien'   => $titre_lien,
                    'CompletText' => $description,
                    'user_add'    => $id_user,
                    'date_add'    => $date_add
                );
                $addPages = $this->Pages_model->addPage($data);

                if ($addPages = true) {
                    $this->session->set_flashdata('sucess', 'Ajout page réussi');
                    redirect('Admin/Pages/');
                } else {
                    $this->session->set_flashdata('error', 'Veuillez réessayer.');
                    redirect('Admin/Pages/ajoutPage');
                }
            } else {
                //True
                $full_path = $this->upload->data('file_name');
                $titre = $this->input->post('titre');
                $titre_lien = str_replace(' ', '-', $titre);
                $description = $this->input->post('description');
                $id_user = $this->session->userdata('id_admin');
                $date_add = $this->getDatetimeNow();

                $data = array(
                'PageTitre' => $titre,
                    'page_lien' => $titre_lien,
                    'CompletText' => $description,
                    'userfile' => $full_path,
                    'user_add'    => $id_user,
                    'date_add'    => $date_add
                );
                $addPages = $this->Pages_model->addPage($data);

                if ($addPages = true) {
                    $this->session->set_flashdata('sucess', 'Ajout page réussi');
                    redirect('Admin/Pages/');
                } else {
                    $this->session->set_flashdata('error', 'Veuillez réessayer.');
                    redirect('Admin/Pages/ajoutPage');
                }
            }
        } else {
            //False
            $this->ajoutPage();
        }  
   }

}


?>