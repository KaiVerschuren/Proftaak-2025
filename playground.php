<?php
include 'inc/php/functions.php';
initSession();

head("Playground");

headerFunc();
?>
<main class="container">
    <h1 class="playgroundTitle">Playground</h1>
    <?php 
    toast();
    ?>
</main>
<?php
footerFunc();
?>