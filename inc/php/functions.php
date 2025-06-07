<?php

function head($page)
{
    global $currentPage;
    $currentPage = $page;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="style/utils.css">

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <title><?php echo $page ?> | GoodieMaticAa</title>
    </head>
    <?php
}

function headerFunc()
{
    global $currentPage;
    ?>

    <body>
        <header class="container">
            <div class="headerTitle titlePrimary">
                <h1>GoodieMaticAa</h1>
            </div>
            <nav class="headerNav">
                <ul class="noStyleUL headerLinks">
                    <li>
                        <a href="index.php" class="headerLink <?php if ($currentPage == "Homepage")
                            echo "linkSelected"; ?>">Home</a>
                    </li>
                    <li>
                        <a href="about.php" class="headerLink <?php if ($currentPage == "About")
                            echo "linkSelected"; ?>">About</a>
                    </li>
                    <li>
                        <a href="order.php" class="headerLink <?php if ($currentPage == "Order")
                            echo "linkSelected"; ?>">Order</a>
                    </li>
                    <?php
                    if ($_SESSION['admin'] == true) {
                        ?>
                        <li>
                            <a href="generator.php" class="headerLink <?php if ($currentPage == "Generator")
                                echo "linkSelected"; ?>">Generator</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>
            <div class="headerCallToAction">
                <button class="btnSecondary" onclick="window.location.href = 'order.php'">
                    Order
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="btnIcon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </button>
            </div>
        </header>
        <?php
}

function footerFunc()
{
    // These function just output the html needed for them. JUST IN CASE you want them on the page.
    // if you dont use them, they wont show up.
    toast();
    tooltip();
    ?>
        <footer class="footer">
            <p>~ GoodieMaticAa ~</p>
            <p>&copy; 2025</p>
        </footer>
        <script defer src="inc/js/footer.js"></script>
        <script defer src="inc/js/order.js"></script>
        <script defer src="inc/js/toast.js"></script>
        <script defer src="inc/js/tooltip.js"></script>
        <script defer src="inc/js/dropdown.js"></script>
        <script defer src="inc/js/pagination.js"></script>
    </body>
    <?php
}

function toast()
{
    ?>
    <div id="toast" class="toast">
        <div class="toastIconWrapper">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="toastIcon">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>
        </div>
        <div class="toastContentWrapper">
            <p class="toastContent">this is the content of a toast.</p>
        </div>
        <div class="toastCrossWrapper">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="toastCross">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="toastProgress">
            <div class="toastProgressFade"></div>
        </div>
    </div>
    <?php
}

function tooltip() {
    ?>
    <div id="tooltip" class="tooltip">toooooltip</div>
    <?php
}

function toggleToast($type, $message)
{
    ?>
    <div id="toastToggled" style="display:none;" data-type="<?php echo $type ?>" data-message="<?php echo $message; ?>"></div>
    <?php
}

function initSession()
{
    session_start();


    if (!isset($_SESSION["admin"])) {
        $_SESSION["admin"] = false;
    }
    if (!isset($_SESSION["authenticated"])) {
        $_SESSION["authenticated"] = false;
    }
}
?>