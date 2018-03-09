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
        <!-- espacement vide -->
        <div class="col-md-3"></div>
        <!-- sujet -->
        <div class="col-md-6">
          <p class="lead text-center my-2"><?=$messageObject->sujet?></p>
        </div>
        <!-- moment de l'envoi -->
        <div class="col-md-3">
          <p class="text-center my-2"><?=$messageObject->moment?></p>
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
  echo "<p class='lead my-3 text-center'>Vous n'avez envoyé aucun message</p>";
}
?>
</div>