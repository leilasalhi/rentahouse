<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model("Usagers_model");
    $this->load->model("Appartements_model");
    $this->load->model("Arrondissements_model");
    $this->load->helper("url_helper");
    $this->load->library('session');
    $this->load->library('modalmenus');
    $this->load->helper('date');
  }

  public function index() {
    if($this->session->userdata("nomUsager")){
      if ( !file_exists(APPPATH.'views/accueil/index.php')) {
        show_404 ();
      } else {
        //Mets les infos de l'usager dans une variable
        $data['utilisateur'] = $this->session->get_userdata();
        //Charge les menus
        $data['menus'] = $this->modalmenus->chargeMenus();

        $data["titre"] = "ACCUEIL";//Le titre de la page
        $this->load->view("templates/header.php", $data);
        $this->load->view("templates/barre-rouge.php", $data);
        $this->load->view("accueil/index.php", $data);
        $this->load->view("accueil/modal.php", $data);
        $this->load->view("templates/footer.php", $data);
      }
    } else {
      header("Location: ".base_url());
    }
  }

}

