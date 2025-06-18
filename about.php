<?php
include 'inc/php/functions.php';

initSession();

head("About");

headerFunc();
?>
<main class="container">
    <div class="aboutMain">
        <div class="aboutTile cardShadow aboutProject">

        </div>
        <div class="aboutTile cardShadow aboutTimeline">
            <?php timeline(); ?>
        </div>
        <div class="aboutTile cardShadow aboutUs"> </div>
        <div class="aboutTile cardShadow aboutOrder"> </div>
    </div>
</main>
<?php
footerFunc();
?>