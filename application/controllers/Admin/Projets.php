<?php

class Projets extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Projets_model');
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
        $data['title'] = 'Liste des projets';

        /** Liste des projets */
        $projets = $this->Projets_model->getAllProjet();
        $data['projets'] = $projets;

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/listeProjets_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function ajoutProjet(){
        $data['title'] = 'Ajoute d\'un projet';

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/ajoutProjet_view');
        $this->load->view('admin/templates/footer_view');
    }

   public function verificationAjout()
    {
        $this->form_validation->set_rules('titre', "titre", 'trim|required');
        $this->form_validation->set_rules('date_art', 'date', 'trim|required');
        $this->form_validation->set_rules('lien', 'lien', 'trim|required');
        $this->form_validation->set_rules('etat', 'etat', 'trim|required');
        $this->form_validation->set_rules('description', 'contenu', 'trim|required');

        if ($this->form_validation->run() == true) {
            //True

            //Config image
            $config['upload_path'] = './uploads/projets';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size'] = 10000;
            $config['max_width'] = 2000;
            $config['max_height'] = 1990;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                
                $data['error_message'] = $this->upload->display_errors();
                $data['title'] = 'Ajoute d\'un projet';

                $this->load->view('admin/templates/header_view', $data);
                $this->load->view('admin/pages/ajoutProjet_view', $data);
                $this->load->view('admin/templates/footer_view');
            }
            else{
                //True
                $titre = $this->input->post('titre');
                $lien = $this->input->post('lien');
                $date_art = $this->input->post('date_art');
                $description = $this->input->post('description');
                $etat = $this->input->post('etat');
                $full_path = strtolower($this->upload->data('file_name'));
                $token =  random_string('alnum', 7);
                $id_admin = $this->session->userdata('id_admin');
                $date_add = $this->getDatetimeNow();
                
                $data = array(
                    'titre_pro' => $titre,
                    'contenu_pro' => $description,
                    'date_pro' => $date_art,
                    'lien ' => $lien,
                    'image_pro ' => $full_path,
                    'type ' => $etat,
                    'token' => $token,
                    'user_add ' => $id_admin,
                    'date_add ' => $date_add
                );

                $ajoutProjet = $this->Projets_model->addProjet($data);

                if ($ajoutProjet = true) {
                    $this->session->set_flashdata('success', 'Votre projet a été ajouté');
					redirect('Admin/Projets/', 'refresh');
                }
                else{
                    $this->session->set_flashdata('error', "Votre projet n'a pas été ajouté");
					redirect('Admin/Projets/ajoutProjet', 'refresh');
                }
            }
        }
        else{
            $this->ajoutProjet();
        }
    }

	/** Supprimer un projet phare*/
	public function supprimerProjet($token){

		$id_user = $this->session->userdata('id_admin');
		$date_add = $this->getDatetimeNow();

		$data = array(
			'user_delete' => $id_user,
			'date_delete' => $date_add,
		);

		$supprimerProjetPhare= $this->Projets_model->suppremierProjet($data, $token);

		if ($supprimerProjetPhare = true)
		{
			$this->session->set_flashdata('success', "Suppression d'un projet phare réussi");
			redirect('Admin/Projets');
		}
		else{
			$this->session->set_flashdata('error', 'Veuillez réessayer.');
			redirect('Admin/Projets');
		}
	}

}


?>
