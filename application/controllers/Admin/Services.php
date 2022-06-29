<?php

class Services extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Services_model');
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
        $data['title'] = 'Liste des services';

        /** Liste des services */
        $services = $this->Services_model->getAllServices();
        $data['services'] = $services;

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/listeServices_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function ajoutService(){
        $data['title'] = 'Ajoute d\'un service';

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/ajoutService_view');
        $this->load->view('admin/templates/footer_view');
    }

   public function verificationAjout()
    {
        $this->form_validation->set_rules('titre', "titre", 'trim|required');
        $this->form_validation->set_rules('description', 'contenu', 'trim|required');

        if ($this->form_validation->run() == true) {
            //True

            //Config image
            $config['upload_path'] = './uploads/service';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size'] = 10000;
            $config['max_width'] = 2000;
            $config['max_height'] = 1990;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                
                $data['error_message'] = $this->upload->display_errors();
                $data['title'] = 'Ajoute d\'un service';

                $this->load->view('admin/templates/header_view', $data);
                $this->load->view('admin/pages/ajoutService_view', $data);
                $this->load->view('admin/templates/footer_view');
            }
            else{
                //True
                $titre = $this->input->post('titre');
                $description = $this->input->post('description');
                $full_path = strtolower($this->upload->data('file_name'));
                $token =  random_string('alnum', 7);
                $id_admin = $this->session->userdata('id_admin');
                $date_add = $this->getDatetimeNow();
                
                $data = array(
                    'titre_ser' => $titre,
                    'intro_ser' => $description,
                    'image_ser ' => $full_path,
                    'token_ser' => $token,
                    'user_add ' => $id_admin,
                    'date_add ' => $date_add
                );

                $ajoutService = $this->Services_model->addService($data);

                if ($ajoutProjet = true) {
                    $this->session->set_flashdata('success', 'Votre service a été ajouté');
					redirect('Admin/Services/', 'refresh');
                }
                else{
                    $this->session->set_flashdata('error', "Votre service n'a pas été ajouté");
					redirect('Admin/Services/ajoutService', 'refresh');
                }
            }
        }
        else{
            $this->ajoutService();
        }
    }

	/** Supprimer un service*/
	public function supprimerService($token){

		$id_user = $this->session->userdata('id_admin');
		$date_add = $this->getDatetimeNow();

		$data = array(
			'user_delete' => $id_user,
			'date_delete' => $date_add
		);

		$supprimerServices= $this->Services_model->suppremierService($data, $token);

		if ($supprimerServices = true)
		{
			$this->session->set_flashdata('success', "Suppression d'un service réussi");
			redirect('Admin/Services');
		}
		else{
			$this->session->set_flashdata('error', 'Veuillez réessayer.');
			redirect('Admin/Services');
		}
	}


}


?>
