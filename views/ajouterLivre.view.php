<?php 
ob_start() ;?> <!-- Début de la temporisation-->
<div class="container pt-5">
  <div class="card mx-auto text-white bg-success my-5 p-3" style="max-width: 30rem;">

      <form method="POST" action="<?=URL?>livres/av" enctype="multipart/form-data">
        <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" class="form-control" id="titre" name="titre" aria-describedby="titre">
        </div>
        <div class="form-group">
          <label for="nbPages">Nombre de pages</label>
          <input type="number" class="form-control" id="nbPages" name="nbPages">
        </div>
         <div class="form-group">
          <label for="image">Votre image</label>
          <input type="file" class="form-control-file" id="image" name="image">
         </div>
     <div class="text-center">
        <button type="submit" class="btn btn-primary ">Valider</button>
     </div>
    </form>
    </div>
  </div>


<?php 
$title = 'Ajouter un livre';
$content = ob_get_clean(); // On déverse le contenu
require "template.php";
?>