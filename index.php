<?php
include 'inc/php/functions.php';
include 'inc/php/dbconnect.php';

initSession();

$products = getTopProducts();

head("Homepage");

headerFunc();
?>

<main class="container">
    <div class="hero">
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
            <?php
            foreach ($products as $product) {
                ?>
                <div class="topCard cardShadow">
                    <img src="<?php echo $product['img']; ?>" class="topCardImg" alt="Image of product">
                    <div class="topCardInfo">
                        <h2 class="topCardTitle"><?php echo $product['name']; ?></h2>
                        <p class="topCartText"><?php echo $product['description']; ?></p>
                        <button class="btnPrimary topCardButton">Order now!</button>
                    </div>
                </div>
                <?php
            }
            ?>
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
                    <p class="timelineInfo">Browse the available items on your phone and select what you want to order.
                    </p>
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
                    <p class="timelineInfo">If you have a voucher code, enter it during checkout to apply your balance.
                    </p>
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
                    <p class="timelineInfo">Confirm your selection and complete the order through the app or web
                        interface.</p>
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
                    <p class="timelineInfo">Wait a moment as the machine prepares your order. Pick it up from the tray
                        once it’s delivered.</p>
                </div>
                <div class="timelinePath"></div>
            </div>
        </div>
    </div>
</main>
<?php
footerFunc();
?>