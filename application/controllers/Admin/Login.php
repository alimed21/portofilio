<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/Login_model');
    }
	public function index()
	{
		$this->load->view('admin/login_view');
	}

	/** Fonction qui va vérifié si les données de l'utilisateur sont correct */
	public function verificationUser(){
		$this->form_validation->set_rules('username', 'Nom d\'utilisateur', 'required');
		$this->form_validation->set_rules('pass', 'Mot de passe', 'required');

		//Vérification si les champs ne sont pas vide
		if ($this->form_validation->run() == FALSE){
			//Dans le cas ou un ou plusieurs champs sont vide
			//Redirection vers la page de connexion pour afficher les erreurs
			$this->index();
		}
		else{
			//Si les champs ne sont pas vide alors nous allons créer des variables pour recupère les données saisies par l'utilisateur
			$username = $this->input->post('username');

			//Pour le mot de passe on va le crypte avec le MD5 c'est déconseil mais on va juste utilisé pour ce tuto
			$pass = md5($this->input->post('pass'));

			//Une fois créer les variables nous allons créer un Model et envoyer ses données 
			$donneUtilisateur = $this->Login_model->verificationDonnees($username, $pass);

			if($donneUtilisateur != NULL){
				//Si les données sont corrects, nous allons créer sa session
				$newdata = array(
					'id_admin'   => $donneUtilisateur[0]->id_admin,
					'login_admin'  => $donneUtilisateur[0]->login_admin,
					'email_admin'     => $donneUtilisateur[0]->email_admin,
					'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);

				//Une fois la session est créer alors nous allons le rédiriger vers la page d'accueil
				redirect('Admin/Articles');
			}
			else{
				//Si les données sont incorrects nous allons afficher un message d'erreur
				$this->session->set_flashdata('error', 'Le nom d\'utilisateur ou le mot de passe est incorrect.');
				redirect('Login');
			}

		}
	}

    public function logout()
	{
        $this->session->unset_userdata('id_user');
        session_destroy();
        redirect('Admin/Login', 'refresh');
	}
}
