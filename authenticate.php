<?php
include 'inc/php/functions.php';
include 'inc/php/dbconnect.php';

initSession();

$codes = fetchCodes();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $authCode = $_POST['authCode'];
    foreach ($codes as $code) {
        if ($code['code'] == $authCode && $authCode != "admin321" && $authCode != "goodie-admin321") {
            $_SESSION['authenticated'] = true;

            // check if the auth code is a code for a goodiebag
            if (checkGoodiePrefix($code['code'])) {
                $_SESSION['goodieCode'] = true;
            } else {
                $_SESSION['goodieCode'] = false;
            }

            getUses($code['id']);

            $_SESSION['setCode'] = $code['code'];
            $_SESSION['setCodeId'] = $code['id'];
            $_SESSION['setCodeUses'] = $code['orders'];
            $_SESSION['setCodeMaxUses'] = $code['maxOrders'];
            $_SESSION['admin'] = false;
            header("location: order.php");
            exit();
        } else {
            toggleToast("error", "Authentication failed. Code " . $authCode . " not found.");
            $_SESSION['authenticated'] = false;
        }
        if ($authCode == "admin321") {
            $_SESSION['authenticated'] = true;
            $_SESSION['admin'] = true;
            $_SESSION['goodieCode'] = false;
            $_SESSION['setCode'] = $authCode;
            $_SESSION['setCodeId'] = 1;   
            $_SESSION['setCodeUses'] = 0;
            $_SESSION['setCodeMaxUses'] = 9999;

            header("location: generator.php");
            exit();
        }
        if ($authCode == "goodie-admin321") {
            $_SESSION['authenticated'] = true;
            $_SESSION['admin'] = true;
            $_SESSION['goodieCode'] = true;
            $_SESSION['setCode'] = $authCode;
            $_SESSION['setCodeId'] = 2;   
            $_SESSION['setCodeUses'] = 0;
            $_SESSION['setCodeMaxUses'] = 9999;

            header("location: generator.php");
            exit();
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