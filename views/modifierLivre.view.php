<?php 
ob_start() ;?> <!-- Début de la temporisation-->
<div class="container pt-5">
  <div class="card mx-auto text-white bg-success my-5 p-3" style="max-width: 30rem;">

      <form method="POST" action="<?=URL?>livres/uv/" enctype="multipart/form-data">
        <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" class="form-control" id="titre" name="titre" aria-describedby="titre" value="<?=$book->getTitre()?>">
        </div>
        <div class="form-group">
          <label for="nbPages">Nombre de pages</label>
          <input type="number" class="form-control" id="nbPages" name="nbPages" value="<?=$book->getNbPages()?>">
        </div>
        <div>
        <img src="<?=URL?>public/images/<?=$book->getImage()?>" alt="<?=$book->getTitre()?>" style="max-height:90px;">
        </div>
         <div class="form-group">
          <label for="image">Votre nouvelle image</label>
          <input type="file" class="form-control-file" id="image" name="image">
         </div>
     <div class="text-center">
     <input type="hidden" name="id" value="<?= $book->getId()?>"> <!-- champ hidden qui permet d'envoyer l'id du livre-->
        <button type="submit" class="btn btn-primary ">Valider</button>
     </div>
    </form>
    </div>
  </div>


<?php 
$title = 'Modifier le livre '. $book->getId();
$content = ob_get_clean(); // On déverse le contenu
require "template.php";
?>