<?php

class Competences extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Competences_model');
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
        $data['title'] = 'Liste des compétences';

        /** Liste des compétences */
        $competences = $this->Competences_model->getAllCompetences();
        $data['competences'] = $competences;
        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/listeCompetences_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function ajoutComptence(){
        $data['title'] = 'Ajoute d\'une compétence';

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/ajoutCompetences_view');
        $this->load->view('admin/templates/footer_view');
    }

    public function verificationAjout()
    {
        $this->form_validation->set_rules('titre', "titre", 'trim|required');
        $this->form_validation->set_rules('tail', 'taille', 'trim|required');

        if ($this->form_validation->run() == true) {
            //True
            $titre = $this->input->post('titre');
            $tail = $this->input->post('tail');
            $id_admin = $this->session->userdata('id_admin');
            $date_add = $this->getDatetimeNow();
            
            $data = array(
                'titre_cmp' => $titre,
                'taille_cmp' => $tail,
                'id_admin_add' => $id_admin,
                'date_add ' => $date_add
            );

            $ajoutCompetence = $this->Competences_model->addCompetence($data);

            if ($ajoutCompetence = true) {
                $this->session->set_flashdata('success', 'Votre compétence a été ajouté');
                redirect('Admin/Competences/', 'refresh');
            }
            else{
                $this->session->set_flashdata('error', "Votre compétence n'a pas été ajouté");
                redirect('Admin/Competences/ajoutComptence', 'refresh');
            }
        }
        else{
            $this->ajoutComptence();
        }
    }

	/** Supprimer un article */
	public function supprimerArticle($token){

		$id_admin = $this->session->userdata('id_admin');
		$date_add = $this->getDatetimeNow();

		$data = array(
			'user_delete' => $id_admin,
			'date_delete' => $date_add,
		);

		$supprimerArticle = $this->Articles_model->suppremierArticle($data, $token);

		if ($supprimerArticle = true)
		{
			$this->session->set_flashdata('success', "Suppression de l'article réussi");
			redirect('Admin/Articles');
		}
		else{
			$this->session->set_flashdata('error', 'Veuillez réessayer.');
			redirect('Admin/Articles');
		}
	}

	/** Modifier un article */
	public function modifierArticle($token){
		$data['title'] = 'Modification d\'un article';
		/**  Récupération des articles */
		$articlesDetail = $this->Articles_model->getDetailArticle($token);
		$data['articlesDetail'] = $articlesDetail;

		$this->load->view('admin/templates/header_view', $data);
		$this->load->view('admin/pages/modifierArticle_view', $data);
		$this->load->view('admin/templates/footer_view');
	}

	public function modificationArticle(){
		$this->form_validation->set_rules('titre', "titre", 'trim|required');
		$this->form_validation->set_rules('date_art', 'date', 'trim|required');
		$this->form_validation->set_rules('description', 'contenu', 'trim|required');

		$token = $this->input->post('token');

		if ($this->form_validation->run() == true){
			//true
			$title = $this->input->post('titre');
			$date = $this->input->post('date_art');
			$description = $this->input->post('description');


			$data = array(
				'article_title'             => $title,
				'article_content'           => $description,
				'article_date'              => $date
			);

			$updateArticle = $this->Articlesa_model->updateArticle($data, $token);
			if ($updateArticle = true)
			{
				$this->session->set_flashdata('success', 'Modification article réussi');
				redirect('Admin/Articles/');
			}
			else{
				$this->session->set_flashdata('error', 'Veuillez réessayer.');
				redirect('Admin/Articles/modifierArticle/'.$token);
			}
		}
		else{
			//false
			$this->modifierArticle($token);
		}
	}
}


?>
