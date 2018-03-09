<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="moyens_de_paiment">
  <!-- Modal -->
  <div class="modal fade" id="nouveau_moyen" tabindex="-1" role="dialog" aria-labelledby="nouveau_moyen" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="nouveau_moyen">Ajouter un moyen de paimement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nomArrondissement">Nom du moyen de paiment</label>
            <input type="text" class="form-control" id="nomMoyen" aria-describedby="nomMoyenHelp">
            <small id="nomMoyenHelp" class="form-text text-muted">Vous pourrez toujours le modifier par la suite</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <a id="btn_ajouter_moyen" href="#" onclick="return false" class="btn btn-primary">Sauvegarder</a>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex flex-wrap justify-content-center pt-3 pt-md-4 pt-lg-5">
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nouveau_moyen" aria-expanded="false" aria-controls="nouveau_moyen">
      Ajouter un moyen
    </button>
  </div>
  <div class="p-3 p-md-4 p-lg-5">
    <div class="row">
      <?php
      // var_dump("<pre>",$moyens_paiment, "</pre>");
      foreach ($moyens_paiment as $moyen) {
        ?>
        <div class="col-lg-6 col-xl-4 p-2">
          <div class="card">
            <div class="card-body">
              <p class="lead text-center p-0 my-2"><?=$moyen->typePaiem?></p>
            </div>
          </div>
        </div>
        <?php
      };
      ?>
    </div>
  </div>
</section>