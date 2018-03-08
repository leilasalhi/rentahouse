<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Messagerie extends CI_Controller {

  /**
   * contructeur de la classe
   */
  public function __construct() {
    parent::__construct();
    $this->load->model("messagerie_model");
    $this->load->library('modalmenus');
    $this->load->helper("url_helper");
    $this->load->library('session');
    $this->load->helper('date');
  }

  /**
   * Charge la page de messagerie
   */
  public function index() {
    if($this->session->userdata("nomUsager")){
      if ( !file_exists(APPPATH.'views/accueil/index.php')) {
        show_404 ();
      } else {
        //Mets les infos de l'usager dans une variable
        $data['utilisateur'] = $this->session->get_userdata();
        //Charge les menus
        $data['menus'] = $this->modalmenus->chargeMenus();
        $data['scripts'] = [base_url().'js/messagerie/script.js'];

        $data["titre"] = "MESSAGERIE";//Le titre de la page
        $this->load->view("templates/header.php", $data);
        $this->load->view("templates/barre-rouge.php", $data);
        $this->load->view("messagerie/index.php", $data);
        $this->load->view("templates/modalmenus.php", $data);
        $this->load->view("templates/footer.php", $data);
      }
    } else {
      header("Location: ".base_url());
    }
  }

  /**
   * Retourne une vue partielle etant la liste des messages d'un usager
   *
   * @param      STRING  $nomUsager  Le nom de l'usager
   */
  public function liste_messages($nomUsager) {
    //Si l'usager qu'on veut afficher les messages est celui dans la session
    if($this->session->userdata("nomUsager") == $nomUsager){
      if ( !file_exists(APPPATH.'views/messagerie/liste-messages.php')) {
        show_404 ();
      } else {
        $data['liste_messages'] = "liste";
        $this->load->view("messagerie/liste-messages.php", $data);
      }
    } else {
      header("Location: ".base_url());
    }
  }

  /**
   * Retourne une vue partielle etant la liste des messages envoyes d'un usager
   *
   * @param      STRING  $nomUsager  Le nom de l'usager
   */
  public function liste_message_envoyes($nomUsager) {
    //Si l'usager qu'on veut afficher les messages est celui dans la session
    if($this->session->userdata("nomUsager") == $nomUsager){
      if ( !file_exists(APPPATH.'views/messagerie/liste-messages-envoyes.php')) {
        show_404 ();
      } else {
        $data['liste_messages'] = "liste";
        $this->load->view("messagerie/liste-messages-envoyes.php", $data);
      }
    } else {
      header("Location: ".base_url());
    }
  }

  /**
   * Affiche le formulaire de creation de message sous forme de vue partielle
   */
  public function nouveau_message() {
    //Si l'usager qu'on veut afficher les messages est celui dans la session
    if($this->session->userdata("nomUsager")){
      if ( !file_exists(APPPATH.'views/messagerie/form-nouv-message.php')) {
        show_404 ();
      } else {
        $data['liste_messages'] = "liste";
        $this->load->view("messagerie/form-nouv-message.php", $data);
      }
    } else {
      header("Location: ".base_url());
    }
  }

  /**
   * Insere dans la base de donnees un nouveau message
   */
  public function envoyer_message() {
    //Si l'usager qu'on veut afficher les messages est celui dans la session
    if($this->session->userdata("nomUsager")){
      $destinataires = $this->input->post("destinataires");
      $sujet = $this->input->post("sujet");
      $message = $this->input->post("message");
      var_dump($destinataires, $sujet, $message);
    } else {
      header("Location: ".base_url());
    }
  }
}//Fin de la classe