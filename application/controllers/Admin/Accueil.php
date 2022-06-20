<?php 
class Accueil extends CI_Controller{
    public function __construct(){
        parent::__construct();
		$this->load->model('admin/Accueil_model');
        $this->load->model('admin/Commandes_model');
        $this->load->model('admin/Clients_model');

		if($this->session->userdata('logged_in') != TRUE)
        {
            redirect('Admin/Login');
        }
    }

    public function index(){
        $data['title'] = 'Accueil';
        /** Nombre des clients inscrits*/
        $clientsInscrits = $this->Accueil_model->clientsInscrit();
        $data['clientsInscrits'] = $clientsInscrits;

        /** Nombre des commandes */
        $cmdLivree = "Commande livrée";

        $cmdAnnuler = "Commande annuler";

        $nombresCommandes = $this->Commandes_model->nombresCommandes($cmdLivree, $cmdAnnuler);
        $data['nombresCommandes'] = $nombresCommandes;

        /** Nombre des commandes livrées */
        $cmdLivree = "Commande livrée";

        $nombresCommandesLivrer = $this->Commandes_model->nombresCommandesLivrer($cmdLivree);
        $data['nombresCommandesLivrer'] = $nombresCommandesLivrer;

        /** Montant encaissé des commandes livrées */
        $cmdLivree = "Commande livrée";

        $montantEncaisses = $this->Commandes_model->montantEncaisses($cmdLivree);
        $data['montantEncaisses'] = $montantEncaisses;

        /** Last 5 commandes*/
        $lastCommandes = $this->Commandes_model->lastCommandes();
        $data['lastCommandes'] = $lastCommandes;

        /** Last 5 clients*/
        $lastClients = $this->Clients_model->lastClients();
        $data['lastClients'] = $lastClients;

        /** Categories */
        $allCategories = $this->Accueil_model->allCategories();
        $data['allCategories'] = $allCategories;

        /** Sous-Categories */
        $allSousCategories = $this->Accueil_model->countAllSousCategories();
        $data['allSousCategories'] = $allSousCategories;

        //var_dump($data['allSousCategories']);die;

        $this->load->view('admin/templates/header_view', $data);
        $this->load->view('admin/pages/dashbord_view', $data);
        $this->load->view('admin/templates/footer_view');
    }
}