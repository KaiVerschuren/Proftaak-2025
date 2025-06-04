<?php
include 'inc/php/functions.php';
initSession();

if ($_SESSION['authenticated'] == false) {
    header("location: authenticate.php");
}

head("Order");

headerFunc();
?>
<main class="container">
    <div class="categoryWrapper">
        <div class="category">
            <div class="setOne categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setOne categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setOne categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setOne categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setOne categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setOne categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
        </div>
        <div class="category">
            <div class="setTwo categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setTwo categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setTwo categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setTwo categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setTwo categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setTwo categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
        </div>
        <div class="category">
            <div class="setThree categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setThree categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setThree categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setThree categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setThree categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
            <div class="setThree categoryOption cardShadow">
                <img src="assets/placeholderCards.png" alt="Placeholder" class="categoryOptionImage">
                <div class="categoryInfo">
                    <h1 class="categoryOptionTitle">Product title</h1>
                    <p class="categoryOptionInfo">Product info yay</p>
                </div>
            </div>
        </div>
    </div>
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
        <button class="btnSecondary orderPageButtonArrow">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="btnIcon">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>
</main>
<?php
footerFunc();
?>