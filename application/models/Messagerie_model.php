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
      "moment" => date("Y-m-d H:i:s"),
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
    $succes = true;
    foreach ($destinataires as $nomUsager) {
      if(!$this->db->insert("recevoir", array('idMessage' => $idMessage, 'Recepteur' => $nomUsager))){
        $succes = false;
      }
    }
    return $succes;
  }

  public function liste_messages_usager($nomUsager) {
    $this->db->select("*");
    $this->db->from('message');
    $this->db->join('recevoir', 'message.idMessage = recevoir.idMessage');
    $this->db->where("recevoir.Recepteur", $nomUsager);
    $query = $this->db->get();
    return $query->result();
  }

  /**
   * Retourne un liste des messages envoyes pour un usager
   *
   * @param      STRING  $nomUsager  The nom usager
   */
  public function liste_messages_envoyes_usager($nomUsager) {
    $this->db->order_by('idMessage', 'DESC');
    $query = $this->db->get_where("message", array("emetteur" => $nomUsager));
    return $query->result();
  }
}//Fin de la classe