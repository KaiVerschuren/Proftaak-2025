<?php
include 'inc/php/functions.php';


head("Homepage");

headerFunc();
?>

<main class="container">
    <div class="hero">
        <div>
            <h1>
                Welcome to <span class="titleSecondary">GoodieMaticAa</span>
            </h1>
            <p class="heroParagraph">Easily order snacks from our school vending machine,<br /> right from this website!</p>
            <button class="btnSecondary">Order now!</button>
        </div>
        <div>
            <img src="./assets/vendingMachineIllustration.png" alt="Vending machine illustration" class="heroImg">
        </div>
    </div>
    <div class="top">
        <div>
            <h1 class="topTitle">Our <span class="titlePrimary">top bought</span> products</h2>
        </div>
        <div class="topCardWrapper">
            <div class="topCard cardShadow">
                <img src="./assets/placeholderCards.png" class="topCardImg">
                <div class="topCardInfo">
                    <h2 class="topCardTitle">SmoothWrite Pen</h2>
                    <p class="topCartText">Reliable ballpoint pen with smooth ink flow. Perfect for daily notes or doodles.</p>
                    <button class="btnPrimary topCardButton">Order now!</button>
                </div>
            </div>

            <div class="topCard cardShadow">
                <img src="./assets/placeholderCards.png" alt="3D Printed AA Statue" class="topCardImg">
                <div class="topCardInfo">
                    <h2 class="topCardTitle">AA 3D Print</h2>
                    <p class="topCartText">Colored 3D-printed "AA" statue. Great for desk decoration or branding props.</p>
                    <button class="btnPrimary topCardButton">Order now!</button>
                </div>
            </div>

            <div class="topCard cardShadow">
                <img src="./assets/placeholderCards.png" alt="White Monster Can" class="topCardImg">
                <div class="topCardInfo">
                    <h2 class="topCardTitle">Monster Ultra</h2>
                    <p class="topCartText">Crisp white Monster energy drink. Zero sugar, full energy. Stay sharp!</p>
                    <button class="btnPrimary topCardButton">Order now!</button>
                </div>
            </div>

        </div>
    </div>
</main>