<?php 
class Livre {

    //variables
    private $id;
    private $titre;
    private $nbPages;
    private $image;

    // tableau de livres avec attribut static accessible par self::
    public static $books;

    //constructor
    public function __construct($id,$titre,$nbPages,$image)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->image = $image;
        self::$books[] = $this;
    }
    
    //getters
    public function getId(){return $this->id;}
    public function getTitre(){return $this->titre;}
    public function getNbPages(){return $this->nbPages;}
    public function getImage(){return $this->image;}
    //setters
    public function setId($id){return $this->id = $id;}
    public function setTitre($titre){return $this->titre = $titre;}
    public function setNbPages($nbPages){return $this->nbPages = $nbPages;}
    public function setImage($image){return $this->image = $image;}
}
?>