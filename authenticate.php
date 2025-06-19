<?php
include 'inc/php/functions.php';
include 'inc/php/dbconnect.php';

initSession();

$codes = fetchCodes();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $authCode = $_POST['authCode'];
    $matchedCode = null;

    foreach ($codes as $code) {
        if ($code['code'] === $authCode) {
            $matchedCode = $code;
            break;
        }
    }

    if (!$matchedCode) {
        toggleToast("error", "Authentication failed. Code " . $authCode . " not found.", "authenticate.php");
        $_SESSION['authenticated'] = false;
    } else {
        $_SESSION['authenticated'] = true;
        $_SESSION['admin'] = in_array($authCode, ["admin321", "goodie-admin321"]);
        $_SESSION['goodieCode'] = $authCode === "goodie-admin321" || checkGoodiePrefix($matchedCode['code']);
        $_SESSION['setCode'] = $matchedCode['code'];
        $_SESSION['setCodeId'] = $matchedCode['id'];
        $_SESSION['setCodeUses'] = (int) $matchedCode['orders'];
        $_SESSION['setCodeMaxUses'] = (int) $matchedCode['maxOrders'];

        if ($_SESSION['admin']) {
            header("location: generator.php");
        } else {
            getUses($matchedCode['id']);
            header("location: order.php");
        }

        exit();
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