<?php 
require_once('./classes/Livre.class.php');
$livre1 = new Livre(1,'L\'algorithmique selon h2prog',300,'algo.png');
$livre2 = new Livre(2,'Le virus asiatique',200,'virus.png');
$livre3 = new Livre(3,'La France du 19ème',200,'france.png');
$livre4 = new Livre(4,'Le Javascript client',500,'JS.png');


ob_start() ;?> <!-- Début de la temporisation-->


<table class="table mt-5 ">
  <thead>
    <tr class="table-primary text-center">
      <th scope="col">Image</th>
      <th scope="col">Titre</th>
      <th scope="col">Nombre de page</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach (Livre::$books as $book) : ?>
    <tr class="table-dark text-center">
      <td scope="row" class="align-middle">
        <img src="./public/images/<?= $book->getImage() ?>" alt="<?= $book->getTitre() ?>" style="max-height:100px;" class="img-fluid img-thumbnail">
      </td>
      <td class="align-middle"><?= $book->getTitre() ?></td>
      <td class="align-middle"><?= $book->getNbPages() ?></td>
      <td class="align-middle"><a href="" class="btn btn-outline-primary">Modifier</a></td>
      <td class="align-middle"><a href="" class="btn btn-outline-danger">Supprimer</a></td>
    </tr>
  <?php endforeach; ?>
   
   
  </tbody>
</table>
<button type="button" class="btn btn-success btn-lg btn-block mt-5">Ajouter</button>
<?php 
$title = 'Liste des livres';
$content = ob_get_clean(); // On déverse le contenu
require "template.php";
?>