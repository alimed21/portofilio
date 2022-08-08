<?php


class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Articles_model');
		$this->load->model('Projets_model');
		$this->load->model('Formations_model');
		$this->load->model('Services_model');
		$this->load->model('Competences_model');


	}

	public function index(){
		/** Liste des articles */
		$articles = $this->Articles_model->getThreeLastArticles();
		$data['articles'] = $articles;

		/** Liste des projets */
		$projets = $this->Projets_model->getThreeLastProjets();
		$data['projets'] = $projets;

		/** Liste des formations */
		$formations = $this->Formations_model->getAllFormation();
		$data['formations'] = $formations;

		/** Liste des services */
		$services = $this->Services_model->getAllServices();
		$data['services'] = $services;

		/** Liste des compétences */
		$competences = $this->Competences_model->getAllCompetences();
		$data['competences'] = $competences;

		$this->load->view('templates/header');
		$this->load->view('pages/index', $data);
		$this->load->view('templates/footer');
	}
}
