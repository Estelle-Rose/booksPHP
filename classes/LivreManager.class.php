<?php 
require_once('Model.class.php');
require_once('Livre.class.php');
 class LivreManager extends Model {
     private $books;

     public function ajoutLivre($book){
         $this->books[] = $book;
     }

     public function getBooks(){return $this->books;}

     public function getBooksFromDb() {
        $req = 'SELECT * FROM livres ORDER BY id DESC';
        $stmt = $this->getBDD()->prepare($req);
        $stmt ->execute();
        $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        foreach ($livres as $livre) {
            $livre = new Livre($livre['id'], $livre['titre'],$livre['nbPages'],$livre['image']);
            $this->ajoutLivre($livre);
        }
     }
 }
?>