<?php
include 'inc/php/functions.php';

session_start();

$authCode = "blub";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['authCode'] == $authCode) {
        $_SESSION['authenticated'] = true;
        header("location: order.php");
    }
}

head("Authenticate");

headerFunc();
?>
<main class="container">
    <div class="authenticate">
        <h1 class="titleSecondary">Authenticate</h1>
        <form class="authenticateForm" method="post">
            <label for="authCode" class="authLabel">Authentication code</label>
            <input name="authCode" type="text" class="authInput">
            <input type="submit" value="Submit code" class="btnPrimary">
        </form>
    </div>
</main>
<?php
footerFunc();
?>