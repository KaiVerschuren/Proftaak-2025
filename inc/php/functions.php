<?php

function head($page)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/utils.css">
        <title><?php echo $page ?> | GoodieMaticAa</title>
    </head>
<?php
}

function headerFunc()
{
?>
    <header class="container">
        <div class="headerTitle titlePrimary">
            <h1>GoodieMaticAa</h1>
        </div>
        <nav>
            <ul class="noStyleUL headerLinks">
                <li><a href="index.php" class="headerLink">Home</a></li>
                <li><a href="about.php" class="headerLink">About</a></li>
                <li><a href="contact.php" class="headerLink">Contact</a></li>
            </ul>
        </nav>
        <div class="headerCallToAction">
            <button class="btn">
                Order 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="btnIcon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </button>
        </div>
    </header>
<?php
}

?>