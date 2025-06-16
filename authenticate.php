<?php
include 'inc/php/functions.php';
include 'inc/php/dbconnect.php';
initSession();

$adminCode = "123admin";

$codes = fetchCodes();
var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $authCode = $_POST['authCode'];
    foreach ($codes as $code) {
        if ($code['code'] == $authCode) {
            $_SESSION['authenticated'] = true;

            // check if the auth code is a code for a goodiebag
            if (checkGoodiePrefix($code['code'])) {
                $_SESSION['goodieCode'] = true;
            } else {
                $_SESSION['goodieCode'] = false;
            }

            $_SESSION['setCode'] = $code['code'];
            header("location: order.php");
            exit();
        } else if ($authCode == $adminCode) {
            $_SESSION['authenticated'] = true;
            $_SESSION['admin'] = true;
            $_SESSION['goodieCode'] = false;
            $_SESSION['setCode'] = $authCode;

            header("location: generator.php");
            exit();
        }
        else {
            toggleToast("error", "Authentication failed. Code " . $authCode . " not found.");
            $_SESSION['authenticated'] = false;
        }
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
            <input name="authCode" type="text" class="input" id="authInput">
            <label class="checkboxLabel">
                <input name="codePrefix" id="goodieCode" value="true" type="checkbox" class="checkbox" checked="true">
                Goodie code?
            </label>
            <input type="submit" value="Submit code" class="btnPrimary">
        </form>
    </div>
</main>
<?php
footerFunc();
?>