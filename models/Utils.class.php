<?php
abstract class Utils {
    
    public static function ajoutImage($file,$dir) {
           if(!isset($file['name']) || empty($file['name']))
              throw new Exception("Merci d'ajouter une image");
           if(!file_exists($dir)) mkdir($dir,0777);
           $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
           $random = rand(0,99999);
           $target_file = $dir.$random.'_'.$file['name'];
   
           if(!getimagesize($file['tmp_name']))
           throw new Exception("Le fichier n'est pas une image");
           
           if($extension !=='jpg' && $extension !=='jpeg' && $extension !=='png' &&$extension !=='gif')
           throw new Exception("L'extension du fichier n'est pas reconnue");
           if(file_exists($target_file))
           throw new Exception("Le fichier existe déjà");
           if($file['size'] > 500000)
           throw new Exception("Le fichier est trop gros");
           if(!move_uploaded_file($file['tmp_name'],$target_file))
           throw new Exception("L'ajout de l'image n'a pas fonctionné");
           
           else return ($random.'_'.$file ['name']);
       }
}

?>