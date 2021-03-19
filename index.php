<?php 
define("URL", str_replace("index.php", "",(isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once('./controllers/LivreController.controller.php');
$livreController =  new LivreController;

try {
    if(empty($_GET['page'])) {
        require "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    

        switch($url[0]) {
            case "accueil" : require "views/accueil.view.php";
            break;
            case "livres" : 
            if(empty($url[1])){
                $livreController->afficherLivres();
            } else if($url[1] === 'l') { // read (by id)
                $livreController->afficherUnLivre($url[2]);          
            } else if($url[1] === 'a') { // add
                $livreController->ajouterUnLivre();             
            } else if($url[1] === 'u') { // update
                $livreController->modifierUnLivre($url[2]);             
            } else if($url[1] === 'd') { // delete
                $livreController->supprimerLivre($url[2]);
           
            } else if($url[1] === 'av') { // validation de l'ajout du livre
                $livreController->ajoutLivreValidation();
            } else if($url[1] === 'uv') { // validation de la modification du livre
                $livreController->modifLivreValidation();
            } else {
                throw new Exception("La page n'existe pas");
            }
            break;
            default: throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
    
?>