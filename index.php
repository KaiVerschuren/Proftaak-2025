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
            <button class="btnSecondary" onclick="window.location.href = 'order.php'">Order now!</button>
        </div>
        <div>
            <img src="./assets/vendingMachineIllustration.png" alt="Vending machine illustration" class="heroImg">
        </div>
    </div>
    <div class="top">
        <div class="topTitle">
            <h2>Our top bought products</h2>
        </div>
        <div class="topCardWrapper">
            <div class="topCard cardShadow">
                <img src="./assets/placeholderCards.png" alt="Placeholder" class="topCardImg">
                <div class="topCardInfo">
                    <h2 class="topCartTitle">Product one</h2>
                    <p>Description</p>
                    <div>
                        <button class="btnPrimary topCartButton">Order now!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>  
