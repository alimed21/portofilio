<?php

class Articles extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Articles_model');
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
        $data['title'] = 'Liste des articles';

        /** Liste des articles */
        $articles = $this->Articles_model->getAllArticle();
        $data['articles'] = $articles;
        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/listeArticles_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function ajoutArticle(){
        $data['title'] = 'Ajoute d\'un article';

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/ajoutArticles_view');
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

	/** Modifier Image */
	public function ModifierImage($token){
		$data['title'] = 'Modification l\'image d\'un article';
		/**  Récupération l'image de l'article */
		$articlesImage = $this->Articles_model->getImageArticle($token);
		$data['articlesImage'] = $articlesImage;

		$this->load->view('admin/templates/header_view', $data);
		$this->load->view('admin/pages/modifierImageArticle_view', $data);
		$this->load->view('admin/templates/footer_view');
	}

	public function modificationImage(){
		$token = $this->input->post('token');

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

			$data['title'] = 'Liste des articles';

			/** Liste des articles */
			$articles = $this->Articles_model->getAllArticle();
			$data['articles'] = $articles;
			$this->load->view('admin/templates/header_view', $data);
			$this->load->view('admin/pages/listeArticles_view', $data);
			$this->load->view('admin/templates/footer_view');
		}
		else{
			$full_path = $this->upload->data('file_name');
			$data = array(
				'article_image_path' => strtolower($full_path)
			);

			$updateImageArticle = $this->Articles_model->updateImageArticle($data, $token);
			if ($updateImageArticle = true)
			{
				$this->session->set_flashdata('success', "Modification de l'image article réussi");
				redirect('Admin/Articles/');
			}
			else{
				$this->session->set_flashdata('error', 'Veuillez réessayer.');
				redirect('Admin/Articles/ModifierImage/'.$token);
			}
		}


	}
}


?>
