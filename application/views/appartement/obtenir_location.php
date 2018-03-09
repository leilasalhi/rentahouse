<h2 class="titreLocation">Liste des locations</h2>
<ul class="nav nav-tabs menuTab">
  <li class="nav-item">
    <a id="afficheMesAppart" class="nav-link active" href="#">Mes appartements à louer</a>
  </li>
  <li class="nav-item">
    <a id="afficheMesDemande" class="nav-link" href="#">Mes demandes de location</a>
  </li>
</ul>
<div id="mesAppartements">
  <?php if(!$locations){?>
    <p class="aucuneLocation">Vous n'avez aucune location pour cet appartement</p>
  <?php } else {?>
  <?php foreach($locations as $location){?>
    <div class="detailAppart">
      <div class="detailLog row">
        <div class="descriptionAppart col-md-6">
          <h5 class="titre">Locataire : <?php echo $location->Locataire;?></h5>
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
        <p class="locationValide" style="font-size:1.2em;">Validé <i class="fa fa-check-circle" style="color:green"></i></p>
      <?php } else {?>
      <div class="row btnValider">
        <p class="locationNonValide" style="font-size:1.2em;"><i class="fas fa-times"></i> Non validée</p>
        <button class="btn btn-success" id="validerDemandeLocation" value="<?php echo $location->idAppart;?>">Valider</button>
      </div>
      <?php } ?>
    </div>
  <?php } }?>
  <div class="">
    <button id="retourAppart" class="btn btn-secondary">Retour à mes appartements</button>      
  </div>
</div>

<!--  modal affiche usager-->
  <div class="formulaireAlouer modal fade" id="myModalUsager" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Renseignements du locataire</h5>
      </div>
      <div class="modal-body">
        <form class="form-horizontal"> 
          <div class="form-group row">
            <label class="col-sm-4" for="dDebut">Nom</label>
            <label class="col-sm-6" for="dDebut">Nom</label>
          </div>
          <div class="form-group row">
            <label class="col-sm-4" for="dFin">Prénom</label>
            <label class="col-sm-6" for="dFin">Prénom</label>
          </div>
          <div class="form-group row">
            <label class="col-sm-4" for="prix">Adresse</label>
            <label class="col-sm-6" for="prix">Adresse</label>
          </div>
          <div class="form-group row">
            <label class="col-sm-4" for="prix">Type de paiement</label>
            <label class="col-sm-4" for="prix">Type de paiement</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>
        </form>
      </div>      
      </div>      
    </div>
  </div>