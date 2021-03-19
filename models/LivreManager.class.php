<?php 
require_once('Model.class.php');
require_once('Livre.class.php');
class LivreManager extends Model {
     private $books; // tableau de livres

    public function ajoutLivre($book){
         $this->books[] = $book;
    }

    public function getBooks(){return $this->books;}

    public function getBooksFromDb() {
        $req = 'SELECT * FROM livres ORDER BY livres.id DESC ';
        $stmt = $this->getBDD()->prepare($req);
        $stmt ->execute();
        $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        foreach ($livres as $livre) {
            $livre = new Livre($livre['id'], $livre['titre'],$livre['nbPages'],$livre['image']);
            $this->ajoutLivre($livre);
        }
    }
    public function getBookById($id) {
       foreach($this->books as $book) {
           if($book->getId() === $id){
               return $book;          
           }
       }   
       throw new Exception("Le livre n'existe pas");
              
    }
    public function addBookInDb($titre, $nbPages, $image) {
        $req = 'INSERT INTO livres (titre,nbPages,image) VALUES(:titre,:nbPages,:image);';
        $stmt = $this->getBDD()->prepare($req);
        // utiliser les bindValue pour sécuriser les entrées
        $stmt->bindValue(':titre',$titre, PDO::PARAM_STR);    
        $stmt->bindValue(':nbPages',$nbPages, PDO::PARAM_INT);    
        $stmt->bindValue(':image',$image, PDO::PARAM_STR);    
        try {
                   $result = $stmt->execute();
        }
        catch (PDOException $e){ // gestion de l'erreur
            echo "Erreur de connexion: " .$e->getMessage();
            return false;
        }
         $stmt->closeCursor();
         if($result > 0) {
            $livre = new Livre($this->getBdd()->lastInsertId(),$titre, $nbPages, $image);
            $this->ajoutLivre($livre);
         }
    }
    public function deleteBookFromDb($id) {
        $req = 'DELETE FROM livres WHERE id = :id';
        $stmt = $this->getBDD()->prepare($req);
        // utiliser les bindValue pour sécuriser les entrées
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);   
           
        try {
           $resultat = $stmt->execute();           
            
        }
        catch (PDOException $e){ // gestion de l'erreur
            echo "Erreur de connexion: " .$e->getMessage();
            return false;
        }
         $stmt->closeCursor();
         if($resultat >0){
             $book =$this->getBookById($id);
             unset($book);
         }
         
    }
    public function updateBookInDb($id,$titre, $nbPages, $image) {
        $req = 'UPDATE livres SET titre = :titre, nbPages= :nbPages, image = :image WHERE id = :id';
        $stmt = $this->getBDD()->prepare($req);
        // utiliser les bindValue pour sécuriser les entrées
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);      
         $stmt->bindValue(':titre',$titre, PDO::PARAM_STR);    
        $stmt->bindValue(':nbPages',$nbPages, PDO::PARAM_INT);    
        $stmt->bindValue(':image',$image, PDO::PARAM_STR);               
        try {
           $resultat = $stmt->execute();           
            
        }
        catch (PDOException $e){ // gestion de l'erreur
            echo "Erreur de connexion: " .$e->getMessage();
            return false;
        }
         $stmt->closeCursor();
         if($resultat >0) {
             $this->getBookById($id)->setTitre($titre);
             $this->getBookById($id)->setNbPages($nbPages);
             $this->getBookById($id)->setImage($image);
         }
         
    }
    
}
 
?>