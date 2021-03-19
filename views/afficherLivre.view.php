<?php 
ob_start() ;?> <!-- Début de la temporisation-->
<div class="container ">
  <div class="card mx-auto text-white bg-default my-3 p-3" style="max-width: 40rem;">
    <div class="mx-auto">
     <h4 class=""><?= $book->getTitre() ?></h4>
    </div>
    <div class="card-body d-flex justify-content-around align-items-center">
      <img src="<?=URL?>public/images/<?=$book->getImage() ?>" alt="<?= $book->getTitre() ?>" style="max-height:130px;" class="img-fluid  m-1">
     
      <p class="card-text caption">Nombre de pages : <?= $book->getNbPages() ?></p>
    </div>
  </div>
    <div class="text-center">
        <a href="<?=URL?>livres/u/<?=$book->getId();?>" type="button" class="btn btn-outline-primary">Modifier</a>
        <form action="<?=URL?>livres/d/<?=$book->getId();?>" method="POST" onSubmit="return confirm('Voules-vous vraiement supprimer ce livre ?');">        
          <button type="submit" class="btn btn-outline-danger">Supprimer</button> 
        </form>
    </div>
</div>


<a href="<?=URL?>livres/a" type="button" class="btn btn-success btn-lg btn-block mt-5">Ajouter</a>
<?php 
$title = $book->getTitre();
$content = ob_get_clean(); // On déverse le contenu
require "template.php";
?>