<!-- change the layout of this file so that it only runs if $_SESSIOn['goodieCode'] == true. --
otherwise, leave empty for me to code it. 

-->

<?php
include 'inc/php/functions.php';
include 'inc/php/dbconnect.php';
initSession();

if ($_SESSION['authenticated'] == false) {
    header("location: authenticate.php");
}

$goodieCode = isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == true;

if (isset($_SESSION['goodieCode']) && $_SESSION['goodieCode'] == true) {
    if (isset($_POST['productSubmit'])) {
        $productOne = $_POST['productOne'] ?? '';
        $productTwo = $_POST['productTwo'] ?? '';
        $productThree = $_POST['productThree'] ?? '';

        $selectedProducts = [
            'productOne' => $productOne,
            'productTwo' => $productTwo,
            'productThree' => $productThree
        ];

        toggleToast("success", "Products selected: " . implode(", ", array_filter($selectedProducts)));

        
    }

    $setOne = getSetOne();
    $setTwo = getSetTwo();
    $setThree = getSetThree();
}

head("Order");

headerFunc();   
?>
<main class="container">
    <div class="categoryWrapper">
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
        <?php
        }
        ?>
        <input name="productSubmit" type="submit" class="btnPrimary" value="Order" id="orderButton">
    </form>

    <!-- to check if the user has a goodie code -->
    <div data-goodie="<?php echo $goodieCode; ?>"></div>
</main>
<?php
footerFunc();
?>