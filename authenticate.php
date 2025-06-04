<?php
include 'inc/php/functions.php';
initSession();

$adminCode = "blub";
$userCode= "user";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['authCode'] == $adminCode) {
        $_SESSION['authenticated'] = true;
        $_SESSION['admin'] = true;
        header("location: order.php");
    } else if ($_POST["authCode"] == $userCode) { 
        $_SESSION['authenticated'] = true;
        $_SESSION['admin'] = false;
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