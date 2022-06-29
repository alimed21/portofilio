<?php


class Formations extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Formations_model');
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
		$data['title'] = 'Liste des formations';

		/** Liste des formations */
		$formations = $this->Formations_model->getAllFormation();
		$data['formations'] = $formations;

		$this->load->view('admin/templates/header_view', $data);
		$this->load->view('admin/pages/listeProjets_view', $data);
		$this->load->view('admin/templates/footer_view');
	}

	public function ajoutFormation(){
		$data['title'] = 'Ajoute d\'une formation';

		$this->load->view('admin/templates/header_view', $data);
		$this->load->view('admin/pages/ajoutFormation_view');
		$this->load->view('admin/templates/footer_view');
	}

}
