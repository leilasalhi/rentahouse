<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="list-group">
<?php
if(count($liste_messages) > 0) {
  foreach ($liste_messages as $messageObject) {
  ?>
    <a href="#" class="container d-block list-group-item list-group-item-action" data-toggle="collapse" data-target="#message_<?=$messageObject->idMessage?>" aria-expanded="false" aria-controls="message_<?=$messageObject->idMessage?>">
      <section class="row">
        <!-- emetteur -->
        <div class="col-md-3">
          <p class="my-2 text-center">Envoyé par : <span class="badge badge-primary"><?=$messageObject->emetteur?></span></p>
        </div>
        <!-- moment de l'envoi sur petits ecrans -->
        <div class="d-md-none col-md-3">
          <p class="my-2 text-center"><?=$messageObject->moment?></p>
        </div>
        <!-- sujet -->
        <div class="col-md-6">
          <p class="lead text-center my-2"><?=$messageObject->sujet?></p>
        </div>
        <!-- moment de l'envoi -->
        <div class="d-none d-md-block col-md-3">
          <p class="my-2 text-center"><?=$messageObject->moment?></p>
        </div>
      </section>
      <div class="collapse mt-3" id="message_<?=$messageObject->idMessage?>">
        <div class="card card-body">
          <p><?=nl2br($messageObject->texte)?></p>
        </div>
      </div>
    </a>
  <?php
  }
} else {
  echo "<p class='lead my-3 text-center'>Vous n'avez reçu aucun message</p>";
}
?>
</div>