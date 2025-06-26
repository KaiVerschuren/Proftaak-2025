<?php
include 'inc/php/functions.php';
include 'inc/php/dbconnect.php';
initSession();

if ($_SESSION['authenticated'] == false) {
    header("location: authenticate.php");
}

$goodieCode = $_SESSION['goodieCode'];
$orderSuccess = false;

// update this if `addUse()` already updates the DB
$setCodeUses = (int) $_SESSION['setCodeUses'];
$setCodeMaxUses = (int) $_SESSION['setCodeMaxUses'];
$usesLeft = $setCodeUses < $setCodeMaxUses;

if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == true) {
    if (!$usesLeft) {
        toggleToast("error", "This code has no uses left.");
    }

    if (isset($_POST['productSubmit']) && $usesLeft) {
        $productOne = $_POST['productOne'] ?? '';
        $productTwo = $_POST['productTwo'] ?? '';
        $productThree = $_POST['productThree'] ?? '';

        $selectedProducts = [
            'productOne' => $productOne,
            'productTwo' => $productTwo,
            'productThree' => $productThree
        ];

        addUse($_SESSION['setCodeId']);
        $_SESSION['setCodeUses']++;

        $setCodeUses = (int) $_SESSION['setCodeUses'];
        $usesLeft = $setCodeUses < $setCodeMaxUses;
        
        $orderSuccess = true;
        toggleToast('success', 'Products were ordered :D', 'index.php');
        
        if (!$usesLeft) {
            
            toggleToast("error", "You have no uses left for this code.", "index.php");
        }
    }

    $setOne = getSetOne();
    $setTwo = getSetTwo();
    $setThree = getSetThree();
} else if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == false) {
    $products = fetchOtherProducts();

    if (!$usesLeft) {
        toggleToast("error", "This code has no uses left. You can only view products.");
    }

    if (isset($_POST['productSubmit']) && $usesLeft) {
        $productOne = $_POST['productOne'] ?? '';

        addUse($_SESSION['setCodeId']);
        $_SESSION['setCodeUses']++;

        $setCodeUses = (int) $_SESSION['setCodeUses'];
        $usesLeft = $setCodeUses < $setCodeMaxUses;

        if (!isset($productOne)) {
            toggleToast("error", "You have not selected a product to order.");
        } else {
            toggleToast('success', 'Product from position: ' . $productOne . " was ordered :D", 'index.php');
            $orderSuccess = true;
        }
    }

    if (!$usesLeft && !$orderSuccess) {
        toggleToast("error", "You have no uses left for this code.", "index.php");
    }
} else if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == false) {
    // ! code below is to order non-school products
    $products = fetchOtherProducts();

    if (!$usesLeft) {
        toggleToast("error", "This code has no uses left. You can only view products.");
    }

    if (isset($_POST['productSubmit']) && $usesLeft) {
        $productOne = $_POST['productOne'] ?? '';

        addUse($_SESSION['setCodeId']);
        $_SESSION['setCodeUses']++;

        $setCodeUses = (int) $_SESSION['setCodeUses'];
        $usesLeft = $setCodeUses < $setCodeMaxUses;

        if (!$productOne) {
            toggleToast("error", "You have not selected a product to order.");
        } else {
            toggleToast('success', 'Product from position: ' . $productOne . " was ordered :D", 'index.php');
            $orderSuccess = true;
        }
    }

    if (!$usesLeft && !isset($_POST['productSubmit'])) {
        toggleToast("error", "You have no uses left for this code.", "index.php");
    }
}


head("Order");

headerFunc();
?>
<main class="container">
    <div class="categoryWrapper">
        <?php
        if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == false) {
            ?>
            <div class="category">
                <?php
                foreach ($products as $product) {
                    ?>
                    <div data-position="<?php echo $product['position']; ?>" data-name="<?php echo $product['name']; ?>" class="setOne categoryOption cardShadow">
                        <img src="<?php echo $product['img']; ?>" alt="Placeholder" class="categoryOptionImage">
                        <div class="categoryInfo">
                            <h1 class="categoryOptionTitle"><?php echo $product['name']; ?></h1>
                            <p class="categoryOptionInfo"><?php echo $product['description']; ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }

        ?>
        <?php
        if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == true) {
            ?>
            <div class="category">
                <?php
                foreach ($setOne as $product) {
                    ?>
                    <div data-position="<?php echo $product['position']; ?>" data-name="<?php echo $product['name']; ?>"
                        class="setOne categoryOption cardShadow">
                        <img src="<?php echo $product['img']; ?>" alt="Placeholder" class="categoryOptionImage">
                        <div class="categoryInfo">
                            <h1 class="categoryOptionTitle"><?php echo $product['name']; ?></h1>
                            <p class="categoryOptionInfo"><?php echo $product['description']; ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="category">
                <?php
                foreach ($setTwo as $product) {
                    ?>
                    <div data-position="<?php echo $product['position']; ?>" data-name="<?php echo $product['name']; ?>"
                        class="setTwo categoryOption cardShadow">
                        <img src="<?php echo $product['img']; ?>" alt="Placeholder" class="categoryOptionImage categoryOptionImageSet2">
                        <div class="categoryInfo">
                            <h1 class="categoryOptionTitle"><?php echo $product['name']; ?></h1>
                            <p class="categoryOptionInfo"><?php echo $product['description']; ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="category">
                <?php
                foreach ($setThree as $product) {
                    ?>
                    <div data-position="<?php echo $product['position']; ?>" data-name="<?php echo $product['name']; ?>"
                        class="setThree categoryOption cardShadow">
                        <img src="<?php echo $product['img']; ?>" alt="Placeholder" class="categoryOptionImage">
                        <div class="categoryInfo">
                            <h1 class="categoryOptionTitle"><?php echo $product['name']; ?></h1>
                            <p class="categoryOptionInfo"><?php echo $product['description']; ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == true) {
        ?>
        <div class="orderButtonWrapper">
            <button class="btnPrimary orderPageButton orderPageButtonOne orderButtonSelected">1</button>
            <button class="btnPrimary orderPageButton orderPageButtonTwo">2</button>
            <button class="btnPrimary orderPageButton orderPageButtonThree">3</button>
        </div>
        <?php
    }
    ?>
    <!-- to check if the user has a goodie code -->
    <div id="goodieData" data-goodie="<?php echo $goodieCode; ?>"></div>
    <div id="ordered" data-order="<?php echo $orderSuccess ? "true" : "false"; ?>"></div>
</main>
<div class="popupBackground" style="display: none;">
    <div class="popup popupShow cardShadow">
        <div class="popupTop">
            <div class="popupOrderDetails">
                <h2>Order details</h2>
                <div class="popupTable">
                    <div class="popupTableRow">
                        <h3>Title</h3>
                        <h3>Position</h3>
                    </div>
                    <div class="seperator"></div>
                    <div class="popupTableRow popupProduct1">
                        <h3 class="popupTableTitle1">Title</h3>
                        <h3 class="popupTablePosition1">Position</h3>
                    </div>
                    <div class="seperator popupHide"></div>
                    <div class="popupTableRow popupProduct2 popupHide">
                        <h3 class="popupTableTitle2">Title</h3>
                        <h3 class="popupTablePosition2">Position</h3>
                    </div>
                    <div class="seperator popupHide"></div>
                    <div class="popupTableRow popupProduct3 popupHide">
                        <h3 class="popupTableTitle3">Title</h3>
                        <h3 class="popupTablePosition3">Position</h3>
                    </div>
                </div>
            </div>
            <div class="popupImage">
                <img src="./assets/AA.png" alt="Ter AA logo">
            </div>
        </div>
    
        <form method="post" class="orderForm">
            <input type="hidden" id="productOne" name="productOne" value="<?php echo $productOne; ?>">
            <?php if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == true): ?>
                <input type="hidden" id="productTwo" name="productTwo" value="<?php echo $productTwo; ?>">
                <input type="hidden" id="productThree" name="productThree" value="<?php echo $productThree; ?>">
            <?php endif; ?>
            <div class="popupButtons">
                <input name="productSubmit" type="submit" class="btnPrimary popupButton" value="Order" id="orderButton">
                <input type="button" class="btnSecondary popupButton" id="popupChangeButton" value="change" />
            </div>
        </form>
    </div>
</div>

<?php
footerFunc();
?>