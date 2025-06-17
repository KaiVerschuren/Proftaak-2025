<?php
include 'inc/php/functions.php';
include 'inc/php/dbconnect.php';
initSession();

if ($_SESSION['authenticated'] == false) {
    header("location: authenticate.php");
}

$goodieCode = $_SESSION['goodieCode'];

$usesLeft = false;

// var_dump($_POST);

if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == true) {
    if ($_SESSION['setCodeUses'] >= $_SESSION['setCodeMaxUses']) {
        toggleToast("error", "This code has no uses left. you can only view products.");
        $usesLeft = false;
    } else {
        $usesLeft = true;
    }
    if (isset($_POST['productSubmit']) && $usesLeft == true) {
        // ! code in here means that the products were/can be ordered

        $productOne = $_POST['productOne'] ?? '';
        $productTwo = $_POST['productTwo'] ?? '';
        $productThree = $_POST['productThree'] ?? '';

        $selectedProducts = [
            'productOne' => $productOne,
            'productTwo' => $productTwo,
            'productThree' => $productThree
        ];

        toggleToast("success", "You have ordered your goodiebag :D", "index.php");
        addUse($_SESSION['setCodeId']);
        $_SESSION['setCodeUses'] += 1;

        if ($_SESSION['setCodeUses'] >= $_SESSION['setCodeMaxUses']) {
            $usesLeft = false;
        } else {
            $usesLeft = true;
        }
    }
    if ($usesLeft == false) {
        toggleToast("error", "You have no uses left for this code.", "index.php");
    }

    // Fetch the products for the sets
    $setOne = getSetOne();
    $setTwo = getSetTwo();
    $setThree = getSetThree();
} else if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == false) {
    // ! code below is for non-school products :)
    $products = fetchOtherProducts();

    if ($_SESSION['setCodeUses'] >= $_SESSION['setCodeMaxUses']) {
        toggleToast("error", "This code has no uses left. you can only view products.");
        $usesLeft = false;
    } else {
        $usesLeft = true;
    }

    if (isset($_POST['productSubmit']) && $usesLeft == true) {
        // ! code in here means that the products were/can be ordered
        $productOne = $_POST['productOne'] ?? '';

        toggleToast('success', 'Product from position: ' . $productOne . " was ordered :D", 'index.php');

        addUse($_SESSION['setCodeId']);

        $_SESSION['setCodeUses'] += 1;
        if ($_SESSION['setCodeUses'] >= $_SESSION['setCodeMaxUses']) {
            $usesLeft = false;
        } else {
            $usesLeft = true;
        }
        if (!isset($productOne)) {
            toggleToast("error", "You have not selected a product to order.", "");
        }
    }
    if ($usesLeft == false) {
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
        <input type="hidden" id="productOne" name="productOne" value="">
        <?php
        if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == true) {
            ?>
            <input type="hidden" id="productTwo" name="productTwo" value="">
            <input type="hidden" id="productThree" name="productThree" value="">
            <input name="productSubmit" type="submit" class="btnPrimary" value="Order" id="orderButton">
            <?php
        }
        ?>
        <?php
        if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == false) {
            ?>
            <input type="submit" class="btnPrimary" value="Order" name="productSubmit">
            <?php
        }
        ?>
    </form>

    <!-- to check if the user has a goodie code -->
    <div id="goodieData" data-goodie="<?php echo $goodieCode; ?>"></div>
</main>
<?php
footerFunc();
?>