<section id="formulaire_message">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label class="lead" for="destinataire">Destinataires</label>
      <div class="d-flex">
        <input type="text" class="form-control" id="destinataire">
        <button id="btn_ajouter_destinataire" class="btn btn-outline-primary ml-2">
          <i class="fas fa-plus-circle"></i>
        </button>
      </div>
    </div>
    <!-- liste des destinataires -->
    <div id="liste_destinataire" class="col-md-8 mb-3 d-flex flex-wrap align-items-center"></div>
  </div>
  <div class="form-group">
    <label class="lead" for="sujet">Sujet</label>
    <input type="email" class="form-control" id="sujet" placeholder="Le sujet du message">
  </div>
  <div class="form-group">
    <label class="lead" for="message">Message</label>
    <textarea class="form-control" id="message" placeholder="Écrivez votre message ici"></textarea>
  </div>
  <button id="btn_submit" class="btn btn-primary">Envoyer le message</button>
</section>