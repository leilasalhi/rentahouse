<?php
class Messagerie_model extends CI_Model {
  /**
   * contructeur
  */
  public function __construct() {
    $this->load->database();
  }

  /**
   * ajoute un message dans la base de donnees
   *
   * @param      string  $sujet     Le sujet
   * @param      string  $texte     Le texte
   * @param      string  $emetteur  L'emetteur
   *
   * @return     INT  Le dernier ID inserer
   */
  public function ajoute_message($sujet, $texte, $emetteur) {
    //ce tableau contient toutes les données récupérées du formulaire d'insertion
    $data = array (
      "sujet" => $sujet,
      "texte" => $texte,
      "moment" => new date("Y-m-d H:i:s"),
      "emetteur" => $emetteur
    );
    $query = $this->db->insert("message", $data);
    if ($query) {
      return $this->db->insert_id();
    }
  }

  /**
   * Ajoute un liste des destinataire pour un message
   *
   * @param      INT  $idMessage        L'ID du message
   * @param      ARRAY  $destinataires  Les destinataires
   */
  public function ajoute_destinataires($idMessage, $destinataires) {

  }
}//Fin de la classe