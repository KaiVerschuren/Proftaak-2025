<?php
include 'inc/php/functions.php';

session_Start();

if ($_SESSION['authenticated'] == false) {
    header("location: authenticate.php");
}

head("Order");

headerFunc();
?>
<main class="container">
    <div>
        <div class="category selectedCategory">
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
        </div>
        <div class="category">
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
        </div>
        <div class="category">
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
            <div class="categoryOption"></div>
        </div>
        <div class="orderButtonWrapper">
            <button class="btnSecondary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="btnIcon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>
            <button class="btnPrimary orderPageButton">1</button>
            <button class="btnPrimary orderPageButton">2</button>
            <button class="btnPrimary orderPageButton">3</button>
            <button class="btnSecondary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="btnIcon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>

            </button>
        </div>
    </div>
</main>
<?php
footerFunc();
?>