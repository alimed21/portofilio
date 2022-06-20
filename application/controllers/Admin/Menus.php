<?php

class Menus extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Menu_model');
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
        $data['title'] = 'Liste des menus';

        /** Liste des articles */
        $menus = $this->Menu_model->getAllMenu();
        $data['menus'] = $menus;
        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/listeMenus_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function ajoutMenu(){
        $data['title'] = 'Ajout d\'un menu';

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/ajoutMenu_view');
        $this->load->view('admin/templates/footer_view');
    }

    public function verificationAjout()
    {
        $this->form_validation->set_rules('titre', "titre", 'trim|required');
        $this->form_validation->set_rules('date_art', 'date', 'trim|required');
        $this->form_validation->set_rules('description', 'contenu', 'trim|required');

        if ($this->form_validation->run() == true) {
            //True

            //Config image
            $config['upload_path'] = './uploads/article';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size'] = 10000;
            $config['max_width'] = 2000;
            $config['max_height'] = 1990;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                
                $data['error_message'] = $this->upload->display_errors();
                $data['title'] = 'Ajoute d\'un article';

                $this->load->view('admin/templates/header_view', $data);
                $this->load->view('admin/pages/ajoutArticles_view', $data);
                $this->load->view('admin/templates/footer_view');
            }
            else{
                //True
                $titre = $this->input->post('titre');
                $date_art = $this->input->post('date_art');
                $description = $this->input->post('description');
                $full_path = strtolower($this->upload->data('file_name'));
                $token =  random_string('alnum', 7);
                $id_admin = $this->session->userdata('id_admin');
                $date_add = $this->getDatetimeNow();
                
                $data = array(
                    'article_title' => $titre,
                    'article_content' => $description,
                    'article_image_path ' => $full_path,
                    'article_date ' => $date_art,
                    'token ' => $token,
                    'user_add ' => $id_admin,
                    'date_add ' => $date_add
                );

                $ajoutArticle = $this->Articles_model->addArticle($data);

                if ($ajoutArticle = true) {
                    $this->session->set_flashdata('success', 'Votre article a été ajouté');
					redirect('Admin/Articles/', 'refresh');
                }
                else{
                    $this->session->set_flashdata('error', "Votre article n'a pas été ajouté");
					redirect('Admin/Articles/ajoutArticle', 'refresh');
                }
            }
        }
        else{
            $this->ajoutArticle();
        }
    }

}


?>