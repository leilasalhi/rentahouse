window.addEventListener("load", function() {

  // //Tableau des destinataires
  var destinataires = [];

  //Affichera la liste des message par defaut
  liste_messages();


  /**
   * Affiche la liste des messages dans
   */
  function liste_messages() {
    $.ajax({
      url: "liste_messages/"+$("h5#gestionCompte").text(),
      method: "POST",
      success: function(reponse) {
        $("#content_box").empty();
        $("#content_box").append(reponse);
      }
    });
  }

  /**
   * Affichera le formulaire pour ecrire un nouveau message et activera les scripts
   */
  function nouveau_message() {
    //Appel pour obtenir le contenu du formulaire
    $.ajax({
      url: "nouveau_message",
      method: "POST",
      success: function(reponse) {
        $("#content_box").empty();
        $("#content_box").append(reponse);
      }
    });
  }//Fin de la fonction nouveau_message()


  /**
   * Affiche la liste des messages envoyes
   */
  function liste_message_envoyes() {
    $.ajax({
      url: "liste_message_envoyes/"+$("h5#gestionCompte").text(),
      method: "POST",
      success: function(reponse) {
        $("#content_box").empty();
        $("#content_box").append(reponse);
      }
    });
  }

  //Ecoute les clics sur les menus de naviguation
  $(document.body).on("click", "nav a.nav-item:not(.disabled):not(.active)", function(evt) {
    $("nav a.nav-item.active").removeClass("active");
    $(this).addClass("active");
    //l'ID du <a> permettra de savoir quel action effectuer
    switch(this.id) {
      //Lorsqu'on veut voir la liste des messages recus
      case "btn_boite_message" :
        liste_messages();
      break;
      //lorsqu'on veut envoyer un nouveau message
      case "btn_nouv_message" :
        destinataires = [];
        nouveau_message();
      break;
      //lorsqu'on veut voir les messages
      case "btn_boite_message_envoyes" :
        liste_message_envoyes();
      break;
    }
  });//Fin de l'evenement click sur les nav-tabs

  //Lors du clic sur le bouton d'ajout de destinataires
  $(document.body).on("click", "button#btn_ajouter_destinataire", function(evt) {
    let inputDestinataire = $("input#destinataire");
    if(inputDestinataire.val().trim() == "") {
      inputDestinataire.addClass("is-invalid");
    } else {
      //Retire le status d'erreur de l'input
      inputDestinataire.removeClass("is-invalid");
      //Si la valeur n'est pas trouvee dans le tableau
      if(destinataires.includes(inputDestinataire.val().trim()) == false) {
        //Verifie que l'usager demande existe
        $.ajax({
          url: "../usagers/obtenir_usager",
          method: "POST",
          data : {
            "nomUsager" : inputDestinataire.val().trim()
          },
          success: function(reponse) {
            if(reponse.existe == true) {
              //Ajoute le nouveau destinataire dans la liste
              destinataires.push(inputDestinataire.val().trim());
              //Si l'utilisateur n'existe pas dans la liste actuelle, on pourra l'ajouter
              $("div#liste_destinataire").append("<span class='badge badge-pill badge-light py-1 px-2 m-1'>"+inputDestinataire.val().trim()+"&nbsp<a href='#' onclick='return false'><i class='far fa-times-circle'></i></a></span>");
              //Et on vide l'input
              inputDestinataire.val("");
            } else {
              inputDestinataire.addClass("is-invalid");
            }
          }
        });
      }
    }
  });//Fin de l'evenement click sur le bouton ajouter destinataire

  //Lorsqu'on clique pour supprimer un destinataire
  $(document.body).on("click", "div#liste_destinataire span a", function(evt) {
    $(this).parent().remove();
    var i = destinataires.indexOf($(this).parent().text().trim());
    if(i != -1) {
      destinataires.splice(i, 1);
    }
  });//Fin evenement suppression destinataire

  //Lorsqu'on soumet le formulaire
  $(document.body).on("click", "section#formulaire_message button#btn_submit", function(evt) {
    let inputs = [$("input#sujet"), $("textarea#message")];
    let peutEnvoyer = true;
    if(destinataires.length < 1){
      peutEnvoyer = false;
      $("input#destinataire").addClass("is-invalid");
    } else {
      $("input#destinataire").removeClass("is-invalid");
    }
    inputs.forEach(function(element){
      if(element.val().trim() == "") {
        peutEnvoyer = false;
        element.addClass("is-invalid");
      } else {
        element.removeClass("is-invalid");
      }
    });
    if(peutEnvoyer) {
      $.ajax({
        url: "envoyer_message",
        method: "POST",
        data : {
          "destinataires" : destinataires,
          "sujet" : $("input#sujet").val(),
          "message" : $("textarea#message").val()
        },
        success: function(reponse) {
          console.log(reponse);
          $("#content_box").empty();
          $("#content_box").append(reponse);
        }
      });
    }
  });//fin du click sur submit

});// fin de l'ecouteur load