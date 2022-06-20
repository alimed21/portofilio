<?php


class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Articles_model');
		$this->load->model('Projets_model');

	}

	public function index(){
		/** Liste des articles */
		$articles = $this->Articles_model->getThreeLastArticles();
		$data['articles'] = $articles;

		/** Liste des projets */
		$projets = $this->Projets_model->getThreeLastProjets();
		$data['projets'] = $projets;

		$this->load->view('templates/header');
		$this->load->view('pages/index', $data);
		$this->load->view('templates/footer');
	}
}
