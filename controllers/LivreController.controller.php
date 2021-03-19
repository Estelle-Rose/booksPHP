<?php
require_once('models/LivreManager.class.php');
require_once('models/Utils.class.php');

class LivreController extends Utils{

    private $livreManager;

    public function __construct(){
        $this->livreManager = new LivreManager;
        $this->livreManager->getBooksFromDb();
    }

    public function afficherLivres(){        
        $books = $this->livreManager->getBooks();
        require "views/livres.view.php"; 
    }
    public function afficherUnLivre($id){        
        $book = $this->livreManager->getBookById($id);
        require "views/afficherLivre.view.php"; 
    }
    public function ajouterUnLivre(){   
        require "views/ajouterLivre.view.php"; 
    }
    public function modifierUnLivre($id){   
        $book = $this->livreManager->getBookById($id);
        require "views/modifierLivre.view.php"; 
    }
    public function supprimerLivre($id){   
        $nomImage = $this->livreManager->getBookById($id)->getImage();
        unlink("public/images/".$nomImage);
        $this->livreManager->deleteBookFromDb($id);
        header('Location:'.URL.'livres');  // redirige vers la page livres après l'ajout du livre
    }
    public function ajoutLivreValidation(){   
        $file = $_FILES['image'];
        $dir =  'public/images/';
        $nomImage = $this->ajoutImage($file,$dir);
        $this->livreManager->addBookInDb($_POST['titre'],(int)$_POST['nbPages'],$nomImage); // ajout du livre par livreManager dans la bas e de données
        header('Location:'.URL.'livres'); // redirige vers la page livres après l'ajout du livre
    }
    public function modifLivreValidation(){   
        $id = $_POST['id'];        
        $dir =  'public/images/';
        $file =$_FILES['image'];
        $imageActuelle = $this->livreManager->getBookById($id)->getImage();
        if( $file['size']> 0) {
            unlink("public/images/$imageActuelle");
            $nomImage = $this->ajoutImage($file,$dir);
        } else {
            $nomImage = $imageActuelle;
        }
        $this->livreManager->updateBookInDb($id,$_POST['titre'],(int)$_POST['nbPages'],$nomImage); // ajout du livre par livreManager dans la bas e de données
        header('Location:'.URL.'livres'); // redirige vers la page livres après l'ajout du livre
    }
 
}


?>


<!-- require_once('./classes/LivreManager.class.php');


// creation de l'instance LivreManager
$livreManager = new LivreManager;
// recupération des livres de la base de données
$livreManager->getBooksFromDb();
// recupération des livres du tableau $books de la classe LivreManager
$books = $livreManager->getBooks(); -->