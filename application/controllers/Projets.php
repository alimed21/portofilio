<?php


class Projets extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Projets_model');
		$this->load->library('pagination');
	}

	public function index(){
		/** Configuration tous les articles */
		$row =  $this->Projets_model->record_count();

		$config = array();

		$config["base_url"] = base_url() . "Projets/index";

		$config["total_rows"] = $row;

		$config["per_page"] = 9;

		$config["uri_segment"] = 3;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );

		$results = $this->Projets_model->fetch_article($config["per_page"], $page);
		$data['results'] = $results;

		$links = explode('&nbsp;',$str_links );
		$data['links'] = $links;

		$this->load->view('templates/header');
		$this->load->view('pages/projets', $data);
		$this->load->view('templates/footer');
	}

	public function detailProjet($token){
		/** Detail projet by token */
		$projets = $this->Projets_model->getDetailProjet($token);
		$data['projets'] = $projets;

		$this->load->view('templates/header');
		$this->load->view('pages/detailProjet', $data);
		$this->load->view('templates/footer');
	}
}
