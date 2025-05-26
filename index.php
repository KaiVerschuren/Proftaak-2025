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
            <button class="btn">Order now!</button>
        </div>
        <div>
            <img src="./assets/vendingMachineIllustration.png" alt="Vending machine illustration" class="heroImg">
        </div>
    </div>
    <div class="top">
        <div class="topTitle">
            <h2>Our top bought products</h2>
        </div>
        <div class="cardWrapper">
            <div class="card">
                <div class="card-info">
                    <p class="title">Product one</p>
                </div>
            </div>
            <div class="card">
                <div class="card-info">
                    <p class="title">Product two</p>
                </div>
            </div>
            <div class="card">
                <div class="card-info">
                    <p class="title">Product three</p>
                </div>
            </div>
        </div>
    </div>
</main>