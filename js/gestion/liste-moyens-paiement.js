window.addEventListener("load", function() {
  $(document.body).on("click", "section#moyens_de_paiment a#btn_ajouter_moyen", function(evt) {
    var id_moyen = $(this).attr("id");

    var input = $(this).parent().prev().find("input");
    if(input.val() == "") {
      input.addClass("is-invalid");
    } else {
      $.ajax({
        url: "../gestion/ajouter_moyen",
        method: "POST",
        data : {
          "valeur" : input.val()
        },
        success: function() {
          $('#nouveau_moyen').modal('hide');
          $('#nouveau_moyen').on('hidden.bs.modal', function (e) {
            rafraichirMoyensDePaiement()
          });
        }
      });
    }
  });

  /**
   * Rafraichi la liste des arrondissements
   */
  function rafraichirMoyensDePaiement() {
    $.ajax({
      url: "moyensDePaiements",
      method: "POST",
      success: function(reponse) {
        $("#content_panel").empty();
        $("#content_panel").append(reponse);
      }
    });
  }
});