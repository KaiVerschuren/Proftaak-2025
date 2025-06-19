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
$setCodeUses = (int)$_SESSION['setCodeUses'];
$setCodeMaxUses = (int)$_SESSION['setCodeMaxUses'];
$usesLeft = $setCodeUses < $setCodeMaxUses;

var_dump($_SESSION);

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
        $_SESSION['setCodeUses']++; // remove this if `addUse()` updates session or DB

        $setCodeUses = (int)$_SESSION['setCodeUses'];
        $usesLeft = $setCodeUses < $setCodeMaxUses;

        $orderSuccess = true;
        toggleToast('success', 'Products were ordered :D', 'index.php');

        foreach ($selectedProducts as $product) {
            addOrderCount($product);
        }

        if (!$usesLeft) {
            toggleToast("error", "You have no uses left for this code.");
        }
    }

    $setOne = getSetOne();
    $setTwo = getSetTwo();
    $setThree = getSetThree();
}

else if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == false) {
    $products = fetchOtherProducts();

    if (!$usesLeft) {
        toggleToast("error", "This code has no uses left. You can only view products.");
    }

    if (isset($_POST['productSubmit']) && $usesLeft) {
        $productOne = $_POST['productOne'] ?? '';

        addUse($_SESSION['setCodeId']);
        $_SESSION['setCodeUses']++;

        $setCodeUses = (int)$_SESSION['setCodeUses'];
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
} 
else if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == false) {
    // ! code below is to order non-school products
    $products = fetchOtherProducts();

    if (!$usesLeft) {
        toggleToast("error", "This code has no uses left. You can only view products.");
    }

    if (isset($_POST['productSubmit']) && $usesLeft) {
        $productOne = $_POST['productOne'] ?? '';

        addUse($_SESSION['setCodeId']);
        $_SESSION['setCodeUses']++;

        $setCodeUses = (int)$_SESSION['setCodeUses'];
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
                    <div data-position="<?php echo $product['position']; ?>" class="setOne categoryOption cardShadow">
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
                    <div data-position="<?php echo $product['position']; ?>" class="setOne categoryOption cardShadow">
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
                    <div data-position="<?php echo $product['position']; ?>" class="setTwo categoryOption cardShadow">
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
                foreach ($setThree as $product) {
                    ?>
                    <div data-position="<?php echo $product['position']; ?>" class="setThree categoryOption cardShadow">
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
            <button class="btnSecondary orderPageButtonArrow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="btnIcon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>
            <button class="btnPrimary orderPageButton orderPageButtonOne orderButtonSelected">1</button>
            <button class="btnPrimary orderPageButton orderPageButtonTwo">2</button>
            <button class="btnPrimary orderPageButton orderPageButtonThree">3</button>
            <button class="btnSecondary orderPageButtonArrow" id="orderPageButtonArrowRight">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="btnIcon" id="orderPageButtonArrowRightIcon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
        <?php
    }
    ?>
    <form method="post" class="orderForm" style="display: none;">
        <input type="hidden" id="productOne" name="productOne" value="<?php echo $productOne; ?>">
        <?php
        if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == true) {
            ?>
            <input type="hidden" id="productTwo" name="productTwo" value="<?php echo $productTwo; ?>">
            <input type="hidden" id="productThree" name="productThree" value="<?php echo $productThree; ?>">
            <input name="productSubmit" type="submit" class="btnPrimary" value="Order" id="orderButton">
            <?php
        }
        ?>
        <?php
        if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == false) {
            ?>
            <input name="productSubmit" type="submit" class="btnPrimary" value="Order" id="orderButton">
            <?php
        }
        ?>
    </form>

    <!-- to check if the user has a goodie code -->
    <div id="goodieData" data-goodie="<?php echo $goodieCode; ?>"></div>
    <div id="ordered" data-order="<?php echo $orderSuccess ? "true" : "false"; ?>"></div>
</main>
<?php
footerFunc();
?>