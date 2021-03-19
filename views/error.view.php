<?php ob_start() ?>
<?= $msg; ?>

<?php 
$title = '404';
$content = ob_get_clean();
require "template.php";
?>