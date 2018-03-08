<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- <script type='text/javascript' src="<?=base_url();?>js/messagerie/script.js"></script> -->
<link rel="stylesheet" href="<?=base_url();?>css/messagerie/stylesheet.css">
<div class="container">
  <section class="mt-5">
    <nav class="nav nav-tabs nav-fill">
      <a id="btn_boite_message" class="nav-item nav-link active" href="#" onclick="return false"><i class="far fa-envelope mr-2"></i>Boîte de messagerie</a>
      <a id="btn_nouv_message" class="nav-item nav-link" href="#" onclick="return false"><i class="fas fa-pencil-alt mr-2"></i>Écrire un message</a>
      <a id="btn_boite_message_envoyes" class="nav-item nav-link" href="#" onclick="return false"><i class="fas fa-share-square mr-2"></i>Messages envoyés</a>
    </nav>
    <div class="card border-top-0 rounded-0">
      <div id="content_box" class="card-body">

      </div>
    </div>
  </section>
</div>