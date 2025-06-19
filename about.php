<?php
include 'inc/php/functions.php';

initSession();

head("About");

headerFunc();
?>
<main class="container">
    <h1 class="aboutTitle">About GoodieMaticAa</h1>
    <div class="aboutMain">
        <div class="aboutTile cardShadow aboutProject">
            <div class="aboutText">
                <h1>About GoodieMaticAa</h1>
    
                <h2>What is GoodieMaticAa?</h2>
                <p>GoodieMaticAa is a vending machine used at Ter AA. It delivers products chosen by the school or students.
                </p>
    
                <h2>How It Works</h2>
                <p>Students order products on the website using an authentication code given by a teacher or student. The
                    machine then dispenses the ordered items.</p>
    
                <h2>Technical Info</h2>
                <p>We have used HTML5, jQuery version 3.7.1, and PHP version 8.1.10. No CSS libraries were used.</p>
                <p>To run the site, we set up a Raspberry Pi 3 with Apache2, Ngrok, and MariaDB for the database.</p>
            </div>
            <div class="aboutIllustration">
                <img src="assets/vendingMachineIllustration.png" alt="illustration of the vending machine">
                <img class="aboutAA" src="assets/AA.png" alt="illustration of the vending machine">
            </div>
        <div class="aboutTile cardShadow aboutTimeline">
            <?php timeline(); ?>
        </div>
    </div>
</main>
<?php
footerFunc();
?>