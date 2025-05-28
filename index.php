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
    <div class="timeline">
        <h1 class="timelineTitle">How it works</h1>
        <div class="timelineTileWrapper">
            <div class="timelineIcon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
            </div>
            <div class="timelineTile">
                <div class="timelineTileContent">
                    <h2 class="timelineTileTitle">Scan QR code</h2>
                    <span class="timelineSubtitle">Step 1</span>
                    <p class="timelineInfo">Scan the qr code by doing this and this</p>
                </div>
                <div class="timelinePath"></div>
            </div>
            <div class="timelineIcon">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg> -->
                <span class="timelineIconText">1</span>
            </div>
            <div class="timelineTile">
                <div class="timelineTileContent">
                    <h2 class="timelineTileTitle">BUY MONSTERRR</h2>
                    <span class="timelineSubtitle">Step 1</span>
                    <p class="timelineInfo">MONSTERREERERE</p>
                </div>
                <div class="timelinePath"></div>
            </div>
        </div>
    </div>
</main>
<?php
footerFunc();
?>