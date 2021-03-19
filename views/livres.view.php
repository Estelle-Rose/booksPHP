<?php 
ob_start() ;?> <!-- Début de la temporisation-->

<table class="table mt-5 ">
  <thead>
    <tr class="table-primary text-center">
      <th scope="col">Image</th>
      <th scope="col">Titre</th>
      <th scope="col">Nombre de page</th>
      <th scope="col" colspan="3">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php  
foreach ( $books as $book) : ?>
    <tr class="table-dark text-center">
      <td scope="row" class="align-middle">
        <img src="<?=URL?>public/images/<?=$book->getImage()?>" alt="<?= $book->getTitre() ?>" style="max-height:100px;" class="img-fluid img-thumbnail">
      </td>
      <td class="align-middle"><?= $book->getTitre() ?></td>
      <td class="align-middle"><?= $book->getNbPages() ?></td>
      <td class="align-middle"><a href="<?=URL?>livres/u/<?=$book->getId();?>" class="btn btn-outline-primary">Modifier</a></td>
      <td class="align-middle">
       <form action="<?=URL?>livres/d/<?=$book->getId();?>" method="POST" onSubmit="return confirm('Voules-vous vraiement supprimer ce livre ?');">        
          <button type="submit" class="btn btn-outline-danger">Supprimer</button> 
        </form></td>
      <td class="align-middle"><a href="livres/l/<?=$book->getId()?>" class="btn btn-outline-success">Voir le livre</a></td>
    </tr>
  <?php endforeach; ?>
   
   
  </tbody>
</table>
<a href="<?=URL?>livres/a" type="button" class="btn btn-success btn-lg btn-block mt-5">Ajouter</a>
<?php 
$title = 'Liste des livres';
$content = ob_get_clean(); // On déverse le contenu
require "template.php";
?>