<div id="mesAppartements">
  <?php if(!$mesLocations){?>
    <p class="aucuneLocation">Vous n'avez aucune location</p>
  <?php } else {?>
  <?php foreach($mesLocations as $location){?>
    <div class="detailAppart">
      <div class="detailLog row">
        <div class="descriptionAppart col-md-6">
          <h5 class="titre">Proprietaire : <?php echo $location->Proprietaire;?></h5>
          <p>Date de la demande : <?php echo $location->DateDemandeLocation;?></p>
          <p>Location du : <?php echo $location->DateDebutLocation;?> au <?php echo $location->DateFinLocation;?></p>
          <p>Prix total : <?php echo $location->MontantPaye;?>$</p>
          <p>Adresse : <?php echo $location->Adresse;?> <?php echo $location->codePostal;?></p>
        </div>
        <div id="slider">
          <figure>
          <?php foreach($photos as $photo){?>
            <?php if($photo->idAppart==$location->idAppart){?>
              <?php $chemin=$photo->Chemin;?>
              <img src='<?=base_url() . $chemin?>' alt>
              <div class="detaiPhoto" ><?php echo $photo->detailPhoto;?></div>
            <?php } ?>
          <?php } ?>
          </figure>
        </div>
        </div>
        <?php if($location->estValide==1){?>
        <p class="locationValide" style="font-size:1.2em;">votre demande est approuvée par le proprietaire</p>
        <button class="btn btn-success" id="payer" value="<?php echo $location->idAppart;?>">Passer au paiement</button>
        <?php } else {?>
        <div class="row btnValider">
          <p class="locationNonValide" style="font-size:1.2em;"> En attente de validation</p>
        </div>
        <?php } ?>
    </div>
  <?php } }?>
  <div class="">
    <button id="retourAppart" class="btn btn-secondary">Retour à mes appartements</button>      
  </div>
</div>