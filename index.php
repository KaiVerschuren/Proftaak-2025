<?php
include 'inc/php/functions.php';

initSession();

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
        <div class="heroText">
            <h1>
                Welcome to <span class="titleSecondary">GoodieMaticAa</span>
            </h1>
            <p class="heroParagraph">
                If you’ve got an authentication code, you can use it here to claim a goodiebag, or other products.
                Choose between a complete goodie bag or select individual products available in the school vending
                machine. Enter your code to view and order your available options.
            </p>
            <button class="btnSecondary heroButton" onclick="window.location.href = 'order.php'">Order now!</button>
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
                    <p class="topCartText">Reliable ballpoint pen with smooth ink flow.</p>
                    <button class="btnPrimary topCardButton">Order now!</button>
                </div>
            </div>

            <div class="topCard cardShadow">
                <img src="./assets/placeholderCards.png" alt="3D Printed AA Statue" class="topCardImg">
                <div class="topCardInfo">
                    <h2 class="topCardTitle">AA 3D Print</h2>
                    <p class="topCartText">Colored 3D-printed "AA" statue. Great for desk decoration or branding props.</p>
                    <p class="topCartText">Colored 3D-printed "AA" statue. Great for desk decoration.</p>
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
                <span class="timelineIconText">1</span>
            </div>
            <div class="timelineTile">
                <div class="timelineTileContent">
                    <h2 class="timelineTileTitle">Scan QR Code</h2>
                    <span class="timelineSubtitle">Step 1</span>
                    <p class="timelineInfo">Open your phone camera or scanner app and scan the QR code shown on the vending machine.</p>
                    <p class="timelineInfo">Open your phone camera or scanner app and scan the QR code shown on the
                        vending machine.</p>
                </div>
                <div class="timelinePath"></div>
            </div>

            <div class="timelineIcon">
                <span class="timelineIconText">2</span>
            </div>
            <div class="timelineTile">
                <div class="timelineTileContent">
                    <h2 class="timelineTileTitle">Choose Your Items</h2>
                    <span class="timelineSubtitle">Step 2</span>
<<<<<<< Maurits
                    <p class="timelineInfo">Browse the available items on your phone and select what you want to order.</p>
=======
                    <p class="timelineInfo">Browse the available items on your phone and select what you want to order.
                    </p>
>>>>>>> main
                </div>
                <div class="timelinePath"></div>
            </div>

            <div class="timelineIcon">
                <span class="timelineIconText">3</span>
            </div>
            <div class="timelineTile">
                <div class="timelineTileContent">
                    <h2 class="timelineTileTitle">Use Voucher</h2>
                    <span class="timelineSubtitle">Step 3</span>
<<<<<<< Maurits
                    <p class="timelineInfo">If you have a voucher code, enter it during checkout to apply your balance.</p>
=======
                    <p class="timelineInfo">If you have a voucher code, enter it during checkout to apply your balance.
                    </p>
>>>>>>> main
                </div>
                <div class="timelinePath"></div>
            </div>

            <div class="timelineIcon">
                <span class="timelineIconText">4</span>
            </div>
            <div class="timelineTile">
                <div class="timelineTileContent">
                    <h2 class="timelineTileTitle">Place Order</h2>
                    <span class="timelineSubtitle">Step 4</span>
<<<<<<< Maurits
                    <p class="timelineInfo">Confirm your selection and complete the order through the app or web interface.</p>
=======
                    <p class="timelineInfo">Confirm your selection and complete the order through the app or web
                        interface.</p>
>>>>>>> main
                </div>
                <div class="timelinePath"></div>
            </div>

            <div class="timelineIcon">
                <span class="timelineIconText">5</span>
            </div>
            <div class="timelineTile">
                <div class="timelineTileContent">
                    <h2 class="timelineTileTitle">Receive Your Item</h2>
                    <span class="timelineSubtitle">Step 5</span>
<<<<<<< Maurits
                    <p class="timelineInfo">Wait a moment as the machine prepares your order. Pick it up from the tray once it’s delivered.</p>
=======
                    <p class="timelineInfo">Wait a moment as the machine prepares your order. Pick it up from the tray
                        once it’s delivered.</p>
>>>>>>> main
                </div>
                <div class="timelinePath"></div>
            </div>
        </div>
    </div>
</main>
<?php
footerFunc();
?>