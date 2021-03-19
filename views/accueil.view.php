<?php ob_start() ?>


<?php 
$title = 'Accueil';
$content = ob_get_clean();
require "template.php";
?>