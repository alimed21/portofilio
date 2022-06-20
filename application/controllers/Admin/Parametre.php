<?php 
class Parametre extends CI_Controller{
    public function __construct(){
        parent::__construct();
		$this->load->model('admin/Accueil_model');
        $this->load->model('admin/Commandes_model');
        $this->load->model('admin/Clients_model');
        $this->load->model('admin/Parametres_model');
        $this->load->library('form_validation');
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
        $this->load->view('admin/pages/password_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function changePassword(){
        $this->form_validation->set_rules('lastPassword', "ancien mot de passe", 'trim|required');
        $this->form_validation->set_rules('newPassword', "nouveau mot de passe", 'trim|required');
        $this->form_validation->set_rules('cnfnewPassword', "confirmation du nouveau mot de passe", 'trim|required');

        if ($this->form_validation->run() == true) {
            $lastPassword = md5($this->input->post('lastPassword'));
            $newPassword = md5($this->input->post('newPassword'));
            $cnfnewPassword = md5($this->input->post('cnfnewPassword'));

            $idUser = $this->session->userdata('id_user');

            //Recuperation de l'ancien mot de passe
            $lastPasswordUser = $this->Parametres_model->getLastePasswordUser($idUser);
            $data['lastPasswordUser'] = $lastPasswordUser;

            foreach($lastPasswordUser as $pass){
                $passwordUser = $pass->password;
            }

            //Comparaison entre les deux anciens mot de passe

            if($lastPassword == $passwordUser){
                //Voir si le nouveau mot de passe est pareil que la confirmation
                if($newPassword == $cnfnewPassword){
                    //Modification du mot de passe
                    $data = array(
                        'password' => $newPassword
                    );
                    $updatePassword = $this->Parametres_model->changePassword($idUser, $data);
                    
                    if ($updatePassword = true) {
                        $this->session->set_flashdata('success', 'Votre mot de passe a bien été modifié');
                        redirect('Admin/Login/logout', 'refresh');
                    } 
                    else {
                        $this->session->set_flashdata('error', 'Veuillez réessayer.');
                        redirect('Admin/Parametre', 'refresh');
                    }   
                }
                else{
                    $this->session->set_flashdata('error', 'Les deux mot des passes ne sont pas identiques.');
                    redirect('Admin/Parametre', 'refresh');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Votre ancien mot de passe est erroné validée.');
                redirect('Admin/Parametre', 'refresh');
            }
            

        }
        else{
            $this->index();
        }
    }
}